<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Empregador;
use App\Models\Estagiario;
use App\Models\Interesse;

class UserController extends BaseController
{
  public function index()
  {
    echo 'Nada faz!';
  }

  public function login()
  {
    return view('login');
  }

  public function ambienteEstagiario()
  {
    return view('telaEstag');
  }

  public function editEstagiario($id)
  {
    $estagiarioModel = new Estagiario();
    $_SESSION['id_parametrizado'] = $id;

    return view('editEstag', [
      'estagiario' => $estagiarioModel->find($id)
    ]);
  }

  public function estagStore($id)
  {

    $rulesEstagiario = [
      'senha' => 'required|min_length[6]|max_length[50]|regex_match[/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/]',
      'nome_estagiario' => 'required|string|max_length[80]',
      'curso_estagiario' => 'required|string|max_length[80]',
      'ano_ingresso_estagiario' => 'required|numeric',
      'integralizacao' => 'required|numeric',
      'minicurriculo_estagiario' => 'required|string',
    ];

    //Mensagens de Erro Personalizadas
    $mensagens = [
      'senha' => [
        'required' => 'O cadastro de uma senha é obrigatório!',
        'min_length' => 'A senha informada é muito pequena!',
        'max_length' => 'A senha informada é muito grande!',
        'regex_match' => 'A senha deve possuir ao menos 6 caracteres, uma letra maiúscula, um número e um caractere especial.'
      ],
      'nome_estagiario' => [
        'required' => 'Informe o seu Nome completo!',
        'string' => 'O nome precisa ser uma string! Informe seu nome da forma correta!',
        'max_length' => 'O nome informado é muito grande!'
      ],
      'curso_estagiario' => [
        'required' => 'Informe o Nome do seu Curso!',
        'string' => 'O nome do curso precisa ser uma string! Informe o nome da forma correta!',
        'max_length' => 'O nome informado é muito grande!'
      ],
      'ano_ingresso_estagiario' => [
        'required' => 'Informe o ano de ingresso!',
        'numeric' => 'O ano de Ingresso precisa ser um ano válido - Ex:(2015, 2020, 2011).'
      ],
      'integralizacao' => [
        'required' => 'Informe a Porcentagem de Sua Integralização atual no Curso!',
        'numeric' => 'A integralização deve estar entre 1 e 100%'
      ],
      'minicurriculo_estagiario' => [
        'required' => 'Informe um minicurriculo!',
        'string' => 'O minicurriculo informado deve ser em formato de texto!',
      ]
    ];

    if ($this->validate($rulesEstagiario, $mensagens)) {

      $db = db_connect();

      $db->transStart(); //inicia a transação

      $data = [
        'nome_estagiario' => $this->request->getPost('nome_estagiario'),
        'senha' => password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT),
        'curso_estagiario' => $this->request->getPost('curso_estagiario'),
        'ano_ingresso_estagiario' => $this->request->getPost('ano_ingresso_estagiario'),
        'integralizacao' => $this->request->getPost('integralizacao'),
        'minicurriculo_estagiario' => $this->request->getPost('minicurriculo_estagiario'),
      ];

      $modelEstagiario = new Estagiario();
      $modelEstagiario->update($id, $data);

      $db->transComplete(); //finaliza a transação

      if ($db->transStatus() == false) {

        return redirect()->back()->withInput()->with('warning', 'Não foi possível salvar os dados no momento. Tente novamente mais tarde.');
      } else {

        return redirect()->to('/estagiario')->with('success', 'Seu Cadastro foi atualizado com Sucesso!!');
      }
    } else { //retorna ao formulário de registro caso a validação falhe

      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
  }

  public function ambienteEmpregador()
  {
    return view('telaEmp');
  }

  public function editEmpregador($id)
  {
    $empregadorModel = new Empregador();
    $_SESSION['id_parametrizado1'] = $id;

    return view('editEmpregador', [
      'empregador' => $empregadorModel->find($id)
    ]);
  }

