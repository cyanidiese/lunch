<?php

namespace App\Services;

class AuthService extends Service
{

    /**
     * Create a new instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return bool
     */
    public function login($email, $password)
    {
        return auth()->attempt(compact('email', 'password'));
    }

    /**
     * @return void
     */
    public function logout()
    {
        auth()->logout();
    }

    /**
     * @return object
     */
    public function getUser()
    {
        $user = auth()->user();

        return $user;
    }

}
