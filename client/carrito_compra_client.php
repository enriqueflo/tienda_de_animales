<?php
	require_once("../class/iniciar_sesion.php");
    require_once("../class/class.php");
    require_once("../class/consultas.php");
    $trabajo=new Trabajo();
    $consulta=new Consultas();
	if (isset($_GET["id"])) {
		$datos=$trabajo->consultas($consulta->getProducto_comprado($_GET["id"], $_GET["tamanyo"]));
		$total_linea=$datos[0]["preu_size"]*$_GET["cantidad"];
		$total_coste_linea=($datos[0]["preu_coste_size"]*$datos[0]["iva_size"])*$_GET["cantidad"];
		$preu_coste_size=$datos[0]["preu_coste_size"]*$datos[0]["iva_size"];
		$linea=array($datos[0]["id_size"], $datos[0]["img_product"], $datos[0]["tipo_product"], 
				     $datos[0]["nom_product"], $_GET["cantidad"], $_GET["tamanyo"], $datos[0]["preu_size"], 
				     $total_linea, $_SESSION["marca"], $preu_coste_size, $total_coste_linea);
		if (isset($_SESSION["carrito"])) {
			$arreglo=$_SESSION["carrito"];
			$encontro=false;
			$numero=0;
			for ($i=0; $i < count($arreglo); $i++) { 
				if($datos[0]["id_size"]==$arreglo[$i][0]){
					$encontro=true;
					$numero=$i;
				}
			}
			if ($encontro==true) {
				$arreglo[$numero][4]=$arreglo[$numero][4]+$_GET["cantidad"];
				$arreglo[$numero][7]=$arreglo[$numero][6]*$arreglo[$numero][4];
			}
			else{
				array_push($arreglo, $linea);
			}
			$_SESSION["carrito"]=$arreglo;
		}
		else{
			$arreglo=array($linea);
			$_SESSION["carrito"]=$arreglo;
		}
		
	}
?>
<script type="text/javascript">
  	$(document).ready(function(){
    	$(".delete_product_carrito a").click(function(){
        	var id=$(this).attr("name-id");
        	$.get("../class/eliminar_producto_carrito.php", {"id": id},function (datos) {
            	$(".datos").html(datos);
        	});
    	});
    	$("#delete").click(function(){                                          
	     	$.get("acciones_mensages_client.php", {"acciones": "eliminar"},function (datos) {
	            $(".datos").html(datos);
	        });
	    });
	    
	    $("#comprar").click(function(){  
		   var pago=$('input:radio[name=pago]:checked').val();
		   var total=$(".result").text();
		   var envio=$(".envio").val();                                    
	       $.post("acciones_mensages_client.php", {
		       "acciones": "comprar",
               "pago": pago,
               "total": total,
               "envio": envio
			    },function (datos) {
			    	$(".datos").html(datos);
	    	});
		});
  	});
  	
