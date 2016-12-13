<?php
    require_once("../class/iniciar_sesion.php");
    require_once("../class/class.php");
    require_once("../class/consultas.php");
    $trabajo=new Trabajo();
    $consulta=new Consultas();
    if ($_GET["carga"]!="edad") {
    	if (isset($_GET["pag"])) {
    		$pag=$_GET["pag"];
    	}
    	else{
    		$pag="0";
    	}
    	$pag=$pag*5;
    }
    if ($_GET["carga"]=="edad") {
    	$_SESSION["marca"]=$_GET["marca"];
    	$datos=$trabajo->consultas($consulta->getVentasMarcas($_SESSION["marca"]));
    	unset($_SESSION["cantidad"]);
    }
    else if ($_GET["carga"]=="listado") {
    	$_SESSION["carga"]=$_GET["carga"];
    	if(!isset($_GET["accion"])){
    		$_SESSION["marca"]=$_GET["marca"];
    		$_SESSION["edad"]=$_GET["edad"];
    		$_SESSION["animal"]=$_GET["animal"];
    		$cantidad=$trabajo->consultasCant($consulta->getCantProductos($_SESSION["marca"], $_SESSION["animal"], $_SESSION["edad"]));
    		$_SESSION["cantidad"]=$cantidad;
    	}
    	
    	$productos=$trabajo->consultas($consulta->getProductos($_SESSION["marca"], $_SESSION["animal"], $_SESSION["edad"],$pag));
    	$datos=$trabajo->consultas($consulta->getVentasProductos($_SESSION["marca"], $_SESSION["edad"]));
    }
    else if ($_GET["carga"]=="buscador"){
    	$_SESSION["carga"]=$_GET["carga"];
    	if(!isset($_GET["accion"])){
    		$_SESSION["cadena"]=$_GET["cadena"];
    		$cantidad=$trabajo->consultasCant($consulta->getCantProductos($_SESSION["marca"], $_SESSION["animal"], $_SESSION["edad"]));
    		$_SESSION["cantidad"]=$cantidad;
    	}
    	$cantidad=$trabajo->consultasCant($consulta->getCantBuscador($_SESSION["cadena"]));
    	$productos=$trabajo->consultas($consulta->getBuscador($_SESSION["cadena"], $pag));
    	$datos=$trabajo->consultas($consulta->getVentasBuscador($_SESSION["cadena"]));
    }
    $cantidad=$_SESSION["cantidad"];
    $count=$cantidad/5;
?>
<?php if ($_GET["carga"]!="edad") {?>
<div class="centro_lista">
  <div class="row">
    <div class="col-sm-12">
      <fieldset>
      <legend>
      	<?php
      		if($_GET["carga"]=="listado"){
      			echo "Productos ".$_SESSION["marca"]." para ".$_SESSION["animal"]." ".$_SESSION["edad"]."s";
      		}
      		else if($_GET["carga"]=="buscador"){
      			echo "Busqueda de ".$_SESSION["cadena"];
      		}
      		else if($_GET["carga"]=="pag"){
      			if ($_GET["accion"]=="listado") {
      				echo "Productos ".$_SESSION["marca"]." para ".$_SESSION["animal"]." ".$_SESSION["edad"]."s";
      			}
      			else if($_GET["accion"]=="buscador"){
      				echo "Busqueda de ".$_SESSION["cadena"];
      			}
      		}
      	?>
      </legend>
      </fieldset>
    </div>
  </div>
  <?php
  for ($i=0; $i < count($productos); $i++) {
  ?>
  <div class="row bordes margen_todo2">
    <div class="col-sm-1"> 
      <div class="ovalo">
        <img class="margen_top" width="25" 
             src="../img/productos/<?php echo $productos[$i]["img_product"]; ?>"/>
      </div>
    </div>
    <div class="col-sm-9 margen_arriba"> 
      <h4><?php echo strtoupper($productos[$i]["nom_marca"])." ".
                     strtoupper($productos[$i]["tipo_product"])." ".
                     strtoupper($productos[$i]["nom_product"]); ?></h4>
    </div>
    <div class="col-sm-2 margen_arriba2"> 
      <a class="btn btn-primary btn-md active datos_producto" href="#" 
                 name-id="<?php echo $productos[$i]["id_product"]; ?>">Ver</a>
    </div>
  </div>
  <div class="separador_mini"></div>
  <?php
      }
  ?>
</div>
<div class="separador_corto"></div>

<nav>
	<ul class="pagination">
		<li class="disabled"><a href="#">&laquo;</a></li>
		<?php
			for ($i = 0; $i < $count; $i++) {
				if($i==0){
		?>
		
		<li>
			<a class="pag" href="#" name="0"><?php echo $i+1; ?></a>
		</li>
		<?php 
				}
				else{
		?>
		<li>
			<a class="pag" href="#" name="<?php echo $i; ?>"><?php echo $i+1; ?></a>
		</li>
		<?php 
				}
			}
		?>
		<li><a href="#">&raquo;</a></li>
	</ul>
  </nav>
  <?php } ?>
  <div class="separador_largo"></div>
  <div class="row">
    <div class="col-sm-12">
      <fieldset>
      <legend>
      	<?php
      		if($_GET["carga"]=="listado"){
      			echo "Productos ".$_SESSION["marca"]." de ".$_SESSION["animal"]." para ".$_SESSION["edad"]."s más vendidos";
      		}
      		else if($_GET["carga"]=="buscador"){
      			echo "Busqueda de ".$_SESSION["cadena"]." más vendidos";
      		}
      		
      		else if($_GET["carga"]=="edad"){
      			echo "Productos ".$_SESSION["marca"]." má vendidos";
      		}
      	?>
      </legend>
      </fieldset>
    </div>
  </div>
<?php
    include("../includes/mas_ventas.php");
?>
<input type="hidden" id="accion" value="<?php echo $_SESSION["carga"]; ?>" > 
<script type="text/javascript">
$(document).ready(function(){
    $(".datos_producto").click(function(){
      var id=$(this).attr("name-id");
      $.get("datos_producto_client.php", {"id": id},function (datos) {
      	$(".datos").html(datos);
      });
    });
    $(".pag").click(function(){
    	var accion=$("#accion").val();
    	var pag=$(this).attr("name");
    	$.get("listado_productos_client.php", {
    		"carga": accion,
    		"accion": "pag",
    		"pag": pag
    		},function (datos) {
        	$(".datos").html(datos);
    	});
    });
});   
</script>