<?php

namespace App\Traits\Models\UsersPermissions;

trait Properties
{

    /**
     * @return bool
     */
    public function hasUser()
    {
        if(is_null($this->user))
        {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function hasUsers()
    {
        $collection = $this->users();

        return $collection->exists();
    }

}
