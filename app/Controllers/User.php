<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\ModelUser as userModels;



class User extends BaseController
{
    private $roleAkses = ['admin'];

    public function index()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $data['title'] = 'Manajemen User';
        $data['subtitle'] = 'Halaman ini digunakan untuk manajemen User';
        $data['program_studi'] = $this->getProgramStudi();
        return view('user/index', $data);
    }

    public function ajaxDatatable()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $userModels = new userModels();
        $userModels->select('surat_m_user.uuid, surat_m_user.username, surat_m_user.nama_lengkap, surat_m_user.email, surat_m_user.role, ps.nama_prodi');
        $userModels->join('surat_r_program_studi as ps', 'ps.uuid = surat_m_user.uuid_program_studi');
        return DataTable::of($userModels)->add('action', function ($row) {
            return '<a href="#" class="btn icon btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Edit Data" onclick="editTampil(\'' . $row->uuid . '\')"><i class="bi bi-pencil"></i></a> 
                    <a href="#" class="btn icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Hapus Data" onclick="hapusData(\'' . $row->uuid . '\')"><i class="bi bi-x"></i></a>
                    <a href="#" class="btn icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Reset Password"  onclick="resetPassword(\'' . $row->uuid . '\')"><i class="bi bi-arrow-clockwise"></i></a>
                    ';
        })->hide('uuid')->toJson();
    }

    public function simpanTambah()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
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
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $userModels = new userModels();
        $data = $userModels->getUser($uuid);
        return $this->response->setJSON($data);
    }

    public function updateData()
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $userModels = new userModels();
        if (!$this->validation->run($this->request->getPost(), 'registerUpdate')) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validation->getErrors()
            ]);
        }
        $data = [
            'nama_lengkap' => $this->request->getPost('namaLengkap'),
            'email' => $this->request->getPost('email'),
            'uuid_program_studi' => $this->request->getPost('programStudi'),
            'role' => $this->request->getPost('role'),
        ];
        $hasil = $userModels->where('uuid', $this->request->getPost('uuid'))->set($data)->update();
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
        $userModels = new userModels();
        $hasil = $userModels->where('uuid', $uuid)->delete();
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

    function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }
    public function resetPassword($uuid)
    {
        if (!$this->checkAkses($role = $this->roleAkses)) {
            return redirect()->to('/error403');
            exit;
        }
        $userModels = new userModels();
        $password = $this->generateRandomString(10);
        $data = [
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];
        $hasil = $userModels->where('uuid', $uuid)->set($data)->update();
        if ($hasil) {
            return $this->response->setJSON([
                'status' => 'success',
                'title' => 'Reset Password',
                'text' => 'Password Berhasil direset, Password Baru : <b>' . $password . "</b>",
                'icon' => 'success'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'title' => 'Reset Password',
                'text' => 'Password Gagal direset, silakan hubungi Administrator',
                'icon' => 'error'
            ]);
        }
    }
}
