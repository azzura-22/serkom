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
            'name_sekolah'      => 'SMAN 8 Yogyakarta',
            'kepalasekolah'     => 'Fadiyah Suryani, S.Pd., M.Pd.Si.',
            'foto'              => 'skolah.webp', // simpan di storage/app/public/sekolah/
            'logo'              => 'sekolah1.jpg',  // simpan di storage/app/public/sekolah/
            'npsn'              => '20403708',   // NPSN resmi SMAN 8 Yogyakarta
            'alamat'            => 'Jl. Sidobali No.1, Muja Muju, Umbulharjo, Yogyakarta',
            'kontak'            => '(0274) 512888',
            'visi_misi'         => 'Menjadi sekolah menengah atas unggulan yang berlandaskan iman, ilmu, dan teknologi serta berwawasan global.',
            'tahun_berdiri'     => '1980',
            'deskripsi'         => 'SMAN 8 Yogyakarta adalah sekolah menengah atas negeri yang dikenal sebagai salah satu sekolah favorit di Yogyakarta, dengan prestasi akademik dan non-akademik yang gemilang.',
            'Fotokepalasekolah' => 'kepalasekolah.png',
        ]);
    }
}
