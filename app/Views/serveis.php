<!doctype html>
<html lang="en">

<head>
  <title>InstantJob | Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Estils de la pagina -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="..\styles.css">
  <!-- Estils de font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <!-- Estils de glider -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">

  <!-- Estils de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0859fc3634.js" crossorigin="anonymous"></script>
</head>

<body class="serveisBackground">

  <!-- Apartat de la carrega de la pàgina -->
  <div id="contenedor_carga">
    <div id="carga"></div>
  </div>

    <nav class="navIniciServeis">
      <header class="headerServeis">
      <?php

        if ($titulo != 0) {
          foreach ($qtitul->getResultArray() as $row) {

            switch ($titulo) {
              case '1':
                echo "<h1>Lampista!</h1>";
                echo "El numero de serveis son: " . $row['COUNT(*)'];
                break;
              case '2':
                echo "<h1>Fuster!</h1>";
                echo "El numero de serveis son: " . $row['COUNT(*)'];
                break;
              case '3':
                echo "<h1>Pintor!</h1>";
                echo "El numero de serveis son: " . $row['COUNT(*)'];
                break;
              case '4':
                echo "<h1>Informatic!</h1>";
                echo "El numero de serveis son: " . $row['COUNT(*)'];
                break;
              case '5':
                echo "<h1>Administratiu!</h1>";
                echo "El numero de serveis son: " . $row['COUNT(*)'];
                break;
              case '6':
                echo "<h1>Jardiner!</h1>";
                echo "El numero de serveis son: " . $row['COUNT(*)'];
                break;
              case '7':
                echo "<h1>Medicina!</h1>";
                echo "El numero de serveis son: " . $row['COUNT(*)'];
                break;
              case '8':
                echo "<h1>Obrers!</h1>";
                echo "El numero de serveis son: " . $row['COUNT(*)'];
                break;
              default:
                echo "<h1>Serveis!</h1>";
                echo "El numero de serveis son: " . $row['COUNT(*)'];
                break;
              }
          }
        }else{
          echo "<h1>Serveis!</h1>";
        }

          
        ?>
        <br>
        <a href="pujaProductes">Tornar</a>
      </header>
    </nav>
    <br>

    <div class="container">
        <div class="row">
          <div class="col s12">
            <h2 class="center-align">Escogeix la categoria</h2>
            <br>
          <div class="carousel">
            <div class="carousel__contenedor">
              <button aria-label="Anterior" class="carousel__anterior">
                <i class="fas fa-chevron-left"></i>
              </button>
              <br>
              <div class="carousel__lista">
              <a href="serveis">
                <div class="carousel__elemento">
                <form action= 'categoria' method="post">
                    <input type="hidden" name="1" value="1">
                    <button><img src="imgs/fontaneriaBlau.png" alt="Categoria de lampista"></button>
                    <p>Lampista</p>
                  </form>
                </div>
              </a>
              <a href="serveis">
                <div class="carousel__elemento">
                  <form action= 'categoria' method="post">
                    <input type="hidden" name="1" value="2">
                    <button><img src="imgs/carpinteria.png" alt="Categoria de fuster"></button>
                    <p>Fuster</p>
                  </form>
                </div>
              </a>
              <a href="serveis">
                <div class="carousel__elemento">
                <form action= 'categoria' method="post">
                    <input type="hidden" name="1" value="3">
                    <button><img src="imgs/pintor.png" alt="Categoria de pintors"></button>
                    <p>Pintor</p>
                  </form>
                </div>
              </a>
              <a href="serveis">
                <div class="carousel__elemento">
                  <form action= 'categoria' method="post">
                    <input type="hidden" name="1" value="4">
                    <button><img src="imgs/informatic_blau.png" alt="Categoria d'informatic"></button>
                    <p>Informàtic</p>
                  </form>
                </div>
              </a>
              <a href="serveis">
                <div class="carousel__elemento">
                  <form action= 'categoria' method="post">
                    <input type="hidden" name="1" value="5">
                    <button><img src="imgs/administratiu_blau.png" alt="Categoria d'administratiu"></button>
                    <p>Administratiu</p>
                  </form>
                </div>
              </a>
              <a href="serveis">
                <div class="carousel__elemento">
                <form action= 'categoria' method="post">
                    <input type="hidden" name="1" value="6">
                    <button><img src="imgs/jardiner_blau.png" alt="Categoria de jardineria"></button>
                    <p>Jardiner</p>
                  </form>
                </div>
              </a>
              <a href="serveis">
                <div class="carousel__elemento">
                <form action= 'categoria' method="post">
                    <input type="hidden" name="1" value="7">
                    <button><img src="imgs/medicina_blau.png" alt="Categoria de medicina"></button>
                    <p>Medicina</p>
                  </form>
                </div>
              </a>
              <a href="serveis">
                <div class="carousel__elemento">
                <form action= 'categoria' method="post">
                    <input type="hidden" name="1" value="8">
                    <button><img src="imgs/obrer_blau.png" alt="Categoria d'obrers"></button>
                    <p>Obrers</p>
                  </form>
                </div>
              </a>
              </div>

              <button aria-label="Siguiente" class="carousel__siguiente">
                <i class="fas fa-chevron-right"></i>
              </button>
            </div>

            <div role="tablist" class="carousel__indicadores"></div>
          </div>
          </div>
        </div>
      </div>
    <div class="serveisApartat">
    <h2>Serveis Destacats</h2><br>
    <?php
          $contador = 1;
          foreach ($consulta2->getResultArray() as $row) {
            echo "<div class='serveiSeparat col-4' style='width: 21rem;'>";
            echo "<img src='./imgs/imatgePre.png' width='100%' height='150px'>";
            echo "<div class='card-body'>";

            echo "<p id='".$row['id_servicio']."'>".$row['nombre']."</p>";

            echo "<p id='2'>".$row['precio']."</p>";

            echo "</div>";
            echo "</div>";
            if ($contador == 3) {
              echo "<br>";
              $contador = 0;
            }
            $contador++;
          }
          
        ?>
    <br>
    <h2>Mes Serveis</h2><a href="#" class="btn btn-primary organitzarPreu">Preu</a><a href="#" class="btn btn-primary organitzar">Nom</a><br>
    <?php
          $contador = 1;
          foreach ($consulta->getResultArray() as $row) {
            echo "<div class='serveiSeparat col-4 style='width: 21rem;'>";
            echo "<img src='./imgs/imatgePre.png' width='100%' height='150px'>";
            echo "<div class='card-body'>";

            echo "<p id='".$row['id_servicio']."'>".$row['nombre']."</p>";

            // echo "<p id='2'>".$row['descripcion']."</p>";

            echo "<p id='2'>".$row['precio']."</p>";

            echo "</div>";
            echo "</div>";
            if ($contador == 3) {
              echo "<br>";
              $contador = 0;
            }
            $contador++;
          }
          
        ?>
  </div>

  <footer>
  <div class="footer-content col-4">
    <a href="index"><img src="./imgs/Logo_InstantJob_Blanca.png" alt="Logo de la pagina InstantJob"></a>
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
  <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
  <!-- Script Global -->
  <script src="Typescript/script.js"></script>
  <script src="..\Typescript/script.js"></script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>