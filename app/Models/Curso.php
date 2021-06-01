<?php

namespace App\Models;

use CodeIgniter\Model;

interface IStrategy
{
    public function habilitaInteresse($data);
}

class EngenhariaComputacaoStrategy implements IStrategy
{
    public function habilitaInteresse($data)
    {
        $anoAtual = 2021;
        $limiteInferior = 2;
        $limiteSuperior = 4;

        $tempoCursado = $anoAtual - $data['anoDeIngresso'];

        if ($tempoCursado >= $limiteInferior && $tempoCursado <= $limiteSuperior) {
            return [
                'habilitado' => true,
                'mensagem' => 'Interesses salvos com sucesso'
            ];
        }

        return [
            'habilitado' => false,
            'mensagem' => 'O aluno de Engenharia de Computação necessita de estar entre 40% e 80% do curso completo para poder selecionar empresas de interesse'
        ];
    }
}

class EngenhariaSoftwareStrategy implements IStrategy
{
    public function habilitaInteresse($data)
    {
        $anoAtual = 2021;
        $limiteInferior = 1;
        $limiteSuperior = 4;

        $tempoCursado = $anoAtual - $data['anoDeIngresso'];

        if ($tempoCursado >= $limiteInferior && $tempoCursado <= $limiteSuperior) {
            return [
                'habilitado' => true,
                'mensagem' => 'Interesses salvos com sucesso'
            ];
        }

        return [
            'habilitado' => false,
            'mensagem' => 'O aluno de Engenharia de Software necessita de estar entre 20% e 80% do curso completo para poder selecionar empresas de interesse'
        ];
    }
}

class SistemasInformacaoStrategy implements IStrategy
{
    public function habilitaInteresse($data)
    {
        $anoAtual = 2021;
        $limiteInferior = 1;
        $limiteSuperior = 4;

        $tempoCursado = $anoAtual - $data['anoDeIngresso'];

        if ($tempoCursado >= $limiteInferior && $tempoCursado <= $limiteSuperior) {
            return [
                'habilitado' => true,
                'mensagem' => 'Interesses salvos com sucesso'
            ];
        }

        return [
            'habilitado' => false,
            'mensagem' => "O aluno de Sistemas de Informação necessita de estar entre 20% e 80% do curso completo para poder selecionar empresas de interesse"
        ];
    }
}

class CursoModel extends Model
{

    public function ObtenhaStrategy($cursoID)
    {
        $curso = $this->ObtenhaPorId($cursoID);

        if ($curso->nome == "Engenharia de Computacao") {
            return new EngenhariaComputacaoStrategy();
        } else if ($curso->nome == "Sistemas de Informacao") {
            return new SistemasInformacaoStrategy();
        } else if ($curso->nome == "Engenharia de Software") {
            return new EngenhariaSoftwareStrategy();
        }
    }
}
