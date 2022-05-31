<!doctype html>
<html lang="en">


<head>
  <title>InstantJob | Pujar Productes</title>
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

<body id="<?php echo $session->get('id_user')?>" onclick="recollirUbicacio(this.id)">
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
        <!-- Boto per anar al apartat de pujar productes -->
        <div class="header col-2">
        <a class="btn btn-primary" href="pujaProductes"><i class="fa-solid fa-circle-plus"></i> Pujar Producte</a>
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
      <a href="modificarProductes">
        <li>
          <img src="imgs/lista.png"></img>
          <span class="tooltip">Els meus Serveis</span>
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

  <div class="container">
    <div class="pujarProducteCaixa col-9">
      <div class="card-body">
        <p class="card-title">Que vas a pujar?</p>
        <p class="card-title">Selecciona la categoria</p>
        <img id="1" src="imgs/fontaneriaTransparent.png" alt="Categoria de lampista" onclick="ImatgeSeleccionada(this.id)">
        <img id="2" src="imgs/carpinteriaTransparent.png" alt="Categoria de fuster" onclick="ImatgeSeleccionada(this.id)">
        <img id="3" src="imgs/pintorTransparent.png" alt="Categoria de pintors" onclick="ImatgeSeleccionada(this.id)">
        <img id="4" src="imgs/informatic.png" alt="Categoria d'informatic" onclick="ImatgeSeleccionada(this.id)">
        <img id="5" src="imgs/administratiu.png" alt="Categoria d'administratiu" onclick="ImatgeSeleccionada(this.id)">
        <img id="6" src="imgs/jardiner.png" alt="Categoria de jardiners" onclick="ImatgeSeleccionada(this.id)">
        <img id="7" src="imgs/medicina.png" alt="Categoria de medicina" onclick="ImatgeSeleccionada(this.id)">
        <img id="8" src="imgs/obrer.png" alt="Categoria d'obrers" onclick="ImatgeSeleccionada(this.id)">

        <p class="card-text"></p>
      </div>
    </div>
    <br>
    <div class="pujarProducteCaixa col-9">
      <div class="card-body">
        <p class="card-title">Completa els camps per modificar el perfil</p>
        <div class="configuracio">
        <div class="popupConfiguracio active">
          <div class="targetaConfiguracio">
            <?php
              $ruta = "pujar";
              $attributes = array ('action' => "pujar", 'enctype' => "multipart/form-data", 'method' => "POST");
              // Form open que serveix per iniciar el formulari
              echo form_open($ruta, $attributes);

              // En $data es coloquen els atributs de la pregunta
              $data = array('name' => 'fitxer',
                            'value' => set_value('userfile'),
                            'class' => 'pujarProductes');
              // En el form input es l'apartat on pots colocar text en el formulari
              echo form_label('Imatge de protada del servei', '#{label}');
              echo form_upload($data);

              if ($_GET['w1']) {
                echo $_GET['w1'];
                echo form_hidden('categoria', $_GET['w1']);
              }else{
                echo form_hidden('categoria', 0);
              }

              echo "<div class='input-container'>";
              // En $data es coloquen els atributs de la pregunta
              $data = array('name' => 'nombre',
                          'required' => 'required',
                          'type' => 'text',
                          'value' => set_value('nombre'));
              // En el form input es l'apartat on pots colocar text en el formulari
              echo form_input($data);
              echo form_label('Titol Servei', '#{label}');
              echo "<div class='bar'></div>";
              echo "<br>";
              echo "</div>";


              echo "<div class='input-container'>";
              // En $data es coloquen els atributs de la pregunta
              $data = array('name' => 'precio',
                          'required' => 'precio',
                          'type' => 'text',
                          'value' => set_value('precio'));
              // En el form input es l'apartat on pots colocar text en el formulari
              echo form_input($data);
              echo form_label('Precio', '#{label}');
              echo "<div class='bar'></div>";
              echo "<br>";
              echo "</div>";

              echo "<div class='input-container'>";
              // En $data es coloquen els atributs de la pregunta
              $data = array('name' => 'descripcion',
                          'required' => 'descripcion',
                          'type' => 'text',
                          'value' => set_value('descripcion'));
              // En el form input es l'apartat on pots colocar text en el formulari
              echo form_input($data);
              echo form_label('Descripció', '#{label}');
              echo "<div class='bar'></div>";
              echo "<br>";
              echo "</div>";

              echo "<div class='input-container'>";
              // En $data es coloquen els atributs de la pregunta
              $data = array('name' => 'horario',
                          'required' => 'horario',
                          'type' => 'text',
                          'value' => set_value('horario'));
              // En el form input es l'apartat on pots colocar text en el formulari
              echo form_input($data);
              echo form_label('Horari (Ex: Dilluns-Divendres, Dilluns-Dimecres...)', '#{label}');
              echo "<div class='bar'></div>";
              echo "<br>";
              echo "</div>";

              echo "<div class='input-container'>";
              // En $data es coloquen els atributs de la pregunta
              $data = array('name' => 'dias',
                          'required' => 'dias',
                          'type' => 'text',
                          'value' => set_value('dias'));
              // En el form input es l'apartat on pots colocar text en el formulari
              echo form_input($data);
              echo form_label('Dies (Ex: De 8h a 12h)', '#{label}');
              echo "<div class='bar'></div>";
              echo "<br>";
              echo "</div>";

              echo "<div class='preguntes'>";

              $data = array(
                'name'          => 'findes',
                'id'            => 'findes',
                'value'         => 'accept',
                'checked'       => FALSE,
                'style'         => 'margin:10px'
              );
              echo form_label('Treballes els caps de setmana?', '#{label}');
              echo form_checkbox($data);

              $data = array(
                'name'          => '24h',
                'id'            => '24h',
                'value'         => 'accept',
                'checked'       => FALSE,
                'style'         => 'margin:10px'
              );
              echo form_label('Treballes 24h?', '#{label}');
              echo form_checkbox($data);

              echo "</div>";

              echo "<br>";

              echo "<input type='submit' class='btn-submit' name='mysubmit' value='Pujar Producte'>";

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