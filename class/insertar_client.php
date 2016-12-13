<?php 
	require_once("iniciar_sesion.php"); 
	require_once("class.php"); 
	$trabajo=new Trabajo();
	if($_POST["parametro"]=="login"){
		$log=$trabajo->login_user($_POST);
		if(count($log)!=0){
			$_SESSION["nom"]=$log[0];
			$_SESSION["ape"]=$log[1];
			$_SESSION["role"]=$log[2];
			$_SESSION["id"]=$log[3];
		}
		echo count($log);
	}
	else if($_POST["parametro"]=="nueva_pass"){
		$log=$trabajo->new_pass_user($_POST);
		if(count($log)!=0){
			$_SESSION["nom"]=$log[0];
			$_SESSION["ape"]=$log[1];
			$_SESSION["role"]=$log[2];
			$_SESSION["id"]=$log[3];
		}
		echo count($log);
	}
	else if($_POST["parametro"]=="salir"){
		unset($_SESSION["nom"]);
		unset($_SESSION["ape"]);
		unset($_SESSION["role"]);
	}
	else{
		echo $trabajo->insert_admin($_POST);
	}
?>