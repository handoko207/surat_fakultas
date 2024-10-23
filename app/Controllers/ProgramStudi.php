<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\ModelProgramStudi as prodiModels;

class ProgramStudi extends BaseController
{
    private $roleAkses = ['admin', 'operator'];

    public function index()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $data['title'] = 'Manajemen Program Studi';
        $data['subtitle'] = 'Halaman ini digunakan untuk manajemen Program Studi';
        $data['program_studi'] = $this->getProgramStudi();
        return view('prodi/index', $data);
    }

    public function ajaxDatatable()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $prodiModels = new prodiModels();
        $prodiModels->select('uuid, kode_prodi,nama_prodi,jenjang');
        return DataTable::of($prodiModels)->add('action', function ($row) {
            return '<a href="#" class="btn icon btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Edit Data" onclick="editTampil(\'' . $row->uuid . '\')"><i class="bi bi-pencil"></i></a> 
                    <a href="#" class="btn icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Hapus Data" onclick="hapusData(\'' . $row->uuid . '\')"><i class="bi bi-x"></i></a>
                    ';
        })->hide('uuid')->toJson();
    }
    public function simpanTambah()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $prodiModels = new prodiModels();
        if (!$this->validation->run($this->request->getPost(), 'prodi')) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validation->getErrors()
            ]);
        }

        $data = [
            'uuid' => $this->uuid,
            'kode_prodi' => $this->request->getPost('kodeProdi'),
            'nama_prodi' => $this->request->getPost('namaProdi'),
            'jenjang' => $this->request->getPost('jenjang'),
        ];
        $hasil = $prodiModels->insert($data);
        if ($hasil) {
            return $this->response->setJSON([
                'status' => 'success',
                'title' => 'Tambah Data',
                'text' => 'Data Berhasil Ditambahkan',
                'icon' => 'success'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'title' => 'Tambah Data',
                'text' => 'Data Gagal Ditambahkan',
                'icon' => 'error'
            ]);
        }
    }
    public function getEdit($uuid)
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $prodiModels = new prodiModels();
        $data = $prodiModels->where('uuid', $uuid)->first();
        return $this->response->setJSON($data);
    }

    public function updateData()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $prodiModels = new prodiModels();
        if (!$this->validation->run($this->request->getPost(), 'prodi')) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validation->getErrors()
            ]);
        }
        $data = [
            'kode_prodi' => $this->request->getPost('kodeProdi'),
            'nama_prodi' => $this->request->getPost('namaProdi'),
            'jenjang' => $this->request->getPost('jenjang'),
        ];
        $hasil = $prodiModels->where('uuid', $this->request->getPost('uuid'))->set($data)->update();
        if ($hasil) {
            return $this->response->setJSON([
                'status' => 'success',
                'title' => 'Update Data',
                'text' => 'Data Berhasil Diupdate',
                'icon' => 'success'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'title' => 'Update Data',
                'text' => 'Data Gagal Diupdate, silakan hubungi Administrator',
                'icon' => 'error'
            ]);
        }
    }

    public function hapusData($uuid)
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $prodiModels = new prodiModels();
        $hasil = $prodiModels->where('uuid', $uuid)->delete();
        if ($hasil) {
            return $this->response->setJSON([
                'status' => 'success',
                'title' => 'Hapus Data',
                'text' => 'Data Berhasil Dihapus',
                'icon' => 'success'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'title' => 'Hapus Data',
                'text' => 'Data Gagal Dihapus, silakan hubungi Administrator',
                'icon' => 'error'
            ]);
        }
    }
}
