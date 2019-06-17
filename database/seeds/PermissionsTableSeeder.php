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
        Permission::create([
        'name' => 'Agregar calificaciones al alumno',
        'slug' => 'grupos.agregarCalificaciones',
        'description' => 'Permite agregar calificaciones a un alumno (Administrador, Docente)',
    ]);
        Permission::create([
        'name' => 'Guadar las calificaiones del alumno',
        'slug' => 'grupos.guardarCalificaciones',
        'description' => 'Permite guardar calificaciones a un alumno (Administrador, Docente)',
    ]);
        Permission::create([
        'name' => 'Mostrar vista para la carga de la instrumentacion del docente',
        'slug' => 'grupos.documento',
        'description' => 'Muestra una vista para la carga de la instrumentacion  del docente (Administrador, Docente)',
    ]);
        Permission::create([
        'name' => 'Guarda la instrumentacion del docente',
        'slug' => 'grupos.instrumentacion',
        'description' => 'Guarda la instrumentacion del docente (Administrador, Docente)',
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
    //pdfs
        Permission::create([
        'name' => 'PDF por grupos',
        'slug' => 'alumnos.pdf',
        'description' => 'Generar un pdf por carrera (Administrador, Docente)',
    ]);
        Permission::create([
        'name' => 'PDF por alumno',
        'slug' => 'grupos.pdf',
        'description' => 'Generar un pdf por grupo de ingles (Administrador, Docente)',
    ]);
        Permission::create([
        'name' => 'Clasificacin de alumnos reporte PDF',
        'slug' => 'grupos.pdfalum',
        'description' => 'Generar pdf para clasificar a los alumnos internos y externos (Administrador)',
    ]);
    Permission::create([
        'name' => 'Agregar Alumnos, Docente y Horario al grupo',
        'slug' => 'grupos.agreDias',
        'description' => 'Agregar Alumnos, Docente y Horario a los grupos (Administrador, Secretaria)',
    ]);
    Permission::create([
        'name' => 'Agregar usuarios',
        'slug' => 'users.create',
        'description' => 'Regristrar nuevos usuarios(Administrador, Secretaria)',
    ]);
  } 
}
