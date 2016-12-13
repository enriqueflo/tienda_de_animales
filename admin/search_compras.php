<?php
	require_once("../class/iniciar_sesion.php");
    require_once("../class/class.php");
    require_once("../class/consultas.php");
    $trabajo=new Trabajo();
    $consulta=new Consultas();
    $casa=$trabajo->consultas($consulta->getFecha());
    $factura=$trabajo->consultas($consulta->getNumCompra());
    $user=$trabajo->consultas($consulta->getUsuario());
    unset($_SESSION["parametro"]);
    unset($_SESSION["valor"]);
    unset($_SESSION["valor2"]);
    
?>
<script type="text/javascript" src="../js/admin_compra.js"></script>
<div class="centro">
	<fieldset>
	    <legend>Buscar compras</legend>
	    <div class="separador_corto"></div>
		<div class="row ">
			<div class="col-md-6">
				<div class="row bordes margen_todo3">
					<fieldset>
						<legend>Por rango de fechas</legend>
						<div class="col-md-6">
							<select  name="rango" class="form-control" id="rango" required>
								<option value="Selecciona fecha de inicio">--Selecciona fecha inicio--</option>
							<?php
								for ($i=0; $i < count($casa); $i++) { 
							?>
								<option value="<?php echo $casa[$i]["fecha_compra"] ?>">
								<?php echo $casa[$i]["fecha_compra"] ?>
								</option>
							<?php
								}
							?>
							</select>
							<div class="separador_corto"></div> 
							<button class="btn btn-primary btn-md range">Buscar rango</button>
						</div>
						<div class="col-md-6">
							<select  name="rango2" class="form-control" id="rango2" required>
								<option value="Selecciona fecha de fin">--Selecciona fecha fin--</option>
							<?php
								for ($i=0; $i < count($casa); $i++) { 
							?>
								<option value="<?php echo $casa[$i]["fecha_compra"] ?>">
								<?php echo $casa[$i]["fecha_compra"] ?>
								</option>
							<?php
								}
							?>
							</select>
						</div>
						
					</fieldset>
				</div>
		    </div>
		    <div class="col-md-6">
		        <div class="row bordes margen_todo3">
					<fieldset>
						<legend>Por número de factura</legend>
						<div class="col-md-12">
							<select  name="factura" class="form-control" id="factura" required>
								<option value="Selecciona una factura">--Selecciona una factura--</option>
							<?php
								for ($i=0; $i < count($factura); $i++) { 
									if(strlen($factura[$i]["id_compra"])==1){
										$fac="000000000".$factura[$i]["id_compra"];
									}
									else if(strlen($factura[$i]["id_compra"])==2){
										$fac="00000000".$factura[$i]["id_compra"];
									}
									else if(strlen($factura[$i]["id_compra"])==3){
										$fac="0000000".$factura[$i]["id_compra"];
									}
									else if(strlen($factura[$i]["id_compra"])==3){
										$fac="000000".$factura[$i]["id_compra"];
									}
									else if(strlen($factura[$i]["id_compra"])==4){
										$fac="00000".$factura[$i]["id_compra"];
									}
									else if(strlen($factura[$i]["id_compra"])==5){
										$fac="0000".$factura[$i]["id_compra"];
									}
									else if(strlen($factura[$i]["id_compra"])==6){
										$fac="000".$factura[$i]["id_compra"];
									}
									else if(strlen($factura[$i]["id_compra"])==7){
										$fac="00".$factura[$i]["id_compra"];
									}
									else if(strlen($factura[$i]["id_compra"])==8){
										$fac="0".$factura[$i]["id_compra"];
									}
									else{
										$fac=$factura[$i]["id_compra"];
									}
							?>
								<option value="<?php echo $factura[$i]["id_compra"] ?>">
								<?php echo $fac; ?>
								</option>
							<?php
								}
							?>
							</select>
							<div class="separador_corto"></div> 
							<button class="btn btn-primary btn-md facture">Buscar factura</button>
						</div>
					</fieldset>
				</div>
		    </div> 
		</div>
		<div class="row">      
			<div class="col-md-6">
				<div class="row bordes margen_todo3">
					<fieldset>
						<legend>Por fecha</legend>
						<div class="col-md-12">
							<select  name="dia" class="form-control" id="dia" required>
								<option value="Selecciona fecha">--Selecciona fecha--</option>
							<?php
								for ($i=0; $i < count($casa); $i++) { 
							?>
								<option value="<?php echo $casa[$i]["fecha_compra"] ?>">
								<?php echo $casa[$i]["fecha_compra"] ?>
								</option>
							<?php
								}
							?>
							</select>
							<div class="separador_corto"></div> 
							<button class="btn btn-primary btn-md fecha">Buscar fecha</button>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="col-md-6">      
				<div class="row bordes margen_todo3">
					<fieldset>
						<legend>Por usuario</legend>
						<div class="col-md-12">
							<select  name="user" class="form-control" id="user" required>
								<option value="Selecciona un usuario">--Selecciona un usuario--</option>
							<?php
								for ($i=0; $i < count($user); $i++) { 
							?>
								<option value="<?php echo $user[$i]["id_user"]; ?>">
								<?php echo $user[$i]["nom_user"]." ".
										   $user[$i]["ape_uno_user"]." ".
										   $user[$i]["ape_dos_user"];
								?>
								</option>
							<?php
								}
							?>
							</select>
							<div class="separador_corto"></div> 
							<button class="btn btn-primary btn-md usuario">Buscar usuario</button>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
		<div class="separador_corto"></div>
	</fieldset>
</div>