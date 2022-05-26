<!doctype html>
<html lang="en">

<head>
  <?php
  session_start();

  

  ?>
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



  <!-- Titul de la pàgina principal -->
    <div class="titol">
      <h1>Avís Legal</h1>
      <p class="informacioLegal">En cumplimiento del artículo 10 de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y Comercio Electrónico (LSSICE) a continuación se detallan los datos identificativos de la empresa:<br>
Nombre empresa: InstantJob<br>
Razón social: Eric i Carlos<br>
Email: info@instantjob.es<br>

FINALIDAD DE LA PÁGINA WEB.<br>

Venta de artículos de moda, ropa, complementos, que se encuentran en nuestra tienda online, en nuestra pagina web<br>

El presente aviso legal (en adelante, el «Aviso Legal») regula el uso del sitio web: www.instantjob.es<br>

LEGISLACIÓN.<br>

Con carácter general las relaciones entre 38097223T (InstantJob) con los Usuarios de sus servicios telemáticos, presentes en este sitio web, se encuentran sometidas a la legislación y jurisdicción españolas.<br>

USO Y ACCESO DE USUARIOS.<br>

El Usuario queda informado, y acepta, que el acceso a la presente web no supone, en modo alguno, el inicio de una relación comercial con Eric i Carlos (InstantJob) o cualquiera de sus delegaciones.<br>

PROPIEDAD INTELECTUAL E INDUSTRIAL.<br>

Los derechos de propiedad intelectual del contenido de las páginas web, su diseño gráfico y códigos son titularidad de Eric i Carlos (InstantJob) y, por tanto, queda prohibida su reproducción, distribución, comunicación pública, transformación o cualquier otra actividad que se pueda realizar con los contenidos de sus páginas web ni aun citando las fuentes, salvo consentimiento por escrito de Eric i Carlos (ANUSSKA MODA).<br>

CONTENIDO DE LA WEB Y ENLACES (LINKS).<br>

Eric i Carlos (InstantJob) se reserva el derecho a actualizar, modificar o eliminar la información contenida en sus páginas web pudiendo incluso limitar o no permitir el acceso a dicha información a ciertos usuarios.<br>

Eric i Carlos (InstantJob) no asume responsabilidad alguna por la información contenida en páginas web de terceros a las que se pueda acceder por «links» o enlaces desde cualquier página web propiedad de Eric i Carlos (InstantJob). La presencia de «links» o enlaces en las páginas web de Eric i Carlos (InstantJob) tiene finalidad meramente informativa y en ningún caso supone sugerencia, invitación o recomendación sobre los mismos.</p>
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
</body>
<footer>
  <div class="row">
    <div class="footer-content col-4">
    <a href="index"><img src="./imgs/Logo_InstantJob_Blanca.png" alt="Logo de la pagina InstantJob"></a>
      <h3>Servei Tècnic</h3>
      <p>Tel. 99 999 999</p>
    </div>
    <div class="footer-content col-4">
      <br>
      <h3>Informació Legal</h3>
      <p>Avís Legal</p>
      <p>Política de Privacitat</p>
      <p>Política de Cookies</p>
    </div>
    <!-- Categories que s'agafaran de typescript -->
    <div class="footer-content col-4">
      <br>
      <h3>Contacta amb Nosaltres</h3>
      <a href="index"><img src="./imgs/QR.png" alt="Codi QR per contactar"></a>
    </div>
  </div>
</footer>
</html>