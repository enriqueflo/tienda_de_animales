<?php 
	$galeria_perros=$trabajo->consultas($consulta->getGaleria(1)); 
	$galeria_gatos=$trabajo->consultas($consulta->getGaleria(2));
	$galeria_conejos=$trabajo->consultas($consulta->getGaleria(3));
?>
<div class="row bordes center-block">
    <div class="col-md-12 text-center formato_fecha_hora color_azul_uno" id="visita">
        Visitantes<br/>
        <div id="result"></div>  
    </div>
</div>
<div class="separador_corto"></div>
<div class="row">
    <div class="col-md-12 text-center" id="dia">
        <div class="bordes">
            <div id="m" class="formato_fecha_hora color_azul_dos"></div>
            <div id="h" class="formato_fecha_hora color_azul_uno"></div>
            <div id="a" class="formato_fecha_hora color_azul_dos"></div>
            <script>
                dia();
            </script>
        </div>
    </div>
</div>
<div class="separador_corto"></div>
<div class="row">
    <div class="col-md-12">
        <!-- Slidebar perros -->
        <div id="carousel-1" class="carousel slide bordes" data-ride="carousel">
            <!-- Contenedor de items -->
            <div class="carousel-inner" role="listbox">
                
                <div class="item active bordes color_gris">
                    <a href="#perro0" data-toggle="modal" >
	                    <img class="img-responsive" width="1200" height="400" alt=""
	                                         src="../img/animales/perros/<?php echo $galeria_perros[0]['nom_img'] ?>">
	                    <span class="nombre"><?php echo $galeria_perros[0]['nom_animal_img'] ?></span>
                    </a>
                </div>
               <?php
                    for ($i=1; $i < count($galeria_perros) ; $i++) { 
                ?>
                <div class="item bordes color_gris">
                	<a href="#perro<?php echo $i; ?>" data-toggle="modal" >
	                    <img class="img-responsive" width="1200" height="400" alt=""
	                                         src="../img/animales/perros/<?php echo $galeria_perros[$i]['nom_img'] ?>">
	                    <span class="nombre"><?php echo $galeria_perros[$i]['nom_animal_img'] ?></span>
                    </a>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
     </div>
</div>
<div class="separador_corto"></div>
<div class="row">
    <div class="col-md-12">
        <!-- Slidebar perros -->
        <div id="carousel-1" class="carousel slide bordes" data-ride="carousel">
            <!-- Contenedor de items -->
            <div class="carousel-inner" role="listbox">
                <div class="item active bordes color_gris">
                    <a href="#gato0" data-toggle="modal" >
	                    <img class="img-responsive" width="1200" height="400" alt=""
	                                         src="../img/animales/gatos/<?php echo $galeria_gatos[0]['nom_img'] ?>">
	                    <span class="nombre"><?php echo $galeria_gatos[0]['nom_animal_img'] ?></span>
                    </a>
                </div>
               <?php
                    for ($i=1; $i < count($galeria_gatos) ; $i++) { 
                ?>
                <div class="item bordes color_gris">
                	<a href="#gato<?php echo $i; ?>" data-toggle="modal" >
	                    <img class="img-responsive" width="1200" height="400" alt=""
	                                         src="../img/animales/gatos/<?php echo $galeria_gatos[$i]['nom_img'] ?>">
	                    <span class="nombre"><?php echo $galeria_gatos[$i]['nom_animal_img'] ?></span>
                    </a>
                </div>
                <?php
                    }
                ?>    
            </div>
        </div>
    </div>
</div>
<div class="separador_corto"></div>
<div class="row">
    <div class="col-md-12">
        <!-- Slidebar conejos -->
        <div id="carousel-1" class="carousel slide bordes" data-ride="carousel">
            <!-- Contenedor de items -->
            <div class="carousel-inner" role="listbox">
                <div class="carousel-inner" role="listbox">
                <div class="item active bordes  color_gris">
                    <a href="#conejo0" data-toggle="modal" >
	                    <img class="img-responsive" width="1200" height="400" alt=""
	                                         src="../img/animales/conejos/<?php echo $galeria_conejos[0]['nom_img'] ?>">
	                    <span class="nombre"><?php echo $galeria_conejos[0]['nom_animal_img'] ?></span>
                    </a>
                </div>
               <?php
                    for ($i=1; $i < count($galeria_conejos) ; $i++) { 
                ?>
                <div class="item bordes color_gris">
                	<a href="#conejo<?php echo $i; ?>" data-toggle="modal" >
	                    <img class="img-responsive" width="1200" height="400" alt=""
	                                         src="../img/animales/conejos/<?php echo $galeria_conejos[$i]['nom_img'] ?>">
	                    
                    	<span class="nombre"><?php echo $galeria_conejos[$i]['nom_animal_img'] ?></span>
                    </a>
                </div>
                <?php
                    }
                ?> 
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3>Links</h3>
        <div class="list-group">
            <a href="#" class="list-group-item">link #1</a>
            <a href="#" class="list-group-item">link #2</a>
            <a href="#" class="list-group-item">link #3</a>
            <a href="#" class="list-group-item">link #4</a>
            <a href="#" class="list-group-item">link #5</a>
            <a href="#" class="list-group-item">link #6</a>
            <a href="#" class="list-group-item">link #7</a>             
        </div>
    </div>
</div>
<?php 
	for ($i = 0; $i < count($galeria_perros); $i++) {
?>
<div class="modal fade" id="perro<?php echo $i; ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<div class="row ">
            		<div class="col-md-3">
            			<img width="200" class="bordes" 
            			     src="../img/animales/perros/<?php echo $galeria_perros[$i]['nom_img'] ?>">
            		</div>
            		<div class="col-md-9">
            			<h2 class="modal-title"><?php echo $galeria_perros[$i]['nom_animal_img']; ?></h2>
            		</div>
            	</div>
            </div>
            <div class="modal-body">
           		<h5 class="modal-title"><?php echo $galeria_perros[$i]['descripcion_img']; ?></h5>
            </div>
            <div class="modal-body">
           		<h5 class="modal-title"><?php echo $galeria_perros[$i]['temperamento_img']; ?></h5>
            </div>
            <div class="modal-body">
           		<h4 class="modal-title">Características:</h4>
            	<ul>
            		<li><h5 class="modal-title"><?php echo $galeria_perros[$i]['caracteristica_img']; ?></h5></li>
            		<li><h5 class="modal-title"><?php echo $galeria_perros[$i]['vida_img']; ?></h5></li>
            		<li><h5 class="modal-title"><?php echo $galeria_perros[$i]['camada_img']; ?></h5></li>
            	</ul>
            </div>
        </div>
    </div>
</div>
<?php 
	}
	for ($i = 0; $i < count($galeria_gatos); $i++) {
?>
<div class="modal fade" id="gato<?php echo $i; ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<div class="row ">
            		<div class="col-md-3">
            			<img width="200" class="bordes" 
            			     src="../img/animales/gatos/<?php echo $galeria_gatos[$i]['nom_img'] ?>">
            		</div>
            		<div class="col-md-9">
            			<h2 class="modal-title"><?php echo $galeria_gatos[$i]['nom_animal_img']; ?></h2>
            		</div>
            	</div>
            </div>
            <div class="modal-body">
           		<h5 class="modal-title"><?php echo $galeria_gatos[$i]['descripcion_img']; ?></h5>
            </div>
            <div class="modal-body">
           		<h5 class="modal-title"><?php echo $galeria_gatos[$i]['temperamento_img']; ?></h5>
            </div>
            <div class="modal-body">
           		<h4 class="modal-title">Características:</h4>
            	<ul>
            		<li><h5 class="modal-title"><?php echo $galeria_gatos[$i]['caracteristica_img']; ?></h5></li>
            		<li><h5 class="modal-title"><?php echo $galeria_gatos[$i]['vida_img']; ?></h5></li>
            		<li><h5 class="modal-title"><?php echo $galeria_gatos[$i]['camada_img']; ?></h5></li>
            	</ul>
            </div>
        </div>
    </div>
</div>
<?php 
	}
	for ($i = 0; $i < count($galeria_conejos); $i++) {
?>
<div class="modal fade" id="conejo<?php echo $i; ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<div class="row ">
            		<div class="col-md-3">
            			<img width="200" class="bordes" 
            			     src="../img/animales/conejos/<?php echo $galeria_conejos[$i]['nom_img'] ?>">
            		</div>
            		<div class="col-md-9">
            			<h2 class="modal-title"><?php echo $galeria_conejos[$i]['nom_animal_img']; ?></h2>
            		</div>
            	</div>
            </div>
            <div class="modal-body">
           		<h5 class="modal-title"><?php echo $galeria_conejos[$i]['descripcion_img']; ?></h5>
            </div>
            <div class="modal-body">
           		<h5 class="modal-title"><?php echo $galeria_conejos[$i]['temperamento_img']; ?></h5>
            </div>
            <div class="modal-body">
           		<h4 class="modal-title">Características:</h4>
            	<ul>
            		<li><h5 class="modal-title"><?php echo $galeria_conejos[$i]['caracteristica_img']; ?></h5></li>
            		<li><h5 class="modal-title"><?php echo $galeria_conejos[$i]['vida_img']; ?></h5></li>
            		<li><h5 class="modal-title"><?php echo $galeria_conejos[$i]['camada_img']; ?></h5></li>
            	</ul>
            </div>
        </div>
    </div>
</div>
<?php 
	}
?>