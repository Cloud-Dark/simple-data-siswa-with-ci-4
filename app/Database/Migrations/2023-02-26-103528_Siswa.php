<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
    public function up()
    {
      $this->forge->addField([
          'id_siswa'           => [
               'type'           => 'INT',
               'constraint'     => 11,
               'unsigned'       => TRUE,
               'auto_increment' => TRUE
            ],
            'nama_siswa'       => [
                'type'           => 'TEXT'
            ],
            'nomor_telp'       => [
                'type'           => 'INT'
            ],
            'alamat_siswa'     => [
                 'type'           => 'TEXT'
            ],
      ]);
      $this->forge->addKey('id_siswa', TRUE);
      $this->forge->createTable('data_siswa');
    }

    public function down()
    {
        //
    }
}
