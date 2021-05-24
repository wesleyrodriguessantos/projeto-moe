<?php

namespace App\Models;

use CodeIgniter\Model;

class Interesse extends Model
{
  protected $table                = 'interesse';
  protected $primaryKey           = 'id';
  protected $allowedFields        = ['id_estagiario_int', 'id_empregador_int'];
  protected $returnType           = 'array';
}
