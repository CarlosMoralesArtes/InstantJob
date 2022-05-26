<?php

namespace App\Models;

use CodeIgniter\Model;

class EliminarArxiu extends Model
{
    protected $table = 'servicio';
    protected $primaryKey = 'id_servicio';
    protected $returnType = 'array';
    protected $allowedFields = [
        "id_servicio",
        "nombre",
        "precio",
        "numero_clicks",
        "nomRandom",
    ];

}