<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Beranda extends BaseController
{
    public function index()
    {
        $data['title'] = 'Beranda';
        $data['subtitle'] = 'Halaman ini berisikan statistik Semua Data';
        return view('beranda/index', $data);
    }
}
