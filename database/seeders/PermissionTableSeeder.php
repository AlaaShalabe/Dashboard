<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'news-list',
            'news-create',
            'news-edit',
            'news-delete',
            'topics-list',
            'topics-create',
            'topics-edit',
            'topics-delete',
            'article-list',
            'article-create',
            'article-edit',
            'article-delete',
            'email-list'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
