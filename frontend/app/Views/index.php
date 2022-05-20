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

  <nav class="navInici">
    <div class="header col-1">
      <img src="./imgs/imatgePre.png" width="50px">
    </div>
    <div class="header col-6 form-outline">
      <input id="search-input-sidenav" placeholder="Coloca el servei o categoria que vols trobar" type="search" id="form1" class="form-control buscadorTop" />
    </div>
    <div class="header col-2">
      <a class="registre" onclick="obrir()" id="btn-abrir-popup">Iniciar Sessio / Registrar-se</a>
    </div>
    </div>
    <div class="header col-2">
    <a class="boto" href="pujarProducte">Pujar Producte</a>
    </div>
  </nav>
</head>

<body>
  <div class="overlay" id="overlay">
    <div class="popup" id="popup">
      <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
      <h2 class="title">Iniciar Sessio</h2>
      <p>Completa els camps</p>
      <br>
      <div class="targetaIniciSessio">
        <form>
        <?php

        $ruta = site_url()."/c4morales/home/formulariIniciSessio";
        $attributes = array ('enctype' => "multipart/form-data", 'method' => "post");
        // Form open que serveix per iniciar el formulari
        echo form_open($ruta, $attributes);

        echo form_label('CodiU ');
        echo "<br>";
        // En $data es coloquen els atributs de la pregunta
        $data = array('name' => 'codiU',
                    'type' => '#{type}',
                    'id'  => '#{label}',
                    'value' => set_value('codiU'));
        // En el form input es l'apartat on pots colocar text en el formulari
        echo form_input($data);
        echo "<br>";
        if(!empty($validation)){
          if($validation->getError('codiU')) {
            echo $validation->getError('codiU');
            echo "<br>";
          }
        }
        echo "<div class='bar'></div>";
        echo "<br>";

        echo form_label('Contrasenya ');
        echo "<br>";
        // En $data es coloquen els atributs de la pregunta
        $data = array('name' => 'codiU',
                      'type' => '#{type}',
                      'id'  => '#{label}',
                      'value' => set_value('codiU'));
        // En el form input es l'apartat on pots colocar text en el formulari
        echo form_password($data);
        echo "<br>";
        if(!empty($validation)){
          if($validation->getError('password')) {
            echo $validation->getError('password');
            echo "<br>";
          }
        }
        echo "<br>";
        echo "<div class='bar'></div>";

        // El form submit es per mostrar el boto de enviar
        echo form_submit('mysubmit', 'Enviar');

        // El form close es per tancar el formulari
        echo form_close();
    ?>
          <div class="input-container">
            <input type="#{type}" id="#{label}" required="required"/>
            <label for="#{label}">Usuari</label>
            <div class="bar"></div>
          </div>
          <div class="input-container">
            <input type="#{type}" id="#{label}" required="required"/>
            <label for="#{label}">Contrasenya</label>
            <div class="bar"></div>
          </div>
          </form>
          </div>
        <input type="submit" class="btn-submit" value="Iniciar Sessio">
        <p class="pasarRegistre2">Si no tens un compte <p onclick="obrir2()" id="btn-abrir-popup2" class="pasarRegistre"> Registra’t</p></p>
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
        <form>
        <?php
        ?>
          <div class="input-container">
            <input type="#{type}" id="#{label}" required="required"/>
            <label for="#{label}">Coloca el Nom</label>
            <div class="bar"></div>
          </div>
          <div class="input-container">
            <input type="#{type}" id="#{label}" required="required"/>
            <label for="#{label}">Coloca el Primer Cognom</label>
            <div class="bar"></div>
          </div>
          <div class="input-container">
            <input type="#{type}" id="#{label}" required="required"/>
            <label for="#{label}">Coloca el email</label>
            <div class="bar"></div>
          </div>
          <div class="input-container">
            <input type="#{type}" id="#{label}" required="required"/>
            <label for="#{label}">Coloca la contrasenya</label>
            <div class="bar"></div>
          </div>
          </form>
          </div>
        <input type="submit" class="btn-submit" value="Iniciar Sessio">
        <p class="pasarRegistre2">Ja tens un compte? <p onclick="obrir()" id="btn-abrir-popup2" class="pasarRegistre"> Inicia Sessio</p></p>

      </form>
    </div>
  </div>

  <div class="overlay" id="overlay2">
    <div class="popup" id="popup2">
      <a href="#" id="btn-cerrar-popup2" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
      <h3>Registra't</h3>
      <form action="">
        <div class="contenedor-inputs">
          <input type="text" placeholder="Nom">
          <input type="email" placeholder="Cognoms">
          <input type="number" placeholder="Teléfon">
          <input type="password" placeholder="Contrasenya">
        </div>
        <input type="submit" class="btn-submit" value="Iniciar Sessio">
      </form>
    </div>
  </div>

  <!-- Titul de la pàgina principal -->
    <div class="titol">
      <p>InstantJob, es l’ajuda de creixement rápid per a la teva empresa</p>
      <h1>Benvingut a InstantJob</h1>
      <h2>¿Que estas buscant avui?</h2>
    </div>
  <div class="segonApartat">
    <h2>La benvinguda al estiu</h2>
    <p>Molts serveis a la teva disponibilitat!</p>
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
    <img src="./imgs/imatgePre.png">
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