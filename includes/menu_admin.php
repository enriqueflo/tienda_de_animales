<div class="row center-block">
  <div class="col-lg-2">
    <img height="55" alt="" src="../img/logo_admin.png">
  </div>
  <div class="col-lg-10">
    <nav class="navbar navbar-default navbar-inverse">
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
          <span class="sr-only"></span>   
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>          
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbar-1">
        <ul class="nav navbar-nav paginas">
          <li><a class="user" href="#">Usuarios</a></li>      
          <li><a class="product" href="#">Productos</a></li>   
          <li><a class="compras" href="#">Compras</a></li>  
          <li><a class="nobleza_admin" href="#">Nobleza</a></li> 
          <li><a class="facturacion" href="#">Facturación</a></li> 
        </ul>
        <form action="" class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <input class="form-control" id="search" type="text" placeholder="Search product:"/>
            <button class="btn btn-primary dropdown-toggle" id="menudrop" type="button" data-toggle="dropdown" aria-extended="true">
              <span class="glyphicon glyphicon-search"></span>  </button>
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
        <?php
          if(isset($_SESSION["role"])!=false){
        ?>
          <li><a href="#" class="salir"><?php echo $_SESSION["nom"]." ".$_SESSION["ape"]; ?>/Salir</a></li>
        <?php
          }
        ?>
          <li><a class="registro" href="#">Registro</a></li>
        </ul>
      </div>
    </nav>
  </div>  
</div>