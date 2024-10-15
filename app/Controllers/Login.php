<?php

namespace App\Controllers;

use App\Models\ModelUser;


class Login extends BaseController
{
  public function index()
  {
    return view('login/index');
  }

  public function auth()
  {
    $this->model = new ModelUser();
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    if (!$this->validation->run($this->request->getPost(), 'login')) {
      return redirect()->to('/login')->withInput()->with('errorValidation', $this->validation->getErrors());
    }

    $hasil = $this->model->where('username', $username)->first();

    if ($hasil != null) {  // Cek apakah user ditemukan
      if (password_verify($password, $hasil['password'])) {
        session()->set([
          'username' => $hasil['username'],
          'nama_lengkap' => $hasil['nama_lengkap'],
          'logged_in' => TRUE
        ]);
        return redirect()->to('/beranda');
      } else {
        return redirect()->to('/login')->withInput()->with('pesan', ['title' => 'Login Gagal', 'text' => 'Username dan Password Salah', 'icon' => 'error']);
      }
    } else {
      // Tambahkan pesan jika username tidak ditemukan
      return redirect()->to('/login')->withInput()->with('pesan', ['title' => 'Login Gagal', 'text' => 'Username dan Password Salah', 'icon' => 'error']);
    }
  }

  public function register()
  {
    $data['program_studi'] = $this->getProgramStudi();
    return view('login/register', $data);
  }

  public function simpanData()
  {

    $this->model = new ModelUser();
    $data = [
      'uuid' => $this->uuid,
      'username' => $this->request->getPost('username'),
      'nama_lengkap' => $this->request->getPost('namaLengkap'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      'email' => $this->request->getPost('email'),
      'uuid_program_studi' => $this->request->getPost('programStudi'),
      'role' => 'mahasiswa'
    ];
    if (!$this->validation->run($this->request->getPost(), 'register')) {
      return redirect()->to('/register')->withInput()->with('errorValidation', $this->validation->getErrors());
    } else {
      $this->model->insert($data);
      return redirect()->to('/login')->with('pesanHtml', ['title' => 'Registrasi Berhasil', 'text' => 'Akun berhasil dibuat. Silakan login dengan akun : <br> Username : <b>' . $data['username'] . '</b><br>  Password : <b>' . $this->request->getPost('password') . '</b>', 'icon' => 'success']);
    }
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/login');
  }
}
