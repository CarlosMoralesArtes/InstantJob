<?php

namespace App\Controllers;

use App\Models\UsuariModel;

// session_start();

class Home extends BaseController
{
    //El constructor per l'ajut dels helpers
    public function __construct(){
		helper(['form', 'url', 'download']);
		$db = \Config\Database::connect();
	}

    //La funcio de la pagina principal
    public function index()
    {
        return view('iniciar_sesion');
    }

    //Redireccionament de la pagina principal del boto del header
    public function home(){
        return view('iniciar_sesion');
    }

    //Redireccionament de missatges
    public function missatges(){
        return view('missatges');
    }

    //Redireccionament de missatges
    public function tarifes(){
        return view('tarifes');
    }

    //Redireccionament de pujar productes
    public function pujaProductes()
    {
        return view('pujaProductes.php');
    }

    public function clear(){
        return view('clear');
    }

    //Redireccionament del registre
    public function registrarse(){
        return view('iniciar_sesion');
    }

    //Redireccionament de serveis
    public function serveis(){
        return view('serveis');
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
            "correo"    => "is_unique[cliente.correo,correo]",
            "contrasena" => "required"
            // "repcontrasenya"    => "required|matches[password]",
        ];

        // Apartat dels missatges que surten quan no es coloca algun valor correcte en el formulari
        $missatges = [
            "nombre" => [
                "required" => "nom obligatori"
            ],
            "apellidos" => [
                "required" => "Cognoms obligatoris"
                // "matches" => "Les contrasenyes tenen que coincidir."
            ],
            "correo" => [
                "is_unique" => "El correu ja te una compte creada"
            ],
            "contrasena" => [
                "required" => "Telefon obligatori"
            ]
            // "repcontrasenya" => [
            //     "required" => "Repeticio de contraseña obligatori",
            //     "matches" => "Les contrasenyes tenen que coincidir."
            // ]
        ];

        // Validador del formulari on es comproven que estiguin tots els requisits
        if($this->validate($regles, $missatges)){
            $session = session();
            $session->start();
            $usuari = new \App\Models\UsuariModel();
			$usuari->insert($dades);
            $session->set('iniciar','1');
            return view('iniciar_sesion', $dades);
        } else {
            $dades["validation"]=$this->validator;
            return view('iniciar_sesion', $dades);
        }
    }

    public function form(){
        // formulariIniciSessio();
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
                if($data["correo"] == $dades["correo"]){
                    if($data["contrasena"] == $dades["contrasena"]){
                        $session->set('user',$data["nombre"]);
                        return view('iniciar_sesion', $data);
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
    // Funcio que serveix per mostrar els arxius que te el usuari en la seva taula
    public function mostrarArxius()
    {
        // Aquest apartat rep les dades del formulari
        $dades2=$this->request->getVar();

    	$obj_arxiu = new \App\Models\ArxiuModel();
		$result = $obj_arxiu ->find($dades2['codiUsuariMostrar']);
        
        $obj_arxiu2 = new \App\Models\CompartitsArxiu();
        $result2 = $obj_arxiu2 ->find($dades2['codiUsuariMostrar']);

        $obj_arxiu3 = new \App\Models\EliminarArxiu();

        $result4 = array();

        foreach ($result2 as $fila) {
            $codiArxiu = $fila['codiF'];
            $result3 = $obj_arxiu3 ->find($codiArxiu);
            array_push($result4, $result3);
        }

        $data = array('consulta' => $result, 'consulta2' => $result4);
        
        return view('v4morales\planaPrincipal.php', $data);
    }
}
