<?php

namespace App\Traits\Models\Menus;

trait Relations
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo('App\Models\Users', 'provider_id')
                    ->withTimestamps();
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('App\Models\Items', 'menu_id')
                    ->withTimestamps();
    }

}
