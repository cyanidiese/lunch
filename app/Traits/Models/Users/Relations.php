<?php

namespace App\Traits\Models\Users;

trait Relations
{
    /**
     * User belongs to many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|object
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Roles', 'users_roles', 'user_id', 'role_id')
                    ->withPivot('is_default')
                    ->withTimestamps();
    }

    /**
     * User belongs to many permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|object
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permissions', 'users_permissions', 'user_id', 'permission_id')
                    ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menus()
    {
        return $this->hasMany('App\Models\Menus', 'provider_id')
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dishes()
    {
        return $this->hasMany('App\Models\Dishes', 'provider_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favorites()
    {
        return $this->belongsToMany('App\Models\Dishes', 'favorites', 'user_id', 'dish_id')->withTimestamps();
    }

}
