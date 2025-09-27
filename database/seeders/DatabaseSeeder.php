<?php

namespace Database\Seeders;

use App\Models\guru;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'admin11',
            'username' => 'admin22',
            'level' => 'admin',
            'password' => '111',
        ]);
        Guru::create([
            'name_guru' => 'Budi',
            'nip' => '1234567890',
            'mapel' => 'Matematika',
            'foto' => 'default.jpg',
        ]);
    }
}
