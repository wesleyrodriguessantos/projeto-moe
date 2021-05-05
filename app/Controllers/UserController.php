<?php

namespace App\Controllers;

class UserController extends BaseController
{

  public function sair()
  {
    session()->destroy();
    return redirect()->to('/');
  }
}
