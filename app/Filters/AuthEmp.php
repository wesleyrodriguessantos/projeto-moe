<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class AuthEmp implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (!(session()->isLoggedIn === TRUE && $_SESSION['tipo_usuario'] == 2)) {
      return redirect()->back()->with('warning', 'Você precisa estar logado como um Empregador/Empresa para acessar essa página!');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
