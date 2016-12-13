<?php
	require_once("../class/iniciar_sesion.php");
	require_once("../class/class.php");
	require_once("../class/consultas.php");
	$trabajo=new Trabajo();
	$consulta=new Consultas();
	$dividendos=array();
	if ($_GET["parametro"]=="mes"){
		$datos=$trabajo->consultas($consulta->getPorMes($_GET["mes"], $_GET["anyo"]));
	}
	else{
		$datos=$trabajo->consultas($consulta->getPorAnyo($_GET["anyo"]));
	}
	for ($i = 0; $i < count($datos); $i++) {
		$div=$datos[$i]["total_compra"]-$datos[$i]["total_coste_compra"];
		array_push($dividendos, $div);
	}
	for ($i = 0; $i < count($dividendos); $i++) {
		$total=$total+$dividendos[$i];
	}
?>
<div class="centro">
	<fieldset>
	    <legend>Facturación</legend>
	    <div class="separador_mini"></div> 
		<div class="row">
			<div class="col-xd-12 col-sm-6 col-md-3">
		        <h3>Facturas</h3> 
		    </div>
			<div class="col-xd-12 col-sm-6 col-md-3">      
				<h3><?php echo count($datos); ?></h3>
			</div>
			<div class="col-xd-12 col-sm-6 col-md-3">
		        <h3>Total</h3> 
		    </div>
			<div class="col-xd-12 col-sm-6 col-md-3">      
				<h3><?php echo $total; ?></h3>
			</div>
		</div> 
	    <div class="separador_mini"></div>
		<div class="row cabecera margen_todo3">
		    <div class="col-xd-12 col-sm-6 col-md-3">
		        Factura  
		    </div>       
			<div class="col-xd-12 col-sm-6 col-md-3">
				Total venta
			</div>
			<div class="col-xd-12 col-sm-6 col-md-3">      
				Total compra
			</div>
			<div class="col-xd-12 col-sm-6 col-md-3">      
				Dividendo
			</div>
		</div>
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
		<div class="separador_mini"></div> 
		<div class="row">
		    <div class="col-xd-12 col-sm-6 col-md-3">
		    	<a href="#<?php echo $factura; ?>" class="btn  btn-primary btn-sm"  data-toggle="modal" >
		    		<?php echo $factura; ?>
		    	</a> 
		    </div>       
			<div class="col-xd-12 col-sm-6 col-md-3">
				<?php echo $datos[$i]["total_compra"]; ?> 
			</div>
			<div class="col-xd-12 col-sm-6 col-md-3">      
				<?php echo $datos[$i]["total_coste_compra"]; ?> 
			</div>
			<div class="col-xd-12 col-sm-6 col-md-3">      
				<?php echo $datos[$i]["total_compra"]-$datos[$i]["total_coste_compra"]; ?> 
			</div>
		</div>
		<?php 
			}
		?>
	</fieldset>
</div>
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
<div class="modal fade" id="<?php echo $factura; ?>">
    <div class="modal-dialog modal-slg ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Factura <?php echo $factura; ?></h4>
            </div>
            <div class="modal-body">
                <div class="row cabecera margen_todo3">
                	<div class="col-md-2">
		        		Nombre  
		   			</div>   
		   			<div class="col-md-4">
						Productos 
					</div>    
					<div class="col-md-4">
						(precio uni.) (cantidad) (precio)
					</div>
					<div class="col-md-2">      
						Gastos
					</div>
                </div>
                <div class="separador_mini"></div> 
                <div class="row">
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
							<div class="col-md-11">
			        			<?php echo $productos[$x]["tipo_product"]." ".$productos[$x]["nom_product"]; ?>
			    			</div> 
						</div>
					<?php 
						}
			    	?>
					</div>    
					<div class="col-md-4">
					<?php
						for ($x = 0; $x < count($productos); $x++) {
					?>
						<div class="row">
							<div class="col-md-12">
			        		<?php 
			        			echo "(".$productos[$x]["ini_pro_linea"].") (".$productos[$x]["cant_linea"].") (".$productos[$x]["preu_linea"].")"; 
			        		?>
			    			</div>
			    		</div>
			    	<?php 
						}
			    	?>
					</div>
					<div class="col-md-2">
					<?php 
						if ($datos[$i]["gastos_compra"]==-1) {
			    	?> 
					    Gastos de envío 5 €
					<?php 
						}
						else{
			    	?>
			    	-
			    	<?php 
						}
			    	?>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
	}
?>