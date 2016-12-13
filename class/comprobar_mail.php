<?php 
    require_once("class.php");
    require_once("consultas.php");
    $trabajo=new Trabajo();
    $consulta=new Consultas();
	echo count($trabajo->consultas($consulta->getMail($_GET["mail"])));
?>