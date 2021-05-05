<?php

namespace App\Controllers;

class Home extends BaseController
{
	// public function index()
	// {
	// 	$db = \Config\Database::connect();
	// 	$resultados = $db->query("SELECT * FROM estagiario")->getResultObject();
	// 	$resultados2 = $db->query("SELECT * FROM empregador")->getResultArray();
	// 	$db->close();

	// 	echo '<h2>Dados da Tabela Estagiário</h2> <pre>';
	// 	print_r($resultados);
	// 	echo '<h2>Dados da Tabela Empregado</h2> <hr>';
	// 	print_r($resultados2);
	// }
	public function index()
	{
		return view('inicial');
		echo '<h2>Você está na Index!</h2>';
	}

	public function estagiario()
	{
		return view('formulario');
	}

	public function novoEstagiario()
	{
		$nome_estagiario = $this->request->getPost('nome_estagiario');
		$email = $this->request->getPost('email');
		$senha = $this->request->getPost('senha');
		$curso_estagiario = $this->request->getPost('curso_estagiario');
		$ano_ingresso_estagiario = $this->request->getPost('ano_ingresso_estagiario');
		$minicurriculo_estagiario = $this->request->getPost('minicurriculo_estagiario');

		$db = db_connect();

		$data = [
			'nome_estagiario' => $nome_estagiario,
			'email' => $email,
			'senha' => $senha,
			'curso_estagiario' => $curso_estagiario,
			'ano_ingresso_estagiario' => $ano_ingresso_estagiario,
			'minicurriculo_estagiario' => $minicurriculo_estagiario
		];

		$db->table('estagiario')->insert($data);

		$db->close();
		return redirect()->to('/')->with('message', 'Estagiário Cadastrado com Sucesso! Um email foi enviado para confirmar a sua inscrição!');
	}

	public function empregador()
	{
		return view('formularioEmp');
	}
	public function novoEmpregador()
	{
		// $params = [
		// 	'email' => $email,
		// 	'senha' => $senha,
		// 	'nome' =>  $nome_empresa,
		// 	'endereco' => $endereco_empresa,
		// 	'pessoa' => $pessoa_de_contato,
		// 	'descricao'  => $descricao_empresa,
		// 	'produtos' =>  $produtos_empresa
		// ];

		// $db = db_connect();
		// $db->query("
		// 	INSERT INTO empregador
		// 	(`email`, `senha`, `nome_empresa`, `endereco_empresa`, `pessoa_de_contato`, `descricao_empresa`, `produtos_empresa`) 
		// 	VALUES(
		// 		:email:,
		// 		:senha:,
		// 		:nome:,
		// 		:endereco:,
		// 		:pessoa:,
		// 		:descricao:,
		// 		:produtos:
		// 	)
		// ", $params);
		// $db->close();
		$email = $this->request->getPost('email');
		$senha = $this->request->getPost('senha');
		$nome_empresa = $this->request->getPost('nome_empresa');
		$endereco_empresa = $this->request->getPost('endereco_empresa');
		$pessoa_de_contato = $this->request->getPost('pessoa_de_contato');
		$descricao_empresa = $this->request->getPost('descricao_empresa');
		$produtos_empresa = $this->request->getPost('produtos_empresa');

		$db = db_connect();

		$data = [
			'email' => $email,
			'senha' => $senha,
			'nome_empresa' => $nome_empresa,
			'endereco_empresa' => $endereco_empresa,
			'pessoa_de_contato' => $pessoa_de_contato,
			'descricao_empresa' => $descricao_empresa,
			'produtos_empresa' => $produtos_empresa
		];

		$db->table('empregador')->insert($data);

		$db->close();
		return redirect()->to('/')->with('message', 'Registro de Empregador efetuado com sucesso!  Um email foi enviado para confirmar a sua inscrição!');
	}
}
