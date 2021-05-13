<?php

namespace App\Models;

use CodeIgniter\Model;

class Vagas extends Model
{
  protected $table                = 'vagas';
  protected $primaryKey           = 'id_vaga';
  protected $allowedFields        = ['nome_vaga', 'lista_atividades', 'semestre', 'lista_habilidades', 'descricao_vaga', 'horas', 'remuneracao', 'id_empregadorVaga'];
  protected $returnType           = 'array';
}
