<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->withRoleUser()->withRoleAdmin()->create();
        User::factory(5)->withRoleUser()->withRoleEditor()->create();
        User::factory(5)->withRoleUser()->create();
        User::factory(5)->withRoleAdmin()->create();
        User::factory(5)->withRoleEditor()->create();

        // Создадим тестового пользователя для удобства тестирования и дадим ему роль админа(Право на выполнение запрос есть только у админа)
        User::factory()->withRoleAdmin()->create([
           'email' => 'test@test.ru',
           'password' => bcrypt('12345678')
        ]);

        // Это если захочется потестировать, что под другой ролью нельзя получить доступ к api
        User::factory()->withRoleUser()->create([
            'email' => 'test@test1.ru',
            'password' => bcrypt('12345678')
        ]);
    }
}
