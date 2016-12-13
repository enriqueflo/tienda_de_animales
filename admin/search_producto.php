<?php
	require_once("../class/iniciar_sesion.php");
    require_once("../class/class.php");
    require_once("../class/consultas.php");
    $trabajo=new Trabajo();
    $consulta=new Consultas();
    $marca=$trabajo->consultas($consulta->getPorMarca());
    $animal=$trabajo->consultas($consulta->getPorAnimal());
    $edad=$trabajo->consultas($consulta->getPorEdad());
    
?>
<script type="text/javascript" src="../js/admin_producto.js"></script>
<div class="centro">
	<fieldset>
	    <legend>Buscar producto</legend>
	    <div class="separador_corto"></div>
		<div class="row ">
			<div class="col-md-6">
				<div class="row bordes margen_todo3">
					<fieldset>
						<legend>Por marca, animal y edad</legend>
						<div class="col-md-4">
							<select  name="marca" class="form-control" id="marca" required>
								<option value="marca">--Marca--</option>
							<?php
								for ($i=0; $i < count($marca); $i++) { 
							?>
								<option value="<?php echo $marca[$i]["id_marca"] ?>">
								<?php echo $marca[$i]["nom_marca"] ?>
								</option>
							<?php
								}
							?>
							</select>
							<div class="separador_corto"></div> 
							<button class="btn btn-primary btn-md marca_animal_edad">Buscar</button>
						</div>
						<div class="col-md-4">
							<select  name="animal" class="form-control" id="animal" required>
								<option value="animal">--Animal--</option>
							<?php
								for ($i=0; $i < count($animal); $i++) { 
							?>
								<option value="<?php echo $animal[$i]["id_animal"] ?>">
								<?php echo $animal[$i]["nom_animal"] ?>
								</option>
							<?php
								}
							?>
							</select>
						</div>
						<div class="col-md-4">
							<select  name="edad" class="form-control" id="edad" required>
								<option value="edad">--Edad--</option>
							<?php
								for ($i=0; $i < count($edad); $i++) { 
							?>
								<option value="<?php echo $edad[$i]["edad_product"] ?>">
								<?php echo $edad[$i]["edad_product"] ?>
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
						<legend>Por marca y animal</legend>
						<div class="col-md-6">
							<select  name="marca2" class="form-control" id="marca2" required>
								<option value="Selecciona marca">--Selecciona marca--</option>
							<?php
								for ($i=0; $i < count($marca); $i++) { 
							?>
								<option value="<?php echo $marca[$i]["id_marca"] ?>">
								<?php echo $marca[$i]["nom_marca"] ?>
								</option>
							<?php
								}
							?>
							</select>
							<div class="separador_corto"></div> 
							<button class="btn btn-primary btn-md range">Buscar</button>
						</div>
						<div class="col-md-6">
							<select  name="animal2" class="form-control" id="animal2" required>
								<option value="Selecciona fecha de fin">--Selecciona animal--</option>
							<?php
								for ($i=0; $i < count($animal); $i++) { 
							?>
								<option value="<?php echo $animal[$i]["id_animal"] ?>">
								<?php echo $animal[$i]["nom_animal"] ?>
								</option>
							<?php
								}
							?>
							</select>
						</div>
					</fieldset>
				</div>
		    </div> 
		</div>
		<div class="row">      
			<div class="col-md-6">
				<div class="row bordes margen_todo3">
					<fieldset>
						<legend>Por animal y edad</legend>
						<div class="col-md-6">
							<select  name="animal3" class="form-control" id="animal3" required>
								<option value="Selecciona animal">--Selecciona animal--</option>
							<?php
								for ($i=0; $i < count($animal); $i++) { 
							?>
								<option value="<?php echo $animal[$i]["id_animal"] ?>">
								<?php echo $animal[$i]["nom_animal"] ?>
								</option>
							<?php
								}
							?>
							</select>
							<div class="separador_corto"></div> 
							<button class="btn btn-primary btn-md range">Buscar</button>
						</div>
						<div class="col-md-6">
							<select  name="edad3" class="form-control" id="edad3" required>
								<option value="Selecciona edad">--Selecciona edad--</option>
							<?php
								for ($i=0; $i < count($edad); $i++) { 
							?>
								<option value="<?php echo $edad[$i]["edad_product"] ?>">
								<?php echo $edad[$i]["edad_product"] ?>
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
						<legend>Por marca y edad</legend>
						<div class="col-md-6">
							<select  name="marca3" class="form-control" id="marca3" required>
								<option value="Selecciona marca">--Selecciona marca--</option>
							<?php
								for ($i=0; $i < count($marca); $i++) { 
							?>
								<option value="<?php echo $marca[$i]["id_marca"] ?>">
								<?php echo $marca[$i]["nom_marca"] ?>
								</option>
							<?php
								}
							?>
							</select>
							<div class="separador_corto"></div> 
							<button class="btn btn-primary btn-md range">Buscar</button>
						</div>
						<div class="col-md-6">
							<select  name="edad3" class="form-control" id="edad3" required>
								<option value="Selecciona edad">--Selecciona edad--</option>
							<?php
								for ($i=0; $i < count($edad); $i++) { 
							?>
								<option value="<?php echo $edad[$i]["edad_product"] ?>">
								<?php echo $edad[$i]["edad_product"] ?>
								</option>
							<?php
								}
							?>
							</select>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
		<div class="separador_corto"></div>
	</fieldset>
</div>