<?php 
	require_once("../class/iniciar_sesion.php");
	require_once("../class/class.php");
	require_once("../class/consultas.php");
	$trabajo=new Trabajo();
	$consulta=new Consultas();
	if($_POST["parametro"]=="pago"){
		$datos=$trabajo->updates($consulta->setPago($_POST["id"]), $consulta->getPorFactura($_POST["id"]));
		echo $datos;
	}
	
	else if($_POST["parametro"]=="estado"){
		echo $trabajo->updates($consulta->setEstado($_POST["id"]), $consulta->getPorFactura($_POST["id"]));
	}
?>