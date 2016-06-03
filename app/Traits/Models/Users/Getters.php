<?php

namespace App\Traits\Models\Users;

trait Getters
{

    /**
     * @return object
     */
    public function getDefaultRole()
    {
        return $this->roles()->orderBy('is_default', 'DESC')
                             ->orderBy('id', 'ASC')
                             ->first();
    }

}
