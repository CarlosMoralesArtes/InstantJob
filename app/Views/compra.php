<!doctype html>
<html lang="es">

<head>
  <title>InstantJob | Compra</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css" type="text/css">
    <style>
      .map {
        height: 400px;
        width: 70%;
      }
    </style>
  <!-- Estils de la pàgina -->
  <link rel="stylesheet" href="styles.css">
  <!-- Estils de font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <!-- Estils de glider -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
  <!-- Icone de la pagina -->
  <link rel="icon" type="image/png" href="./imgs/Logo_InstantJob_Blanca.png" alt="Icone de la pàgina InstantJob" />

  <!-- Estils de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
  <script src="https://kit.fontawesome.com/0859fc3634.js" crossorigin="anonymous"></script>
</head>

<?php
      $session = session();
      if ($session->get('user')){
        // $userName = $session->get('codiU');
      } else {
        $session->set('iniciar','1');
        // $localitzacio = site_url()."/c4morales/home/iniciarSessio";
        header("Location: ./index");
        die();
      }
  ?>

<body>
  <!-- Apartat de la carrega de la pàgina -->
  <div id="contenedor_carga">
    <div id="carga"></div>
  </div>

  <!-- Apartat del header de la pàgina -->
  <header>
    <!-- Menu de la pàgina -->
    <nav class="navInici">
        <!-- Logo de la pàgina -->
        <div class="header col-1">
          <a href="index"><img src="./imgs/Logo_InstantJob_Blanca.png" alt="Logo de la pàgina InstantJob"></a>
        </div>
        <!-- Buscador de la pàgina -->
        <div class="header col-6 form-outline">
          <form class="estilFormulari">
            <input placeholder="Coloca el servei que vols buscar" type="search" id="paraulaBuscada" onkeypress="buscador()" class="form-control buscadorTop" />
            <ul id="possiblesParaules"></ul>
          </form>
        </div>

        <!-- Boto per iniciar sessio i desplegable si esta la sessio iniciada -->
        <?php
          $session = session();
          if ($session->get('user')){
              echo "<div class='header col-2 separacio'>";
              echo "<div class='dropdown'>";
              echo "<a class='btn btn-light' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fa-solid fa-user'></i> Benvingut<br> ".$_SESSION['user']." 🡓</a>";
              echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
              echo "<a class='dropdown-item' href='configuracio'><i class='fa-solid fa-wrench'></i> El Meu Perfil</a>";
              echo "<form action='clear' method='GET'><input class='btn btn-light' type='submit' value='Finalitzar Sessio' /></form>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
          } else {
              echo "<div class='header col-2 separacio'><a class='btn btn-light' id='btn-abrir-popup'><i class='fa-solid fa-right-to-bracket'></i> Iniciar Sessio /<br>Registrar-se</a></div>";
          }
        ?>
        </div>
        <!-- Boto per anar al apartat de pujar productes -->
        <div class="header col-2">
        <a class="btn btn-primary" href="pujaProductes"><i class="fa-solid fa-circle-plus"></i> Pujar<br> Producte</a>
      </div>
    </nav>
  </header>
  
  <div class="overlay" id="overlay">
    <div class="popup" id="popup">
      <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
      <h2 class="title">Iniciar Sessio</h2>
      <p>Completa els camps</p>
      <br>
      <div class="targetaIniciSessio">
        <?php
          $ruta = "iniciar";
          $attributes = array ('action' => "formulari", 'enctype' => "multipart/form-data", 'method' => "GET");
          // Form open que serveix per iniciar el formulari
          echo form_open($ruta, $attributes);
          echo "<div class='input-container'>";

          // En $data es coloquen els atributs de la pregunta
          $data = array('name' => 'correo',
                      'required' => 'required',
                      'type' => 'email',
                      'value' => set_value('correo'));
          // En el form input es l'apartat on pots colocar text en el formulari
          echo form_input($data);
          echo form_label('Correo', '#{label}');
          echo "<div class='bar'></div>";
          echo "<br>";
          echo "</div>";

          echo "<div class='input-container'>";
          // En $data es coloquen els atributs de la pregunta
          $data = array('name' => 'contrasena',
                      'required' => 'required');
          // En el form input es l'apartat on pots colocar text en el formulari
          echo form_input($data);
          echo form_label('Contrasena', '#{label}');
          echo "<div class='bar'></div>";
          echo "<br>";
          echo "</div>";
          echo "<br>";
          echo form_submit('mysubmit', 'Iniciar!');

          // El form close es per tancar el formulari
          echo form_close();
        ?>
      </div>
        <p class="pasarRegistre2">Si no tens un compte <p id="btn-abrir-popup2" class="pasarRegistre"> Registra’t</p></p>
      </form>
    </div>
  </div>

  <div class="overlay" id="overlay2">
    <div class="popup" id="popup2">
      <a href="#" id="btn-cerrar-popup2" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
      <h2 class="title">Registra't</h2>
      <p>Completa els camps</p>
      <br>
      <div class="targetaIniciSessio">
          <?php
            $ruta = site_url()."registrar";
            $attributes = array ('action' => "registrar", 'enctype' => "multipart/form-data", 'method' => "GET");
            // Form open que serveix per iniciar el formulari
            echo form_open($ruta, $attributes);
            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'nombre',
                          'required' => 'required',
                          'value' => set_value('nom'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Nom', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";

            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'apellidos',
                          'required' => 'required',
                          'value' => set_value('primerCognom'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Cognoms', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";

            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'correo',
                          'required' => 'required',
                          'value' => set_value('email'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Email', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            
            echo "<br>";
            echo "</div>";

            echo form_hidden('latitud', '2');
            echo form_hidden('logitud', '2');

            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'contrasena',
                          'required' => 'required',
                          'value' => set_value('contrasenya'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Contrasenya', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";

            echo "<br>";

            echo form_submit('submit', 'Registrar-se');
            // El form close es per tancar el formulari
            echo form_close();

            if(!empty($validation)){
              if($validation->getError('correo')) {
                echo $validation->getError('correo');
                echo "<br>";
              }
            }
          ?>
          </div>
    </div>
  </div>

  <div class="overlay" id="overlay">
    <div class="popup" id="popup">
      <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
      <h2 class="title">Iniciar Sessio</h2>
      <p>Completa els camps</p>
      <br>
      <div class="targetaIniciSessio">
        <?php
          $ruta = "iniciar";
          $attributes = array ('action' => "formulari", 'enctype' => "multipart/form-data", 'method' => "GET");
          // Form open que serveix per iniciar el formulari
          echo form_open($ruta, $attributes);
          echo "<div class='input-container'>";

          // En $data es coloquen els atributs de la pregunta
          $data = array('name' => 'correo',
                      'required' => 'required',
                      'type' => 'email',
                      'value' => set_value('correo'));
          // En el form input es l'apartat on pots colocar text en el formulari
          echo form_input($data);
          echo form_label('Correo', '#{label}');
          echo "<div class='bar'></div>";
          echo "<br>";
          echo "</div>";

          echo "<div class='input-container'>";
          // En $data es coloquen els atributs de la pregunta
          $data = array('name' => 'contrasena',
                      'required' => 'required');
          // En el form input es l'apartat on pots colocar text en el formulari
          echo form_input($data);
          echo form_label('Contrasena', '#{label}');
          echo "<div class='bar'></div>";
          echo "<br>";
          echo "</div>";
          echo "<br>";
          echo form_submit('mysubmit', 'Iniciar!');

          // El form close es per tancar el formulari
          echo form_close();
        ?>
      </div>
        <p class="pasarRegistre2">Si no tens un compte <p id="btn-abrir-popup2" class="pasarRegistre"> Registra’t</p></p>
      </form>
    </div>
  </div>

  <div class="overlay" id="overlay2">
    <div class="popup" id="popup2">
      <a href="#" id="btn-cerrar-popup2" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
      <h2 class="title">Registra't</h2>
      <p>Completa els camps</p>
      <br>
      <div class="targetaIniciSessio">
          <?php
            $ruta = site_url()."registrar";
            $attributes = array ('action' => "registrar", 'enctype' => "multipart/form-data", 'method' => "GET");
            // Form open que serveix per iniciar el formulari
            echo form_open($ruta, $attributes);
            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'nombre',
                          'required' => 'required',
                          'value' => set_value('nom'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Nom', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";

            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'apellidos',
                          'required' => 'required',
                          'value' => set_value('primerCognom'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Cognoms', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";

            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'correo',
                          'required' => 'required',
                          'value' => set_value('email'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Email', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            
            echo "<br>";
            echo "</div>";

            echo form_hidden('latitud', '2');
            echo form_hidden('logitud', '2');

            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'contrasena',
                          'required' => 'required',
                          'value' => set_value('contrasenya'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Contrasenya', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";

            echo "<br>";

            echo form_submit('submit', 'Registrar-se');
            // El form close es per tancar el formulari
            echo form_close();

            if(!empty($validation)){
              if($validation->getError('correo')) {
                echo $validation->getError('correo');
                echo "<br>";
              }
            }
          ?>
          </div>
    </div>
  </div>

  <div class="overlay" id="overlay6">
    <div class="popup" id="popup6">
      <a href="#" id="btn-cerrar-popup6" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
      <h2 class="title">Valora el producte</h2>
      <p>Completa els camps</p>
      <br>
      <div class="targetaIniciSessio">
          <?php
            $ruta = site_url()."valorar";
            $attributes = array ('action' => "valorar", 'enctype' => "multipart/form-data", 'method' => "POST");
            // Form open que serveix per iniciar el formulari
            echo form_open($ruta, $attributes);
            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'Estrellas',
                          'required' => 'required',
                          'value' => set_value('estrellas'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Estrellas', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";

            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'valoracio',
                          'required' => 'required',
                          'value' => set_value('valoracio'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Valoracio', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";

            foreach ($consulta->getResultArray() as $row){
              echo form_hidden('id_servei', $row['id_servicio']);
            }

            echo "<br>";
            echo "</div>";

            echo "<input type='submit' class='btn-submit' name='mysubmit' value='Valorar'>";
            // El form close es per tancar el formulari
            echo form_close();

            if(!empty($validation)){
              if($validation->getError('correo')) {
                echo $validation->getError('correo');
                echo "<br>";
              }
            }
          ?>
          </div>
    </div>
  </div>

  <div class="overlay" id="overlay7">
    <div class="popup" id="popup7">
      <a href="#" id="btn-cerrar-popup7" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
      <h2 class="title">Valora el producte</h2>
      <p>Completa els camps</p>
      <br>
      <div class="targetaIniciSessio">
          <?php
            $ruta = site_url()."valorar";
            $attributes = array ('action' => "valorar", 'enctype' => "multipart/form-data", 'method' => "POST");
            // Form open que serveix per iniciar el formulari
            echo form_open($ruta, $attributes);
            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'Estrellas',
                          'required' => 'required',
                          'value' => set_value('estrellas'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Estrellas', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";

            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'valoracio',
                          'required' => 'required',
                          'value' => set_value('valoracio'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Valoracio', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";

            foreach ($consulta->getResultArray() as $row){
              echo form_hidden('id_servei', $row['id_servicio']);
            }

            echo "<br>";
            echo "</div>";

            echo "<input type='submit' class='btn-submit' name='mysubmit' value='Valorar'>";
            // El form close es per tancar el formulari
            echo form_close();

            if(!empty($validation)){
              if($validation->getError('correo')) {
                echo $validation->getError('correo');
                echo "<br>";
              }
            }
          ?>
          </div>
    </div>
  </div>

  <div class="col-12 adaptacio">
    <div class="card-body productes col-6">
      <br>
      <?php
      foreach ($consulta->getResultArray() as $row){

      $ruta = site_url()."marcar";
      $attributes = array ('action' => "marcar", 'enctype' => "multipart/form-data", 'method' => "POST");
      // Form open que serveix per iniciar el formulari
      echo form_open($ruta, $attributes);

      $entrar = 0;

      foreach ($existe->getResultArray() as $row2){
        echo "<div class='partDretaCompra'><button  class='btn btn-primary eric' href='pujaProductes' style='background-color: red !important;'><i class='fa-solid fa-heart-circle-plus'></i></i></button> <a class='btn btn-primary' href='missatges'><i class='fa-solid fa-message'></i> Chat per Comprar</a></div>";
        echo "<div class='partEsquerraCompra'> <a class='btn btn-primary' id='btn-abrir-popup6'><i class='fa-solid fa-comment'></i></i> Valorar Producte</a></div>";
        $entrar = 1;
        echo form_hidden('entra', 'si');
      }

      echo form_hidden('id_servei', $row['id_servicio']);

      if ($entrar == 0) {
        echo "<div class='partEsquerraCompra'> <a class='btn btn-primary' id='btn-abrir-popup6'><i class='fa-solid fa-comment'></i></i> Valorar Producte</a></div>";
        echo "<div class='partDretaCompra'><button class='btn btn-primary' href='pujaProductes'><i class='fa-solid fa-heart-circle-plus'></i></button> <a class='btn btn-primary' href='missatges'><i class='fa-solid fa-message'></i> Chat per Comprar</a></div>";
      }

      echo form_close();

      $path='imgs/'.$row['imagen'].'.png';
      echo "<br>";
      echo "<img src=" . $path . " border='0' width='300'>";
      echo "<h1>".$row['nombre']."</h1>";
      echo "<p class='preuProducte'>".$row['precio']." Euros/h</p>";
      switch ($row['categoria']) {
        case '1':
          echo "<p class='categoriaProducte'>Lampista</p>";
          break;
        case '2':
          echo "<p class='categoriaProducte'>Fuster</p>";
          break;
        case '3':
          echo "<p class='categoriaProducte'>Pintor</p>";
          break;
        case '4':
          echo "<p class='categoriaProducte'>Informatic</p>";
          break;
        case '5':
          echo "<p class='categoriaProducte'>Administratiu</p>";
          break;
        case '6':
          echo "<p class='categoriaProducte'>Jardiner</p>";
          break;
        case '7':
          echo "<p class='categoriaProducte'>Medicina</p>";
          break;
        case '8':
          echo "<p class='categoriaProducte'>Obrers</p>";
          break;
        default:
          echo "<p class='categoriaProducte'>Serveis</p>";
          break;
        }
      echo "<p class='descripcioProducte'>Descripció Producte</p>";
      ?>
      <!-- <div class="partDretaCompra"><a class="btn btn-primary" href="pujaProductes"><i class="fa-solid fa-heart-circle-plus"></i></a> <a class="btn btn-primary" href="pujaProductes"><i class="fa-solid fa-message"></i> Chat per Comprar</a></div> -->
      <?php
      echo "<p>".$row['descripcion']."</p>";
      }
      echo "<div class='partEsquerraCompraExtra'> <a class='btn btn-primary' id='btn-abrir-popup7'><i class='fa-solid fa-comment'></i></i> Valorar Producte</a></div>";

      ?>


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imgs/transparente.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Valoraciones</h5>
        <p>Aqui se pueden ver las valoraciones de los usuarios</p>
      </div>
    </div>
    <?php
            foreach ($existe2->getResultArray() as $row2){
              echo "<div class='carousel-item'>";
              echo "<img src='imgs/transparente.png' class='d-block w-100' alt='...'>";
              echo "<div class='carousel-caption d-none d-md-block'>";
              echo "<h5>". $row2['estrellitas'] ." estrellas</h5>";
              echo "<p>Opinion: ". $row2['valoracion'] ."</p>";
              echo "</div>";
              echo "</div>";
            //   // echo $row2['valoracion'];

            }
          ?>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<br>
<h2>Ubicacio del servei</h2>
    <div id="map" class="map"></div>
    <script type="text/javascript">

      let ultimaCapa;
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([2.096726, 41.544223]),
          zoom: 16
        })
      });
      

if (ultimaCapa) {
        mapa.removeLayer(ultimaCapa);
    }

  //  var posicion1 ={ "longitud":"2.098726" , "latitud":"41.546223", "foto":"imgs/tux.jpg" };
  //   var posicion2 ={ "longitud":"2.098826" , "latitud":"41.545223" ,"foto":"imgs/tux1.jpg"};
    var posicion3 ={ "longitud":"2.099926" , "latitud":"41.545523" ,"foto":"imgs/mark.png"};

   var coordenadas=[]
  //  coordenadas.push(posicion1);
  //  coordenadas.push(posicion2);
    coordenadas.push(posicion3);


    const marcadores = [];
    coordenadas.forEach(coordenada => {
        let marcador = new ol.Feature({
            geometry: new ol.geom.Point(
                ol.proj.fromLonLat([coordenada.longitud, coordenada.latitud])
            ),
        });
        marcador.setStyle(new ol.style.Style({
            image: new ol.style.Icon(({
                src: coordenada.foto,
                crossOrigin: null
            }))
        }));
        marcadores.push(marcador);
    });
    ultimaCapa = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: marcadores,
        }),
    });
    map.addLayer(ultimaCapa);

     
    </script>
      </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
  <!-- Script Global -->
  <script src="Typescript/script.js"></script>
  <script src="..\Typescript/script.js"></script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>