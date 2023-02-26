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

    public function get_user($id) {
		return $this->db
                        ->table('data_siswa')
                        ->where(["id_siswa" => $id])
                        ->get()
                        ->getRow();
	}
    public function updatesiswa($id, $data) {
		return $this->db
                        ->table('data_siswa')
                        ->where(["id_siswa" => $id])
                        ->set($data)
                        ->update();
	}
    public function deletesiswa($id) {
		return $this->db
                        ->table('data_siswa')
                        ->where(["id_siswa" => $id])
                        ->delete();
	}
    function addsiswa($data) {
		return $this->db
                        ->table('data_siswa')
                        ->insert($data);
	}
}