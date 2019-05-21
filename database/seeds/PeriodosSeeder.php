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
            'inicio'=>'2019-05-19',
            'fin'=>'2019-06-20',
        ]);
        DB::table('periodos')->insert([
            'periodo'=>'2',
            'inicio'=>'2019-05-19',
            'fin'=>'2019-06-20',
        ]);
        DB::table('periodos')->insert([
            'periodo'=>'3',
            'inicio'=>'2019-05-19',
            'fin'=>'2019-06-20',
        ]);
        DB::table('periodos')->insert([
            'periodo'=>'Segunda oportunidad',
            'inicio'=>'2019-06-02',
            'fin'=>'2019-06-16',
        ]);
    }
}
