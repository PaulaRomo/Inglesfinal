<?php

use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('grupos')->insert([
            'nombre_grupo'=>'1 "A" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>1,
            'docente'=>'Beatriz Miramontes Estrada',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'2 "A" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>2,
            'docente'=>'Noel Garcia',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'2 "B" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>2,
            'docente'=>'Beatriz Miramontes Estrada',
            'capacidad'=>37,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'2 "C" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>2,
            'docente'=>'Enrique Miramontes Estrada',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'2 "D" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>2,
            'docente'=>'Veronica Romero',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'2 "E" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>2,
            'docente'=>'',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'3 "A" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>3,
            'docente'=>'Noel Garcia',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'3 "B" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>3,
            'docente'=>'Beatriz Miramontes Estrada',
            'capacidad'=>38,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'3 "C" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>3,
            'docente'=>'Enrique Miramontes Estrada',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'4 FS TGO ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>4,
            'docente'=>'Beatriz Miramontes Estrada',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'4 "A"',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>4,
            'docente'=>'Veronica Romero',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'5 "A" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>5,
            'docente'=>'Enrique Miramontes Estrada',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'5 "B" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>5,
            'docente'=>'Noel García',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'5 "C" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>5,
            'docente'=>'Noel García',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'5 "D" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>5,
            'docente'=>'Beatriz Miramontes Estrada',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'6 "A" ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>6,
            'docente'=>'Enrique Miramontes Estrada',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'6 FS TGO ',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>6,
            'docente'=>'Enrique Miramontes Estrada',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
        DB::table('grupos')->insert([
            'nombre_grupo'=>'CUARTO',
            'periodo'=>'Enero-Julio 2019',
            'nivel'=>4,
            'docente'=>'',
            'capacidad'=>30,
            'instrumentacion'=>'',
  

        ]);
    }
}
