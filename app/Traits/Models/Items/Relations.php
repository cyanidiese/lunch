<?php

namespace App\Traits\Models\Items;

trait Relations
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo('App\Models\Menus', 'menu_id')
                    ->withTimestamps();
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dish()
    {
        return $this->belongsTo('App\Models\Dishes', 'dish_id')
                    ->withTimestamps();
    }

}
