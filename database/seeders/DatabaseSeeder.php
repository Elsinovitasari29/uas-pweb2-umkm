<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Provinsi
        DB::table('provinsi')->insert([
            ['id' => 1, 'nama' => 'Jawa Barat', 'ibukota' => 'Bandung', 'lotitude' => -6.9147, 'longtitude' => 107.6098],
            ['id' => 2, 'nama' => 'Jawa Tengah', 'ibukota' => 'Semarang', 'lotitude' => -7.0051, 'longtitude' => 110.4381],
            ['id' => 3, 'nama' => 'Jawa Timur', 'ibukota' => 'Surabaya', 'lotitude' => -7.2575, 'longtitude' => 112.7521],
            ['id' => 4, 'nama' => 'DKI Jakarta', 'ibukota' => 'Jakarta', 'lotitude' => -6.2088, 'longtitude' => 106.8456],
            ['id' => 5, 'nama' => 'Banten', 'ibukota' => 'Serang', 'lotitude' => -6.12, 'longtitude' => 106.15],
        ]);

        // Kabkota
        DB::table('kabkota')->insert([
            ['id' => 1, 'nama' => 'Bandung', 'latitude' => -6.9175, 'longtitude' => 107.6191, 'provinsi_id' => 1],
            ['id' => 2, 'nama' => 'Semarang', 'latitude' => -7.0014, 'longtitude' => 110.4285, 'provinsi_id' => 2],
            ['id' => 3, 'nama' => 'Surabaya', 'latitude' => -7.2504, 'longtitude' => 112.7688, 'provinsi_id' => 3],
            ['id' => 4, 'nama' => 'Jakarta Pusat', 'latitude' => -6.1865, 'longtitude' => 106.8341, 'provinsi_id' => 4],
            ['id' => 5, 'nama' => 'Tangerang', 'latitude' => -6.1783, 'longtitude' => 106.6319, 'provinsi_id' => 5],
        ]);

        // Kategori UMKM
        DB::table('kategori_umkm')->insert([
            ['id' => 1, 'nama' => 'Kuliner'],
            ['id' => 2, 'nama' => 'Fashion'],
            ['id' => 3, 'nama' => 'Kerajinan'],
            ['id' => 4, 'nama' => 'Agro'],
            ['id' => 5, 'nama' => 'Teknologi'],
        ]);

        // Pembina
        DB::table('pembina')->insert([
            ['id' => 1, 'nama' => 'Dedi Irawan', 'gender' => 'L', 'tgl_lahir' => '1975-06-30', 'tmp_lahir' => 'Tangerang', 'keahlian' => 'Inovasi Teknologi'],
            ['id' => 2, 'nama' => 'Andi Saputra', 'gender' => 'L', 'tgl_lahir' => '1985-03-15', 'tmp_lahir' => 'Bandung', 'keahlian' => 'Manajemen UMKM'],
            ['id' => 3, 'nama' => 'Siti Aminah', 'gender' => 'P', 'tgl_lahir' => '1990-07-22', 'tmp_lahir' => 'Semarang', 'keahlian' => 'Pemasaran Digital'],
            ['id' => 4, 'nama' => 'Budi Santoso', 'gender' => 'L', 'tgl_lahir' => '1980-11-10', 'tmp_lahir' => 'Surabaya', 'keahlian' => 'Pengembangan Produk'],
            ['id' => 5, 'nama' => 'Ratna Dewi', 'gender' => 'P', 'tgl_lahir' => '1988-01-05', 'tmp_lahir' => 'Jakarta', 'keahlian' => 'Keuangan UMKM'],
        ]);

        // UMKM
        DB::table('umkm')->insert([
            ['id' => 1, 'nama' => 'Bakso Enak', 'modal' => 10000000, 'pemilik' => 'Agus Haryadi', 'alamat' => 'Jl. Merdeka No.1, Bandung', 'website' => 'baksoenak.com', 'email' => 'agus@bakso.com', 'kabkota_id' => 1, 'rating' => 4, 'kategori_umkm_id' => 1, 'pembina_id' => 1],
            ['id' => 2, 'nama' => 'Batik Semar', 'modal' => 20000000, 'pemilik' => 'Rina Kusuma', 'alamat' => 'Jl. Batik No.10, Semarang', 'website' => 'batiksemar.id', 'email' => 'rina@batik.id', 'kabkota_id' => 2, 'rating' => 5, 'kategori_umkm_id' => 2, 'pembina_id' => 2],
            ['id' => 3, 'nama' => 'Kopi Nusantara', 'modal' => 15000000, 'pemilik' => 'Eko Prasetyo', 'alamat' => 'Jl. Kopi No.5, Surabaya', 'website' => 'kopinusantara.com', 'email' => 'eko@kopi.com', 'kabkota_id' => 3, 'rating' => 4, 'kategori_umkm_id' => 1, 'pembina_id' => 3],
            ['id' => 4, 'nama' => 'Craftify', 'modal' => 12000000, 'pemilik' => 'Maya Sari', 'alamat' => 'Jl. Anyelir No.8, Jakarta Pusat', 'website' => 'craftify.co.id', 'email' => 'maya@craftify.co.id', 'kabkota_id' => 4, 'rating' => 3, 'kategori_umkm_id' => 3, 'pembina_id' => 4],
            ['id' => 5, 'nama' => 'Agro Maju', 'modal' => 18000000, 'pemilik' => 'Dina Lestari', 'alamat' => 'Jl. Raya Serang No.12, Tangerang', 'website' => 'agromaju.com', 'email' => 'dina@agromaju.com', 'kabkota_id' => 5, 'rating' => 5, 'kategori_umkm_id' => 4, 'pembina_id' => 5],
        ]);

        // User admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin111@gmail.com',
            'password' => Hash::make('admin123'), // Ganti sesuai kebutuhan
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
