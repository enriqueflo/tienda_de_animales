<div class="separador_corto"></div>
<div class="row">
	<div class="col-sm-10">
		<div class="row">
			<?php 
				for ($i = 0; $i < count($datos); $i++) {
			?>
			<center>
				<div class="col-sm-3">
					<img src="../img/productos/<?php echo $datos[$i]["img_product"]?>" width="60">
				    <h5><?php echo $datos[$i]["nom_marca"]." ".$datos[$i]["tipo_product"];?></h5>
				    <h5><?php echo $datos[$i]["nom_product"]; ?></h5>
				    <h5><?php echo $datos[$i]["size_size"]; ?></h5>
				    <a class="btn btn-primary btn-md active datos_producto" href="#" 
                 		name-id="<?php echo $datos[$i]["id_product"]; ?>">Ver</a>
				 </div>
			</center>
			<?php		
				}
			?>
		</div>
	</div>
</div>