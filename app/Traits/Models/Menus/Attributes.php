<?php

namespace App\Traits\Models\Menus;

trait Attributes
{

    /**
     * @param string $value
     *
     * @return void
     */
    public function setProviderIdAttribute($value)
    {
        $value = trim($value);
        $value = intval($value);

        $this->attributes['provider_id'] = $value;
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