  public function EmpStore($id)
  {

    // Regras para a validação do Cadastro do Estagiário
    $rulesEmpregador = [
      'senha' => 'required|min_length[6]|max_length[50]|regex_match[/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/]',
      'nome_empresa' => 'required|string|max_length[60]',
      'endereco_empresa' => 'required|string|max_length[80]',
      'pessoa_de_contato' => 'required|string|max_length[60]',
      'descricao_empresa' => 'required|string',
      'produtos_empresa' => 'required|string|max_length[220]',
    ];

    //Mensagens de Erro Personalizadas
    $mensagens = [
      'senha' => [
        'required' => 'O cadastro de uma senha é obrigatório!',
        'min_length' => 'A senha informada é muito pequena!',
        'max_length' => 'A senha informada é muito grande!',
        'regex_match' => 'A senha deve possuir ao menos 6 caracteres, uma letra maiúscula, um número e um caractere especial.'
      ],
      'nome_empresa' => [
        'required' => 'Informe o seu Nome da empresa da forma correta!',
        'string' => 'O nome precisa ser uma string! Informe seu nome da forma correta!',
        'max_length' => 'O nome informado é muito grande!'
      ],
      'endereco_empresa' => [
        'required' => 'Informe o Endereço da empresa!',
        'string' => 'O nome do endereço da empresa precisa ser uma string! Informe o nome da forma correta!',
        'max_length' => 'O nome informado é muito grande!'
      ],
      'pessoa_de_contato' => [
        'required' => 'Informe o um nome para uma pessoa de contato!',
        'string' => 'O nome da pessoa de contato precisa ser uma string! Informe o nome da forma correta!',
        'max_length' => 'O nome informado é muito grande!'
      ],
      'descricao_empresa' => [
        'required' => 'Informe uma descrição sobre a empresa!',
        'string' => 'O descriação a ser informada deve ser em formato de texto!'
      ],
      'produtos_empresa' => [
        'required' => 'Informe os produtos e serviços que a empresa fornece!',
        'string' => 'O nome dos produtos e serviços da empresa precisa ser uma string! Informe os dados da forma correta!',
        'max_length' => 'O nome informado é muito grande!'
      ]
    ];

    if ($this->validate($rulesEmpregador, $mensagens)) {

      $db = db_connect();

      $db->transStart(); //inicia a transação

      $data = [
        'senha' => password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT),
        'nome_empresa' => $this->request->getPost('nome_empresa'),
        'endereco_empresa' => $this->request->getPost('endereco_empresa'),
        'pessoa_de_contato' => $this->request->getPost('pessoa_de_contato'),
        'descricao_empresa' => $this->request->getPost('descricao_empresa'),
        'produtos_empresa' => $this->request->getPost('produtos_empresa')
      ];

      $modelEmpregador = new Empregador();
      $modelEmpregador->update($id, $data);

      $db->transComplete(); //finaliza a transação

      if ($db->transStatus() == false) {

        return redirect()->back()->withInput()->with('warning', 'Não foi possível salvar os dados no momento. Tente novamente mais tarde.');
      } else {

        return redirect()->to('/empregador')->with('success', 'Seu Cadastro foi atualizado com Sucesso!!');
      }
    } else { //retorna ao formulário de registro caso a validação falhe
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
  }

