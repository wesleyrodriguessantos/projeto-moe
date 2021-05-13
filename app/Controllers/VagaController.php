<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Home;
use App\Models\Empregador;
use App\Models\Estagiario;
use App\Models\Vagas;

class VagaController extends BaseController
{
  public function index()
  {
    return view('vagas');
  }

  public function cadastrarVaga()
  {
    return view('cadastroVaga');
  }

  public function novaVaga()
  {

    // Regras para a validação do Cadastro de uma nova Vaga
    $rulesVaga = [
      'nome_vaga' => 'required|max_length[80]',
      'lista_atividades' => 'required|string',
      'semestre' => 'required|max_length[2]',
      'lista_habilidades' => 'required|string',
      'descricao_vaga' => 'required|string',
      'horas' => 'required|max_length[2]',
      'remuneracao' => 'required|max_length[10]',
    ];

    //Mensagens de Erro Personalizadas
    $mensagens = [
      'nome_vaga' => [
        'required' => 'Informe um nome para a vaga cadastrada!',
        'max_length' => 'O nome para a vaga informado é muito grande!',
      ],
      'lista_atividades' => [
        'required' => 'Informe a lista de Atividades necessárias para a vaga cadastrada!',
        'string' => 'A Lista de atividades precisa ser uma string! Informe a lista de atividades da forma correta!',
      ],
      'semestre' => [
        'required' => 'Informe um semestre requerido para a vaga cadastrada!',
        'max_length' => 'O semestre informado é muito grande, fora do padrão!',
      ],
      'lista_habilidades' => [
        'required' => 'Informe a lista de Habilidades necessárias para a vaga cadastrada!',
        'string' => 'A Lista de Habilidades precisa ser uma string! Informe a lista de Habilidades da forma correta!',
      ],
      'descricao_vaga' => [
        'required' => 'Informe a Descrição sobre a vaga que queres Cadastrar!',
        'string' => 'A Descrição da Vaga precisa ser uma string! Informe a Descrição da Vaga da forma correta!',
      ],
      'horas' => [
        'required' => 'Selecione uma carga horária para a vaga cadastrada!',
        'max_length' => 'A carga Horária para a vaga informada está incorreto, Selecione apenas 20 Horas ou 30 Horas!!',
      ],
      'remuneracao' => [
        'required' => 'Selecione uma Remuneração correta para a vaga cadastrada!',
        'max_length' => 'A Remuneração para a vaga informada está incorreto, O valor Mínimo para o Estágio de 20 Horas semanais é de R$ 787,98
        e O valor Mínimo para o Estágio de 30 Horas semanais é de R$ 1.125,69!!',
      ]
    ];

    if ('remuneracao' < '787,98') {
      return redirect()->back()->withInput()->with('errors', 'Remuneração Informada está abaixo do Mínimo necessário!');
    } else {

      if ($this->validate($rulesVaga, $mensagens)) {

        $db = db_connect();

        $db->transStart(); //inicia a transação

        $modelVaga = new Vagas();

        $vaga['nome_vaga'] = $this->request->getPost('nome_vaga');
        $vaga['lista_atividades'] = $this->request->getPost('lista_atividades');
        $vaga['semestre'] = $this->request->getPost('semestre');
        $vaga['lista_habilidades'] = $this->request->getPost('lista_habilidades');
        $vaga['descricao_vaga'] = $this->request->getPost('descricao_vaga');
        $vaga['horas'] = $this->request->getPost('horas');
        $vaga['remuneracao'] = $this->request->getPost('remuneracao');
        $vaga['id_empregadorVaga'] = $this->request->getPost('id_empregadorVaga');

        $modelVaga->save($vaga);

        $db->transComplete(); //finaliza a transação

        if ($db->transStatus() == false) {

          return redirect()->back()->withInput()->with('warning', 'Não foi possível salvar os dados da vaga no momento. Tente novamente mais tarde.');
        } else {

          return redirect()->to('/empregador')->with('success', 'Vaga Cadastrada com Sucesso! Obrigado por confiar em nossos serviços!');
        }
      } else { //retorna ao formulário de registro caso a validação falhe

        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }
    }
  }
}
