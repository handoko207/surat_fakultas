<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\ModelPejabat as pejabatModels;

class Pejabat extends BaseController
{
    private $roleAkses = ['admin', 'operator'];

    public function index()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $data['title'] = 'Manajemen Pejabat';
        $data['subtitle'] = 'Halaman ini digunakan untuk manajemen Pejabat';
        return view('pejabat/index', $data);
    }

    public function ajaxDatatable()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $pejabatModels = new pejabatModels();
        $pejabatModels->select('uuid, nip, nama, jabatan');
        return DataTable::of($pejabatModels)->add('action', function ($row) {
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
        $pejabatModels = new pejabatModels();
        if (!$this->validation->run($this->request->getPost(), 'pejabat')) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validation->getErrors()
            ]);
        }

        $data = [
            'uuid' => $this->uuid,
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
        ];
        $hasil = $pejabatModels->insert($data);
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
        $pejabatModels = new pejabatModels();
        $data = $pejabatModels->where('uuid', $uuid)->first();
        return $this->response->setJSON($data);
    }

    public function updateData()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $pejabatModels = new pejabatModels();
        if (!$this->validation->run($this->request->getPost(), 'pejabat')) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validation->getErrors()
            ]);
        }
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
        ];
        $hasil = $pejabatModels->where('uuid', $this->request->getPost('uuid'))->set($data)->update();
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
        $pejabatModels = new pejabatModels();
        $hasil = $pejabatModels->where('uuid', $uuid)->delete();
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
