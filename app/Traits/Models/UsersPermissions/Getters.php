<?php

namespace App\Traits\Models\UsersPermissions;

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
