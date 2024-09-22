<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * this model is imported from the spatie library
         * this will come from the migration file on the spatie
         */
        Permission::create(['name' => "manage_users"]);

        $role = Role::findByName(RoleEnum::ADMIN->value);
        $role -> givePermissionTo('manage_users');


        // after set this run this seeder class
    }
}
