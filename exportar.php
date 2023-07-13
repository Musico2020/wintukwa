<?php


$conexion = mysqli_connect ("localhost","root","","");
mysqli_select_db ($conexion, 'wintukwa');
$sql = 'SELECT * FROM paciente';

$resultado = mysqli_query ($conexion, $sql) or die (mysql_error ());

$paciente = array();

while( $rows = mysqli_fetch_assoc($resultado) ) {

$paciente[] = $rows;

}

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
</head>
<body>
  
<div class="container">
 <h2>Exportar datos a Excel con PHP y MySQL</h2>
 <br>
 <br>
<a href="conexport.php" class="btn-small blue z-depth">Descargar Excel</a>

 

<table id=“” class=“table table-striped”>
               <th>Id</th>
							<th>Nombres</th>
							<th >Tipo de Documento</th>
							<th >Numero de Documneto</th>
							<th>Telefono</th>
							<th>Direccion</th>
							<th>Edad</th>
							<th >Tipo de Afiliacion</th>
							<th>Origen</th>
							<th>Zona</th>
							<th >Cita Asignada</th>
							<th >Fecha de Cita</th>
							<th >Cumplio Cita</th>
							<th >Recibio Medicamento</th>
              

</tr>

 

<tbody>

<?php foreach($paciente as $paciente) { ?>

<tr>

<td><?php echo $paciente ['id']; ?></td>
<td><?php echo $paciente ['Nombres']; ?></td>
<td><?php echo $paciente['Tipo_documento']; ?></td>

<td><?php echo $paciente['Numero_documento']; ?></td>

<td><?php echo $paciente ['Telefono']; ?></td>
<td><?php echo $paciente ['Direccion']; ?></td>
<td><?php echo $paciente ['Edad']; ?></td>
<td><?php echo $paciente ['Tipo_afiliacion']; ?></td>
<td><?php echo $paciente ['Origen']; ?></td>
<td><?php echo $paciente ['Zona']; ?></td>
<td><?php echo $paciente ['Cita_asignada']; ?></td>
<td><?php echo $paciente ['Cumplio_cita']; ?></td>
<td><?php echo $paciente ['Recibio_medicamento']; ?></td>


</tr>

<?php } ?>

</tbody>

</table>

</div>
</body>
</html>