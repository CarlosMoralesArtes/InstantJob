<?php

namespace App\Models;

use CodeIgniter\Model;

class CompartitsArxiu extends Model
{
    protected $table = 'compartir';
    protected $primaryKey = 'codiUC';
    protected $returnType = 'array';
    protected $allowedFields = [
        "codiF",
        "codiUC",
    ];

}