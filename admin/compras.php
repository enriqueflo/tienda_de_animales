<?php 
	require_once("../class/iniciar_sesion.php");
	require_once("../class/class.php");
	require_once("../class/consultas.php");
	$trabajo=new Trabajo();
	$consulta=new Consultas();
	if(!isset($_SESSION["parametro"])){
		$_SESSION["parametro"]=$_GET["parametro"];
	}
	if(!isset($_SESSION["valor"])){
		$_SESSION["valor"]=$_GET["valor"];
	}
	if(isset($_GET["valor2"])){
		if(!isset($_SESSION["valor2"])){
			$_SESSION["valor2"]=$_GET["valor2"];
		}
	}
	if($_SESSION["parametro"]=="fecha"){
		$datos=$trabajo->consultas($consulta->getPorFecha($_SESSION["valor"]));
	}
	elseif ($_SESSION["parametro"]=="usuario"){
		$datos=$trabajo->consultas($consulta->getPorUsuario($_SESSION["valor"]));
	}
	elseif ($_SESSION["parametro"]=="factura"){
		$datos=$trabajo->consultas($consulta->getPorFactura($_SESSION["valor"]));
	}
	else{
		$datos=$trabajo->consultas($consulta->getPorRango($_SESSION["valor"], $_SESSION["valor2"]));
	}
?>
<script type="text/javascript" src="../js/admin_compra.js"></script>
<div class="centro">
	<fieldset>
		<legend>Compras</legend>
		<div class="row cabecera margen_todo3">
			<div class="col-xd-12 col-sm-6 col-md-1">
		        Factura
		    </div>
		    <div class="col-xd-12 col-sm-6 col-md-2">
		        Nombre usuario 
		    </div>       
			<div class="col-sm-12 col-md-4">
				Productos (precio uni.) (cantidad) (precio)
			</div>
			<div class="col-xd-12 col-sm-6 col-md-1">      
				Total
			</div>
			<div class="col-xd-12 col-sm-6 col-md-1">      
				Pago
			</div>
			<div class="col-xd-12 col-sm-6 col-md-1">      
				Pagado
			</div>
			<div class="col-xd-12 col-sm-6 col-md-1">      
				Entregado
			</div>
			<div class="col-xd-12 col-sm-6 col-md-1">      
				Acciones
			</div>
		</div>
		<div class="separador_mini"></div>
		<?php 
			for ($i = 0; $i < count($datos); $i++) {
				if(strlen($datos[$i]["id_compra"])==1){
					$factura="000000000".$datos[$i]["id_compra"];
				}
				else if(strlen($datos[$i]["id_compra"])==2){
					$factura="00000000".$datos[$i]["id_compra"];
				}
				else if(strlen($datos[$i]["id_compra"])==3){
					$factura="0000000".$datos[$i]["id_compra"];
				}
				else if(strlen($datos[$i]["id_compra"])==3){
					$factura="000000".$datos[$i]["id_compra"];
				}
				else if(strlen($datos[$i]["id_compra"])==4){
					$factura="00000".$datos[$i]["id_compra"];
				}
				else if(strlen($datos[$i]["id_compra"])==5){
					$factura="0000".$datos[$i]["id_compra"];
				}
				else if(strlen($datos[$i]["id_compra"])==6){
					$factura="000".$datos[$i]["id_compra"];
				}
				else if(strlen($datos[$i]["id_compra"])==7){
					$factura="00".$datos[$i]["id_compra"];
				}
				else if(strlen($datos[$i]["id_compra"])==8){
					$factura="0".$datos[$i]["id_compra"];
				}
				else{
					$factura=$datos[$i]["id_compra"];
				}
		?>
		<div class="row">
			<div class="col-md-1">
		        <?php echo $factura; ?>
		    </div>
		    <div class="col-md-2">
		        <?php echo $datos[$i]["nom_user"]." ".$datos[$i]["ape_uno_user"]." ".$datos[$i]["ape_dos_user"]; ?>
		    </div>       
			<div class="col-md-4">
				<?php 
					$productos=$trabajo->consultas($consulta->getLineaCompra($datos[$i]["id_compra"]));
					for ($x = 0; $x < count($productos); $x++) {
				?>
				<div class="row">
					<div class="col-md-1"><?php echo ($x+1).")"; ?></div> 
					<div class="col-md-7">
			        	<?php echo $productos[$x]["tipo_product"]." ".
					        	   $productos[$x]["nom_product"]; ?>
			    	</div> 
			    	<div class="col-md-4">
			        	<?php 
			        		echo "(".$productos[$x]["uni_pro_linea"].") (".$productos[$x]["cant_linea"].") (".$productos[$x]["preu_linea"].")"; 
			        	?>
			    	</div>
				</div>
				<?php	
					}
					if ($datos[$i]["gastos_compra"]==-1) {
				?>
				Gastos de envío 5 €
				<?php
					}
				?>
			</div>
			<div class="col-md-1">      
				<?php echo $datos[$i]["total_compra"]; ?>
			</div>
			<div class="col-md-1">      
				<?php 
					if($datos[$i]["form_pay_compra"]=="paypal"){
				?>
				<img src="../img/paypal.png" width="60">
				<?php 
					}
					elseif($datos[$i]["form_pay_compra"]=="targeta"){
				?>
				<img src="../img/targeta.png" width="60">
				<?php 
					}
					else{
				?>
				<img src="../img/transferencia.png" width="60">
				<?php 
					}
				?>
			</div>
			<div class="col-md-1">      
				<?php 
					if ($datos[$i]["pay_compra"]==0) {
				?>
				<a name-id="<?php echo $datos[$i]["id_compra"]; ?>" href="#" 
				   class="pago"><img src="../img/remove.png" width="20"></a>
				<?php
					}
					else{
				?>
				<img src="../img/ok.png" width="20">
				<?php
					}
				?>
			</div>
			<div class="col-md-1">      
				<?php 
					if ($datos[$i]["fin_compra"]==0) {
				?>
				<a name-id="<?php echo $datos[$i]["id_compra"]; ?>" href="#" 
				   class="estado"><img src="../img/remove.png" width="20"></a>
				<?php
					}
					else{
				?>
				<img src="../img/ok.png" width="20">
				<?php
					}
				?>
			</div>
			<div class="col-md-1">      
				<a name-id="<?php echo $datos[$i]["id_compra"]; ?>" href="#" 
				   class="pdf_admin"><img src="../img/pdf.png" width="20"></a>
			</div>
		</div>
		<hr>
				<?php 
			}
		?>
	</fieldset>
</div>