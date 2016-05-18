<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class PasswordResetRequest extends Request
{

    /**
     * @return array
     */
    public function rules()
    {
        return [

            'token'    => ['required'],
            'email'    => ['required', 'email'],
            'password' => ['required', 'confirmed'],

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
