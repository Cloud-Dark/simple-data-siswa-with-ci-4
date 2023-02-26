<?php namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    /**
     * table name
     */
    protected $table = "data_siswa";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'nama_siswa',
        'nomor_telp',
        'alamat_siswa'
    ];
}