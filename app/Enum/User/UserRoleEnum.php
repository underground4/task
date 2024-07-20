<?php

namespace App\Enum\User;

enum UserRoleEnum: string
{

    case ADMIN = 'admin';
    case EDITOR = 'editor';
    case USER = 'user';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            static::ADMIN => 'admin',
            static::EDITOR => 'editor',
            static::USER => 'user',
        };
    }
}
