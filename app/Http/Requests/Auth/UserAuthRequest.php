<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserAuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'password' => ['required', 'string'],
            'email' => ['required', 'string'],
        ];
    }
}
