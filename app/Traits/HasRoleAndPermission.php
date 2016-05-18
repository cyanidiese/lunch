<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

trait HasRoleAndPermission
{

    /**
     * Property for caching roles.
     *
     * @var object
     */
    protected $roles;

    /**
     * Property for caching permissions.
     *
     * @var object
     */
    protected $permissions;

    /**
     * Get all roles as collection.
     *
     * @return object
     */
    public function getRoles()
    {
        return ( ! $this->roles) ? $this->roles = $this->roles()->wherePivot('is_default', 1)->get() : $this->roles;
    }

    /**
     * Check if the user has a role or roles.
     *
     * @param int|string|array $role
     * @param bool             $all
     *
     * @return bool
     */
    public function is($role, $all = false)
    {
        if($this->isPretendEnabled())
        {
            return $this->pretend('is');
        }

        return $this->{$this->getMethodName('is', $all)}($role);
    }

    /**
     * Check if the user has at least one role.
     *
     * @param int|string|array $role
     *
     * @return bool
     */
    public function isOne($role)
    {
        foreach($this->getArrayFrom($role) as $role)
        {
            if($this->hasRole($role))
            {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if the user has all roles.
     *
     * @param int|string|array $role
     *
     * @return bool
     */
    public function isAll($role)
    {
        foreach($this->getArrayFrom($role) as $role)
        {
            if( ! $this->hasRole($role))
            {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if the user has role.
     *
     * @param int|string $role
     *
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->getRoles()->contains(function($key, $value) use($role)
        {
            return $role == $value->id || Str::is($role, $value->slug);
        });
    }

    /**
     * Attach role to a user.
     *
     * @param int|object $role
     *
     * @return null|bool
     */
    public function attachRole($role)
    {
        return ( ! $this->getRoles()->contains($role)) ? $this->roles()->attach($role) : true;
    }

    /**
     * Detach role from a user.
     *
     * @param int|object $role
     *
     * @return int
     */
    public function detachRole($role)
    {
        $this->roles = null;

        return $this->roles()->detach($role);
    }

    /**
     * Detach all roles from a user.
     *
     * @return int
     */
    public function detachAllRoles()
    {
        $this->roles = null;

        return $this->roles()->detach();
    }

    /**
     * Get role level of a user.
     *
     * @return int
     */
    public function level()
    {
        return ($role = $this->getRoles()->sortByDesc('level')->first()) ? $role->level : 0;
    }

    /**
     * Get all permissions from roles.
     *
     * @return object
     */
    public function rolePermissions()
    {
        $permissionModel = app('App\Models\Permissions');

        if( ! $permissionModel instanceof Model)
        {
            throw new InvalidArgumentException('[App\Models\Permissions] must be an instance of \Illuminate\Database\Eloquent\Model');
        }

        return $permissionModel::select(['permissions.*', 'roles_permissions.created_at as pivot_created_at', 'roles_permissions.updated_at as pivot_updated_at'])
                               ->join('roles_permissions', 'roles_permissions.permission_id', '=', 'permissions.id')
                               ->join('roles', 'roles.id', '=', 'roles_permissions.role_id')
                               ->whereIn('roles.id', $this->getRoles()->lists('id')->all())
                               ->groupBy(['permissions.id', 'pivot_created_at', 'pivot_updated_at']);
    }

    /**
     * Get all permissions as collection.
     *
     * @return object
     */
    public function getPermissions()
    {
        return ( ! $this->permissions) ? $this->permissions = $this->permissions()->get()->merge($this->rolePermissions()->get()) : $this->permissions;
    }

    /**
     * Check if the user has a permission or permissions.
     *
     * @param int|string|array $permission
     * @param bool             $all
     *
     * @return bool
     */
    public function can($permission, $all = false)
    {
        if($this->isPretendEnabled())
        {
            return $this->pretend('can');
        }

        return $this->{$this->getMethodName('can', $all)}($permission);
    }

    /**
     * Check if the user has at least one permission.
     *
     * @param int|string|array $permission
     *
     * @return bool
     */
    public function canOne($permission)
    {
        foreach($this->getArrayFrom($permission) as $permission)
        {
            if($this->hasPermission($permission))
            {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if the user has all permissions.
     *
     * @param int|string|array $permission
     *
     * @return bool
     */
    public function canAll($permission)
    {
        foreach($this->getArrayFrom($permission) as $permission)
        {
            if( ! $this->hasPermission($permission))
            {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if the user has a permission.
     *
     * @param int|string $permission
     *
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->getPermissions()->contains(function($key, $value) use($permission)
        {
            return $permission == $value->id || Str::is($permission, $value->slug);
        });
    }

    /**
     * Check if the user is allowed to manipulate with entity.
     *
     * @param string                              $providedPermission
     * @param \Illuminate\Database\Eloquent\Model $entity
     * @param bool                                $owner
     * @param string                              $ownerColumn
     *
     * @return bool
     */
    public function allowed($providedPermission, Model $entity, $owner = true, $ownerColumn = 'user_id')
    {
        if($this->isPretendEnabled())
        {
            return $this->pretend('allowed');
        }

        if($owner === true && $entity->{$ownerColumn} == $this->id)
        {
            return true;
        }

        return $this->isAllowed($providedPermission, $entity);
    }

    /**
     * Check if the user is allowed to manipulate with provided entity.
     *
     * @param string                              $providedPermission
     * @param \Illuminate\Database\Eloquent\Model $entity
     *
     * @return bool
     */
    protected function isAllowed($providedPermission, Model $entity)
    {
        foreach($this->getPermissions() as $permission)
        {
            if($permission->model != '' && get_class($entity) == $permission->model && ($permission->id == $providedPermission || $permission->slug === $providedPermission))
            {
                return true;
            }
        }

        return false;
    }

    /**
     * Attach permission to a user.
     *
     * @param int|object $permission
     *
     * @return null|bool
     */
    public function attachPermission($permission)
    {
        return ( ! $this->getPermissions()->contains($permission)) ? $this->permissions()->attach($permission) : true;
    }

    /**
     * Detach permission from a user.
     *
     * @param int|object $permission
     *
     * @return int
     */
    public function detachPermission($permission)
    {
        $this->permissions = null;

        return $this->permissions()->detach($permission);
    }

    /**
     * Detach all permissions from a user.
     *
     * @return int
     */
    public function detachAllPermissions()
    {
        $this->permissions = null;

        return $this->permissions()->detach();
    }

    /**
     * Check if pretend option is enabled.
     *
     * @return bool
     */
    private function isPretendEnabled()
    {
        return (bool) config('restrictions.pretend.enabled');
    }

    /**
     * Allows to pretend or simulate package behavior.
     *
     * @param string $option
     *
     * @return bool
     */
    private function pretend($option)
    {
        return (bool) config('restrictions.pretend.options.' . $option);
    }

    /**
     * Get method name.
     *
     * @param string $methodName
     * @param bool   $all
     *
     * @return string
     */
    private function getMethodName($methodName, $all)
    {
        return ((bool) $all) ? $methodName . 'All' : $methodName . 'One';
    }

    /**
     * Get an array from argument.
     *
     * @param int|string|array $argument
     *
     * @return array
     */
    private function getArrayFrom($argument)
    {
        return ( ! is_array($argument)) ? preg_split('/ ?[,|] ?/', $argument) : $argument;
    }

    /**
     * Handle dynamic method calls.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if(starts_with($method, 'is'))
        {
            return $this->is(snake_case(substr($method, 2), config('restrictions.separator')));
        }
        elseif(starts_with($method, 'can'))
        {
            return $this->can(snake_case(substr($method, 3), config('restrictions.separator')));
        }
        elseif(starts_with($method, 'allowed'))
        {
            return $this->allowed(snake_case(substr($method, 7), config('restrictions.separator')), $parameters[0], (isset($parameters[1])) ? $parameters[1] : true, (isset($parameters[2])) ? $parameters[2] : 'user_id');
        }

        return parent::__call($method, $parameters);
    }

}
