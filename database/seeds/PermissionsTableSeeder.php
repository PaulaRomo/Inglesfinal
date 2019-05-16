<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user
        Permission::create([
        'name' => 'Navegar usuarios',
        'slug' => 'users.index',
        'description' => 'Lista y navega todos los usuarios del sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Ver detalle de usuario',
        'slug' => 'users.show',
        'description' => 'Ver detalle de cada usuario del sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Edicion de usuario',
        'slug' => 'users.edit',
        'description' => 'Editar cualquier dato de un usuario del sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Eliminar usuario',
        'slug' => 'users.destroy',
        'description' => 'Eliminar cualquier usuario del sistema (Administrador)',
    ]);


    //roles
        Permission::create([
        'name' => 'Navegar roles',
        'slug' => 'roles.index',
        'description' => 'Lista y navega todos los roles del sistema (Administrador)',
    ]);

      Permission::create([
      'name' => 'Creacion rol',
      'slug' => 'roles.create',
      'description' => 'Crear un rol del sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Ver detalle de rol',
        'slug' => 'roles.show',
        'description' => 'Ver detalle de cada rol del sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Edicion de rol',
        'slug' => 'roles.edit',
        'description' => 'Editar cualquier dato de un rol del sistema (Administrador)',
    ]);



        Permission::create([
        'name' => 'Eliminar rol',
        'slug' => 'roles.destroy',
        'description' => 'Eliminar cualquier rol del sistema (Administrador)',
    ]);

    //grupos
        Permission::create([
        'name' => 'Navegar grupos',
        'slug' => 'grupos.index',
        'description' => 'Lista y navega todos los grupos del sistema (Administrador,Docentes)',
    ]);

        Permission::create([
        'name' => 'Ver detalle del grupo',
        'slug' => 'grupos.show',
        'description' => 'Ver detalle de cada grupo en el sistema (Administrador,Docentes)',
    ]);

        Permission::create([
        'name' => 'Edicion de grupo',
        'slug' => 'grupos.edit',
        'description' => 'Editar cualquier dato de un grupo en el sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Creacion de grupo',
        'slug' => 'grupos.create',
        'description' => 'Crear un grupo en el sistema (Administrador)',
    ]);

        Permission::create([
        'name' => 'Eliminar grupo',
        'slug' => 'grupos.destroy',
        'description' => 'Eliminar cualquier grupo del sistema (Administrador)',
    ]);

    //calificaciones
        Permission::create([
        'name' => 'Navegar calificaciones',
        'slug' => 'calificaciones.index',
        'description' => 'Lista y navega todas las calificaciones de los alumnos (Administrador,Docente)',
    ]);

        Permission::create([
        'name' => 'Ver detalle de calificaciones',
        'slug' => 'calificaciones.show',
        'description' => 'Ver detalle de calificaciones por alumno (Administrador,Docente)',
    ]);

        Permission::create([
        'name' => 'Edicion de calificaciones',
        'slug' => 'calificaciones.edit',
        'description' => 'Editar cualquier calificacion por alumno (Administrador,Docente)',
    ]);

        Permission::create([
        'name' => 'Creacion de calificacion por alumno',
        'slug' => 'calificaciones.create',
        'description' => 'Crear una calificacion al alumno (Administrador,Docente)',
    ]);

        Permission::create([
        'name' => 'Eliminar calificacion',
        'slug' => 'calificaciones.destroy',
        'description' => 'Eliminar cualquier calificacion del alumno (Administrador,Docente)',
    ]);
    //calificacinoes
        Permission::create([
        'name' => 'Vista de calificaciones por alumno',
        'slug' => 'alumnos.show',
        'description' => 'Mostrar calificaciones por alumno (Alumno)',
    ]);
        Permission::create([
        'name' => 'Perfil del alumno',
        'slug' => 'alumno.profile',
        'description' => 'Mostrar perfil del alumno (Alumno)',
    ]);
  }
}
