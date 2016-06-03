<?php

namespace App\Traits\Models\Users;

trait Attributes
{

    /**
     * @param string $value
     *
     * @return void
     */
    public function setEmailAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);

        $this->attributes['email'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);
        $value = bcrypt($value);

        $this->attributes['password'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setFirstNameAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);

        $this->attributes['first_name'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setLastNameAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);

        $this->attributes['last_name'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setPhoneAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);

        $this->attributes['phone'] = $value;
    }

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return "{$this->last_name}, {$this->first_name}";
    }

}
