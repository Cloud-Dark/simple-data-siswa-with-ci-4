<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiswaModel;

class Siswa extends Controller
{
    /**
     * index function
     */
    public function index()
    {
        //model initialize
        $siswaModel = new SiswaModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $data = array(
            'siswas' => $siswaModel->paginate(2, 'siswa'),
            'pager' => $siswaModel->pager
        );

        return view('siswa_index', $data);
    }
}