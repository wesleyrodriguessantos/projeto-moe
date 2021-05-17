<?php

namespace App\Models;

use CodeIgniter\Model;

class Estagiario extends Model
{
  protected $table                = 'estagiario';
  protected $primaryKey           = 'id_estagiario';
  protected $allowedFields        = ['nome_estagiario', 'email', 'senha', 'curso_estagiario', 'ano_ingresso_estagiario', 'integralizacao', 'minicurriculo_estagiario', 'status_estagiario', 'tipo_usuario'];
  protected $returnType           = 'array';
}
