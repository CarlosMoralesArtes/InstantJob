<!doctype html>
<html lang="en">

<head>
  <title>InstantJob | Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="..\styles.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <header>
  <nav class="navInici">
      <div class="header col-1">
        <a href="home"><img src="./imgs/Logo_InstantJob_Blanca.png" width="50px"></a>
      </div>
      <div class="header col-6 form-outline">
        <input id="search-input-sidenav" placeholder="Coloca el servei o categoria que vols trobar" type="search" id="form1" class="form-control buscadorTop" />
      </div>
      <div class="header col-2">
        <a class="btn btn-light" id="btn-abrir-popup">Iniciar Sessio / Registrar-se</a>
      </div>
      </div>
      <div class="header col-2">
      <a class="btn btn-primary" href="pujaProductes">Pujar Producte</a>
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
        $ruta = "home/formulariIniciSessio";
        $attributes = array ('action' => "formulari", 'enctype' => "multipart/form-data", 'method' => "post");
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
            $ruta = site_url()."/home/formulari";
            $attributes = array ('action' => "formulari", 'enctype' => "multipart/form-data", 'method' => "post");
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
          ?>
          </div>
    </div>
  </div>



  <!-- Titul de la pàgina principal -->
    <div class="titol">
      <p>InstantJob, es l’ajuda de creixement rápid per a la teva empresa</p>
      <h1>Benvingut a InstantJob</h1>
      <div class="container">
        <div class="row">
          <div class="col s12">
            <h2 class="center-align">¿Que estas buscant avui?</h2>
            <br>
          <div class="carousel">
            <div class="carousel__contenedor">
              <button aria-label="Anterior" class="carousel__anterior">
                <i class="fas fa-chevron-left"></i>
              </button>
              <br>
              <div class="carousel__lista">
                <div class="carousel__elemento">
                  <img src="imgs/fontaneriaBlau.png" alt="Rock and Roll Hall of Fame">
                  <p>Fontaneria</p>
                </div>
                <div class="carousel__elemento">
                  <img src="imgs/carpinteria.png" alt="Constitution Square - Tower I">
                  <p>Carpinteria</p>
                </div>
                <div class="carousel__elemento">
                  <img src="imgs/pintor.png" alt="Empire State Building">
                  <p>Pintor</p>
                </div>
                <div class="carousel__elemento">
                  <img src="imgs/5.png" alt="Harmony Tower">
                  <p>Harmony Tower</p>
                </div>
        
                <div class="carousel__elemento">
                  <img src="imgs/6.png" alt="Empire State Building">
                  <p>Empire State Building</p>
                </div>
                <div class="carousel__elemento">
                  <img src="imgs/7.png" alt="Harmony Tower">
                  <p>Harmony Tower</p>
                </div>
                <div class="carousel__elemento">
                  <img src="imgs/8.png" alt="Empire State Building">
                  <p>Empire State Building</p>
                </div>
                <div class="carousel__elemento">
                  <img src="imgs/9.png" alt="Harmony Tower">
                  <p>Harmony Tower</p>
                </div>
              </div>

              <button aria-label="Siguiente" class="carousel__siguiente">
                <i class="fas fa-chevron-right"></i>
              </button>
            </div>

            <div role="tablist" class="carousel__indicadores"></div>
          </div>
          </div>
        </div>
      </div>
    </div>
  <div class="segonApartat">
    <h2>La benvinguda al estiu</h2>
    <p>Molts serveis a la teva disponibilitat!</p>
    <br>
    <div class="serveiSeparat2 col-6" style="width: 18rem;">
      <img src="./imgs/imatgePre.png" width="100%" height="150px">
      <div class="card-body">
        <p class="card-title">Carpinteria</p>
        <p class="card-title">Número</p>
        <p class="card-text"></p>
      </div>
    </div>
    <div class="serveiSeparat col-6" style="width: 18rem;">
      <img src="./imgs/imatgePre.png" width="100%" height="150px">
      <div class="card-body">
        <p class="card-title">Fontaneria</p>
        <p class="card-title">Número</p>
        <p class="card-text"></p>
      </div>
    </div>
    <h2>Productes destacats del moment</h2><br>
    <div class="serveiSeparat2 col-4" style="width: 18rem;">
      <img src="./imgs/imatgePre.png" width="100%" height="150px">
      <div class="card-body">
        <p class="card-title">Fontaneria</p>
        <p class="card-title">Número</p>
        <p class="card-text"></p>
      </div>
    </div>
    <div class="serveiSeparat col-4" style="width: 18rem;">
      <img src="./imgs/imatgePre.png" width="100%" height="150px">
      <div class="card-body">
        <p class="card-title">Fontaneria</p>
        <p class="card-title">Número</p>
        <p class="card-text"></p>
      </div>
    </div>
    <div class="serveiSeparat col-4" style="width: 18rem;">
      <img src="./imgs/imatgePre.png" width="100%" height="150px">
      <div class="card-body">
        <p class="card-title">Fontaneria</p>
        <p class="card-title">Número</p>
        <p class="card-text"></p>
      </div>
    </div>
    <br>
    <div class="serveiSeparat2 col-4" style="width: 18rem;">
      <img src="./imgs/imatgePre.png" width="100%" height="150px">
      <div class="card-body">
        <p class="card-title">Fontaneria</p>
        <p class="card-title">Número</p>
        <p class="card-text"></p>
      </div>
    </div>
    <div class="serveiSeparat col-4" style="width: 18rem;">
      <img src="./imgs/imatgePre.png" width="100%" height="150px">
      <div class="card-body">
        <p class="card-title">Fontaneria</p>
        <p class="card-title">Número</p>
        <p class="card-text"></p>
      </div>
    </div>
    <div class="serveiSeparat col-4" style="width: 18rem;">
      <img src="./imgs/imatgePre.png" width="100%" height="150px">
      <div class="card-body">
        <p class="card-title">Fontaneria</p>
        <p class="card-title">Número</p>
        <p class="card-text"></p>
      </div>
    </div>
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
</body>
<footer>
  <div class="footer-content col-4">
    <img src="./imgs/Logo_InstantJob_Blanca.png">
    <p>Servei Tècnic</p>
    <p>Tel. 99 999 999</p>
  </div>
  <div class="footer-content col-4">
    <p>Informació Legal</p>
    <p>Avís Legal</p>
    <p>Política de Privacitat</p>
    <p>Política de Cookies</p>
  </div>
  <!-- Categories que s'agafaran de typescript -->
  <div class="footer-content col-3">
    <p>Categories</p>
    <p>Avís Legal</p>
    <p>Política de Privacitat</p>
    <p>Política de Cookies</p>
  </div>
</footer>
</html>