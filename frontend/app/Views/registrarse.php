<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
      input{
        width: 100%;
        padding: 7px;
        border-radius: 5px;
        border: 1px solid black;
        background-color: transparent;
        margin-top: 10px;
        margin-bottom: 10px;
        text-align: center;
      }

      button{
        width: 100%;
        text-align: center;
        align-items: flex-start;
        padding: 7px;
        border-radius: 5px;
        border: 1px solid black;
        background-color: transparent;
        margin-top: 10px;
      }

      button:hover{
        background-color: cyan;
        transition: 0.3s;
      }

      input:hover{
        background-color: cyan;
        transition: 0.3s;
      }

      h1{
        text-align: center;
        font-size: 30px;
        margin-bottom: 20px;
        margin-top: 20px;
      }

      p{
        text-align: center;
      }

      form{
        text-align: center;
      }
    </style>

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
            <li class="nav-item">
            <?php $rutaLogout = site_url()."/c4morales/home/logout"; ?>
              <a class="nav-link" href="<?php echo $rutaLogout; ?>">Tancar Sessio</a>
            </li>
            <li class="nav-item">
          </ul>
        </div>
      </div>
    </nav>
  <body>
    <div class="container">
    <h1>Pujar un arxiu</h1>
    <?php

        $session = session();
        if ($session->get('codiU')){
          $userName = $session->get('codiU');
        } else {
          $localitzacio = site_url()."/c4morales/home/iniciarSessio";
          header("Location: $localitzacio");
          die();
        }

        echo "Usuari actual: " . $userName;

        $ruta = site_url()."/c4morales/home/pujarFitxer";
        $attributes = array ('action' => "pujarFitxer", 'enctype' => "multipart/form-data", 'method' => "post");
        // Form open que serveix per iniciar el formulari
        echo form_open($ruta, $attributes);
        
        $data = [
            'codiU'  => $userName,
        ];

        echo form_hidden('codiUsuari', $data);

        echo form_label('Pots pujar cualsevol tipus de arxiu');
        echo "<br>";
        echo "<br>";
        // En $data es coloquen els atributs de la pregunta
        $data = array('name' => 'fitxer',
                      'value' => set_value('userfile'));
        // En el form input es l'apartat on pots colocar text en el formulari
        echo form_upload($data);

        echo "<br>";
        echo "<br>";

        // El form submit es per mostrar el boto de enviar
        echo form_submit('mysubmit', 'Enviar');

        // El form close es per tancar el formulari
        echo form_close();
    ?>
    <br>
    <?php
        $ruta = site_url()."/c4morales/home/mostrarArxius";
        $attributes = array ('action' => "mostrarArxius", 'enctype' => "multipart/form-data", 'method' => "post");
        // Form open que serveix per iniciar el formulari
        echo form_open($ruta, $attributes);
        
        $data2 = [
            'codiUsuariMostrar'  => $userName,
        ];

        echo form_hidden('codiUsuariMostrar', $data2);

        // El form submit es per mostrar el boto de enviar
        echo form_submit('mysubmit', 'Clica aqui per Mostrar la taula.');

        // El form close es per tancar el formulari
        echo form_close();
    ?>

    <?php
      if(!empty($propietats)){
          echo "<strong>Nom del arxiu: </strong>" . $propietats["nomF"] . ", ";
          echo "<strong>Tipus de arxiu: </strong>" . $propietats["tipusF"] . ", ";
          echo "<strong>Data de pujada: </strong>" . $propietats["data"] . ", ";
          echo "<strong>Usuari Propietari: </strong>" . $propietats["codiU"] . ".";
          $contador = 0;
          if(!empty($usuarisComp)){
            echo "<strong>Usuaris amb qui s'ha compartit </strong>";
            foreach ($usuarisComp as $fila2 => $value2) {
              if($value2['codiF'] == $propietats['codiF']){
                $contador++;
              }
            }
            if($contador == 0){
              echo " <strong>No s'ha compartit amb ningú aquest fitxer.</strong>";
            } else {
              foreach ($usuarisComp as $fila => $value) {
                if($value['codiF'] == $propietats['codiF']){
                  echo $value['codiUC'] . ", ";
                }
                if($contador == 0){
                  echo " <strong>No s'ha compartit amb ningú aquest fitxer.</strong>";
                }
              }
            }
          } else {
            echo " <strong>No s'ha compartit amb ningú aquest fitxer.</strong>";
          }
      }
    ?>

    <h1>Arxius propis</h1>
    <p>Únicament pots descarregar els productes que estiguin pujats al servidor.</p>  
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Nom Arxiu</th>
        <th scope="col">Usuari Pripietari</th>
        <th scope="col">Interaccions</th>
        </tr>
    </thead>
    <tbody>
        <?php
          if(!empty($consulta)){
            $download = site_url()."/c4morales/home/download";
            $compartir = site_url()."/c4morales/home/redireccionarMostraUsuaris";
            $esborrar = site_url()."/c4morales/home/esborrar";
            $propietats = site_url()."/c4morales/home/propietats";
            foreach ($consulta as $fila => $value) {
            ?>
            <tr>
              <td> <?=$value['nomF'];?> </td>
              <td> <?=$value['codiU'];?> </td>
              <td>
                <?php
                    $path='../../../../uploads/'.$value['nomRandom'].'.'.$value['tipusF'];
                    echo "<a href=$path><button>Descarregar</button></a>";
                ?>
                <?php 
                      $attributes = array ('action' => "compartir", 'enctype' => "multipart/form-data", 'method' => "post");
                      // Form open que serveix per iniciar el formulari
                      echo form_open($compartir, $attributes);

                      echo form_hidden('codiF', $value['codiF']);
                      
                      // El form submit es per mostrar el boto de enviar
                      echo form_submit('mysubmit', 'Compartir');
                      // El form close es per tancar el formulari
                      echo form_close();
                ?>
                 <?php 
                      $attributes = array ('action' => "esborrar", 'enctype' => "multipart/form-data", 'method' => "post");
                      // Form open que serveix per iniciar el formulari
                      echo form_open($esborrar, $attributes);
                
                      echo form_hidden('codiF', $value['codiF']);
                      
                      // El form submit es per mostrar el boto de enviar
                      echo form_submit('mysubmit', 'Esborrar');
                      // El form close es per tancar el formulari
                      echo form_close();
                ?>
                 <?php 
                      $attributes = array ('action' => "propietats", 'enctype' => "multipart/form-data", 'method' => "post");
                      // Form open que serveix per iniciar el formulari
                      echo form_open($propietats, $attributes);
                
                      echo form_hidden('codiFitxer', $value['codiF']);
                      
                      // El form submit es per mostrar el boto de enviar
                      echo form_submit('mysubmit', 'Propietats');
                      // El form close es per tancar el formulari
                      echo form_close();
                ?>
              </td>
            </tr>
              <?php
            }
          } else {
            echo "<p>No hi han aparegut resultats.</p>";
          }
        ?>
    </tbody>
    </table>
    <h1>Arxius compartits</h1>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Nom Arxiu</th>
        <th scope="col">Usuari Pripietari</th>
        <th scope="col">Interaccions</th>
        </tr>
    </thead>
    <tbody>
        <?php
          if(!empty($consulta2)){
            $download = site_url()."/c4morales/home/download";
            $compartir = site_url()."/c4morales/home/redireccionarMostraUsuaris";
            $esborrar = site_url()."/c4morales/home/esborrar";
            $propietats = site_url()."/c4morales/home/propietats";
            foreach ($consulta2 as $fila => $value) {
            ?>
            <tr>
              <td> <?=$value['nomF'];?> </td>
              <td> <?=$value['codiU'];?> </td>
              <td>
                <?php
                    $path='../../../../uploads/'.$value['nomRandom'].'.'.$value['tipusF'];
                    echo "<a href=$path><button>Descarregar</button></a>";
                ?>
                <br>
                 <?php 
                      $attributes = array ('action' => "propietats", 'enctype' => "multipart/form-data", 'method' => "post");
                      // Form open que serveix per iniciar el formulari
                      echo form_open($propietats, $attributes);
                
                      echo form_hidden('codiFitxer', $value['codiF']);
                      
                      // El form submit es per mostrar el boto de enviar
                      echo form_submit('mysubmit', 'Propietats');
                      // El form close es per tancar el formulari
                      echo form_close();
                ?>
              </td>
            </tr>
              <?php
            }
          } else {
            echo "<p>No hi han aparegut resultats, aquest usuari no te ningún arxiu compartit.</p>";
          }
        ?>
    </tbody>
    </table>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>