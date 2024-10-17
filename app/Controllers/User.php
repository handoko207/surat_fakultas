<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\User as userModels;


class User extends BaseController
{
    public function index()
    {
        $data['title'] = 'Manajemen User';
        $data['subtitle'] = 'Halaman ini digunakan untuk manajemen User';
        return view('user/index', $data);
    }

    public function ajaxDatatable()
    {
        $userModels = new userModels();
        $userModels->select('surat_m_user.username, surat_m_user.nama_lengkap, surat_m_user.email, surat_m_user.role, ps.nama_prodi');
        $userModels->join('surat_r_program_studi as ps', 'ps.uuid = surat_m_user.uuid_program_studi');
        return DataTable::of($userModels)->add('action', function ($row) {
            return '<a href="#" class="btn icon btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Edit Data"><i class="bi bi-pencil"></i></a> 
                    <a href="#" class="btn icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Hapus Data"><i class="bi bi-x"></i></a>
                    <a href="#" class="btn icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Reset Password"><i class="bi bi-arrow-clockwise"></i></a>
                    ';
        })->toJson();
    }
}
