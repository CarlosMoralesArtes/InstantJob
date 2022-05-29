<?php   
    // Header del xml
    header("Content-Type: application/xml");
    // Valors per conectarse a la base de dades mysql
    $servername = "localhost";
    $database = "final";
    $username = "root";
    $password = "";
    $con = mysqli_connect($servername, $username, $password, $database);
    
    // Recollida del valor pasat per javascript
    $paraulaPasada = $_POST["paraulaPasada"];

   // Select dels valors necesaris
   $sql = "SELECT * FROM `servicio` WHERE `nombre` LIKE '%$paraulaPasada%' OR `descripcion` LIKE '%$paraulaPasada%' OR `precio` LIKE '%$paraulaPasada%' OR `horario` LIKE '%$paraulaPasada%' OR `dias` LIKE '%$paraulaPasada%'";
   $r = mysqli_query($con,$sql);

   // Bucle per mostrar totes les opcions
   while($fila = mysqli_fetch_assoc($r)){
       $nombre = $fila["nombre"];
       $id_servicio = $fila["id_servicio"];
       $elementos_xml[] = "<resposta><nombre>$nombre</nombre><id_servicio>".$id_servicio."</id_servicio></resposta>";
   }
   // Echo que es pasa colocant els tags amb els valors que te dins la variable de elementos_xml
   echo "<resposta>\n".implode("\n", $elementos_xml)."</resposta>";

?>