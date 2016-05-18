<?php

namespace App\Traits\Models\UsersPermissions;

trait Relations
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Users', 'user_id')
                    ->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission()
    {
        return $this->belongsTo('App\Models\Permissions', 'permission_id');
    }

}
