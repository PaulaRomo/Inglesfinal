<?php

use Illuminate\Database\Seeder;

class PeriodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('periodos')->insert([
            'periodo'=>'1 verano 2019',
            'inicio'=>'2019-06-10',
            'fin'=>'2019-06-18',
        ]);
        DB::table('periodos')->insert([
            'periodo'=>'2 verano 2019',
            'inicio'=>'2019-06-19',
            'fin'=>'2019-06-28',
        ]);
        DB::table('periodos')->insert([
            'periodo'=>'3 verano 2019',
            'inicio'=>'2019-07-01',
            'fin'=>'2019-07-09',
        ]);
        DB::table('periodos')->insert([
            'periodo'=>'Segunda oportunidad',
            'inicio'=>'2019-07-10',
            'fin'=>'2019-07-16',
        ]);
    }
}
