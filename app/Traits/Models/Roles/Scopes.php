<?php

namespace App\Traits\Models\Roles;

trait Scopes
{

    /**
     * @param object $query
     * @param string $slug
     *
     * @return object
     */
    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

}
