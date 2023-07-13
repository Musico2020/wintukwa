<?php
  
header("content-type: application/xls;charset=utf-8");
header("content-Disposition: attachment; filename= paciente.xls;charset=utf-8");
?>

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

<?php


$conexion = mysqli_connect ("localhost","root","","");
mysqli_select_db ($conexion, 'wintukwa');
mysqli_set_charset($conexion,'utf8');
$sql = 'SELECT * FROM productos';

$resultado = mysqli_query ($conexion, $sql) or die (mysql_error ());

$productos = array();

while( $rows = mysqli_fetch_assoc($resultado) ) {

$productos[] = $rows;

}

 
?>

<tbody>

<?php foreach($productos as $productos) { ?>

<tr>

<td><?php echo $productos ['id']; ?></td>
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
<td><?php echo $paciente ['Fecha_cita']; ?></td>
<td><?php echo $paciente ['Cumplio_cita']; ?></td>
<td><?php echo $paciente ['Recibio_medicamento']; ?></td>


</tr>

<?php } ?>

</tbody>

</table>
