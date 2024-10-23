<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // Importar el modelo Role

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear roles
        Role::create(['name' => 'user']);
        Role::create(['name' => 'provider']);

        // Crear un usuario de prueba y asignar el rol "user"
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole('user');

        // Crear un proveedor de servicios de prueba y asignar el rol "provider"
        $provider = User::factory()->create([
            'name' => 'Test Provider',
            'email' => 'provider@example.com',
        ]);
        $provider->assignRole('provider');
    }
}
