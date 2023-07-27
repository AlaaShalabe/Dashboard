<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'Adimn',
            'firstname' => 'Admin',
            'lastname' => 'RFDF',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'roles_name' => ["Admin"],

        ]);
        $user2 = User::create([
            'username' => 'Nermen',
            'firstname' => 'ne',
            'lastname' => 'es',
            'email' => 'nana@gmail.com',
            'password' => '12345678',
            'roles_name' => ["Writer"],

        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        //user2
        $role2 = Role::create(['name' => 'Writer']);

        $role2->givePermissionTo('role-list');


        $user2->assignRole([$role2->id]);
    }
}
