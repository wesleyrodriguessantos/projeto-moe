<?php

namespace App\Models;

use CodeIgniter\Model;

class Empregador extends Model
{
  protected $table                = 'empregador';
  protected $primaryKey           = 'id_empregador';
  protected $allowedFields        = ['nome_empresa', 'endereco_empresa', 'email', 'senha', 'pessoa_de_contato', 'descricao_empresa', 'produtos_empresa', 'status_empregador', 'tipo_usuario'];
  protected $returnType           = 'array';
}
