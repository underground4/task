<?php

namespace App\Enum\User;

enum UserRoleEnum: int
{
    case ADMIN = 1;
    case EDITOR = 2;
    case USER = 3;

    public static function descriptions(): array
    {
        return [
            self::ADMIN->value => 'Администратор',
            self::EDITOR->value => 'Редактор',
            self::USER->value => 'Пользователь',
        ];
    }
}
