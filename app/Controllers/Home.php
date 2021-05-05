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
		echo '<h2>Você está na Index!</h2>';
	}

	public function registrar()
	{
		return view('registro');
	}

	// public function estagiario()
	// {
	// 	return view('formulario');
	// }

	public function novoEstagiario()
	{
		$modelEstagiario = new Estagiario();

		$estagiario['nome_estagiario'] = $this->request->getPost('nome_estagiario');
		$estagiario['email'] = $this->request->getPost('email');
		$estagiario['senha'] = password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT);
		$estagiario['curso_estagiario'] = $this->request->getPost('curso_estagiario');
		$estagiario['ano_ingresso_estagiario'] = $this->request->getPost('ano_ingresso_estagiario');
		$estagiario['minicurriculo_estagiario'] = $this->request->getPost('minicurriculo_estagiario');

		$modelEstagiario->save($estagiario);

		return redirect()->to('/cadastro')->with('message', 'Estagiário Cadastrado com Sucesso! Um email foi enviado para confirmar a sua inscrição!');
	}

	// public function empregador()
	// {
	// 	return view('formularioEmp');
	// }
	public function novoEmpregador()
	{
		$modelEmpregador = new Empregador();

		$empregador['email'] = $this->request->getPost('email');
		$empregador['senha'] = password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT);
		$empregador['nome_empresa'] = $this->request->getPost('nome_empresa');
		$empregador['endereco_empresa'] = $this->request->getPost('endereco_empresa');
		$empregador['pessoa_de_contato'] = $this->request->getPost('pessoa_de_contato');
		$empregador['descricao_empresa'] = $this->request->getPost('descricao_empresa');
		$empregador['produtos_empresa'] = $this->request->getPost('produtos_empresa');

		$modelEmpregador->save($empregador);

		return redirect()->to('/cadastro')->with('message', 'Registro de Empregador efetuado com sucesso!  Um email foi enviado para confirmar a sua inscrição!');
	}

	// public function sair()
	// {
	// 	session()->destroy();
	// 	return redirect()->to('/');
	// }
}
