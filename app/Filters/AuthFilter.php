<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (session()->get('logged_in') == null) {
      return redirect()->to('/login')->with('pesan', ['title' => 'Login Gagal', 'text' => 'Anda belum login. Silakan login terlebih dahulu', 'icon' => 'error']);
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
