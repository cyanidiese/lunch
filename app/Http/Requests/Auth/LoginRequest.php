<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class LoginRequest extends Request
{

    /**
     * @return array
     */
    public function rules()
    {
        return [

            'email'    => ['required', 'email', 'exists:users'],
            'password' => ['required'],

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
