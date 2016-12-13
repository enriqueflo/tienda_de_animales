<?php 
	require_once("../class/iniciar_sesion.php");
	$arreglo = $_SESSION["carrito"];
	for($i=0;$i<count($arreglo);$i++){
		if($arreglo[$i][0]!=$_GET['id']){
			$datosNuevos[]=array($arreglo[$i][0],$arreglo[$i][1],$arreglo[$i][2],
				                 $arreglo[$i][3],$arreglo[$i][4],$arreglo[$i][5],
				                 $arreglo[$i][6],$arreglo[$i][7],$arreglo[$i][8],$arreglo[$i][9]);
		}
	}
	$_SESSION["carrito"]=$datosNuevos;
	//echo "Producto con id ".$_GET['id']." eliminado con exito";
	echo header("Location: ../client/carrito_compra_client.php");	
?>