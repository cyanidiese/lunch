<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegisterRequest extends Request
{

    /**
     * @return array
     */
    public function rules()
    {
        return [

            'email'        => ['required', 'email', 'exists:users'],
            'password'     => ['required', 'confirmed'],
            'first_name'   => ['required'],
            'last_name'    => ['required'],
            'phone'        => [],
            'invite_token' => ['required', 'exists:users'],

        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [];
    }

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}
