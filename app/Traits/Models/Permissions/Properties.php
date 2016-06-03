<?php

namespace App\Traits\Models\Permissions;

trait Properties
{

    /**
     * @return bool
     */
    public function hasRoles()
    {
        $collection = $this->roles();

        return $collection->exists();
    }

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
