<!doctype html>
<html lang="en">


<head>
  <title>InstantJob | Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

</head>

<?php
      $session = session();
      if ($session->get('user')){
        // $userName = $session->get('codiU');
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
        } else {
            echo "<div class='header col-2 separacio'><a class='btn btn-light' id='btn-abrir-popup'>Iniciar Sessio / Registrar-se</a></div>";
        }
      ?>
      
      </div>
      <div class="header col-2">
      <a class="btn btn-primary" href="pujaProductes">Pujar Producte</a>
      </div>
    </nav>
  </header>

  <!-- Menu de navegació lateral -->
  <nav class="sidebar-navigation">
    <ul>
      <a href="pujaProductes">
        <li class="active">
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
        <li>
          <img src="imgs/configuracio.png"></img>
          <span class="tooltip">Configuració</span>
        </li>
      </a>
    </ul>
  </nav>

  <br>

  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
  <div class="container">
    <div class="pujarProducteCaixa col-9">
      <div class="card-body">
        <p class="card-title">Que vas a pujar?</p>
        <p class="card-title">Selecciona la categoria</p>
        <img id="imatgeCategoria1" src="imgs/fontaneriaTransparent.png" alt="Categoria de lampista" onclick="ImatgeSeleccionada(this.id)">
        <img id="imatgeCategoria2" src="imgs/carpinteriaTransparent.png" alt="Categoria de fuster" onclick="ImatgeSeleccionada(this.id)">
        <img id="imatgeCategoria3" src="imgs/pintorTransparent.png" alt="Categoria de pintors" onclick="ImatgeSeleccionada(this.id)">
        <img id="imatgeCategoria4" src="imgs/informatic.png" alt="Categoria d'informatic" onclick="ImatgeSeleccionada(this.id)">
        <img id="imatgeCategoria5" src="imgs/administratiu.png" alt="Categoria d'administratiu" onclick="ImatgeSeleccionada(this.id)">
        <img id="imatgeCategoria6" src="imgs/jardiner.png" alt="Categoria de jardiners" onclick="ImatgeSeleccionada(this.id)">
        <img id="imatgeCategoria7" src="imgs/medicina.png" alt="Categoria de medicina" onclick="ImatgeSeleccionada(this.id)">
        <img id="imatgeCategoria8" src="imgs/obrer.png" alt="Categoria d'obrers" onclick="ImatgeSeleccionada(this.id)">

        <p class="card-text"></p>
      </div>
    </div>
    <br>
    <div class="pujarProducteCaixa col-9">
      <div class="card-body">
        <p class="card-title">Informació Básica</p>
        <p class="card-title">Completa els camps</p>
        <br>
        <?php
            $ruta = "iniciar";
            echo form_label('Coloca una imatge del servei', '#{label}');
            $attributes = array ('action' => "formulari", 'enctype' => "multipart/form-data", 'method' => "GET");
            // Form open que serveix per iniciar el formulari
            echo form_open($ruta, $attributes);
            echo "<div class='input-container'>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'fitxer',
                          'value' => set_value('userfile'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_upload($data);
    
            echo "<div class='input-container'>";
            echo form_label('Nom del Servei', '#{label}');
            echo "<br>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'nomTreball',
                          'type' => '#{type}',
                          'id'  => '#{label}',
                          'required' => 'required',
                          'value' => set_value('nomTreball'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo "<br>";
            echo "</div>";
            if(!empty($validation)){
              if($validation->getError('nomTreball')) {
                echo $validation->getError('nomTreball');
                echo "<br>";
              }
            }

            echo "<div class='input-container'>";
            echo form_label('Preu del Servei', '#{label}');
            echo "<br>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'preuTreball',
                          'type' => '#{type}',
                          'id'  => '#{label}',
                          'required' => 'required',
                          'value' => set_value('preuTreball'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data);
            echo "<br>";
            echo "</div>";
            if(!empty($validation)){
              if($validation->getError('preuTreball')) {
                echo $validation->getError('preuTreball');
                echo "<br>";
              }
            }

            echo form_label('Temps', '#{label}');
            echo "<br>";
            // En $data es coloquen els atributs de la pregunta
            $data = array('name' => 'Temps',
                          'type' => '#{type}',
                          'id'  => '#{label}',
                          'required' => 'required',
                          'value' => set_value('Temps'));
            // En el form input es l'apartat on pots colocar text en el formulari
            echo form_input($data); 
            echo "<br>";
            echo "</div>";
            if(!empty($validation)){
              if($validation->getError('Temps')) {
                echo $validation->getError('Temps');
                echo "<br>";
              }
            }

            echo "<input type='submit' class='btn-primary' name='mysubmit' value='Pujar Producte'>";
            
            // El form close es per tancar el formulari
            echo form_close();
          ?>
        <p class="card-text"></p>
    </div>
  </div>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script src="Typescript/script.js"></script>
  <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
  <!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>
</html>