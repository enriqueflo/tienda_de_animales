<?php
	class Conectar{
		public static function connect(){
			$url="localhost";
			$user="u369765412_steel";
			$pass="hardcore";
			$db="u369765412_tiend";
			$conexion=mysqli_connect($url, $user, $pass, $db) or die(mysqli_connect_error());
			$conexion->query("SET NAMES 'utf8'");
			return $conexion;
		}
	}
?>
