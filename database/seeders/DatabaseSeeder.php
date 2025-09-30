<?php

namespace Database\Seeders;

use App\Models\guru;
use App\Models\Profilesekolah;
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
        Profilesekolah::create([
            'name_sekolah'  => 'SMK YPC TASIKMALAYA',
            'kepalasekolah' => 'Drs. H. Ahmad Suryana, M.Pd.',
            'foto'          => 'smk.webp', // simpan di storage/app/public/sekolah/
            'logo'          => 'logo.png',    // simpan di storage/app/public/sekolah/
            'npsn'          => '20212345',
            'alamat'        => 'Jl. Raya Ciawi No.123, Tasikmalaya, Jawa Barat',
            'kontak'        => '(0265) 123456',
            'visi_misi'     => 'Menjadi sekolah unggulan dalam bidang teknologi dan industri, serta menghasilkan lulusan yang beriman, berilmu, dan berakhlak mulia.',
            'tahun_berdiri' => '1995',
            'deskripsi'     => 'SMK YPC Tasikmalaya adalah sekolah kejuruan yang fokus pada bidang teknologi, bisnis, dan industri dengan dukungan sarana prasarana modern serta tenaga pengajar berpengalaman.',
        ]);
    }
}
