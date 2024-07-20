<?php

namespace Database\Seeders;

use App\Enum\User\PermissionEnum;
use App\Enum\User\UserRoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name' => UserRoleEnum::ADMIN->value,
            'guard_name' => 'api'
        ]);

        Role::create([
            'name' => UserRoleEnum::EDITOR->value,
            'guard_name' => 'api'
        ]);

        Role::create([
            'name' => UserRoleEnum::USER->value,
            'guard_name' => 'api'
        ]);

        Permission::create(['name' => PermissionEnum::ANY_USER_MANAGE]);

        $adminRole->givePermissionTo(PermissionEnum::ANY_USER_MANAGE);
    }
}
