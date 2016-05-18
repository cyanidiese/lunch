<?php

namespace App\Traits\Models\Users;

trait Setters
{

    /**
     * @param object $data
     *
     * @return void
     */
    public function set($data)
    {

        if($data->has('email'))
        {
            $this->email = $data->get('email');
        }

        if($data->has('password'))
        {
            $this->password = $data->get('password');
        }

        if($data->has('first_name'))
        {
            $this->first_name = $data->get('first_name');
        }

        if($data->has('last_name'))
        {
            $this->last_name = $data->get('last_name');
        }

        if($data->has('phone'))
        {
            $this->phone = $data->get('phone');
        }
    }

}
