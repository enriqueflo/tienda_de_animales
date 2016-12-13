<?php 
	require_once("../class/iniciar_sesion.php");
	require_once("../class/class.php");
	require_once("../class/consultas.php");
	$trabajo=new Trabajo();
	$consulta=new Consultas();
	echo $_GET["marca"]." ".$_GET["animal"]." ".$_GET["edad"];
	
?>
<div class="centro">
	<fieldset>
	    <legend>Productos</legend>
	    <a href="">Insertar Producto</a>
	    <div class="separador_corto"></div>
		<center><div class="row cabecera margen_todo3">
		    <div class="col-md-3">
		        Nombre  
		    </div>       
			<div class="col-md-3">
				Precio
			</div>
			<div class="col-md-3">      
				Estado
			</div>
			<div class="col-md-3">      
				Acciones
			</div>
		</div> </center>
		<div class="separador_corto"></div> 
	</fieldset>
</div>
