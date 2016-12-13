<script type="text/javascript">
	$(document).ready(function(){
		$(".normas input").click(function(){
			var role=$(".role").val();
			if( !$('#checado').prop('checked') ){
                $("h6[name=checar]").show();
                $("input[name=aceptar]").focus();
                $("h6:not(h6[name=checar])").hide();
            }
			else{
				$.get("registro_client.php", {"role": role},function (datos) {
			        $(".datos").html(datos);
			    });
			}
		});
	});
</script>
<div class="center">
	<div class="bordes centro_lista margen_todo2">
		<div class="centro_lista">
			<fieldset>
			<legend><strong>Normas y condiciones de uso</strong></legend>
				<div class="separador_corto"></div>
				<div>
					<ul>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>
				</div>
				<div class="separador_corto"></div> 
				<div class="row">
						<div class="col-sm-12 col-md-8">        
						    <div class="input-group">
						        <span class="input-group-addon color_azul_uno">
						        	<input id="checado" type="checkbox" name="aceptar">
						        </span>
						        <label class="form-control" >Aceptar las normas y condficiones de uso</label>
						    </div>
						</div>
						<div class="col-md-4">	
						    <h6 class="ocultar" name="checar">Has de aceptar las normas</h6>
						</div>
					</div>
				<input type="hidden" class="role" value="ROLE_USER">
				<div class="separador_corto"></div> 
				<div class="row">
					<div class="col-xd-12 col-sm-6 col-md-4 normas">          
						<input type="button" class="btn btn-primary" value="Ir a formulario de registro">
					</div>
				</div> 
				<div class="separador_corto"></div> 
			</fieldset>
		</div>
	</div>
</div>