<?php

namespace App\Traits\Models\Permissions;

trait Relations
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Roles', 'roles_permissions', 'permission_id', 'role_id')
                    ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\Users', 'users_permissions', 'permission_id', 'user_id')
                    ->withTimestamps();
    }

}
