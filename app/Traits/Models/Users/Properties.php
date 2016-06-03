<?php

namespace App\Traits\Models\Users;

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

}
