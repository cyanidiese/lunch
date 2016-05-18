<?php

namespace App\Traits\Models\Roles;

trait Relations
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permissions', 'roles_permissions', 'role_id', 'permission_id')
                    ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\Users', 'users_roles', 'role_id', 'user_id')
                    ->withTimestamps();
    }

}
