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
        $db = db_connect();
        $query = $db->query("SELECT * FROM `servicio` ser JOIN servicio_categoria cat ON cat.id_servicio = ser.id_servicio JOIN categorias cate ON cate.id_categoria = cat.id_categoria;");


        

        $data = array('consulta' => $query);

        return view('iniciar_sesion',$data);
        return view('iniciar_sesion');
    }

    //Redireccionament de la pagina principal del boto del header
    public function home(){
        $db = db_connect();
        $query = $db->query("SELECT * FROM `servicio` ser JOIN servicio_categoria cat ON cat.id_servicio = ser.id_servicio JOIN categorias cate ON cate.id_categoria = cat.id_categoria;");


        

        $data = array('consulta' => $query);

        return view('iniciar_sesion',$data);
        return view('iniciar_sesion');
    }

    //Redireccionament de la footer a avis legal
    public function avislegal(){
        return view('avis_legal');
    }

    //Redireccionament de la footer a la politica de privacitat
    public function politicaprivacitat(){
        return view('politica_privacitat');
    }

    //Redireccionament de la footer a politica de cookies
    public function politicacookies(){
        return view('politica_de_cookies');
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

    //Redireccionament de serveis
    public function configuracio(){
        return view('configuracio');
    }

    //Redireccionament de serveis
    public function estadistiques(){
        return view('estadistiques');
    }

    // Funcio de la comprovacio i insercio del formulari de registre
    public function formulari()
    {
        $db = db_connect();
        $query = $db->query("SELECT * FROM `servicio` ser JOIN servicio_categoria cat ON cat.id_servicio = ser.id_servicio JOIN categorias cate ON cate.id_categoria = cat.id_categoria;");
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
            $dades2 = array('consulta' => $query, 'dades' => $dades);
            return view('iniciar_sesion', $dades2);
        } else {
            $session = session();
            $session->start();
            $session->set('eriniciar','1');
            $dades["validation"]=$this->validator;
            $dades2 = array('consulta' => $query, 'dades["validation"]' => $dades["validation"]);
            return view('iniciar_sesion', $dades2);
        }
    }

    public function form(){
        // formulariIniciSessio();
    }

    public function formulariIniciSessio()
    {
        $db = db_connect();
        $query = $db->query("SELECT * FROM `servicio` ser JOIN servicio_categoria cat ON cat.id_servicio = ser.id_servicio JOIN categorias cate ON cate.id_categoria = cat.id_categoria;");
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
                $data2 = array('consulta' => $query);
                return view('iniciar_sesion', $data2);
            } else {
                $session = session();
                $session->start();
                if($data["correo"] == $dades["correo"]){
                    if($data["contrasena"] == $dades["contrasena"]){
                        $session->set('user',$data["nombre"]);
                        $data2 = array('consulta' => $query, 'data' => $data);
                        return view('iniciar_sesion', $data2);
                    } else {
                        echo "Usuari o contrasenya incorrecte. ";
                        $dades2 = array('consulta' => $query, 'dades' => $dades);
                        return view('iniciar_sesion', $dades2);
                    }
                }
            }
        } else {
            $dades["validation"]=$this->validator;
            $dades2 = array('consulta' => $query, 'dades' => $dades);
            return view('iniciar_sesion', $dades2);
        }
    }
    // Funcio que serveix per mostrar els arxius que te el usuari en la seva taula
    public function mostrarArxius()
    {
        // Aquest apartat rep les dades del formulari
        $db = db_connect();
        $query = $db->query("SELECT * FROM `servicio` ser JOIN servicio_categoria cat ON cat.id_servicio = ser.id_servicio JOIN categorias cate ON cate.id_categoria = cat.id_categoria;");

        $data = array('consulta' => $query);

        return view('iniciar_sesion',$data);
    }
}
