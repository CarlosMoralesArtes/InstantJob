<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariModel extends model
{
    protected $table = 'cliente';
    protected $primaryKey = 'correo';
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