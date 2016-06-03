<?php

namespace App\Traits\Models\Items;

trait Attributes
{

    /**
     * @param string $value
     *
     * @return void
     */
    public function setMenuIdAttribute($value)
    {
        $value = trim($value);
        $value = intval($value);

        $this->attributes['menu_id'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setDateAttribute($value)
    {
        $value = trim($value);
        $value = intval($value);

        $this->attributes['date'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setIsActiveAttribute($value)
    {
        $value = trim($value);
        $value = intval($value);

        $this->attributes['is_active'] = $value;
    }

}
