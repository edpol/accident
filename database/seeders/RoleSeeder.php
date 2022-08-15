<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['created_at'=>now(), 'updated_at'=>now(), 'id'=>1,  'role_level'=>3,  'permission_id'=>1]);
        DB::table('roles')->insert(['created_at'=>now(), 'updated_at'=>now(), 'id'=>2,  'role_level'=>3,  'permission_id'=>2]);
        DB::table('roles')->insert(['created_at'=>now(), 'updated_at'=>now(), 'id'=>3,  'role_level'=>3,  'permission_id'=>3]);
        DB::table('roles')->insert(['created_at'=>now(), 'updated_at'=>now(), 'id'=>4,  'role_level'=>3,  'permission_id'=>4]);
        DB::table('roles')->insert(['created_at'=>now(), 'updated_at'=>now(), 'id'=>5,  'role_level'=>3,  'permission_id'=>5]);
        DB::table('roles')->insert(['created_at'=>now(), 'updated_at'=>now(), 'id'=>6,  'role_level'=>3,  'permission_id'=>6]);
        DB::table('roles')->insert(['created_at'=>now(), 'updated_at'=>now(), 'id'=>7,  'role_level'=>2,  'permission_id'=>4]);
    }
}
