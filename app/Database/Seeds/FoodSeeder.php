<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run()
    {
        // Data makanan untuk Vermata Burjo
        $data = [
            [
                'nama_makanan' => 'Nasi Goreng Special',
                'harga'  => 25000,
                'deskripsi' => 'Nasi goreng dengan telur, ayam suwir, bakso, dan sayuran segar',
                'kategori' => 'Nasi',
                'foto' => 'nasi_goreng_special.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_makanan' => 'Nasi Goreng Kampung',
                'harga'  => 20000,
                'deskripsi' => 'Nasi goreng dengan bumbu kampung, telur, dan kerupuk',
                'kategori' => 'Nasi',
                'foto' => 'nasi_goreng_kampung.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_makanan' => 'Mie Goreng Jawa',
                'harga'  => 18000,
                'deskripsi' => 'Mie goreng dengan bumbu khas Jawa, sayuran, dan telur',
                'kategori' => 'Mie',
                'foto' => 'mie_goreng_jawa.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_makanan' => 'Mie Kuah Bakso',
                'harga'  => 22000,
                'deskripsi' => 'Mie kuah dengan bakso sapi, pangsit, dan sayuran',
                'kategori' => 'Mie',
                'foto' => 'mie_kuah_bakso.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_makanan' => 'Ayam Geprek Sambal Bawang',
                'harga'  => 28000,
                'deskripsi' => 'Ayam goreng tepung crispy dengan sambal bawang pedas',
                'kategori' => 'Ayam',
                'foto' => 'ayam_geprek_sambal_bawang.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_makanan' => 'Ayam Goreng Kremes',
                'harga'  => 25000,
                'deskripsi' => 'Ayam goreng dengan kremesan renyah dan sambal terasi',
                'kategori' => 'Ayam',
                'foto' => 'ayam_goreng_kremes.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_makanan' => 'Indomie Goreng + Telur',
                'harga'  => 15000,
                'deskripsi' => 'Indomie goreng dengan telur mata sapi dan sayuran',
                'kategori' => 'Indomie',
                'foto' => 'indomie_goreng_telur.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_makanan' => 'Indomie Rebus + Bakso',
                'harga'  => 17000,
                'deskripsi' => 'Indomie rebus dengan bakso sapi dan sayuran',
                'kategori' => 'Indomie',
                'foto' => 'indomie_rebus_bakso.jpg',
                'status' => 'tersedia',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel foods
            $this->db->table('foods')->insert($item);
        }
    }
}