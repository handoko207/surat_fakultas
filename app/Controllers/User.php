<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\ModelUser as userModels;


class User extends BaseController
{
    public function index()
    {

        $data['title'] = 'Manajemen User';
        $data['subtitle'] = 'Halaman ini digunakan untuk manajemen User';
        $data['program_studi'] = $this->getProgramStudi();
        return view('user/index', $data);
    }

    public function ajaxDatatable()
    {
        $userModels = new userModels();
        $userModels->select('surat_m_user.uuid, surat_m_user.username, surat_m_user.nama_lengkap, surat_m_user.email, surat_m_user.role, ps.nama_prodi');
        $userModels->join('surat_r_program_studi as ps', 'ps.uuid = surat_m_user.uuid_program_studi');
        return DataTable::of($userModels)->add('action', function ($row) {
            return '<a href="#" class="btn icon btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Edit Data" onclick="editTampil(\'' . $row->uuid . '\')"><i class="bi bi-pencil"></i></a> 
                    <a href="#" class="btn icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Hapus Data"><i class="bi bi-x"></i></a>
                    <a href="#" class="btn icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Reset Password"><i class="bi bi-arrow-clockwise"></i></a>
                    ';
        })->hide('uuid')->toJson();
    }

    public function simpanTambah()
    {
        $userModels = new userModels();
        if (!$this->validation->run($this->request->getPost(), 'register')) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validation->getErrors()
            ]);
        }

        $data = [
            'uuid' => $this->uuid,
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_lengkap' => $this->request->getPost('namaLengkap'),
            'email' => $this->request->getPost('email'),
            'uuid_program_studi' => $this->request->getPost('programStudi'),
            'role' => $this->request->getPost('role'),
        ];
        $hasil = $userModels->insert($data);
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
        $userModels = new userModels();
        $data = $userModels->getUser($uuid);
        return $this->response->setJSON($data);
    }

    public function updateData()
    {

        $userModels = new userModels();
        if (!$this->validation->run($this->request->getPost(), 'register')) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validation->getErrors()
            ]);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('namaLengkap'),
            'email' => $this->request->getPost('email'),
            'uuid_program_studi' => $this->request->getPost('programStudi'),
            'role' => $this->request->getPost('role'),
        ];
        $hasil = $userModels->update($this->request->getPost('uuid'), $data);
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
                'text' => 'Data Gagal Diupdate',
                'icon' => 'error'
            ]);
        }
    }
}
