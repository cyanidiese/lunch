<?php

namespace App\Traits\Models\Categories;

trait Getters
{

    /**
     * @param $locale
     *
     * @return object
     */
    public function getLocalizedName($locale)
    {
        $locale_name = 'name_'.$locale;
        return !empty($this->{$locale_name}) ? $this->{$locale_name} : $this->name_en;
    }

}
