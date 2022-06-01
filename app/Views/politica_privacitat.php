<!doctype html>
<html lang="es">

<head>
  <?php
      $session = session();
  ?>
  <title>InstantJob | Politica de Privacitat</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
  <script src="https://kit.fontawesome.com/0859fc3634.js" crossorigin="anonymous"></script>
</head>

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
          $attributes = array ('action' => "formulari", 'enctype' => "multipart/form-data", 'method' => "POST");
          // Form open que serveix per iniciar el formulari
          echo form_open($ruta, $attributes);
          echo "<div class='input-container'>";

          // ESPECIFICAR ERROR MODIFICAR PARA DISEÑO
          // if(empty($id_cliente)){
          //   $id_cliente = "Coloca el id_cliente";
          // }

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
          // if(!empty($validation)){
          //   if($validation->getError('id_cliente')) {
          //     echo $validation->getError('id_cliente');
          //     echo "<br>";
          //   }
          // }

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
          // if(!empty($validation)){
          //   if($validation->getError('contrasena')) {
          //     echo $validation->getError('contrasena');
          //     echo "<br>";
          //   }
          // }
          echo "<br>";
          echo "<input type='submit' class='btn-submit' name='mysubmit' value='Iniciar Sessio'>";

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
            $attributes = array ('action' => "registrar", 'enctype' => "multipart/form-data", 'method' => "POST");
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

            echo "<input type='submit' class='btn-submit' name='mysubmit' value='Registrar-se'>";

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

  <!-- Titul de la pàgina principal -->
      <div class="politica">
        <br>
        <h1>Política de Privacitat</h1>
        <p>D'acord amb el que estableix el Reglament General de Protecció de Dades, us informem que tractarem les vostres dades personals amb la finalitat de:</p>
        <p>Les dades personals proporcionades es conservaran, mentre es mantingui la relació mercantil, no se sol·licite la supressió per l'interessat, o durant 1 any a partir de la darrera confirmació d'interès, o durant el temps necessari per complir les obligacions legals. L'empresa NO prendrà decisions automatitzades. Les dades no se cediran a tercers llevat dels casos en què hi hagi una obligació legal i els tractarem en base a.</p>
        <p>Així mateix, us informem de la possibilitat d'exercir els drets següents sobre les vostres dades personals: dret d'accés, rectificació, supressió o oblit, limitació, oposició, portabilitat i a retirar el consentiment prestat, per a això podreu enviar un email a: info@instantjob.es</p>
        <p>A més, linteressat pot dirigir-se a lAutoritat de Control en matèria de Protecció de Dades competent per obtenir informació addicional o presentar una reclamació.</p>
      </div>
  
  <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
  <!-- Script Global -->
  <script src="Typescript/script.js"></script>
  <script src="..\Typescript/script.js"></script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
    <?php

if(!empty($validation)){
  if($validation->getError('correo')) {
    echo "<script src='Typescript/errorregister.js'></script>";
    echo "<script src='..\Typescript/errorregister.js'></script>";
  }
}

if(isset( $_SESSION['iniciar'] ) ) {
  echo "<script src='Typescript/bienregister.js'></script>";
  echo "<script src='..\Typescript/bienregister.js'></script>";
  $session = session();
  $session ->destroy();
}


?>

<footer>
  <div class="row">
    <div class="footer-content col-4">
    <a href="index"><img src="./imgs/Logo_InstantJob_Blanca.png" alt="Logo de la pàgina InstantJob"></a>
      <h3>Servei Tècnic</h3>
      <a href="tel:99999999">Tel. 99 999 999</p>
      <a href="mailto:info@instatjob.es">info@instantjob.es</a>
    </div>
    <div class="footer-content col-4">
      <br>
      <h3>Informació Legal</h3>
      <a href="avislegal">Avís Legal</a><br>
      <a href="politicaprivacitat">Política de Privacitat</a><br>
      <a href="politicacookies">Política de Cookies</a>
    </div>
    <!-- Categories que s'agafaran de typescript -->
    <div class="footer-content col-4">
      <br>
      <h3>Contacta amb Nosaltres</h3>
      <a href="index"><img src="./imgs/QR.png" alt="Codi QR per contactar"></a>
    </div>
  </div>
</footer>
<!-- Scripts necesaris -->
  <!-- Bootstrap JavaScript Libraries -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script src="Typescript/script.js"></script>
  <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
  <!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>