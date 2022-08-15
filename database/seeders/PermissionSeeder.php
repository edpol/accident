<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([id=>1, description=>"add/edit/detele each role"]);
        DB::table('permissions')->insert([id=>2, description=>"add/edit/detele users"]);
        DB::table('permissions')->insert([id=>3, description=>"add/edit/detele user permissions"]);
        DB::table('permissions')->insert([id=>4, description=>"add/edit/detele country"]);
        DB::table('permissions')->insert([id=>5, description=>"link permission to role"]);
        DB::table('permissions')->insert([id=>6, description=>"link users to role"]);
    }
}
