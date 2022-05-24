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
        return view('iniciar_sesion');
    }

    public function missatges()
    {
        return view('missatges.php');
    }

    public function pujaProductes()
    {
        return view('pujaProductes.php');
    }

    public function serveis()
    {
        return view('serveis.php');
    }

    public function tarifes()
    {
        return view('tarifes.php');
    }

    public function registrarse(){
        return view('registrarse');
    }

    // Funcio de la comprovacio i insercio del formulari de registre
    public function formulari()
    {
        // Aquest apartat rep les dades del formulari
        $dades=$this->request->getVar();
        
        // Apartat de les normes que es comproven del formulari
        $regles = [
            "nombre"    => "required",
            "apellidos"    => "required",
            // "repcontrasenya"    => "required|matches[password]",
            "correo"    => "required|valid_email",
            "contrasena" => "required"
        ];

        // Apartat dels missatges que surten quan no es coloca algun valor correcte en el formulari
        $missatges = [
            // "codiU" => [
            //     "required" => "codiU obligatori",
            //     // "is_unique"
            // ],
            "nombre" => [
                "required" => "nom obligatori"
            ],
            "apellidos" => [
                "required" => "Cognoms obligatoris"
                // "matches" => "Les contrasenyes tenen que coincidir."
            ],
            "correo" => [
                "required" => "Correu obligatori",
                "valid_email" => "No pots invertarte el correu."
            ],
            "contrasena" => [
                "required" => "Telefon obligatori",
            ]
        ];

        // Validador del formulari on es comproven que estiguin tots els requisits
        if($this->validate($regles, $missatges)){
            $usuari = new \App\Models\UsuariModel();
			$usuari->insert($dades);
            return view('eric', $dades);
        } else {
            $dades["validation"]=$this->validator;
            return view('iniciar_sesion', $dades);
        }
    }

    public function formulariIniciSessio()
    {
        // Aquest apartat rep les dades del formulari
        $dades=$this->request->getVar();
        
        // Apartat de les normes que es comproven del formulari
        $regles = [
            "correo"    => "required",
            "contrasena"    => "required"
        ];

        // Apartat dels missatges que surten quan no es coloca algun valor correcte en el formulari
        $missatges = [
            "correo" => [
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
            $data = $obj_persona ->find($dades["correo"]);
            if(empty($data)){
                $data = ["no"];
            }
            if(count($data) == 1){
                echo "El usuari o la contrasenya es incorrecte.";
                return view('iniciar_sesion');
            } else {
                $session = session();
                $session->start();
                $session->set('correo',$data["correo"]);
                if($data["correo"] == $dades["correo"]){
                    if($data["contrasena"] == $dades["contrasena"]){
                        return view('eric', $data);
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
}
