<?php

  session_start();

  if (!isset($_SESSION['id'])) {

    header('Location: index.php');

  }

  $nombre = $_SESSION['nombre'];
  $tipo_usuario = $_SESSION['tipo_usuario'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
		
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		
  <title>WINTUKWA</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
  </script>
  <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="principal.php">SISTEMA DE GESTION DE PACIENTES CON DIABETES</a>
    <button class="btn btn-link btn-sm order-3 order-lg-2" id="sidebarToggle" href="#"><i
        class="fas fa-bars"></i></button>
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <?php echo $nombre ?>
          <i class="fas fa-user fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Configuración</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Salir</a>
        </div>
      </li>
    </ul>
  </nav>

	
	

		<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <br>
            <li class="nav-item menu-open">
              <center>
            <a href="pr.php" type="button" class="btn btn-primary">
             INICIO
            </a>
            </center>
            <?php if ($tipo_usuario == 1) { ?>

              
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
              aria-expanded="false" aria-controls="collapseLayouts">
             
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
              <br>
            <br>
                <a class="nav-link" href="Nuevo.php">Registro</a>
                <a class="nav-link" href="agenda.php">Imforme</a>
              </nav>
            </div>
           
            <center>
            <a title="Wintukwa" href="http://www.wintukwaipsi.com/#/Inicio"><img src="imagen/logo.png" 
            </center>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth"
                  aria-expanded="false" aria-controls="pagesCollapseAuth">
                
                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                  data-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="login.html">Login</a>
                    <a class="nav-link" href="register.html">Register</a>
                    <a class="nav-link" href="password.html">Forgot Password</a>
                  </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError"
                  aria-expanded="false" aria-controls="pagesCollapseError">
                  Error
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                  data-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="401.html">401 Page</a>
                    <a class="nav-link" href="404.html">404 Page</a>
                    <a class="nav-link" href="500.html">500 Page</a>
                  </nav>
                </div>
              </nav>
            </div>

            <?php } ?>

               

            
              
            
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Creado para</div>
          WINTUKWA IPSI
        </div>
      </nav>
    </div>
    <br>
    <br>
    <br>
	
    <div id="layoutSidenav_content">
      <main> 
      <div class="container-fluid">
    <?php
	require 'conexioncrud.php';
	
	$where = "";
	
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor'";
		}
	}
	$sql = "SELECT * FROM paciente $where";
	$resultado = $mysqli->query($sql);
?>
<?php
$busqueda= $_REQUEST['busqueda'];

$busqueda = strtolower( $_REQUEST['busqueda']);
if(empty(busqueda))
{
  header("location:hojacreada.php");
}
?>
<div class="container">
			<div class="row">
        <center>
				<h2 style="text-align:center">Registros de pacientes</h2>
        </center>
			</div>
			
			<div class="row">
				<a href="Nuevo.php" class="btn btn-success">Agregar Paciente</a>
				</div>
        <br>
        <div class="row">
      <form action="buscar.php" method="get" class="form_search">

      <b> Buscar paciente: </b><input type="text" id="busqueda" name="busqueda" placeholder="Buscar" value="<?php echo $busqueda;?>"/>
					<input type="submit"   value="Buscar" class="btn btn-success" />
				</form>
        </div>
			<br>
			
			<div class="row table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>id</th>
							<th>Nombres</th>
							<th width="250">Tipo de Documento</th>
							<th width="250">Numero de Documneto</th>
							<th>Telefono</th>
							<th>Direccion</th>
							<th>Edad</th>
							<th width="250">Tipo de Afiliacion</th>
							<th>Origen</th>
							<th>Zona</th>
							<th width="250">Cita Asignada</th>
							<th width="250">Fecha de Cita</th>
							<th width="250" >Cumplio Cita</th>
							<th width="250">Recibio Medicamentos</th>
              <th>Acciones</th>
              
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['Nombres']; ?></td>
								<td width="250"><?php echo $row['Tipo_documento']; ?></td>
								<td width="250"><?php echo $row['Numero_documento']; ?></td>
								<td><?php echo $row['Telefono']; ?></td>
								<td><?php echo $row['Direccion']; ?></td>
								<td><?php echo $row['Edad']; ?></td>
								<td width="250"><?php echo $row['Tipo_afiliacion']; ?></td>
								<td><?php echo $row['Origen']; ?></td>
								<td><?php echo $row['Zona']; ?></td>
								<td width="250"><?php echo $row['Cita_asignada']; ?></td>
								<td width="250"><?php echo $row['Fecha_cita']; ?></td>
								<td width="250"><?php echo $row['Cumplio_cita']; ?></td>
                
								<td width="250"><?php echo $row['Recibio_medicamento']; ?></td>
                
								<td><a  class= "btn btn-outline-success" href="actualizar.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span>Actualizar</a></td>
								<td><a class= "btn btn-outline-danger" href="eliminar.php" data-href="eliminar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span>Eliminar</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<center>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
						
					</div>
					</center>
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">ELIMINAR</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
		
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            
                        </div>
                    </div>

                </footer>
            </div>
        </div>
				</div>
        <script src="confirmar.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>