<?php
require_once ("../class/iniciar_sesion.php");
require_once ("../class/class.php");
require_once ("../class/consultas.php");
$trabajo = new Trabajo ();
$consulta = new Consultas ();
?>
<nav class="container-fluid navbar navbar-default navbar-fixed-top">
	<div class="row">
		<div class="col-sm-12 col-md-2">
            <img class="img-responsive" src="../img/logo.jpg" height="50" alt="">
        </div>
        <div class="col-sm-12 col-md-10 color_negro">
		<div class="navbar-header">
			<button class="navbar-toggle collapsed" data-toggle="collapse"
				data-target="#navbar-1">
				<span class="sr-only"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navbar-1">
			<ul class="nav navbar-nav">
				<li><a class="home" href="#">Home</a></li>
			</ul>
			<ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                       Perros<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                    <?php
                   		$marcas=$trabajo->consultas($consulta->getMarcas("Perros"));
                        for ($i=0; $i < count($marcas); $i++) {
                    ?>
                       	<li>
                       		<a href="#" class="lista_edad" marca="<?php echo $marcas[$i]["nom_marca"]; ?>"
                               animal="Perros"><?php echo $marcas[$i]["nom_marca"]; ?>
                            </a>
                        </li>
                    <?php
                        }
                    ?>
                    </ul>
               </li>
               <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                       Gatos<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                    <?php
                   		$marcas=$trabajo->consultas($consulta->getMarcas("Gatos"));
                        for ($i=0; $i < count($marcas); $i++) {
                    ?>
                       	<li>
                       		<a href="#" class="lista_edad" marca="<?php echo $marcas[$i]["nom_marca"]; ?>"
                               animal="Gatos"><?php echo $marcas[$i]["nom_marca"]; ?>
                            </a>
                        </li>
                    <?php
                        }
                    ?>
                    </ul>
               </li>
               <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                       Conejos<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                    <?php
                   		$marcas=$trabajo->consultas($consulta->getMarcas("Conejos"));
                        for ($i=0; $i < count($marcas); $i++) {
                    ?>
                       	<li>
                       		<a href="#" class="lista_edad" marca="<?php echo $marcas[$i]["nom_marca"]; ?>"
                               animal="Conejos"><?php echo $marcas[$i]["nom_marca"]; ?>
                            </a>
                        </li>
                    <?php
                        }
                    ?>
                    </ul>
               </li>
               <li><a id="nobleza" href="#">Nobleza</a></li>
               <li><a id="contacta" href="#">Contacta</a></li>
			</ul>
			<div class="margen_right">
			<ul class="nav navbar-nav navbar-right ">
			
			<?php
                if(isset($_SESSION["role"])==false){
            ?>
                <li>
                	<a href="#ventana1" data-toggle="modal" >Acceso</a>
                </li>
                <li>
               		<a class="normas_cliente" href="#">Registro</a>
                </li>
            <?php
            	}
            	else{
            ?>
                <li><a class="salir" href="#"><?php echo $_SESSION["nom"]." ".$_SESSION["ape"]; ?>/Salir</a></li>
                <li>
                	<a id="ir_carrito" href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a>
            	</li>
            <?php
           		}
            ?>
				<li>
					<form action="" class="navbar-form navbar-right" role="search">
						<div class="form-group buscador">
							<input class="form-control" id="cadena" type="text" placeholder="Search:"/>
							<a class="btn btn-primary dropdown-toggle" id="menudrop" 
                               data-toggle="dropdown" aria-extended="true" href="#">
                              <span class="glyphicon glyphicon-search"></span>
                            </a> 
						</div>
					</form>
				</li>
				
			</ul>
			</div>
		</div>	
		</div>
	</div>
</nav>
<div class="separador_corto"></div>
<div class="modal fade" id="ventana1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">        
                        <div class="input-group">
                            <span class="input-group-addon color_azul_uno">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" class="form-control" name="user" placeholder="Usuario" required>
                        </div>
                    </div>
                </div> 
                <div class="row margen">
                    <div class="col-sm-12"> 
                        <h6 class="ocultar" name="error_user">Campo obligatorio</h6>
                   </div>
                </div>
                <div class="separador_mini"></div> 
                <div class="row">
                    <div class="col-lg-12">          
                        <div class="input-group">
                            <span class="input-group-addon color_azul_uno">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input type="password" class="form-control" name="pass" placeholder="Password" required>
                        </div>
                    </div>
                </div>
                <div class="row margen">
                    <div class="col-sm-12"> 
                        <h6 class="ocultar" name="error_pass">Campo obligatorio</h6>
                   </div>
                </div>
            </div>
            <div class="separador_mini"></div> 
            <div class="row margen_left">
                <div class="col-xd-12 col-sm-6">          
                    <a href="#ventana2" class="btn btn-primary btn-sm"  data-toggle="modal">Restablecer contraseña</a>
                </div>
                <div class="col-xd-12 col-sm-6 logear">          
                    <input type="button" class="btn btn-primary btn-sm" value="Logear usuario">
               </div>
            </div>
            <div class="separador_mini"></div> 
            <div class="row margen">
                <div class="col-sm-12">       
                    <h6 class="ocultar" name="error_login">El usuario o la contraseña son incorrectos</h6>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ventana2">
    <div class="modal-dialog modal-md2 ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Restablecer contraseña</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">        
                        <div class="input-group">
                            <span class="input-group-addon color"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" name="new_user" placeholder="Usuario" required>
                        </div>
                        <div class="col-sm-12"> 
                            <h6 class="ocultar" name="error_new_user">Campo obligatorio</h6>
                            <h6 class="ocultar" name="error_login">Usuario incorrecto</h6>
                        </div>
                    </div>
                </div> 
                <div class="separador_mini"></div> 
                <div class="row">
                    <div class="col-lg-12">          
                        <div class="input-group">
                            <span class="input-group-addon color"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" width="111" class="form-control" name="new_pass" placeholder="Nuevo password" required>
                        </div>
                        <div class="col-sm-12"> 
                            <h6 class="ocultar" name="error_new_pass">Campo obligatorio</h6>
                        </div>
                    </div>
                </div>
                <div class="separador_mini"></div> 
                <div class="row margen">
                    <div class="col-lg-12">          
                        <div class="input-group">
                            <span class="input-group-addon color"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" width="111" class="form-control" name="rep_new_pass" placeholder="Repetis nuevo password" required>
                        </div>
                        <div class="col-sm-12"> 
                            <h6 class="ocultar" name="error_rep_new_pass">Campo obligatorio</h6>
                            <h6 class="ocultar" name="error_igual_pass">Las contraseñas no coinciden</h6>
                        </div>
                    </div>
                </div>

                <div class="separador_mini"></div> 
                <div class="row margen">
                    <div class="col-xd-12 col-sm-7 nueva_pass">          
                        <input  type="button" class="btn btn-primary btn-sm" value="Logear usuario">
                    </div>
                </div>
            </div>
        </div>                
    </div>            
</div>