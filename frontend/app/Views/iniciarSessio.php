<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
      body{
        text-align: center;
      }

      form{
        background-color: #0089FF;
        padding: 20px;
        color: white;
      }

      form label{
        text-align: left; 
      }
    </style>
    
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">ShareDocuments</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
              <?php $rutaRegistre = site_url()."/c4morales/home/registrarse"; ?>
                <a class="nav-link active" aria-current="page" href="<?php echo $rutaRegistre; ?>">Registrar-se</a>
              </li>
              <li class="nav-item">
              <?php $rutaIniciarSessio = site_url()."/c4morales/home/iniciarSessio"; ?>
                <a class="nav-link" href="<?php echo $rutaIniciarSessio; ?>">Iniciar Sessio</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <body>
    
    <h1>Inicia Sessio</h1>
    <p>En aquest apartat pots iniciar sessio</p>
    <br>

    <div class="formulariRegistre">
    <?php

        $ruta = site_url()."/c4morales/home/formulariIniciSessio";
        $attributes = array ('enctype' => "multipart/form-data", 'method' => "post");
        // Form open que serveix per iniciar el formulari
        echo form_open($ruta, $attributes);

        echo form_label('CodiU ');
        echo "<br>";
        if(empty($codiU)){
          $codiU = "Coloca el CodiU";
        }
        // En $data es coloquen els atributs de la pregunta
        $data = array('name' => 'codiU',
                    'placeholder' => $codiU,
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
        echo "<br>";

        echo form_label('Contrasenya ');
        echo "<br>";
        if(empty($password)){
          $password = "Coloca la contrasenya";
        }
        // En $data es coloquen els atributs de la pregunta
        $data = array('name' => 'password',
                    'placeholder' => $password,
                    'value' => set_value('password'));
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

        // El form submit es per mostrar el boto de enviar
        echo form_submit('mysubmit', 'Enviar');

        // El form close es per tancar el formulari
        echo form_close();
    ?>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>