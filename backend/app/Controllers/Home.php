<?php

namespace App\Controllers;

use App\Models\UsuariModel;

class Home extends BaseController
{
    public function __construct(){
		helper(['form', 'url', 'download']);
		$db = \Config\Database::connect();
	}
    public function index()
    {
<<<<<<< HEAD
        helper('form');
        return view('iniciar_sesion');
=======
        return view('welcome_message');
>>>>>>> fbf70486ce2219ceabc142dc2ce91a22439b84ad
    }
    public function formulariIniciSessio()
    {
        // Aquest apartat rep les dades del formulari
        $dades=$this->request->getVar();
        
        // Apartat de les normes que es comproven del formulari
        $regles = [
            "id_cliente"    => "required",
            "contrasena"    => "required"
        ];

        // Apartat dels missatges que surten quan no es coloca algun valor correcte en el formulari
        $missatges = [
            "id_cliente" => [
                "required" => "Usuario obligatori"
            ],
            "contrasena" => [
                "required" => "contrasena obligatori"
            ]
        ];

        // Validador del formulari on es comproven que estiguin tots els requisits
        if($this->validate($regles, $missatges)){
            //el codi que rep la funció cal especificar-lo en la uri com a segment
            $obj_persona = new UsuariModel();
            $data = $obj_persona ->find($dades["id_cliente"]);
            if(empty($data)){
                $data = ["no"];
            }
            if(count($data) == 1){
                echo "El usuari o la contrasenya es incorrecte.";
                return view('iniciar_sesion');
            } else {
                $session = session();
                $session->start();
                $session->set('id_cliente',$data["id_cliente"]);
                if($data["id_cliente"] == $dades["id_cliente"]){
                    if($data["contrasena"] == $dades["contrasena"]){
                        return view('form', $data);
                    } else {
                        echo "Usuari o contrasenya incorrecte. ";
                        return view('iniciar_sesion', $dades);
                    }
                }
            }
        } else {
            $dades["validation"]=$this->validator;
            return view('iniciar_sesion', $dades);
        }
    }
    public function registrarse(){
        return view('registro');
    }
}
