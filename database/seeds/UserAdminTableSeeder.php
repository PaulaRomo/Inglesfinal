<?php

use Illuminate\Database\Seeder;

class UserAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=>'Yarmi',
            'email'=>'yarmi@gmail.com',
            'password'=>bcrypt('superuser'),
        ]);
    }
}
