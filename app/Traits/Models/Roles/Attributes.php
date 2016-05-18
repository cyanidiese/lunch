<?php

namespace App\Traits\Models\Roles;

trait Attributes
{

    /**
     * @param string $value
     *
     * @return void
     */
    public function setSlugAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);
        $value = str_slug($value, config('restrictions.separator'));

        $this->attributes['slug'] = $value;
    }

}
