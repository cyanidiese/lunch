<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class PasswordRemindRequest extends Request
{

    /**
     * @return array
     */
    public function rules()
    {
        return [

            'email' => ['required', 'email'],

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
