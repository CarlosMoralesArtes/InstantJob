<?php

namespace App\Models;

use CodeIgniter\Model;

class ArxiuModel extends Model
{
    protected $table = 'fitxers';
    protected $primaryKey = 'codiU';
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