<?php   
    // Header del xml
    header("Content-Type: application/xml");
    // Valors per conectarse a la base de dades mysql
    $servername = "localhost";
    $database = "wikiparaules";
    $username = "root";
    $password = "";
    $con = mysqli_connect($servername, $username, $password, $database);
    
    // Recollida del valor pasat per javascript
    $paraulaPasada = $_POST["buscador"];

    // Select dels valors necesaris
    // $sql = "SELECT * FROM paraules WHERE nombre LIKE '%$paraulaPasada%'";
    $sql = "SELECT * FROM `servicio` WHERE `nombre` LIKE 'Paleontologo y pintor' OR `descripcion` LIKE 'Paleontologo y pintor' OR `categoria` LIKE '2' OR `precio` LIKE '15' OR `horario` LIKE 'Lunes i Martes' OR `dias` LIKE '8h-3h'";
    $r = mysqli_query($con,$sql);

    // Bucle per mostrar totes les opcions
    while($fila = mysqli_fetch_assoc($r)){
        $nombre = $fila["nombre"];
        $descripcion = $fila["descripcion"];
        $elementos_xml[] = "<resposta><nombre>$nombre</nombre><descripcion>".$descripcion."</descripcion></resposta>";
    }
    // Echo que es pasa colocant els tags amb els valors que te dins la variable de elementos_xml
    echo "<resposta>\n".implode("\n", $elementos_xml)."</resposta>";


?>