<?php
    // Connexio a la base de dadaes
    include 'connexio.php';

    $id_usuari = $_POST["id"];
    $longitud = $_POST["longitud"];
    $latitud = $_POST["latitud"];

    $sql = "UPDATE `cliente` SET `latitud`='$latitud',`logitud`='$longitud' WHERE `id_cliente` = '$id_usuari';";
    $r = mysqli_query($con, $sql);

?>