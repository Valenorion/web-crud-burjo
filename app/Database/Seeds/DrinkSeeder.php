<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DrinkSeeder extends Seeder
{
    public function run()
    {
        // Data minuman untuk Vermata Burjo
        $data = [
            [
                'nama_minuman' => 'Es Teh Manis',
                'harga'  => 5000,
                'deskripsi' => 'Teh manis dengan es batu segar',
                'kategori' => 'Minuman Dingin',
                'ukuran' => 'Medium',
                'foto' => 'es_teh_manis.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_minuman' => 'Es Jeruk',
                'harga'  => 7000,
                'deskripsi' => 'Jeruk peras segar dengan es batu',
                'kategori' => 'Minuman Dingin',
                'ukuran' => 'Medium',
                'foto' => 'es_jeruk.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_minuman' => 'Es Campur',
                'harga'  => 12000,
                'deskripsi' => 'Campuran buah-buahan, cincau, dan sirup dengan es serut',
                'kategori' => 'Minuman Dingin',
                'ukuran' => 'Large',
                'foto' => 'es_campur.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_minuman' => 'Es Doger',
                'harga'  => 10000,
                'deskripsi' => 'Es serut dengan tape, ketan hitam, dan sirup merah',
                'kategori' => 'Minuman Dingin',
                'ukuran' => 'Medium',
                'foto' => 'es_doger.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_minuman' => 'Kopi Hitam',
                'harga'  => 6000,
                'deskripsi' => 'Kopi hitam khas dengan rasa yang kuat',
                'kategori' => 'Minuman Panas',
                'ukuran' => 'Small',
                'foto' => 'kopi_hitam.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_minuman' => 'Kopi Susu',
                'harga'  => 8000,
                'deskripsi' => 'Kopi hitam dengan tambahan susu kental manis',
                'kategori' => 'Minuman Panas',
                'ukuran' => 'Medium',
                'foto' => 'kopi_susu.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_minuman' => 'Teh Tarik',
                'harga'  => 7000,
                'deskripsi' => 'Teh susu yang ditarik hingga berbuih',
                'kategori' => 'Minuman Panas',
                'ukuran' => 'Medium',
                'foto' => 'teh_tarik.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_minuman' => 'Air Mineral',
                'harga'  => 3000,
                'deskripsi' => 'Air mineral kemasan 600ml',
                'kategori' => 'Minuman Dingin',
                'ukuran' => 'Small',
                'foto' => 'air_mineral.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_minuman' => 'Soda Gembira',
                'harga'  => 10000,
                'deskripsi' => 'Soda dengan sirup merah dan es batu',
                'kategori' => 'Minuman Dingin',
                'ukuran' => 'Large',
                'foto' => 'soda_gembira.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_minuman' => 'Milkshake Coklat',
                'harga'  => 15000,
                'deskripsi' => 'Minuman coklat dengan es krim vanilla dan whipped cream',
                'kategori' => 'Minuman Dingin',
                'ukuran' => 'Large',
                'foto' => 'milkshake_coklat.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel drinks
            $this->db->table('drinks')->insert($item);
        }
    }
}