<?php
	
	require 'conexioncrud.php';
	
	$Nombres = $_POST['Nombres'];
	$Tipo_documento= $_POST['Tipo_documento'];
	$Numero_documento= $_POST['Numero_documento'];
	$Telefono = $_POST['Telefono'];
	$Direccion= $_POST['Direccion'];
	$Edad= $_POST['Edad'];
	$Tipo_afiliacion= $_POST['Tipo_afiliacion'];
	$Origen= $_POST['Origen'];
  $Zona= $_POST['Zona'];
	$Cita_asignada= $_POST['Cita_asignada'];
	$Fecha_cita= $_POST['Fecha_cita'];
	$Cumplio_cita= $_POST['Cumplio_cita'];
	$Recibio_medicamento = $_POST['Recibio_medicamento'];
	
	
	
	$sql = "INSERT INTO paciente(Nombres, Tipo_documento, Numero_documento, Telefono, Direccion, Edad, Tipo_afiliacion, Origen, Zona,  Cita_asignada, Fecha_cita, Cumplio_cita, Recibio_medicamento) VALUES 
	('$Nombres', '$Tipo_documento', '$Numero_documento', '$Telefono', '$Direccion', '$Edad','$Tipo_afiliacion', '$Origen', '$Zona', '$Cita_asignada', '$Fecha_cita', '$Cumplio_cita', '$Recibio_medicamento')";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="hojacreada.php" class="btn btn-primary">OK</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
