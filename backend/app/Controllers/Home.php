<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct(){
		helper(['form', 'url', 'download']);
		$db = \Config\Database::connect();
	}
    public function index()
    {
        return view('welcome_message');
    }
    public function formulariIniciSessio()
    {
        // Aquest apartat rep les dades del formulari
        $dades=$this->request->getVar();
        
        // Apartat de les normes que es comproven del formulari
        $regles = [
            "codiU"    => "required",
            "password"    => "required"
        ];

        // Apartat dels missatges que surten quan no es coloca algun valor correcte en el formulari
        $missatges = [
            "codiU" => [
                "required" => "codiU obligatori"
            ],
            "password" => [
                "required" => "Contrasenya obligatori"
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
                return view('v4morales\iniciarSessio.php');
            } else {
                $session = session();
                $session->start();
                $session->set('id_cliente',$data["id_cliente"]);
                if($data["id_cliente"] == $dades["id_cliente"]){
                    if($data["contrasena"] == $dades["contrasena"]){
                        return view('v4morales\planaPrincipal.php', $data);
                    } else {
                        echo "Usuari o contrasenya incorrecte. ";
                        return view('v4morales\iniciarSessio.php', $dades);
                    }
                }
            }
        } else {
            $dades["validation"]=$this->validator;
            return view('v4morales\iniciarSessio.php', $dades);
        }
    }
}
