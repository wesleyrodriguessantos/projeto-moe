<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class AuthEstag implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (!(session()->isLoggedIn === TRUE && $_SESSION['tipo_usuario'] == 1)) {
      return redirect()->back()->with('warning', 'Você precisa estar logado com uma conta de Estagiário para acessar essa página!');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
