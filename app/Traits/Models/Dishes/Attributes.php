<?php

namespace App\Traits\Models\Dishes;

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
    public function setCategoryIdAttribute($value)
    {
        $value = trim($value);
        $value = intval($value);

        $this->attributes['category_id'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setCaloriesAttribute($value)
    {
        $value = trim($value);
        $value = intval($value);

        $this->attributes['calories'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setWeightAttribute($value)
    {
        $value = trim($value);
        $value = intval($value);

        $this->attributes['weight'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setCostAttribute($value)
    {
        $value = trim($value);
        $value = intval($value);

        $this->attributes['cost'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setImageAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);

        $this->attributes['image'] = $value;
    }

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

    /**
     * @param string $value
     *
     * @return void
     */
    public function setDescriptionEnAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);

        $this->attributes['description_en'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setDescriptionUkAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);

        $this->attributes['description_uk'] = $value;
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setDescriptionRuAttribute($value)
    {
        $value = trim($value);
        $value = strval($value);

        $this->attributes['description_ru'] = $value;
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
