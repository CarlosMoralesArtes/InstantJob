<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariModel extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    protected $returnType = 'array';
    protected $allowedFields = [
        "id_cliente",
        "nombre",
        "contrasena",
        "latitud",
        "logitud",
        "correo",
    ];

}