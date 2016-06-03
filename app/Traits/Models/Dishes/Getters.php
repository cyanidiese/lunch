<?php

namespace App\Traits\Models\Dishes;

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

    /**
     * @param $locale
     *
     * @return object
     */
    public function getLocalizedDescription($locale)
    {
        $locale_desc = 'description_'.$locale;
        return !empty($this->{$locale_desc}) ? $this->{$locale_desc} : $this->description_en;
    }

}
