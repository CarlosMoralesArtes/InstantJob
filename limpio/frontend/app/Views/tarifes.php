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

<body>
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

  <div class="tarifes col-3">
    <img src="./imgs/imatgePre.png" width="100%" height="150px">
    <p>Vendre productes</p>
    <p>Parlar amb el client</p>
    <br>
    <p>Gratis</p>
    <button class="btn-submit">Colocar</button>
  </div>

  <div class="tarifes col-3">
    <img src="./imgs/imatgePre.png" width="100%" height="150px">
    <p>Vendre productes</p>
    <p>Parlar amb el client</p>
    <p>Posicionar l’anunci</p>
    <p>Anunci distintiu</p>
    <br>
    <p>9,99€</p>
    <button class="btn-submit">Colocar</button>
  </div>

  <div class="tarifes col-3">
    <img src="./imgs/imatgePre.png" width="100%" height="150px">
    <p>Vendre productes</p>
    <p>Parlar amb el client</p>
    <p>Posicionar l’anunci</p>
    <p>Anunci distintiu</p>
    <p>Contador de visites</p>
    <p>Anunci destacat</p>
    <br>
    <p>19,99</p>
    <button class="btn-submit">Colocar</button>
  </div>

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

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>
</html>