</script>
<div  class="centro">
	<div class="row">
	    <div class="col-sm-12">
			<fieldset>
				<legend>Carrito de la compra</legend>
				<div class="separador_corto"></div>
			    <?php
			    	if (!isset($_SESSION["carrito"])) {
				?>
			    <h4>No hay ningun carrito pendiente</h4>
			    <?php
			    	}
			    	else{
			    	$arreglo=$_SESSION["carrito"];
		            for ($i=0; $i < count($arreglo); $i++) {
		                $total_carrito=$total_carrito+$arreglo[$i][7];
		                $cant=$cant+$arreglo[$i][4];
		                if ($i%3==0) {
		          ?>
		          <div class="row">
		          <?php
		            	}
		          ?>
		            <center><div class="col-xd-12 col-sm-6 col-md-4">
		            	<div class="row">
		            		<div class="col-sm-12">
				            	<h5><?php echo strtoupper($arreglo[$i][8]); ?></h5>
				            	<h5><?php echo strtoupper($arreglo[$i][2]).
				            	      " ".strtoupper($arreglo[$i][3]); ?></h5>
				            </div>
		              	</div>
		              	<div class="row">
		            		<div class="col-sm-2 margen_left_top">	
				            	<div class="ovalo">
				              		<img class="margen_top" src="../img/productos/<?php echo $arreglo[$i][1]; ?>"/>
				              	</div>
				            </div>
		            		<div class="col-sm-8 col-sm-offset-1">
				              	<div class="input-group">
							        <span class="input-group-addon color_azul_uno">Tamaño&nbsp;&nbsp;</span>
							        <strong><input type="text" class="form-control" value="<?php echo $arreglo[$i][5]; ?>" style="width:70px" readonly></strong>
							    </div>
				              	<div class="input-group">
							        <span class="input-group-addon color_azul_uno">€ unidad</span>
							        <strong><input type="text" class="form-control" value="<?php echo $arreglo[$i][6]; ?>" style="width:70px" readonly></strong>
							    </div>
							    <div class="input-group">
							        <span class="input-group-addon color_azul_uno">Cantidad</span>
							        <strong><input type="text" class="form-control" value="<?php echo $arreglo[$i][4]; ?>" style="width:70px" readonly></strong>
							    </div>
							    <div class="input-group">
							        <span class="input-group-addon color_azul_uno">€ linea&nbsp;</span>
							        <strong><input type="text" class="form-control" value="<?php echo $arreglo[$i][7]; ?>" style="width:70px" readonly></strong>
							    </div>
							</div>
		              	</div>
					    <div class="separador_corto"></div> 
		              	<div class="delete_product_carrito" >
		              		<a class="btn btn-danger btn-xs active" name-id="<?php echo $arreglo[$i][0]; ?>" href="#">Eliminar producto</a>
		              	</div>
		              	<div class="separador_corto"></div> 
		            </div></center>
		          <?php
		            	if ($i%3==2) {
		          ?>
		          </div>
		          <?php
		          			}
		              	}

		          ?>
		          <div class="row">
		          	<center><div class="col-md-10 col-md-offset-1">
		          		<div class="separador_corto"></div> 
		          		<div class="separador_corto"></div>
		          		<?php
		          		if($cant>15){
		          		?>
		          		<center>
                        	<h5 class="msg" >No se puede pedir más de 15 productos (normas de uso). Elimina algún producto</h5>
                        </center>
                        <div class="separador_mini"></div>
		          		<?php
		          		}
		          		else{

		          			if($total_carrito<=35){
		          				$total_carrito=$total_carrito+5;
		          		?>
		          			<input type="hidden" class="envio" value="-1"/>
		          			<h5>Las compras menores de 35 € tienen un suplemento de 5 € (gastos de envío)</h5>
		          			<div class="separador_corto"></div>
		          		<?php
		          			}
		          			else{
		          		?>
		          			<input type="hidden" class="envio" value="0"/>
		          		<?php
		          			}
		          		?>

		          		<div class="form-group">
							<div class="input-group centro_pago"> 
				          		<span class="input-group-addon color_azul_uno">
				          			<input type="radio" name="pago" value="paypal"/>
				          		</span>
				          		<img src="../img/paypal.png" class="form-control">
				          		<label class="input-group-addon ">&nbsp;</label>
				          		<span class="input-group-addon color_azul_uno">
				          			<input type="radio" name="pago" value="transferencia"/>
				          		</span>
				          		<img src="../img/transferencia.png" class="form-control">
				          		<label class="input-group-addon ">&nbsp;</label>
				          		<span class="input-group-addon color_azul_uno">
				          			<input type="radio" name="pago" value="targeta"/> 
				          		</span>
				          		<img src="../img/targeta.png" class="form-control">
		          		    </div>			  			
			  			</div> 
			  			<div class="separador_corto"></div>
		          		<div class="form-group">
							<div class="input-group"> 
				          		<span class="input-group-btn"><a class="btn btn-primary btn-lg active" 
				          		   href="#" id="comprar">Comprar <span class="glyphicon glyphicon-shopping-cart"></span></a></span>
				          		<span class="input-group-addon total">Total carrito <span class="result">
				          		<?php 
				          			//$_SESSION["total"]=$total_carrito;
				          			echo $total_carrito; 
				          		?>
				          		</span> €</span>
				          		<span class="input-group-btn"><a class="btn btn-danger btn-lg active" 
				          		   href="#" id="delete">Eliminar <span class="glyphicon glyphicon-shopping-cart"></span></a></span>
		          		    </div>			  			
			  			</div>   
		          	</div></center>
		          </div>
		          <?php
		          		}	
		          	}
		          	$_SESSION["total"]=$total_carrito;
		          ?>
			</fieldset>
		</div>
	</div>
	<div class="separador_corto"></div> 
</div>