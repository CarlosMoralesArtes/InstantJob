<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link rel="stylesheet" href="estilo\style.css">
</head>

<body>

<h1>Iniciar Session</h1>

<?php

$ruta = site_url()."/home/formulariIniciSessio";
$attributes = array ('action' => "formulari", 'enctype' => "multipart/form-data", 'method' => "post");
// Form open que serveix per iniciar el formulari
echo form_open($ruta, $attributes);
form_hidden('username', 'johndoe');
echo form_label('id_cliente ');
        echo "<br>";
        if(empty($id_cliente)){
          $id_cliente = "Coloca el id_cliente";
        }
        // En $data es coloquen els atributs de la pregunta
        $data = array('name' => 'id_cliente',
                    'placeholder' => $id_cliente,
                    'value' => set_value('id_cliente'));
        // En el form input es l'apartat on pots colocar text en el formulari
        echo form_input($data);
        echo "<br>";
        if(!empty($validation)){
          if($validation->getError('id_cliente')) {
            echo $validation->getError('id_cliente');
            echo "<br>";
          }
        }
        echo "<br>";

        echo form_label('contrasena ');
        echo "<br>";
        if(empty($contrasena)){
          $contrasena = "Coloca la contrasena";
        }
        // En $data es coloquen els atributs de la pregunta
        $data = array('name' => 'contrasena',
                    'placeholder' => $contrasena,
                    'value' => set_value('contrasena'));
        // En el form input es l'apartat on pots colocar text en el formulari
        echo form_password($data);
        echo "<br>";
        if(!empty($validation)){
          if($validation->getError('contrasena')) {
            echo $validation->getError('contrasena');
            echo "<br>";
          }
        }
        echo "<br>";
echo form_submit('mysubmit', 'Iniciar!');
echo form_close();


?>

<!-- SCRIPTS -->
<script src="TypeScript\script.js"></script>
<!-- -->

</body>
</html>
