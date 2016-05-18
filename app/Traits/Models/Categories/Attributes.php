<?php

namespace App\Traits\Models\Categories;

trait Attributes
{
    /**
     * @param string $value
     *
     * @return void
     */
    public function setNameEnAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);

        $this->attributes['name_en'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setNameUkAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);

        $this->attributes['name_uk'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setNameRuAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);

        $this->attributes['name_ru'] = $value;
    }


}
