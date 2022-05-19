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
$attributes = array ('enctype' => "multipart/form-data", 'method' => "post");
// Form open que serveix per iniciar el formulari
echo form_open($ruta, $attributes);
form_hidden('username', 'johndoe');
echo form_label('Usuario', 'username');
echo form_input('username', '');
echo("<br>");
echo form_label('Contraseña', 'pass');
echo form_input('pass', '');
echo("<br>");
echo form_submit('mysubmit', 'Iniciar!');
echo form_close();


?>

<!-- SCRIPTS -->
<script src="TypeScript\script.js"></script>
<!-- -->

</body>
</html>
