<?php

namespace App\Models;

use CodeIgniter\Model;

class EliminarArxiu extends Model
{
    protected $table = 'fitxers';
    protected $primaryKey = 'codiF';
    protected $returnType = 'array';
    protected $allowedFields = [
        "codiF",
        "nomF",
        "tipusF",
        "data",
        "nomRandom",
        "codiU",
    ];

}