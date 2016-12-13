<?php
	require_once("class/iniciar_sesion.php"); 
	if(isset($_SESSION["role"]) && $_SESSION["role"]=="ROLE_ADMIN"){
		header("Location: admin/plantilla_admin.php");
	}
	else{
		header("Location: client/plantilla_client.php");
	}
?>