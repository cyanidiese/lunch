<?php

namespace App\Traits\Models\Roles;

trait Getters
{

    /**
     * @return object
     */
    public function getUsers()
    {
        $collection = $this->users();

        return $collection->get();
    }

    /**
     * @return array
     */
    public function getUserIds()
    {
        return $this->users->lists('id')->all();
    }

}
