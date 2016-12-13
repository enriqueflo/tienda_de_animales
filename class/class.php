<?php
	require_once("connection.php");
	class Trabajo{
		private $lista;

		public function consultas($query){
			$this->lista=array();
			$res=mysqli_query(Conectar::connect(), $query);
			while($row=mysqli_fetch_assoc($res)){
				$this->lista[]=$row;
			}
			mysqli_close(Conectar::connect());
			return $this->lista;
			
		}
		public function consultasCant($query){
			$res=mysqli_query(Conectar::connect(), $query);
			$count=$res->num_rows;
			mysqli_close(Conectar::connect());
			return $count;
				
		}
		
		public function updates($query, $id){
			mysqli_query(Conectar::connect(), $query);
			$this->lista=array();
			$res=mysqli_query(Conectar::connect(), $id);
			while($row=mysqli_fetch_assoc($res)){
				$this->lista[]=$row;
			}
			mysqli_close(Conectar::connect());
			return $this->lista;
		}

		public function login_user($datos){
			$pass_php=md5($datos["pass"]);
			$sql="select * from usuarios 
				  where mail_user='".$datos["user"]."' and pass_user='".$datos["pass"]."' 
				  and pass_php_user='".$pass_php."'";
			$res=mysqli_query(Conectar::connect(), $sql);
			while($row=mysqli_fetch_array($res)){
				$login=array($row["nom_user"], $row["ape_uno_user"], 
						     $row["role_user"], $row["id_user"]);
			}
			mysqli_close(Conectar::connect());
			return $login;
			
		}

		public function new_pass_user($datos){
			$pass_php=md5($datos["new_pass"]);
			$sql_update_user="update usuarios set pass_user='".$datos['new_pass']."', 
							  pass_php_user='".$pass_php."' where mail_user='".$datos["new_user"]."'";
			$res=mysqli_query(Conectar::connect(), $sql_update_user);
			$sql_select_user="select * from usuarios 
				  			  where mail_user='".$datos["new_user"]."'";
			$res=mysqli_query(Conectar::connect(), $sql_select_user);
			while($row=mysqli_fetch_array($res)){
				$login=array($row["nom_user"], $row["ape_one_user"], $row["role_user"]);
			}
			mysqli_close(Conectar::connect());
			return $login;
			
		}

		public function insert_admin($datos){
			$id_calle=array();
			$pass_php=md5($datos["new_pass"]);
			$sql_select_calle="select id_calle from callejero where tipo_calle='".$datos['tipo_calle']."'
			      			   and nom_calle='".$datos['nom_calle']."' and cp_calle='".$datos['cp']."' and 
			                   ciudad_calle=".$datos['ciudad'];
			$res=mysqli_query(Conectar::connect(), $sql_select_calle);  
			while($row=mysqli_fetch_assoc($res)){
				$id_calle=$row;
			}
			if(count($id_calle)==0){
				$sql_inser_calle="insert into callejero values(
					    		  null, '".$datos['tipo_calle']."', '".$datos['nom_calle']."',
					    		 '".$datos['cp']."', ".$datos['ciudad'].")";
				$res=mysqli_query(Conectar::connect(), $sql_inser_calle);
				$sql_select_calle="select id_calle from callejero where tipo_calle='".$datos['tipo_calle']."'
				      			   and nom_calle='".$datos['nom_calle']."' and cp_calle='".$datos['cp']."' and 
				      			   ciudad_calle=".$datos['ciudad'];
				$res=mysqli_query(Conectar::connect(), $sql_select_calle);  
				while($row=mysqli_fetch_assoc($res)){
					$id_calle=$row;
				}
			}
			$sql_inser_user="insert into usuarios values(
					    	  null, '".$datos['name']."', '".$datos['ape_uno']."', '".$datos['ape_dos']."', 
					    	  ".$id_calle['id_calle'].", '".$datos['numero']."', '".$datos['escalera']."',
					    	  '".$datos['piso']."', '".$datos['puerta']."', '".$datos['mail']."', 
					    	  ".$datos['phone'].", ".$datos['movil'].", '".$datos['new_pass']."',
					    	  '".$pass_php."', -1, '".$datos['role']."')";
			$res=mysqli_query(Conectar::connect(), $sql_inser_user);
			mysqli_close(Conectar::connect());
			return "Usuario introducido con exito";
		}
		
		public function insert_compra($lineas, $compra){
			$total_gasto_compra=0.00;
			for ($i = 0; $i < count($lineas); $i++) {
				$total_gasto_compra=$total_gasto_compra+$lineas[$i][10];
			}
			$mes=date('F');
			$anyo=date('Y');
			$sql_inser_compra="insert into compra values(
					    	  null, ".$_SESSION["id"].",  ".$total_gasto_compra.", ".$compra["total"].", ".$compra["envio"].", '".$compra["pago"]."', 
					    	   now(), '".$mes."', ".$anyo.", 0, 0)";
			mysqli_query(Conectar::connect(), $sql_inser_compra);
			$sql_cant_compra="select * from compra;";
			$cantidad=mysqli_query(Conectar::connect(), $sql_cant_compra);
			$row_cnt = mysqli_num_rows($cantidad);
			for ($i = 0; $i < count($lineas); $i++) {
				$sql_inser_linea="insert into linea_compra values(
					    	  null, ".$lineas[$i][0].", ".$row_cnt.", ".$lineas[$i][9].", ".$lineas[$i][6].", ".$lineas[$i][4].",
					    	  ".$lineas[$i][10].", ".$lineas[$i][7].")";
				$res=mysqli_query(Conectar::connect(), $sql_inser_linea);
			}
			for ($i = 0; $i < count($lineas); $i++) {
				$sql_cant_producto="select * from producto_size where id_size=".$lineas[$i][0].";";
				$compras_producto=mysqli_query(Conectar::connect(), $sql_cant_producto);
				while($row=mysqli_fetch_assoc($compras_producto)){
					$long=$row["cant_compra_size"];
				}
				$total=$long+$lineas[$i][4];
				$sql_update="update producto_size set cant_compra_size=".$total." where id_size=".$lineas[$i][0].";";
				mysqli_query(Conectar::connect(), $sql_update);
		    }
			mysqli_close(Conectar::connect());
			unset($_SESSION["carrito"]);
			return "<h3>La compra ha sido efectuada con éxito !!!!</h3>
                	<h6>Sí los productos estan en stock el pedido se servira de 24 a 48 horas</h6>
                	<h6>Sí los productos no se encuentran en el stock el tiempo de espera será de 5 a 10 días</h6>";
		}
	}
?>