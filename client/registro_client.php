<?php 
	require_once("../class/iniciar_sesion.php");
    require_once("../class/class.php");
    require_once("../class/consultas.php");
    $trabajo=new Trabajo();
    $consulta=new Consultas();
    $casa=$trabajo->consultas($consulta->getCiudades());
?>
<script type="text/javascript" src="../js/validar_form_user.js"></script>
<div class="separador_corto"></div> 
<div class="centro">
	<form action="#">
	   	<fieldset>
	   		<legend><strong>Insertar cliente</strong></legend>
	    	<div class="separador_mini"></div> 
	    	<div class="centro_user">
			    <div class="row">
					<div class="col-md-3">
					    <div class="input-group">
							<span class="input-group-addon color_azul_uno"><span class="glyphicon glyphicon-user"></span></span>
							<label class="form-control color_azul_uno">Usuario</label>
						</div>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" placeholder="Nombre">
					</div>
					<div class="col-md-3">
						<h6 class="ocultar" name="nombre">Dato requerido</h6>
						<h6 class="ocultar" name="correct_nombre">Formato incorrecto</h6>
					</div>
				</div>
				<div class="separador_mini"></div> 
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<input type="text" class="form-control" name="ape_uno" placeholder="Primer apellido">
					</div>
					<div class="col-md-3">	
					    <h6 class="ocultar" name="ape_uno">Dato requerido</h6>
					    <h6 class="ocultar" name="correct_ape_uno">Formato incorrecto</h6>
					</div>
				</div> 
				<div class="separador_mini"></div> 
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
					    <input type="text" class="form-control" name="ape_dos" placeholder="Segundo apellido">
					</div>
					<div class="col-md-3">	
					    <h6 class="ocultar" name="ape_dos">Dato requerido</h6>
					    <h6 class="ocultar" name="correct_ape_dos">Formato incorrecto</h6>
					</div>
				</div>
				<div class="separador_mini"></div>       
				<div class="row">
					<div class="col-md-3">
					    <div class="input-group">
							<span class="input-group-addon color_azul_uno"><span class="glyphicon glyphicon-home"></span></span>
							<label class="form-control color_azul_uno">Dirección</label>
						</div>
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="tipo_calle" placeholder="Tipo calle">
					</div>
					<div class="col-md-2">	
					    <h6 class="ocultar" name="tipo_calle">Dato requerido</h6>
					</div>
					<div class="col-md-3">
						<input type="text" class="form-control" name="nom_calle" placeholder="Nombre calle">
					</div>
					<div class="col-md-2">	
					    <h6 class="ocultar" name="nom_calle">Dato requerido</h6>
					</div>
				</div>
				<div class="separador_mini"></div> 
				<div class="row">	
					<div class="col-md-3 col-md-offset-3">	
					    <input type="text" class="form-control" name="numero" placeholder="Número">
					</div>
					<div class="col-md-2">	
					    <h6 class="ocultar" name="numero">Dato requerido</h6>
					</div>
					
				</div>
				<div class="separador_mini"></div>       
				<div class="row">
					<div class="col-md-1 col-md-offset-3">    
						<input type="text" class="form-control" name="escalera" placeholder="Esc.">
					</div>
					<div class="col-md-2">	
						<input type="text" class="form-control" name="piso" placeholder="Piso">
					</div>
					<div class="col-md-2">	
						<input type="text" class="form-control" name="puerta" placeholder="Puerta">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="cp" placeholder="C.p.">
					</div>
					<div class="col-md-2">	
					    <h6 class="ocultar" name="cp">Dato requerido</h6>
					    <h6 class="ocultar" name="correct_cp">Son 5 números</h6>
					</div>
				</div>
				<div class="separador_mini"></div>       
				<div class="row">
					<div class="col-md-4 col-md-offset-3">
						<select class="form-control" name="ciudad">
							<option name="vacio" value="0"><< Selecciona una ciudad >></option>
							<?php
								for ($i=0; $i <count($casa) ; $i++) { 
							?>
							<option value="<?php echo $casa[$i]["id_ciudad"] ?>">
							<?php echo $casa[$i]["nom_ciudad"] ?>
							</option>
							<?php }	?>
						</select> 	
					</div>
					<div class="col-md-2">	
					    <h6 class="ocultar" name="ciudad">Dato requerido</h6>
					</div>
				</div>
				<div class="separador_mini"></div>   
				<div class="row">
					<div class="col-md-3">
					    <div class="input-group">
							<span class="input-group-addon color_azul_uno"><span class="glyphicon glyphicon-globe"></span></span>
							<label class="form-control color_azul_uno">Contacto</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">       
							    <div class="input-group">
							        <span class="input-group-addon color_azul_uno"><span class=" glyphicon glyphicon-phone-alt"></span></span>
							        <input type="text" class="form-control borrar" name="phone" placeholder="Casa">
							     </div>
							</div>
						</div>
						<div class="separador_mini"></div>
						<div class="row">
							<div class="col-md-12">        
							    <div class="input-group">
							        <span class="input-group-addon color_azul_uno"><span class="glyphicon glyphicon-phone"></span></span>
							        <input type="text" class="form-control borrar" name="movil" placeholder="Movil">
							    </div>
							</div>
						</div> 	
					</div>
					<div class="col-md-3">	
					    <h6 class="ocultar tel" name="telefono">Introduce el phone o el movil</h6>
					    <h6 class="ocultar" name="correct_phone">Formato incorrecto</h6>
					    <h6 class="ocultar movil" name="correct_movil">Formato incorrecto</h6>
					</div>
				</div>  
				<div class="separador_mini"></div> 
				<div class="row">
					<div class="col-md-3 col-md-offset-3">        
					    <div class="input-group">
					        <span class="input-group-addon color_azul_uno">@&nbsp;</span>
					        <input type="email" class="form-control" name="mail" placeholder="Mail">
					    </div>
					</div>
					<div class="col-md-3">	
					    <h6 class="ocultar" name="mail">Dato requerido</h6>
					    <h6 class="ocultar" name="correct_mail">Mail incorrecto</h6>
					    <h6 class="ocultar" name="rep_mail">Mail repetido</h6>
					</div>
				</div>
				<div class="separador_mini"></div>   
				<div class="row">
					<div class="col-md-6 col-md-offset-3">          
					    <div class="input-group">
					        <span class="input-group-addon color_azul_uno"><span class="glyphicon glyphicon-lock"></span></span>
					    	<input type="password" class="form-control" id="new_pass" placeholder="Password">
						</div>
					</div>
					<div class="col-md-3">	
					    <h6 class="ocultar" name="new_pass">Dato requerido</h6>
					</div>
				</div>
				<div class="separador_mini"></div>   
				<div class="row">	
					<div class="col-md-6 col-md-offset-3">          
					    <div class="input-group">
					        <span class="input-group-addon color_azul_uno"><span class="glyphicon glyphicon-lock"></span></span>
					    	<input type="password" class="form-control" name="rep_pass" placeholder="Repetir password">
						</div>
					</div>
					<div class="col-md-3">	
					    <h6 class="ocultar" name="rep_pass">Dato requerido</h6>
					    <h6 class="ocultar" name="dif_pass">Contraseña no coincide</h6>
					</div>
				</div>
				<div class="separador_corto"></div> 
				<div class="separador_corto"></div>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 insertar">          
					    <input type="button" class="btn btn-primary" value="Insertar usuario">
					</div>
				</div>
			</div>
		</fieldset>
	</form>
</div>
<div class="separador_largo"></div> 