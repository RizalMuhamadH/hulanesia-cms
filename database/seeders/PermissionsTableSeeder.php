<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {

        Permission::generateFor('categories');

        Permission::generateFor('roles');

        Permission::generateFor('users');

        Permission::generateFor('tags');

        Permission::generateFor('features');
    }
}
