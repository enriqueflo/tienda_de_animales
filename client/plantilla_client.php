<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Principal</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
        <script type="text/javascript" src="../js/jquery-2.2.4.js"></script> 
        <script type="text/javascript" src="../js/bootstrap.js"></script>
        <script type="text/javascript" src="../js/fecha.js"></script>
        <script type="text/javascript" src="../js/funciones.js"></script>
        <script type="text/javascript" src="../js/md5.js"></script>
    </head>
    <body>
        <header>
          <?php include("../includes/menu_client.php"); ?>
        </header>
        <div class="separador_largo"></div>
        <div class="separador_corto"></div>
        <section class="container">
          <div class="row">
          	<div class="col-md-2 menu_edad">
            </div>
            <div class="col-md-8 text-justify datos">
            	<?php include("home_client.php"); ?>
            </div>
            <div class="col-md-2">
              <?php include("../includes/lateral.php"); ?>
            </div>
          </div>
        </section>
        <div class="separador_corto"></div> 
        <footer class="container color_negro">
          <?php include("../includes/pie.php"); ?>
        </footer>
        <div class="separador_corto"></div> 
    </body>
</html>