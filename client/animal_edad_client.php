<?php
    require_once("../class/iniciar_sesion.php");
    require_once("../class/class.php");
    require_once("../class/consultas.php");
    $trabajo=new Trabajo();
    $consulta=new Consultas();
    
?>
<script type="text/javascript">
		$(document).ready(function(){
		  $(".lista_productos").click(function(){
		    var marca=$(this).attr("marca");
		    var animal=$(this).attr("animal");
		    var edad=$(this).attr("edad");
		    $.get("listado_productos_client.php", {
		      "carga": "listado", "animal": animal, "marca": marca, "edad": edad
		    },function (datos) {
		            $(".datos").html(datos);
		        });
	 	 });
	});
</script>

<div class="centro edad">
    <div class="row">
    	<div class="col-xd-12">
        	<h5><?php echo $_GET["marca"]." ".strtolower($_GET["animal"]); ?></h5>
      		<ul class="list-group">
      		<?php
      		if($_GET["home"]!="home"){
  	  			$edad=$trabajo->consultas($consulta->getEdad($_GET["marca"], $_GET["animal"]));
  				for ($i=0; $i < count($edad); $i++) {
			?>
				<a class="list-group-item lista_productos" href="#" 
				   marca="<?php echo $_GET["marca"]; ?>"
				   animal="<?php echo $_GET["animal"]; ?>" 
				   edad="<?php echo $edad[$i]["edad_product"]; ?>"><?php echo $edad[$i]["edad_product"]; ?></a>
			<?php
  				}
			}
			?>
      		</ul>  
    	</div>
    </div>
    <div class="separador_largo"></div>
    <input type="hidden" id="ventas_marca" value="<?php echo $_GET["marca"]; ?>">
    <script type="text/javascript">
	  $(document).ready(function(){
	    var marca=$("#ventas_marca").val();
	    $.get("listado_productos_client.php", {"carga": "edad", "marca": marca},function (datos) {
	    	$(".datos").html(datos);
	    });
	  });
	</script>
</div>  