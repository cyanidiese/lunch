<?php

namespace App\Traits\Models\Categories;

trait Relations
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dishes()
    {
        return $this->hasMany('App\Models\Dishes', 'category_id')
            ->withTimestamps();
    }

}
