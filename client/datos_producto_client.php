<?php
	require_once("../class/iniciar_sesion.php");
    require_once("../class/class.php");
    require_once("../class/consultas.php");
    $trabajo=new Trabajo();
    $consulta=new Consultas();
    $datos=$trabajo->consultas($consulta->getDatos($_GET["id"]));
    $arreglo=$_SESSION["carrito"];
    for ($i=0; $i < count($arreglo); $i++) { 
    	$cant=$cant+$arreglo[$i][4];
    }
?>

<script type="text/javascript">
  $(document).ready(function(){
    $("#carrito").click(function(){
        var id=$(this).attr("name-id");
        var tamanyo=$(".size").val();
        var cantidad=$(".valor").text();
		if(tamanyo=="Selecciona tamaño"){
			alert("Introduce tamaño");
		}
		else if(cantidad==0){
			alert("Introduce cantidad");
		}
		else{
			$.get("carrito_compra_client.php", {"id": id, "cantidad": cantidad, "tamanyo": tamanyo},function (datos) {
            	$(".datos").html(datos);
        	});
		}
		
    });

    $("#ir_carrito_dos").click(function(){
        $.get("../client/carrito_compra_client.php", {},function (datos) {
            $(".datos").html(datos);
        });
    });

    $(".mas").click(function(){
    	var suma=$(".valor").text();
    	suma++;
    	if (suma<15) {
      	$(".valor").text(suma);
      }	
    });

    $(".menos").click(function(){
    	var resta=$(".valor").text();
    	resta=resta-1;
    	if (resta>=0) {
    		$(".valor").text(resta);
    	}
      
    });
    
    $(".normas_cliente").click(function(){
		$.get("normas_client.php", {},function (datos) {
        	$(".datos").html(datos);
    	});
    });
  });
</script>
<div  class="centro_lista">
	<div class="row">
		<div class="col-sm-12">
			<h3><?php echo $datos[0]["nom_marca"]." ".$datos[0]["tipo_product"]." ".$datos[0]["nom_product"]; ?></h3>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-4">
			<img width="200" src="../img/productos/<?php echo $datos[0]['img_product']; ?>">
		</div>
		<div class="col-sm-8">
			<h3>Descripción</h3>
			<hr>
			<h5><?php echo $datos[0]["descripcion_product"]; ?></h5>
			<div class="separador_corto"></div> 
			<div class="row">
				<div class="col-sm-8">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-primary glyphicon glyphicon-scale"></span>
							</span>	
							<select  name="size" class="form-control size" required>
							    <option class="fuente" value="Selecciona tamaño">--Selecciona tamaño--</option>
					    		<?php
					    			for ($i=0; $i < count($datos); $i++) { 
					    		?>
					    		<option  class="fuente" value="<?php echo $datos[$i]["size_size"] ?>">
					    		<?php echo $datos[$i]["size_size"]." ".$datos[$i]["preu_size"] ?> € por unidad
					    		</option>
					    		<?php
					    			}
					    		?>
							 </select>
						</div>
					</div>				  			
				</div>	
				<div class="col-sm-4">
					<div class="form-group">
						<div class="input-group fuente">
							<span class="input-group-btn">
								<button class="btn btn-primary menos">
									<span class="glyphicon glyphicon-minus"></span>	
								</button>
							</span>
							<center><label class="form-control valor">0</label></center>
							<span class="input-group-btn">
								<button class="btn btn-primary mas">
									<span class="glyphicon glyphicon-plus"></span>	
								</button>
							</span>
						</div>			  			
			  		</div>				  			
				</div>	
			</div>
			<div class="separador_corto"></div> 
			<div class="row">
			<?php
         	if(isset($_SESSION["role"])==false || $cant>15){
            	if(isset($_SESSION["role"])==false){
         ?>
         	<div class="col-sm-12 centro">
         		<h5 class="msg" >Hay que estar <a href="#">logeado</a> o  <a class="normas_cliente" href="#">registrado</a></h5>
         	</div>
         <?php
         		}
         		else{
         ?>
         	<div class="col-sm-12 centro">
         		<h5 class="msg" >No se puede pedir más de 15 productos (normas de uso)</h5>
         	</div>
			<?php       		
         		}
         	}
         	else{
			    	if($datos[0]["active_size"]==-1){
			?>
				<div class="col-sm-4">
			    	<a id="carrito" name-id="<?php echo $datos[0]["id_product"]; ?>" class="btn btn-primary btn-md active" href="#">Añadir <span class="glyphicon glyphicon-shopping-cart"></span></a>
			   </div>
				<div class="col-sm-5">	
					<label><img src="../img/ok.png" width="30"> disponible</label>
			   </div>
			<?php 
					}
					else{
			?>
				<div class="col-sm-4">
			    	<span class="btn btn-inactive btn-md">Añadir <span class="glyphicon glyphicon-shopping-cart"></span></span>
			   </div>
				<div class="col-sm-5">	
					<label><img src="../img/remove.png" width="15"> no disponible</label>
			   </div>
			<?php					
					}
			?>
				<div class="col-sm-3">
					<a id="ir_carrito_dos" class="btn btn-success btn-md active" 
				         href="#">&nbsp;&nbsp;Ir <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;</a>
				</div>
			<?php
				}			
			?>
			</div>
		</div>
	</div>
	<div class="separador_largo"></div> 
	<div class="row">
		<div class="col-sm-12">
			<ul class="list-group">
				<h3>Características</h3>
				<li class="list-group-item">
					<h4>Composición</h4>
					<h5><?php echo $datos[0]["composicion_product"]; ?></h5>
				</li>
				<li class="list-group-item">
					<h4>Componemtes Analíticos</h4>
					<h5><?php echo $datos[0]["comp_analiticos_product"]; ?></h5>
				</li>	
				<li class="list-group-item">
					<h4>Aditivos</h4>
					<h5><?php echo $datos[0]["aditivos_product"]; ?></h5>
				</li>					
			</ul>
		</div>			
	</div>
</div>