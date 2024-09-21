<?php

namespace App\Controllers;

class Login extends BaseController
{
  public function index(): string
  {
    return view('login/index');
  }

  public function register(): string
  {
    return view('login/register');
  }
}
