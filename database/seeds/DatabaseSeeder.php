<?php

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
         $this->call(AdminsTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(PermissionsForTableSeeder::class);
         $this->call(PermissionsTableSeeder::class);
         $this->call(PermissionRoleTableSeeder::class);
         $this->call(AdminRoleTableSeeder::class);
         $this->call(BlogSectionTableSeeder::class);
    }
}
