<?php
include 'conexion.php';
    $selN = $con -> query("SELECT * FROM noticia WHERE id =".$_GET['noticia']);
    $filaN = mysqli_fetch_assoc($selN);
    
    $selE = $con -> query("SELECT * FROM empresa WHERE id =".$_GET['empresa']);
    $filaE = mysqli_fetch_assoc($selE);
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
    <title>PRIVACY</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Links -->
    <link rel="stylesheet" href="css/search.css">

    <!--JS-->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/rd-smoothscroll.min.js"></script>


    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
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
            <a data-type='rd-navbar-brand'  href="./"><small><?=$filaE['denominacion']?></small></a>
          </h1>
          <a class="search-form_toggle" href="#"></a>
        </div>

        <div class="help-box text-right">
          <p>Telefono</p>
          <a href="callto:#"><?=$filaE['telefono']?></a>
          <small><span>Horario:</span>  <?=$filaE['horario']?></small>
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

      <section class="well well4">
		
        <div class="container">
			<center>
				<div id="imagenPrincipal" style="height: 450px; background-image: url('http://localhost:82/template_html/images/page-1_slide1.jpg?1583775512626'); background-repeat: no-repeat;background-size: cover;">
					<div style="text-align:left; background-color: rgba(1,1,1,0.5);color: #ffffff;font-size: 16px;line-height: 50px;">
					 <?=$filaN['titulo']?>                       
					</div>
				</div>
			</center>
		  <h2>
            <?=$filaN['titulo']?>
          </h2>
		  Fecha Publicacion: <?=$filaN['fecha']?>
		  <hr>
          <div class="row offs2">
            
            <div class="col-lg-12">
              <dl class="terms-list">
                <dt>
					<?=$filaN['resumen']?>
                </dt>
				<hr>
                <dd>
					<?=$filaN['html']?>
				</dd>
              </dl>
            </div>
          </div>
        </div>
      </section>   
      

    </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
  <footer>
   <section class="well">
      <div class="container"> 
            <p class="rights">
              <?=$filaE['denominacion']?>  &#169; <span id="copyright-year"></span>
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

<!-- coded by vitlex -->

  </body>
</html>
