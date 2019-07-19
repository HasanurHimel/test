<?php

use Illuminate\Database\Seeder;

class BlogSectionTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('blog_sections')->insert([
            'name' => 'main-section',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('blog_sections')->insert([
            'name' => 'left-section',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('blog_sections')->insert([
            'name' => 'right-section',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('blog_sections')->insert([
            'name' => 'bottom-section',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);//
    }
}