  public function login_action()
  {
    $request = service('request');

    $regras = [
      'email' => 'required|valid_email|max_length[50]',
      'senha' => 'required|min_length[6]|max_length[50]',
    ];

    if ($this->validate($regras)) {
      $modelEst = new Estagiario();

      $result = $modelEst->where('email', $this->request->getVar('email'))->first();

      if ($result) {
        if (password_verify($request->getVar('senha'), $result['senha'])) {
          session()->set('isLoggedIn', TRUE);

          $_SESSION['id_usuario'] = $result['id_estagiario'];
          $_SESSION['tipo_usuario'] = $result['tipo_usuario'];
          $_SESSION['nome'] = $result['nome_estagiario'];
          $_SESSION['integralizacao'] = $result['integralizacao'];

          return redirect()->to('/estagiario')->with('success', 'Estagiário Logado com sucesso!');
        } else {
          return redirect()->back()->withInput()->with('warning', 'Email ou Senha Incorretos!!');
        }
      } else {
        $modelEmp = new Empregador();
        $result2 = $modelEmp->where('email', $this->request->getVar('email'))->first();
        if ($result2) {
          if (password_verify($request->getVar('senha'), $result2['senha'])) {

            session()->set('isLoggedIn', TRUE);

            $_SESSION['id_usuario'] = $result2['id_empregador'];
            $_SESSION['tipo_usuario'] = $result2['tipo_usuario'];
            $_SESSION['nome'] = $result2['pessoa_de_contato'];

            return redirect()->to('/empregador')->with('success', 'Empregador Logado com sucesso!');
          } else {
            return redirect()->back()->withInput()->with('warning', 'Email ou Senha Incorretos!!');
          }
        } else {
          return redirect()->back()->withInput()->with('errors', 'Não existe cadastro para o email informado.');
        }
      }
    } else { //caso a validação veha a falhar
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
  }

  public function registrar()
  {
    return view('registro');
  }

  public function novoEstagiario()
  {
    // Regras para a validação do Cadastro do Estagiário
    $rulesEstagiario = [
      'email' => 'required|valid_email|max_length[100]|is_unique[estagiario.email]',
      'senha' => 'required|min_length[6]|max_length[50]|regex_match[/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/]',
      'nome_estagiario' => 'required|string|max_length[80]',
      'curso_estagiario' => 'required|string|max_length[80]',
      'ano_ingresso_estagiario' => 'required|numeric',
      'integralizacao' => 'required|numeric',
      'minicurriculo_estagiario' => 'required|string',
    ];

    //Mensagens de Erro Personalizadas
    $mensagens = [
      'email' => [
        'required' => 'Informe um endereço de email!',
        'is_unique' => 'Esse endereço de email já está sendo utilizado!',
        'max_length' => 'O endereço de email informado é muito grande!',
        'valid_email' => 'Por favor, informe um endereço de email válido!'
      ],
      'senha' => [
        'required' => 'O cadastro de uma senha é obrigatório!',
        'min_length' => 'A senha informada é muito pequena!',
        'max_length' => 'A senha informada é muito grande!',
        'regex_match' => 'A senha deve possuir ao menos 6 caracteres, uma letra maiúscula, um número e um caractere especial.'
      ],
      'nome_estagiario' => [
        'required' => 'Informe o seu Nome completo!',
        'string' => 'O nome precisa ser uma string! Informe seu nome da forma correta!',
        'max_length' => 'O nome informado é muito grande!'
      ],
      'curso_estagiario' => [
        'required' => 'Informe o Nome do seu Curso!',
        'string' => 'O nome do curso precisa ser uma string! Informe o nome da forma correta!',
        'max_length' => 'O nome informado é muito grande!'
      ],
      'ano_ingresso_estagiario' => [
        'required' => 'Informe o ano de ingresso!',
        'numeric' => 'O ano de Ingresso precisa ser um ano válido - Ex:(2015, 2020, 2011).'
      ],
      'integralizacao' => [
        'required' => 'Informe a Porcentagem de Sua Integralização atual no Curso!',
        'numeric' => 'A integralização deve estar entre 1 e 100%'
      ],
      'minicurriculo_estagiario' => [
        'required' => 'Informe um minicurriculo!',
        'string' => 'O minicurriculo informado deve ser em formato de texto!',
      ]
    ];

    if ($this->validate($rulesEstagiario, $mensagens)) {

      $db = db_connect();

      $db->transStart(); //inicia a transação


      $modelEstagiario = new Estagiario();

      $estagiario['nome_estagiario'] = $this->request->getPost('nome_estagiario');
      $estagiario['email'] = $this->request->getPost('email');
      $estagiario['senha'] = password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT);
      $estagiario['curso_estagiario'] = $this->request->getPost('curso_estagiario');
      $estagiario['ano_ingresso_estagiario'] = $this->request->getPost('ano_ingresso_estagiario');
      $estagiario['integralizacao'] = $this->request->getPost('integralizacao');
      $estagiario['minicurriculo_estagiario'] = $this->request->getPost('minicurriculo_estagiario');

      $modelEstagiario->save($estagiario);

      $db->transComplete(); //finaliza a transação

      if ($db->transStatus() == false) {

        return redirect()->back()->withInput()->with('warning', 'Não foi possível salvar os dados no momento. Tente novamente mais tarde.');
      } else {

        return redirect()->to('/login')->with('success', 'Estagiário Cadastrado com Sucesso! Um email foi enviado para confirmar a sua inscrição!');
      }
    } else { //retorna ao formulário de registro caso a validação falhe

      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
  }

  public function listaInteresse()
  {
    $interesseModel = new Interesse();
    $estagiarioModel = new Estagiario();

    return view('estagiariosInteressados', [
      'interesse' => $interesseModel,
      'estagiarios' => $estagiarioModel->findAll()
    ]);
  }

  public function novoEmpregador()
  {

    // Regras para a validação do Cadastro do Estagiário
    $rulesEmpregador = [
      'email' => 'required|valid_email|max_length[100]|is_unique[estagiario.email]',
      'senha' => 'required|min_length[6]|max_length[50]|regex_match[/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/]',
      'nome_empresa' => 'required|string|max_length[60]',
      'endereco_empresa' => 'required|string|max_length[80]',
      'pessoa_de_contato' => 'required|string|max_length[60]',
      'descricao_empresa' => 'required|string',
      'produtos_empresa' => 'required|string|max_length[220]',
    ];

    //Mensagens de Erro Personalizadas
    $mensagens = [
      'email' => [
        'required' => 'Informe um endereço de email!',
        'is_unique' => 'Esse endereço de email já está sendo utilizado!',
        'max_length' => 'O endereço de email informado é muito grande!',
        'valid_email' => 'Por favor, informe um endereço de email válido!'
      ],
      'senha' => [
        'required' => 'O cadastro de uma senha é obrigatório!',
        'min_length' => 'A senha informada é muito pequena!',
        'max_length' => 'A senha informada é muito grande!',
        'regex_match' => 'A senha deve possuir ao menos 6 caracteres, uma letra maiúscula, um número e um caractere especial.'
      ],
      'nome_empresa' => [
        'required' => 'Informe o seu Nome da empresa da forma correta!',
        'string' => 'O nome precisa ser uma string! Informe seu nome da forma correta!',
        'max_length' => 'O nome informado é muito grande!'
      ],
      'endereco_empresa' => [
        'required' => 'Informe o Endereço da empresa!',
        'string' => 'O nome do endereço da empresa precisa ser uma string! Informe o nome da forma correta!',
        'max_length' => 'O nome informado é muito grande!'
      ],
      'pessoa_de_contato' => [
        'required' => 'Informe o um nome para uma pessoa de contato!',
        'string' => 'O nome da pessoa de contato precisa ser uma string! Informe o nome da forma correta!',
        'max_length' => 'O nome informado é muito grande!'
      ],
      'descricao_empresa' => [
        'required' => 'Informe uma descrição sobre a empresa!',
        'string' => 'O descriação a ser informada deve ser em formato de texto!'
      ],
      'produtos_empresa' => [
        'required' => 'Informe os produtos e serviços que a empresa fornece!',
        'string' => 'O nome dos produtos e serviços da empresa precisa ser uma string! Informe os dados da forma correta!',
        'max_length' => 'O nome informado é muito grande!'
      ]
    ];

    if ($this->validate($rulesEmpregador, $mensagens)) {

      $db = db_connect();

      $db->transStart(); //inicia a transação

      $modelEmpregador = new Empregador();

      $empregador['email'] = $this->request->getPost('email');
      $empregador['senha'] = password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT);
      $empregador['nome_empresa'] = $this->request->getPost('nome_empresa');
      $empregador['endereco_empresa'] = $this->request->getPost('endereco_empresa');
      $empregador['pessoa_de_contato'] = $this->request->getPost('pessoa_de_contato');
      $empregador['descricao_empresa'] = $this->request->getPost('descricao_empresa');
      $empregador['produtos_empresa'] = $this->request->getPost('produtos_empresa');

      $modelEmpregador->save($empregador);

      $db->transComplete(); //finaliza a transação

      if ($db->transStatus() == false) {

        return redirect()->back()->withInput()->with('warning', 'Não foi possível salvar os dados no momento. Tente novamente mais tarde.');
      } else {

        return redirect()->to('/login')->with('success', 'Registro de Empregador efetuado com sucesso!  Um email foi enviado para confirmar a sua inscrição!');
      }
    } else { //retorna ao formulário de registro caso a validação falhe
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
  }

  public function logout()
  {
    session()->destroy();

    return redirect()->to('/')->with('success', 'Deslogado com Sucesso!!');
  }
}
