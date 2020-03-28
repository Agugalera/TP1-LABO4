<?php
include 'conexion.php';
    $sel = $con -> query("SELECT * FROM empresa WHERE id =".$_GET['empresa']);
    $fila = mysqli_fetch_assoc($sel);
    
    $sel2 = $con -> query("SELECT * FROM noticia WHERE idEmpresa =".$_GET['empresa'].";");
    $fila2 = mysqli_fetch_assoc($sel2);
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>HOME</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Links -->
    <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/google-map.css">


    <!--JS-->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/rd-smoothscroll.min.js"></script>

    <script src='js/device.min.js'></script>
  </head>
  <body>
  <div class="page">
  <!--========================================================
                            HEADER
  =========================================================-->
    <header>  
      <div class="container top-sect">
        <div class="navbar-header">
          <h1 class="navbar-brand">
            <a data-type='rd-navbar-brand'  href="./"><small><?= $fila['denominacion'] ?></small></a>
          </h1>
          <a class="search-form_toggle" href="#"></a>
        </div>

        <div class="help-box text-right">
          <p>Telefono</p>
          <a href="callto:#"><?= $fila['telefono']?></a>
          <small><span>Horario:</span>  <?= $fila['horario']?></small>
        </div>
      </div>
     
	  <div id="stuck_container" class="stuck_container">
        <div class="container">   
     
        <form class="search-form" action="search.php" method="GET" accept-charset="utf-8">
          <label class="search-form_label">
            <input class="search-form_input" type="text" name="s" autocomplete="off" placeholder=""/>
            <span class="search-form_liveout"></span>
          </label>
          <button class="search-form_submit fa-search" type="submit"></button>
        </form>
             
        </div>

      </div>  

    </header>

  <!--========================================================
                            CONTENT
  =========================================================-->

    <main>        

      <section class="well well1 well1_ins1">
        <div class="camera_container">
          <div id="camera" class="camera_wrap">
            <div data-src="images/page-1_slide1.jpg">
              <div class="camera_caption fadeIn">
                <div class="jumbotron jumbotron1">
                  <em>
                    <?=$fila2['titulo']?>
                  </em>
                  <div class="wrap">
                    <p>
                      <?=$fila2['resumen']?>
                    </p>
                    <a href="detalle.php?empresa=3&noticia=1" class="btn-link fa-angle-right"></a>
                  </div>  
                </div>
              </div>
            </div>
            <div data-src="images/page-1_slide2.jpg">
              <div class="camera_caption fadeIn">
                <div class="jumbotron jumbotron2">
                  <em>
                    <?=$fila2['titulo']?>
                  </em>
                  <div class="wrap">
                    <p>
                      <?=$fila2['resumen']?>
                    </p>
                    <a href="#" class="btn-link hov_prime fa-angle-right"></a>
                  </div>  
                </div>
              </div>
            </div>
            <div data-src="images/page-1_slide3.jpg">
              <div class="camera_caption fadeIn">
                <div class="jumbotron">
                  <em>
                    <?=$fila2['titulo'][2]?>
                  </em>
                  <div class="wrap">
                    <p>
                      <?=$fila2['resumen'][2]?>
                    </p>
                    <a href="#" class="btn-link fa-angle-right"></a>
                  </div>  
                </div>
              </div>
            </div>
          </div>
        </div>
      
      </section>
      
      <section class="well well2 wow fadeIn  bg1" data-wow-duration='3s'>
        <div class="container">
        <h2 class="txt-pr">
        Quienes Somos
        </h2>
          <div class="row">
            <div class="col">
              <p style="text-align:justify">
                <?= $fila['quienessomos'] ?>
              </p>
            </div>
          </div>
        </div>
      </section>

    </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
  <footer class="top-border">
	<section class="well well2 wow fadeIn  bg1" data-wow-duration='3s'>
        <div class="container">
        <h2 class="txt-pr">
        Donde estamos
        </h2>
        </div>
    </section>
	<div class="map">
      <div id="google-map" class="map_model" data-zoom="11"></div>
      <ul class="map_locations">
        <li data-x="<?= $fila['latitud']?>" data-y="<?= $fila['longitud']?>" data-basic="images/gmap_marker.png" data-active="images/gmap_marker_active.png">
          <div class="location">
            <h3 class="txt-clr1" style="color:black">
              <small>
                <?= $fila['denominacion']?>
              </small>
            </h3>  
              <address>
                <dl>
                  <dt>Telefono: </dt>
                  <dd class="phone" style="color:black"><a href="callto:#"> <?= $fila['telefono']?></a></dd>
                </dl>
                <dl>
                  <dt>Domicilio: </dt>
                  <dd style="color:black"> <?= $fila['domicilio']?></dd>
                </dl>
                <dl>
                  <dt> E-mail: </dt>
                  <dd style="color:black"><a href="mailto:#"><?= $fila['email']?></a></dd>
                </dl>
              </address>
            
          </div>
        </li>
      </ul>
    </div>

    <section class="well1">
      <div class="container"> 
            <p class="rights">
              <?= $fila['denominacion'] ?>  &#169; <span id="copyright-year"></span>
              <a href="index-5.html">Privacy Policy</a>
              <!-- {%FOOTER_LINK} -->
            </p>          
      </div> 
    </section>    
  </footer>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->         
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tm-scripts.js"></script>    
  <!-- </script> -->


  </body>
</html>
