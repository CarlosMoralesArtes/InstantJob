<!doctype html>
<html lang="en">


<head>
<title>InstantJob | Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Estils de la pagina -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="..\styles.css">
  <!-- Estils de font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <!-- Estils de glider -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">

  <!-- Estils de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0859fc3634.js" crossorigin="anonymous"></script>

</head>

<?php
      $session = session();
      if ($session->get('user')){
          $session->get('id_user');
      } else {
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

  <header>
  <nav class="navInici">
      <div class="header col-1">
        <a href="index"><img src="./imgs/Logo_InstantJob_Blanca.png" alt="Logo de la pagina InstantJob"></a>
      </div>
      <div class="header col-6 form-outline">
        <input id="search-input-sidenav" placeholder="Coloca el servei o categoria que vols trobar" type="search" id="form1" class="form-control buscadorTop" />
      </div>

      <?php
        $session = session();
        if ($session->get('user')){
            echo "<div class='header col-2 separacio'>";
            echo "<div class='dropdown'>";
            echo "<a class='btn btn-light' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fa-solid fa-user'></i> Benvingut ".$_SESSION['user']." 🡓</a>";
            echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
            echo "<a class='dropdown-item' href='configuracio'><i class='fa-solid fa-wrench'></i> El Meu Perfil</a>";
            echo "<form action='clear' method='GET'><input class='btn btn-light' type='submit' value='Finalitzar Sessio' /></form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<div class='header col-2 separacio'><a class='btn btn-light' id='btn-abrir-popup'><i class='fa-solid fa-right-to-bracket'></i> Iniciar Sessio / Registrar-se</a></div>";
        }
      ?>

      </div>
      <div class="header col-2">
      <a class="btn btn-primary" href="pujaProductes"><i class="fa-solid fa-circle-plus"></i> Pujar Producte</a>
      </div>
    </nav>
  </header>

  <!-- Menu de navegació lateral -->
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
        <li>
          <img src="imgs/tarifa.png"></img>
          <span class="tooltip">Tarifes</span>
        </li>
      </a>
      <a href="guardats">
        <li>
          <img src="imgs/guardar.png"></img>
          <span class="tooltip">Guardats</span>
        </li>
      </a>
      <a href="estadistiques">
        <li>
          <img src="imgs/estadistica.png"></img>
          <span class="tooltip">Estadistiques</span>
        </li>
      </a>
      <a href="configuracio">
        <li class="active">
          <img src="imgs/configuracio.png"></img>
          <span class="tooltip">Configuració</span>
        </li>
      </a>
    </ul>
  </nav>

  <br>
  <div class="container">
    <div class="pujarProducteCaixa col-9">
      <div class="card-body">
        <p class="card-title">Dades Actuals</p>
        

        <p class="card-text"></p>
      </div>
    </div>
    <br>
    <div class="pujarProducteCaixa col-9">
      <div class="card-body">
        <p class="card-title">Completa els camps per modificar el perfil</p>
        <div class="configuracio">
        <div class="popupConfiguracio active">
          <div class="targetaIniciSessio">
            <?php
              $ruta = "configuracio";
              $attributes = array ('action' => "formulari", 'enctype' => "multipart/form-data", 'method' => "POST");
              // Form open que serveix per iniciar el formulari
              echo form_open($ruta, $attributes);
              echo "<div class='input-container'>";

              // En $data es coloquen els atributs de la pregunta
              $data = array('name' => 'nombre',
                          'required' => 'required',
                          'type' => 'text',
                          'value' => set_value('nombre'));
              // En el form input es l'apartat on pots colocar text en el formulari
              echo form_input($data);
              echo form_label('Nom', '#{label}');
              echo "<div class='bar'></div>";
              echo "<br>";
              echo "</div>";

              echo form_hidden('id_usuari', $session->get('id_user'));

              echo "<div class='input-container'>";
              // En $data es coloquen els atributs de la pregunta
              $data = array('name' => 'apellidos',
                          'required' => 'apellidos',
                          'type' => 'text',
                          'value' => set_value('apellidos'));
              // En el form input es l'apartat on pots colocar text en el formulari
              echo form_input($data);
              echo form_label('Cognoms', '#{label}');
              echo "<div class='bar'></div>";
              echo "<br>";
              echo "</div>";


              echo "<div class='input-container'>";
              // En $data es coloquen els atributs de la pregunta
              $data = array('name' => 'contrasenya',
                          'required' => 'contrasenya',
                          'type' => 'password',
                          'value' => set_value('contraseya'));
              // En el form input es l'apartat on pots colocar text en el formulari
              echo form_input($data);
              echo form_label('Contrasenya', '#{label}');
              echo "<div class='bar'></div>";
              echo "<br>";
              echo "</div>";

              echo "<br>";
              echo "<small>Les dades s'actualitzen al instant</small>";
              echo "<input type='submit' class='btn-submit' name='mysubmit' value='Modificar Usuari'>";

              // El form close es per tancar el formulari
              echo form_close();
            ?>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
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