<?php
	require_once("../class/iniciar_sesion.php");
	require_once("../class/class.php");
	require_once("../class/consultas.php");
	$trabajo=new Trabajo();
	$consulta=new Consultas();
	$mes=$trabajo->consultas($consulta->getMes());
	$anyo=$trabajo->consultas($consulta->getAnyo());
?>
<script type="text/javascript" src="../js/admin_facture.js"></script>
<div class="centro">
	<fieldset>
	    <legend>Buscar Facturación</legend>
		<div class="row ">
			<div class="col-md-6">
				<div class="row bordes margen_todo3">
					<fieldset>
						<legend>Facturación por mes</legend>
						<div class="col-md-6">
							<select  name="rango" class="form-control" id="mes" required>
								<option value="Selecciona_mes">--Selecciona mes--</option>
							<?php
								for ($i=0; $i < count($mes); $i++) { 
							?>
								<option value="<?php echo $mes[$i]["mes_compra"] ?>">
								<?php echo $mes[$i]["mes_compra"] ?>
								</option>
							<?php
								}
							?>
							</select>
							<div class="separador_corto"></div> 
							<button class="btn btn-primary btn-md por_mes">Resultado</button>
						</div>
						<div class="col-md-6">
							<select  name="rango2" class="form-control" id="anyo" required>
								<option value="Selecciona_anyo">--Selecciona año--</option>
							<?php
								for ($i=0; $i < count($anyo); $i++) { 
							?>
								<option value="<?php echo $anyo[$i]["anyo_compra"] ?>">
								<?php echo $anyo[$i]["anyo_compra"] ?>
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
						<legend>Facturación por año</legend>
						<div class="col-md-12">
							<select  name="factura" class="form-control" id="anyo2" required>
								<option value="Selecciona_un_anyo">--Selecciona año--</option>
							<?php
								for ($i=0; $i < count($anyo); $i++) { 
							?>
								<option value="<?php echo $anyo[$i]["anyo_compra"] ?>">
								<?php echo $anyo[$i]["anyo_compra"]; ?>
								</option>
							<?php
								}
							?>
							</select>
							<div class="separador_corto"></div> 
							<button class="btn btn-primary btn-md por_anyo">Resultado</button>
						</div>
					</fieldset>
				</div>
		    </div> 
		</div>
	</fieldset>
</div>