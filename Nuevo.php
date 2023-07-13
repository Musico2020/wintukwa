<?php

  session_start();

  if (!isset($_SESSION['id'])) {

    header('Location: index.php');

  }

  $nombre = $_SESSION['nombre'];
  $tipo_usuario = $_SESSION['tipo_usuario'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>WINTUKWA</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
  </script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="hojacreada.php">SISTEMA DE GESTION DE PACIENTES CON DIABETES</a>
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
            <a href="hojacreada.php" type="button" class="btn btn-primary"> 
              Pacientes Registrados
            </a>
            </center>
            <?php if ($tipo_usuario == 1) { ?>

            
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
              aria-expanded="false" aria-controls="collapseLayouts">
              
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link" href="Equipos.php" >Equipos</a>
                <a class="nav-link" href="orden_de_trabajo.php">Orden de Trabajos</a>
                <a class="nav-link" href="salida_de_almacen.php">Salida de Almacen</a>
                <a class="nav-link" href="planes_mantenimiento.php">Planes de Mantenimiento</a>
                <a class="nav-link" href="prestadores_servicios.php">Prestadores de Servicios</a>
                <a class="nav-link" href="agenda.php">Agenda</a>
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
          <div class="small">Creado para:</div>
          WINTUKWA IPSI
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
	  <div class="container">
			<div class="row">
				<h3 style="text-align:center">Crear Paciente</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar.php" autocomplete="off">
				<div class="form-group">
					<label for="Nombres" class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Nombres" name="Nombres"  required>
					</div>
				</div>

      	<div class="form-group">
					<label for="Tipo_documento" class="col-sm-2 control-label">Tipo de documento </label>
					<div class="col-sm-10">
						<select class="form-control" id="Tipo_documento" name="Tipo_documento">
							<option value="CC">CC</option>
							<option value="TI">TI</option>
							<option value="RC">RC</option>
              <option value="MS">MS</option>
              <option value="RC">AS</option>
              </select>
					</div>
				</div>

				
				<div class="form-group">
					<label for="Numero_documento" class="col-sm-2 control-label">Numero de documento</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Numero_documento" name="Numero_documento"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="Telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Telefono" name="Telefono">
					</div>
				</div>
                <div class="form-group">
					<label for="Direccion" class="col-sm-2 control-label">Direccion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Direccion" name="Direccion" >
					</div>
				</div>
        <div class="form-group">
					<label for="Edad" class="col-sm-2 control-label">Edad</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Edad" name="Edad">
					</div>
				</div>

        <div class="form-group">
					<label for="Tipo_afiliacion" class="col-sm-2 control-label">Tipo de Afiliacion </label>
					<div class="col-sm-10">
						<select class="form-control" id="Tipo_afiliacion" name="Tipo_afiliacion">
							<option value="Subsidiado">Subsidiado</option>
							<option value="Contributivo">Contributivo</option>
							
              </select>
					</div>
				</div>
        <div class="form-group">
					<label for="Origen" class="col-sm-2 control-label">Asentamiento</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Origen" name="Origen" >
					</div>
				</div>
        <div class="form-group">
					<label for="Zona" class="col-sm-2 control-label">Zona</label>
					<div class="col-sm-10">
						<select class="form-control" id="Zona" name="Zona">
							<option value="Rural">Rural</option>
							<option value="Urbana">Urbana</option>
							
              </select>
					</div>
				</div>
        <div class="form-group">
					<label for="Cita_asignada" class="col-sm-2 control-label">Cita Asignada </label>
					<div class="col-sm-10">
						<select class="form-control" id="Cita_asignada" name="Cita_asignada">
							<option value="Medicina interna">Medicina interna</option>
							<option value="Medicina general">Medicina general</option>
              <option value="Laboratorio">Laboratorio</option>
							<option value="Nutricion">Nutricion</option>
              <option value="Pcicologia">Pcicologia</option>
							<option value="Farmacia">Farmacia</option>
							
              </select>
					</div>
				</div>
                <div class="form-group">
					<label for="Fecha_cita" class="col-sm-2 control-label">Fecha de Cita</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="Fecha_cita" name="Fecha_cita" placeholder="">
             
					</div>
				</div>
				
				<div class="form-group">
					<label for="Cumplio_cita" class="col-sm-2 control-label">Cumplio Cita </label>
					<div class="col-sm-10">
						<select class="form-control" id="Cumplio_cita" name="Cumplio_cita">
							<option value="SI">SI</option>
							<option value="NO">NO</option>
              <option value="PRIMERA VEZ">PRIMERA VEZ</option>
              
            </select>
					</div>
				</div>
				
        <div class="form-group">
					<label for="Recibio_medicamento" class="col-sm-2 control-label">Recibio Medicamento</label>
					<div class="col-sm-10">
						<select class="form-control" id="Recibio_medicamento" name="Recibio_medicamento">
							<option value="SI">SI</option>
							<option value="NO">NO</option>
            </select>
					</div>
				</div>
				
				
				</div>
				
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="hojacreada.php" class="btn btn-success">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
