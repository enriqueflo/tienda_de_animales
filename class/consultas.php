<?php
	class Consultas{
	
		public function getGaleria($tipo_animal){
			return "select * from img_animales where animal_img=$tipo_animal";
		}

		public function getMarcas($tipo_animal){
			return "select * from marcas m left join productos p on m.id_marca=p.marca_product
			        left join animales a on a.id_animal=p.animal_product
			        where a.nom_animal='$tipo_animal' group by p.marca_product";
		}

		public function getEdad($tipo_marca, $tipo_animal){
			
			return "select * from marcas m left join productos p on m.id_marca=p.marca_product
			        left join animales a on a.id_animal=p.animal_product where m.nom_marca='$tipo_marca'
			        and a.nom_animal='$tipo_animal' group by p.edad_product";
			
		}

		public function getProductos($tipo_marca, $tipo_animal, $tipo_edad, $rango){
			
			return "select * from marcas m left join productos p on m.id_marca=p.marca_product
			        left join animales a on a.id_animal=p.animal_product
			        where m.nom_marca='$tipo_marca' and a.nom_animal='$tipo_animal' 
			        and p.edad_product='$tipo_edad' limit $rango, 5";
			
		}
		
		public function getCantProductos($tipo_marca, $tipo_animal, $tipo_edad){
				
			return "select * from marcas m left join productos p on m.id_marca=p.marca_product
			left join animales a on a.id_animal=p.animal_product
			where m.nom_marca='$tipo_marca' and a.nom_animal='$tipo_animal'
			and p.edad_product='$tipo_edad'";
		}
		
		public function getVentas(){
			return "select * from marcas m left join productos p on m.id_marca=p.marca_product
					left join animales a on a.id_animal=p.animal_product 
					left join producto_size ps on ps.product_size=p.id_product 
					order by ps.cant_compra_size desc limit 4";
		}
		
		public function getVentasMarcas($tipo_marca){
			return "select * from marcas m left join productos p on m.id_marca=p.marca_product
					left join animales a on a.id_animal=p.animal_product 
					left join producto_size ps on ps.product_size=p.id_product 
					where m.nom_marca='$tipo_marca' order by ps.cant_compra_size desc limit 4";
		}
		
		public function getVentasBuscador($cadena){
				
			return "select * from marcas m left join productos p on m.id_marca=p.marca_product
					left join animales a on a.id_animal=p.animal_product 
					left join producto_size ps on ps.product_size=p.id_product 
					where m.nom_marca like'%$cadena%' or a.nom_animal like'%$cadena%' or
					p.edad_product like'%$cadena%' or p.tipo_product like'%$cadena%' or
					p.nom_product like'%$cadena%' or p.descripcion_product like'%$cadena%' or
					composicion_product like'%$cadena%' or comp_analiticos_product like'%$cadena%'
					order by ps.cant_compra_size desc limit 4";
				
		}
		
		public function getVentasProductos($tipo_marca, $tipo_edad){
			return "select * from marcas m left join productos p on m.id_marca=p.marca_product
					left join animales a on a.id_animal=p.animal_product
					left join producto_size ps on ps.product_size=p.id_product
					where m.nom_marca='$tipo_marca' and p.edad_product='$tipo_edad'
					order by ps.cant_compra_size desc limit 4";
		}

		public function getDatos($id_product){
			
			return "select * from productos p left join marcas m on p.marca_product=m.id_marca
											  left join animales a on p.animal_product=a.id_animal
			                                  left join producto_size ps on p.id_product=ps.product_size 
			        where ps.product_size=$id_product";
			
		}

		public function getProducto_comprado($tipo_producto, $tipo_size){
			
			return "select * from productos p left join producto_size ps 
				    on p.id_product=ps.product_size 
			        where ps.product_size=$tipo_producto and ps.size_size='$tipo_size'";
			
		}

		public function getCiudades(){

			return "select * from ciudad order by nom_ciudad";
			
		}

		public function getMail($mail){
			return "select * from usuarios where mail_user='$mail'";
		}
		
		public function getUser($id){
			return "select * from ciudad c left join callejero cj on c.id_ciudad=cj.ciudad_calle
			        left join usuarios u on cj.id_calle=u.calle_user where u.id_user=$id";
		}

		public function getBuscador($cadena, $rango){
			
			return "select * from marcas m left join productos p on m.id_marca=p.marca_product
			        left join animales a on a.id_animal=p.animal_product
			        where m.nom_marca like'%$cadena%' or a.nom_animal like'%$cadena%' or 
			        p.edad_product like'%$cadena%' or p.tipo_product like'%$cadena%' or
			        p.nom_product like'%$cadena%' or p.descripcion_product like'%$cadena%' or
			        composicion_product like'%$cadena%' or comp_analiticos_product like'%$cadena%'
					limit $rango, 5";
			
		}
		
		public function getCantBuscador($cadena){
				
			return "select * from marcas m left join productos p on m.id_marca=p.marca_product
			left join animales a on a.id_animal=p.animal_product
			where m.nom_marca like'%$cadena%' or a.nom_animal like'%$cadena%' or
			p.edad_product like'%$cadena%' or p.tipo_product like'%$cadena%' or
			p.nom_product like'%$cadena%' or p.descripcion_product like'%$cadena%' or
			composicion_product like'%$cadena%' or comp_analiticos_product like'%$cadena%'";
				
		}
		
		//administrador
		
		public function getNumCompra(){
			return "select id_compra from compra order by id_compra DESC";
		}
		
		public function getFecha(){
			return "select fecha_compra from compra group by fecha_compra DESC";
		}
		
		public function getUsuario(){
			return "select id_user, nom_user, ape_uno_user, ape_dos_user from usuarios where role_user='ROLE_USER'";
		}
		
		public function getMes(){
			return "select mes_compra from compra group by mes_compra";
		}
		
		public function getAnyo(){
			return "select anyo_compra from compra group by anyo_compra";
		}
		
		public function getPorRango($fecha, $fecha2){
			return "select * from compra c left join usuarios u on c.user_compra=u.id_user
			where c.fecha_compra between '$fecha' and '$fecha2'";
		}

		public function getPorFecha($fecha){
			return "select * from compra c left join usuarios u on c.user_compra=u.id_user
			        where c.fecha_compra='$fecha'";
		}
		
		public function getPorFactura($factura){
			return "select * from compra c left join usuarios u on c.user_compra=u.id_user 
					left join callejero cj on u.calle_user =cj.id_calle
					left join ciudad ci on cj.ciudad_calle=ci.id_ciudad
					where c.id_compra=".$factura." order by c.id_compra DESC";
		}
		
		public function getPorUsuario($user_compra){
			return "select * from compra c left join usuarios u on c.user_compra=u.id_user 
					where c.user_compra=".$user_compra." order by c.id_compra DESC";
		}
		
		public function getLineaCompra($factura){
			return "select * from linea_compra lc left join producto_size ps 
			        on lc.product_size_linea=ps.id_size
			        left join productos p on ps.product_size=p.id_product
			        left join marcas m on p.marca_product=m.id_marca
			        where lc.compra_linea=$factura";
		}
		
		public function setPago($id){
			return "update compra set pay_compra=-1 where id_compra=$id";
		}
		
		public function setEstado($id){
			return "update compra set fin_compra=-1 where id_compra=$id";
		}
		
		public function getPorMarca(){
			return "select * from marcas";
		}
		
		public function getPorAnimal(){
			return "select * from animales";
		}
		
		public function getPorEdad(){
			return "select edad_product from productos group by edad_product";
		}
		
		public function getAdminProducts(){
			return "select edad_product from productos group by edad_product";
		}
		
		public function getPorMes($mes, $anyo){
			return "select * from compra c left join usuarios u on c.user_compra=u.id_user
			where c.mes_compra='$mes' and c.anyo_compra='$anyo'";
		}
		
		public function getPorAnyo($mes, $anyo){
			return "select * from compra c left join usuarios u on c.user_compra=u.id_user
			where c.anyo_compra='$anyo'";
		}
	}
?>