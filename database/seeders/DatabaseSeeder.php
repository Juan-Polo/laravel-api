<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Activity;
use App\Models\Alumno;
use App\Models\Asignatura;
use App\Models\Chat;
use App\Models\Degree;
use App\Models\Evidencia;
use App\Models\Guia;
use App\Models\Image;
use App\Models\Maestro;
use App\Models\Mensaje;
use App\Models\Notification;
use App\Models\Padre;
use App\Models\Role;
use App\Models\User;

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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // Role::factory(3)->create();
        $this->call(RoleSeeder::class);
        User::factory(100)->create();
        Image::factory(50)->create();
        Degree::factory(5)->create();
        Notification::factory(50)->create();
        Maestro::factory(10)->create();
        Padre::factory(20)->create();
        Alumno::factory(50)->create();
        Chat::factory(20)->create();
        Mensaje::factory(20)->create();
        Asignatura::factory(8)->create();
        Guia::factory(20)->create();
        Activity::factory(10)->create();
        Evidencia::factory(10)->create();
    }
}
