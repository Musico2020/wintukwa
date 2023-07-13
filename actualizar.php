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
</head>
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

	
	
<br>
		<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
           <br>
            <li class="nav-item menu-open">
							<center>
							<a href="hojacreada.php" type="button" class="btn btn-primary"> 
              Pacientes Registrados
            </a>
						</center>
						<br>
						<br>
						<center>
            <a title="Wintukwa" href="http://www.wintukwaipsi.com/#/Inicio"><img src="imagen/logo.png" 
            </center>
            <?php if ($tipo_usuario == 1) { ?>

            
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
              aria-expanded="false" aria-controls="collapseLayouts">
              
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
             
                <a class="nav-link" href="Nuevo.php">Registro</a>
                <a class="nav-link" href="agenda.php">Imforme</a>
              </nav>
            </div>
           
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
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM paciente WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
?>

<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR REGISTRO DE PACIENTE</h3>
			</div>  
			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
				<div class="form-group">
					<label for="Nombres" class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Nombres" name="Nombres" placeholder="Nombres" value="<?php echo $row['Nombres']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="Tipo_documento" class="col-sm-2 control-label">Tipo de documento</label>
					<div class="col-sm-10">
						<select class="form-control" id="Tipo_documento" name="Tipo_documento">
							<option value="CC" <?php if($row['Tipo_documento']=='CC') echo 'selected'; ?>>CC</option>
							<option value="TI" <?php if($row['Tipo_documento']=='TI') echo 'selected'; ?>>TI</option>
							<option value="RC" <?php if($row['Tipo_documento']=='RC') echo 'selected'; ?>>RC</option>
							<option value="MS" <?php if($row['Tipo_documento']=='MS') echo 'selected'; ?>>MS</option>
							<option value="AS" <?php if($row['Tipo_documento']=='AS') echo 'selected'; ?>>AS</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="Numero_documento" class="col-sm-2 control-label">Numero de documento</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Numero_documento" name="Numero_documento" placeholder="Numero_documento" value="<?php echo $row['Numero_documento']; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono" value="<?php echo $row['Telefono']; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Direccion" class="col-sm-2 control-label">Direccion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Direccion" value="<?php echo $row['Direccion']; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Edad" class="col-sm-2 control-label">Edad</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Edad" name="Edad" placeholder="Edad" value="<?php echo $row['Edad']; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<label for="Tipo_afiliacion" class="col-sm-2 control-label">Tipo de afiliacion</label>
					<div class="col-sm-10">
						<select class="form-control" id="Tipo_afiliacion" name="Tipo_afiliacion">
							<option value="subcidiado" <?php if($row['Tipo_afiliacion']=='subcidiado') echo 'selected'; ?>>subcidiado</option>
							<option value="contributivo" <?php if($row['Tipo_afiliacion']=='contributivo') echo 'selected'; ?>>contributivo</option>
						
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="Origen" class="col-sm-2 control-label">Origen</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Origen" name="Origen" placeholder="Origen" value="<?php echo $row['Origen']; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Zona" class="col-sm-2 control-label">Zona</label>
					<div class="col-sm-10">
						<select class="form-control" id="Zona" name="Zona">
							<option value="Rural" <?php if($row['Zona']=='Rural') echo 'selected'; ?>>Rural</option>
							<option value="Urbana" <?php if($row['Zona']=='Urbana') echo 'selected'; ?>>Urbana</option>

						
						</select>
					</div>
					</div>
					<div class="form-group">
					<label for="Cita_asignada" class="col-sm-2 control-label">Cita asignada</label>
					<div class="col-sm-10">
						<select class="form-control" id="Cita_asignada" name="Cita_asignada">
							<option value="Medicina interna" <?php if($row['Cita_asignada']=='Medicina interna') echo 'selected'; ?>>Medicina interna</option>
							<option value="Medicina general" <?php if($row['Cita_asignada']=='Medicina general') echo 'selected'; ?>>Medicina general</option>
							<option value="Laboratorio" <?php if($row['Cita_asignada']=='Laboratorio') echo 'selected'; ?>>Laboratorio</option>
							<option value="Nutrcion" <?php if($row['Cita_asignada']=='Nutrcion') echo 'selected'; ?>>Nutrcion</option>
							<option value="Psicologia" <?php if($row['Cita_asignada']=='Psicologia') echo 'selected'; ?>>Psicologia</option>
							<option value="Farmacia" <?php if($row['Cita_asignada']=='Farmacia') echo 'selected'; ?>>Farmacia</option>
							</select>
					</div>
				</div>
			
				<div class="form-group">
					<label for="Fecha_cita" class="col-sm-2 control-label">Fecha de cita</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="Fecha_cita" name="Fecha_cita" placeholder="Fecha_cita" value="<?php echo $row['Fecha_cita']; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Cumplio_cita" class="col-sm-2 control-label">Cumplio la cita</label>
					<div class="col-sm-10">
						<select class="form-control" id="Cumplio_cita" name="Cumplio_cita">
							<option value="SI" <?php if($row['Cumplio_cita']=='SI') echo 'selected'; ?>>SI</option>
							<option value="NO" <?php if($row['Cumplio_cita']=='NO') echo 'selected'; ?>>NO</option>
							<option value="PRIMERA VEZ" <?php if($row['Cumplio_cita']=='PRIMERA VEZ') echo 'selected'; ?>>PRIMERA VEZ</option>
						
						</select>
					</div>
					</div>
					<div class="form-group">
					<label for="Recibio_medicamento" class="col-sm-2 control-label">Recibio los medicamento</label>
					<div class="col-sm-10">
						<select class="form-control" id="Recibio_medicamento" name="Recibio_medicamento">
							<option value="SI" <?php if($row['Recibio_medicamento']=='SI') echo 'selected'; ?>>SI</option>
							<option value="NO" <?php if($row['Recibio_medicamento']=='NO') echo 'selected'; ?>>NO</option>
							
						
						</select>
					</div>
					</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="hojacreada.php" class="btn btn-success">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>