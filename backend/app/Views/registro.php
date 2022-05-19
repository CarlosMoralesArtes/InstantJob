<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
      if (!isset($_SESSION['codiU'])) {
          header('location: login.php');
      }
    ?>
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <br>
  <body>
    <h1>Registrat</h1>
    <p>En aquest apartat pots registrarte</p>
    <br>

    <div class="formulariRegistre">
    <?php

        $ruta = site_url()."/c4morales/home/formulari";
        $attributes = array ('action' => "formulari", 'enctype' => "multipart/form-data", 'method' => "post");
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

        echo form_label('Repiteix la Contrasenya ');
        echo "<br>";
        if(empty($repcontrasenya)){
          $repcontrasenya = "Coloca la contrasenya";
        }
        // En $data es coloquen els atributs de la pregunta
        $data = array('name' => 'repcontrasenya',
                    'placeholder' => $repcontrasenya,
                    'value' => set_value('repcontrasenya'));
        // En el form input es l'apartat on pots colocar text en el formulari
        echo form_password($data);
        echo "<br>";
        if(!empty($validation)){
          if($validation->getError('repcontrasenya')) {
            echo $validation->getError('repcontrasenya');
            echo "<br>";
          }
        }
        echo "<br>";

        echo form_label('Correu ');
        echo "<br>";
        if(empty($correu)){
          $correu = "exemple@exemple.com";
        }
        // En $data es coloquen els atributs de la pregunta
        $data = array('name' => 'correu',
                    'placeholder' => $correu,
                    'value' => set_value('correu'));
        // En el form input es l'apartat on pots colocar text en el formulari
        echo form_input($data);
        echo "<br>";
        if(!empty($validation)){
          if($validation->getError('correu')) {
            echo $validation->getError('correu');
            echo "<br>";
          }
        }
        echo "<br>";

        echo form_label('Telefon ');
        echo "<br>";
        if(empty($telefon)){
          $telefon = "622222222";
        }
        // En $data es coloquen els atributs de la pregunta
        $data = array('name' => 'telefon',
                    'placeholder' => $telefon,
                    'value' => set_value('telefon'));
        // En el form input es l'apartat on pots colocar text en el formulari
        echo form_input($data);
        echo "<br>";
        if(!empty($validation)){
          if($validation->getError('telefon')) {
            echo $validation->getError('telefon');
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