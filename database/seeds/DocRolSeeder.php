<?php

use Illuminate\Database\Seeder;

class DocRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permission_role')->insert([
            'permission_id'=>10,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>11,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>15,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>16,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>18,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>19,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>20,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>21,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>22,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>23,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>24,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>26,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>27,
            'role_id'=>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>25,
            'role_id'=>3,
        ]); 
    }
}
