<?php

namespace App\Controllers;

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
    public function create()
    {
        return view('siswa_create');
    }
    /**
     * store function
     */
    public function store()
    {
        //load helper form and URL
        helper(['form', 'url']);

        //define validation
        $validation = $this->validate([
            'nama_siswa' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nama Siswa.'
                ]
            ],
            'nomor_telp'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nomor Telephone.'
                ]
            ],
            'alamat_siswa'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Alamat Siswa.'
                ]
            ],
        ]);

        if (!$validation) {

            //render view with error validation message
            return view('siswa-create', [
                'validation' => $this->validator
            ]);
        } else {

            //model initialize
            $siswaModel = new SiswaModel();

            //insert data into database
            $siswaModel->addsiswa([
                'nama_siswa'   => $this->request->getPost('nama_siswa'),
                'nomor_telp' => $this->request->getPost('nomor_telp'),
                'alamat_siswa' => $this->request->getPost('alamat_siswa'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Siswa Berhasil Disimpan');

            return redirect()->to(base_url('siswa'));
        }
    }
    /**
     * edit function
     */
    public function edit($id)
    {


        //model initialize
        $siswaModel = new SiswaModel();

        $data = array(
            'siswa' => $siswaModel->get_user($id)
        );

        return view('siswa_edit', $data);
    }

    /**
     * update function
     */
    public function update()
    {
        //load helper form and URL
        helper(['form', 'url']);

        try {
            $id_siswa        = $this->request->getPost('id_siswa');
            $nama_siswa    = $this->request->getPost('nama_siswa');
            $nomor_telp    = $this->request->getPost('nomor_telp');
            $alamat_siswa        = $this->request->getPost('alamat_siswa');

            $data = [
                'nama_siswa'        => $nama_siswa,
                'nomor_telp'        => $nomor_telp,
                'alamat_siswa'      => $alamat_siswa,
            ];
            $siswaModel = new SiswaModel();
            $result = $siswaModel->updatesiswa($id_siswa, $data);
            if ($result) {
                session()->setFlashdata('message', 'Data Siswa Berhasil Diubah');
                return redirect()->to(base_url('siswa'));
            } else {
                session()->setFlashdata('message', 'Data Siswa Gagal Diubah');
                return redirect()->to(base_url('siswa'));
            }
        } catch (\Throwable $err) {
            session()->setFlashdata('message', 'Data Siswa Gagal Diubah: '.$err);
            return redirect()->to(base_url('siswa'));
        }
    }
    public function delete($id) {
        $siswaModel = new SiswaModel();
        $result = $siswaModel->deletesiswa($id);
		if($result) {
            session()->setFlashdata('message', 'Data Siswa Berhasil Dihapus');
            return redirect()->to(base_url('siswa'));
		} else {
            session()->setFlashdata('message', 'Data Siswa Gagal Dihapus');
            return redirect()->to(base_url('siswa'));
		}

	}
}
