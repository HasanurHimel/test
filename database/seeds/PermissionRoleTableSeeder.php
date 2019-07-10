<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([
            'role_id' => 2,
            'permission_id' => 1,
            
        ]);
        DB::table('permission_role')->insert([
            'role_id' => 2,
            'permission_id' => 2,
            
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 3,
            'permission_id' => 3,
            
        ]);
        DB::table('permission_role')->insert([
            'role_id' => 3,
            'permission_id' => 4,
            
        ]);
    }
}
