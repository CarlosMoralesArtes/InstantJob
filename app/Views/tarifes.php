<!doctype html>
<html lang="en">

<head>
  <title>InstantJob | Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <script src="Typescript/script.js"></script>

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
    $session = session();
    if ($session->get('user')){
    } else {
      header("Location: ./index");
      die();
    }
?>

<body>

  <!-- Apartat de la carrega de la pàgina -->
  <div id="contenedor_carga">
    <div id="carga"></div>
  </div>

  <nav class="navInici">
    <div class="header col-1">
    <a href="index"><img src="./imgs/Logo_InstantJob_Blanca.png" alt="Logo de la pagina InstantJob" width="50px"></a>
    </div>
    <div class="header col-6 form-outline">
      <input id="search-input-sidenav" placeholder="Coloca el servei o categoria que vols trobar" type="search" id="form1" class="form-control buscadorTop" />
    </div>

    <?php
        $session = session();
        if ($session->get('user')){
            echo "<div class='header col-2 separacio'>";
            // echo "<p>".$_SESSION['user']."</p>";
            echo("<form action='clear' method='GET'><input class='btn btn-light' type='submit' value='Finalitzar Sessio' /></form>");
            echo "</div>";
        }else {
            echo "<div class='header col-2 separacio'><a class='btn btn-light' id='btn-abrir-popup'>Iniciar Sessio / Registrar-se</a></div>";
        }
      ?>
      
    </div>
    <div class="header col-2">
    <a class="btn btn-primary" href="pujaProductes">Pujar Producte</a>
    </div>
  </nav>
<div class="overlay" id="overlay">
    <div class="popup" id="popup">
      <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
      <h2 class="title">Iniciar Sessio</h2>
      <p>Completa els camps</p>
      <br>
      <div class="targetaIniciSessio">
        <?php
        $ruta = site_url()."/c4morales/home/formulariIniciSessio";
        $attributes = array ('enctype' => "multipart/form-data", 'method' => "post");
        // Form open que serveix per iniciar el formulari
        echo form_open($ruta, $attributes);
        echo "<div class='input-container'>";
        // En $data es coloquen els atributs de la pregunta
        $data = array('name' => 'usuari',
                      'type' => '#{type}',
                      'id'  => '#{label}',
                      'required' => 'required',
                      'value' => set_value('usuari'));
        // En el form input es l'apartat on pots colocar text en el formulari
        echo form_input($data);
        echo form_label('Usuari', '#{label}');
        echo "<div class='bar'></div>";
        echo "<br>";
        echo "</div>";
        if(!empty($validation)){
          if($validation->getError('usuari')) {
            echo $validation->getError('usuari');
            echo "<br>";
          }
        }

        echo "<div class='input-container'>";
        // En $data es coloquen els atributs de la pregunta
        $data = array('name' => 'contrasenya',
                      'type' => '#{type}',
                      'id'  => '#{label}',
                      'required' => 'required',
                      'value' => set_value('contrasenya'));
        // En el form input es l'apartat on pots colocar text en el formulari
        echo form_input($data);
        echo form_label('Contrasenya', '#{label}');
        echo "<div class='bar'></div>";
        echo "<br>";
        echo "</div>";
        if(!empty($validation)){
          if($validation->getError('contrasenya')) {
            echo $validation->getError('contrasenya');
            echo "<br>";
          }
        }
        echo "<br>";
        echo "<input type='submit' class='btn-submit' value='Iniciar Sessio'>";

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
            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'nom',
                          'type' => '#{type}',
                          'id'  => '#{label}',
                          'required' => 'required',
                          'value' => set_value('nom'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Nom', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";
            if(!empty($validation)){
              if($validation->getError('nom')) {
                echo $validation->getError('nom');
                echo "<br>";
              }
            }
    
            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'primerCognom',
                          'type' => '#{type}',
                          'id'  => '#{label}',
                          'required' => 'required',
                          'value' => set_value('primerCognom'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Primer Cognom', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";
            if(!empty($validation)){
              if($validation->getError('primerCognom')) {
                echo $validation->getError('primerCognom');
                echo "<br>";
              }
            }

            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'email',
                          'type' => '#{type}',
                          'id'  => '#{label}',
                          'required' => 'required',
                          'value' => set_value('email'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Email', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";
            if(!empty($validation)){
              if($validation->getError('email')) {
                echo $validation->getError('email');
                echo "<br>";
              }
            }
    
            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'contrasenya',
                          'type' => '#{type}',
                          'id'  => '#{label}',
                          'required' => 'required',
                          'value' => set_value('contrasenya'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo form_label('Contrasenya', '#{label}');
            echo "<div class='bar'></div>";
            echo "<br>";
            echo "</div>";
            if(!empty($validation)){
              if($validation->getError('contrasenya')) {
                echo $validation->getError('contrasenya');
                echo "<br>";
              }
            }

            echo "<br>";

            echo "<input type='submit' class='btn-submit' value='Registrar-se'>";
            
            // El form close es per tancar el formulari
            echo form_close();
          ?>
          </div>
    </div>
  </div>

  <nav class="sidebar-navigation">
	<ul>
    <a href="pujaProductes">
      <li>
        <img src="imgs/pujar.png"></img>
        <span class="tooltip">Pujar Productes</span>
      </li>
    </a>
    <a href="serveis">
      <li>
        <img src="imgs/hand-shake.png"></img>
        <span class="tooltip">Serveis</span>
      </li>
    </a>
    <a href="missatges">
      <li>
        <img src="imgs/missage.png"></img>
        <span class="tooltip">Missatges</span>
      </li>
    </a>
    <a href="tarifes">
      <li class="active">
        <img src="imgs/tarifa.png"></img>
        <span class="tooltip">Tarifes</span>
      </li>
    </a>
    <a href="#">
      <li>
        <img src="imgs/guardar.png"></img>
        <span class="tooltip">Guardats</span>
      </li>
    </a>
    <a href="#">
      <li>
        <img src="imgs/estadistica.png"></img>
        <span class="tooltip">Estadistiques</span>
      </li>
    </a>
    <a href="#">
      <li>
        <img src="imgs/configuracio.png"></img>
        <span class="tooltip">Configuració</span>
      </li>
    </a>
	</ul>
</nav>
<br>
<div class="row tarifaCentrada">
  <div class="tarifes col-3">
    <img src="./imgs/Tarifa_Basica.png" width="100%" height="150px">
    <p>Vendre productes</p>
    <p>Parlar amb el client</p>
    <br>
    <div class="botoTarifa">
      <p>Gratis</p>
      <button class="btn-submit">Comprar</button>
    </div>
  </div>

  <div class="tarifes col-3">
    <img src="./imgs/Tarifa_Advanced.png" width="100%" height="150px">
    <p>Vendre productes</p>
    <p>Parlar amb el client</p>
    <p>Posicionar l’anunci</p>
    <p>Anunci distintiu</p>
    <br>
    <div class="botoTarifa">
      <p>9,99€</p>
      <button class="btn-submit">Comprar</button>
    </div>
  </div>

  <div class="tarifes col-3">
    <img src="./imgs/Tarifa_Enterprise.png" width="100%" height="150px">
    <p>Vendre productes</p>
    <p>Parlar amb el client</p>
    <p>Posicionar l’anunci</p>
    <p>Anunci distintiu</p>
    <p>Contador de visites</p>
    <p>Anunci destacat</p>
    <br>
    <div class="botoTarifa">
      <p>19,99€</p>
      <button class="btn-submit">Comprar</button>
    </div>
  </div>
</div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>
</html>