<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Empregador;
use App\Models\Estagiario;

class Home extends BaseController
{
	public function index()
	{
		return view('inicial');
	}

	public function login()
	{
		return view('login');
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

	// public function sair()
	// {
	// 	session()->destroy();
	// 	return redirect()->to('/');
	// }
}
