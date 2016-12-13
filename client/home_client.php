<?php
    require_once("../class/iniciar_sesion.php");
    require_once("../class/class.php");
    require_once("../class/consultas.php");
    $trabajo=new Trabajo();
    $consulta=new Consultas();
    $datos=$trabajo->consultas($consulta->getVentas());
?>
<script type="text/javascript">
$(document).ready(function(){
    $(".datos_producto").click(function(){
      var id=$(this).attr("name-id");
      $.get("datos_producto_client.php", {"id": id},function (datos) {
      	$(".datos").html(datos);
      });
    });
});  
</script>
<div class="centro">
    <div class="row">
    	<div class="col-sm-12">
      		<img src="../img/web_found.png">
      	</div>
    </div>
    <div class="separador_largo"></div>
    <div class="row">
    	<div class="col-sm-12">
      		<h3>Productos más vendidos</h3>
      	</div>
    </div>
    <div class="separador_corto"></div>
    <div class="row">
    	<div class="col-sm-12">
      		<div class="row">
		      	<?php 
		      		for ($i = 0; $i < count($datos); $i++) {
		      			
		      	?>
		      	<center><div class="col-sm-3">
		    		<img src="../img/productos/<?php echo $datos[$i]["img_product"]?>" width="60">
		      		<h5><?php echo $datos[$i]["nom_marca"]." ".$datos[$i]["tipo_product"];?></h5>
		      		<h5><?php echo $datos[$i]["nom_product"]; ?></h5>
		      		<h5><?php echo $datos[$i]["size_size"]; ?></h5>
		      		<a class="btn btn-primary btn-md active datos_producto" href="#" 
                 		name-id="<?php echo $datos[$i]["id_product"]; ?>">Ver</a>
		      	</div></center>
		      	<?php		
		      		}
		      	?>
		    </div>
      	</div>
    </div>
    <div class="separador_largo"></div>
</div>  