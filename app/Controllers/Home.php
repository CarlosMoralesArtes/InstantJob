<?php

namespace App\Controllers;

use App\Models\UsuariModel;

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
        $query = $db->query("SELECT * FROM `servicio`");
        $query2 = $db->query("SELECT ser.id_servicio, ser.nombre, ser.precio FROM `servicio` ser JOIN subir sub ON sub.id_servicios = ser.id_servicio JOIN cliente cli ON cli.id_cliente = sub.id_clientes WHERE cli.tarifa = 2;");


        

        $data = array('consulta' => $query, 'consulta2' => $query2);

        return view('iniciar_sesion',$data);
    }

    //Redireccionament de la pagina principal del boto del header
    public function home(){
        $db = db_connect();
        $query = $db->query("SELECT * FROM `servicio`");
        $query2 = $db->query("SELECT ser.id_servicio, ser.nombre, ser.precio FROM `servicio` ser JOIN subir sub ON sub.id_servicios = ser.id_servicio JOIN cliente cli ON cli.id_cliente = sub.id_clientes WHERE cli.tarifa = 2;");


        

        $data = array('consulta' => $query, 'consulta2' => $query2);

        return view('iniciar_sesion',$data);
    }

    //Redireccionament de la footer a avis legal
    public function avislegal(){
        return view('avis_legal');
    }

    //Redireccionament de la footer a avis legal
    public function categoriasel(){
        $dades=$this->request->getVar();
        $final = $dades[1];
        $db = db_connect();
        // echo $final;
        $titulo = $final;
        $qtitul = "SELECT COUNT(*) FROM `servicio` WHERE categoria = ?;";
        $qtitul = $db->query($qtitul, [$final]);
        $query = "SELECT * FROM `servicio` WHERE categoria = ?;";
        $query = $db->query($query, [$final]);
        $query2 = "SELECT ser.id_servicio, ser.nombre, ser.precio FROM `servicio` ser JOIN subir sub ON sub.id_servicios = ser.id_servicio JOIN cliente cli ON cli.id_cliente = sub.id_clientes WHERE cli.tarifa = 2 AND categoria = ?;";
        $query2 = $db->query($query2, [$final]);


        $data = array('consulta' => $query, 'consulta2' => $query2, 'titulo' => $titulo, 'qtitul' => $qtitul);

        return view('serveis',$data);
        // return view('serveis');
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

    //Redireccionament de tarifes
    public function tarifes(){
        return view('tarifes');
    }

    //Redireccionament de pujar productes
    public function pujaProductes()
    {
        return view('pujaProductes.php');
    }

    public function sqlpujar()
    {
        $dades=$this->request->getVar();
        // echo var_dump($dades);
        // echo $dades['categoria'];
        if ($dades['findes']) {
            $findes = 1;
        }else{
            $findes = 0;
        }
        if ($dades['24h']) {
            $h24 = 1;
        }else{
            $h24 = 0;
        }
        $db = db_connect();
        // echo var_dump($dades);
        // echo $_FILES['fitxer']['tmp_name'];
        $data = $_FILES['fitxer']['tmp_name'];
        // $data = str_replace('data:image/png;base64,', '', $data);
        // $data = str_replace(' ','+',$data);
        $imagen = 'data:image//jpeg; base64,' . base64_encode($data);

        // $imagen = base64_decode($data);
        // $imagen = base64_encode($_FILES['fitxer']['tmp_name']);
        // echo $imagen;
        $query3 = "INSERT INTO `servicio` (`id_servicio`, `nombre`, `descripcion`, `numero_clicks`, `imagen`, `categoria`, `precio`, `horario`, `dias`, `findes`, `24h`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $query3 = $db->query($query3, [$dades['nombre'], $dades['descripcion'], 1, $imagen , $dades['categoria'], $dades['precio'], $dades['horario'], $dades['dias'], $findes, $h24]);
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
    public function serveis()
    {
        $db = db_connect();
        $query = $db->query("SELECT * FROM `servicio`");
        $query2 = $db->query("SELECT ser.id_servicio, ser.nombre, ser.precio FROM `servicio` ser JOIN subir sub ON sub.id_servicios = ser.id_servicio JOIN cliente cli ON cli.id_cliente = sub.id_clientes WHERE cli.tarifa = 2;");


        $titulo = 0;

        $data = array('consulta' => $query, 'consulta2' => $query2, 'titulo' => $titulo);

        return view('serveis',$data);
    }

    //Redireccionament de configuracio
    public function configuracio(){
        $session = session();
        $id = $session->get('id_user');
        $db = db_connect();
        // $query = $db->query("SELECT * FROM `cliente` WHERE id_cliente = 1");
        $query = "SELECT * FROM `cliente` WHERE id_cliente = ?;";
        $query = $db->query($query, [$id]);

        

        $data = array('consulta' => $query);

        return view('configuracio',$data);
    }

    //Redireccionament de estadistiques
    public function estadistiques(){

        // $session = session();
        // $id = $session->get('id_user');
        $db = db_connect();
        // $query = $db->query("SELECT * FROM `cliente` WHERE id_cliente = 1");
        $query = $db->query("SELECT ser.nombre, ser.numero_clicks, sub.fecha, ser.precio FROM `servicio` ser JOIN subir sub ON sub.id_servicios = ser.id_servicio JOIN cliente cli ON cli.id_cliente = sub.id_clientes WHERE cli.id_cliente = 3;");
        // $query = $db->query($query, [$id]);

        

        $data = array('consulta' => $query);

        return view('estadistiques',$data);
    }

    //Redireccionament de guardats
    public function guardats(){
        return view('guardats');
    }

    //Redireccionament de compra
    public function compra(){
        return view('compra');
    }

    // Funcio de la comprovacio i insercio del formulari de registre
    public function formulari()
    {
        $db = db_connect();
        // $query = $db->query("SELECT * FROM `servicio`;");
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
            $dades['contrasena'] = md5($dades['contrasena']);
			$usuari->insert($dades);
            $session->set('iniciar','1');
            $query = $db->query("SELECT * FROM `servicio`");
        $query2 = $db->query("SELECT ser.id_servicio, ser.nombre, ser.precio FROM `servicio` ser JOIN subir sub ON sub.id_servicios = ser.id_servicio JOIN cliente cli ON cli.id_cliente = sub.id_clientes WHERE cli.tarifa = 2;");


        

        $data = array('consulta' => $query, 'consulta2' => $query2);

        return view('iniciar_sesion',$data);
        } else {
            $session = session();
            $session->start();
            $session->set('eriniciar','1');
            $dades["validation"]=$this->validator;
            $query = $db->query("SELECT * FROM `servicio`");
        $query2 = $db->query("SELECT ser.id_servicio, ser.nombre, ser.precio FROM `servicio` ser JOIN subir sub ON sub.id_servicios = ser.id_servicio JOIN cliente cli ON cli.id_cliente = sub.id_clientes WHERE cli.tarifa = 2;");


        

        $data = array('consulta' => $query, 'consulta2' => $query2);

        return view('iniciar_sesion',$data);
        }
    }

    public function form(){
        // formulariIniciSessio();
    }

    public function formulariIniciSessio()
    {
        $db = db_connect();
        $query = $db->query("SELECT * FROM `servicio`");
        $query2 = $db->query("SELECT ser.id_servicio, ser.nombre, ser.precio FROM `servicio` ser JOIN subir sub ON sub.id_servicios = ser.id_servicio JOIN cliente cli ON cli.id_cliente = sub.id_clientes WHERE cli.tarifa = 2;");
        // $query = $db->query("SELECT * FROM `servicio` ser JOIN servicio_categoria cat ON cat.id_servicio = ser.id_servicio JOIN categorias cate ON cate.id_categoria = cat.id_categoria;");
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
                "required" => "Contraseña obligatori"
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
                echo "<p class='ErrorUsuariIncorrecte'>El usuari o la contrasenya es incorrecte.</p>";

                $data = array('consulta' => $query, 'consulta2' => $query2);

                return view('iniciar_sesion',$data);
            } else {
                $session = session();
                $session->start();
                if($data["correo"] == $dades["correo"]){
                    if($data["contrasena"] == md5($dades["contrasena"])){
                        $session->set('user',$data["nombre"]);
                        $session->set('id_user',$data["id_cliente"]);
                        $data = array('consulta' => $query, 'consulta2' => $query2);
                        return view('pujaProductes',$data);;
                    } else {
                        echo "<p class='ErrorUsuariIncorrecte'>Usuari o contrasenya incorrecte.</p>";
                        $data = array('consulta' => $query, 'consulta2' => $query2);
                        return view('iniciar_sesion',$data);
                    }
                }
            }
        } else {
            $dades["validation"]=$this->validator;

        $data = array('consulta' => $query, 'consulta2' => $query2);

        return view('iniciar_sesion',$data);
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

    // Funcio que serveix per modificar el usuari
    public function configuracioFormulari()
    {
        // Aquest apartat rep les dades del formulari
        $dades=$this->request->getVar();

        // Apartat de les normes que es comproven del formulari
        $regles = [
            "nombre"    => "required",
            "apellidos"    => "required",
            "contrasenya"    => "required"
        ];

        // Apartat dels missatges que surten quan no es coloca algun valor correcte en el formulari
        $missatges = [
            "nombre" => [
                "required" => "Nom obligatori"
            ],
            "apellidos" => [
                "required" => "Cognoms obligatoris"
            ],
            "contrasena" => [
                "required" => "Telefon obligatori"
            ]
        ];

        // Validador del formulari on es comproven que estiguin tots els requisits
        if($this->validate($regles, $missatges)){
            $db = db_connect();
            $sql = "UPDATE `cliente` SET `nombre`= ?,`apellidos`= ?,`contrasena`= ? WHERE `id_cliente` = ?;";
            $db->query($sql, [$dades['nombre'], $dades['apellidos'], $dades['contrasenya'], $dades['id_usuari']]);

            $session = session();
            $session->start();
            $session->set('user',$dades['nombre']);
            return view('configuracio');
        }
    }

    // Funcio que serveix per modificar la tarifa al usuari (Normal)
    public function tarifaNormal()
    {
        // Aquest apartat rep les dades del formulari
        $dades=$this->request->getVar();

        // Apartat de les normes que es comproven del formulari
        $regles = [
            "nomTitular"    => "required",
            "numeroTargeta"    => "required",
            "dataCaducitat"    => "required",
            "cvv"    => "required"
        ];

        // Apartat dels missatges que surten quan no es coloca algun valor correcte en el formulari
        $missatges = [
            "nomTitular" => [
                "required" => "Nom obligatori"
            ],
            "numeroTargeta" => [
                "required" => "Cognoms obligatoris"
            ],
            "dataCaducitat" => [
                "required" => "Telefon obligatori"
            ],
            "cvv" => [
                "required" => "Telefon obligatori"
            ]
        ];

        // Validador del formulari on es comproven que estiguin tots els requisits
        if($this->validate($regles, $missatges)){
            $db = db_connect();
            $sql = "UPDATE `cliente` SET `tarifa`= 0 WHERE `id_cliente` = ?";
            $db->query($sql, [$dades['id_usuari']]);

            return view('tarifes');
        }
    }

    // Funcio que serveix per modificar la tarifa al usuari (Advanced)
    public function tarifaAdvanced()
    {
        // Aquest apartat rep les dades del formulari
        $dades=$this->request->getVar();

        // Apartat de les normes que es comproven del formulari
        $regles = [
            "nomTitular"    => "required",
            "numeroTargeta"    => "required",
            "dataCaducitat"    => "required",
            "cvv"    => "required"
        ];

        // Apartat dels missatges que surten quan no es coloca algun valor correcte en el formulari
        $missatges = [
            "nomTitular" => [
                "required" => "Nom obligatori"
            ],
            "numeroTargeta" => [
                "required" => "Cognoms obligatoris"
            ],
            "dataCaducitat" => [
                "required" => "Telefon obligatori"
            ],
            "cvv" => [
                "required" => "Telefon obligatori"
            ]
        ];

        // Validador del formulari on es comproven que estiguin tots els requisits
        if($this->validate($regles, $missatges)){
            $db = db_connect();
            $sql = "UPDATE `cliente` SET `tarifa`= 1 WHERE `id_cliente` = ?";
            $db->query($sql, [$dades['id_usuari']]);

            return view('tarifes');
        }
    }

    // Funcio que serveix per modificar la tarifa al usuari (Enterprise)
    public function tarifaEnterprise()
    {
        // Aquest apartat rep les dades del formulari
        $dades=$this->request->getVar();

        // Apartat de les normes que es comproven del formulari
        $regles = [
            "nomTitular"    => "required",
            "numeroTargeta"    => "required",
            "dataCaducitat"    => "required",
            "cvv"    => "required"
        ];

        // Apartat dels missatges que surten quan no es coloca algun valor correcte en el formulari
        $missatges = [
            "nomTitular" => [
                "required" => "Nom obligatori"
            ],
            "numeroTargeta" => [
                "required" => "Cognoms obligatoris"
            ],
            "dataCaducitat" => [
                "required" => "Telefon obligatori"
            ],
            "cvv" => [
                "required" => "Telefon obligatori"
            ]
        ];

        // Validador del formulari on es comproven que estiguin tots els requisits
        if($this->validate($regles, $missatges)){
            $db = db_connect();
            $sql = "UPDATE `cliente` SET `tarifa`= 2 WHERE `id_cliente` = ?";
            $db->query($sql, [$dades['id_usuari']]);

            return view('tarifes');
        }
    }

    // Funcio que serveix per comprar els productes
    public function compraProductes()
    {
        // Aquest apartat rep les dades del formulari
        $dades=$this->request->getVar();

        $db = db_connect();
        $sql = "SELECT * FROM `servicio` WHERE `id_servicio` = ?";
        $query = $db->query($sql, [$dades['id_servei']]);

        $dada = array('consulta' => $query);

        return view('compra', $dada);
    }
}
