<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserAdminTableSeeder::class);
        $this->call(UserRolAdmiTableSeeder::class);
        $this->call(DocRolSeeder::class);
        $this->call(PeriodosSeeder::class);
        $this->call(AlumnosExternosSeeds::class);
        $this->call(GrupoSeeder::class);
        $this->call(RolesAlumnosDocentesSeeds::class);
        $this->call(AlimGrupSeeder::class);
    }
}
