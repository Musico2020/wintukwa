<?php

  require "conexion.php";

  session_start();

  if($_POST){

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT id, password, nombre, tipo_usuario FROM usuarios WHERE usuario='$usuario'";

    $resultado = $mysqli->query($sql);
    $num = $resultado->num_rows;

    if ($num > 0) {
      
      $row = $resultado->fetch_assoc();
      $password_bd = $row['password'];

      $pass_c = sha1($password);

      if ($password_bd == $pass_c) {
        
        $_SESSION['id'] = $row['id'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

        header("Location: hojacreada.php");

      }else{

        echo "La contraseña no coincide";

      }

    }else{

      echo "No existe el usuario";

    }

  }

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
   
  <link rel="stylesheet" href="css1/login.css">
    <link rel="stylesheet" href="css1/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
  </script>
</head>

<body >
 
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <br>
        <br>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                
                <div class="card-body">
                  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> " class="animate__animated animate__bounce">
                   <h1 class="animate__animated animate__bounce">BIENVENIDOS A WINTUKWA IPSI</h1>
                    <div class="form-group">
                      <label class="small mb-1" for="inputEmailAddress">Usuario</label>
                      <input class="form-control py-4" id="inputEmailAddress" type="text" name="usuario"
                        placeholder="Ingresa tu usuario" />
                    </div>
                    <div class="form-group">
                      <label class="small mb-1" for="inputPassword">contraseña</label>
                      <input class="form-control py-4" id="inputPassword" type="password" name="password"
                        placeholder="ingrese su contraseña" />
                        <br><br>
                        <input type="submit"  class="btn btn-success" value="Iniciar Sesion">
                    </div>
                    
                    
                  </form>
                </div>
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    

    <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <b>
            <div style="color:black"  class="animate__animated animate__bounce"> Todos los derechos reservados Wintukwa ipsi</div>
            <div style="color:black" class="animate__animated animate__bounce animate__faster" >Creado por Dilsof</div></b>
            <div>
              <a href="#"></a>
              &middot;
              <a href="#"></a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="js/scripts.js"></script>
</body>

</html>