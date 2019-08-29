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
            'name'=>'Yarmi Lisbet',
            'ap'=>'Arellano',
            'am'=>'Bugarin',
            'email'=>'leng_dzacatecassur@tecnm.mx',
            'password'=>bcrypt('superuser'),
        ]);
    }
}
