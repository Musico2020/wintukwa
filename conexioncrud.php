<?php
	
	$mysqli = new mysqli('localhost', 'root', '', 'wintukwa');
	$mysqli->set_charset("utf8");
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>