<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Drinks extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_minuman' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'harga' => [
                'type' => 'DOUBLE',
                'null' => FALSE,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => FALSE,
                'default' => 'Minuman Dingin',
            ],
            'ukuran' => [
                'type' => 'ENUM("Small", "Medium", "Large")',
                'default' => 'Medium',
                'null' => FALSE,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE,
            ],
            'status' => [
                'type' => 'ENUM("tersedia", "habis")',
                'default' => 'tersedia',
                'null' => FALSE,
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('drinks');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('drinks');
    }
}