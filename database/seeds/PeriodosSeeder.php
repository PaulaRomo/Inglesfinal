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
            'periodo'=>'1',
            'inicio'=>'2019-04-19',
            'fin'=>'2019-05-31',
        ]);
        DB::table('periodos')->insert([
            'periodo'=>'2',
            'inicio'=>'2019-05-30',
            'fin'=>'2019-06-06',
        ]);
        DB::table('periodos')->insert([
            'periodo'=>'3',
            'inicio'=>'2019-06-07',
            'fin'=>'2019-06-10',
        ]);
        DB::table('periodos')->insert([
            'periodo'=>'Segunda oportunidad',
            'inicio'=>'2019-06-11',
            'fin'=>'2019-06-16',
        ]);
    }
}
