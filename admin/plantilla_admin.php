<?php
    require_once("../class/iniciar_sesion.php"); 
?>
<!DOCTYPE html>
 
<html lang="es">
 
  <head>
    <title>Administración</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/estilos.css" />
    <script type="text/javascript" src="../js/jquery-2.2.4.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/funciones.js"></script>
  </head>
   
  <body>
    <header>
      <div class="container-fluid">
        <?php include("../includes/menu_admin.php"); ?>
      </div>
    </header>
    <div class="separador_corto"></div>
    <section class="container">
      <div class="row">
        <div class="col-md-12 admin">
        </div>
      </div>
    </section> 
    <footer>
      <div class="container color_negro">
        <h4>@ by Enrique Flo</h4>
      </div>
    </footer>
    <div class="separador_largo"></div>
  </body>
</html>