<?php
    require_once("../class/iniciar_sesion.php");
    require_once("../class/class.php");
    require_once("../class/consultas.php");
    $trabajo=new Trabajo();
    $consulta=new Consultas();
    $result=$_SESSION["carrito"];
    $compra=$_POST;
    $buy=$trabajo->insert_compra($result, $compra);
    $count=$trabajo->consultas($consulta->getNumCompra());
?>
<script type="text/javascript">
	$(document).ready(function () {
		$(".gen_pdf a").click(function(){
			var id=$(this).attr("name-id");
	        window.open("../pdf/admin_pdf.php?id="+id, "Datos PDF", "width=700, height=500");
	        return false;
	    });
	});
</script>
<div  class="centro">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <?php
                    if ($_POST["acciones"]=="comprar") {
                ?>
                <legend><h2>Comprar carrito</h2></legend>
                <div class="separador_corto"></div>
                <div class="centro_contacto gen_pdf">
                	<?php echo $buy; ?>
	                <div class="separador_corto"></div>
                    <a name-id="<?php echo $count[0]["id_compra"]; ?>" href="#" 
                       class="btn btn-primary btn-md active">Mostrar y descargar pedido en PDF</a>
                </div>
                <?php
                    }
                    else{
                        unset($_SESSION['carrito']);
                ?>
                <legend><h2>Eliminar carrito</h2></legend>
                <div class="centro_contacto gen_pdf">
                	<div>
	                	<h3>El carrito de la compra ha sido eliminado con éxito</h3>
	                </div>
                </div>
                <div class="separador_corto"></div>
                <?php
                    }
                ?>
            </fieldset>
        </div>
    </div>
    <div class="separador_corto"></div> 
</div>