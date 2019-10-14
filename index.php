<?php
 $alert= '';
   session_start();
   if (!empty($_SESSION['active'])) {
      header('location: crud/index.php');
   }else {




  if (!empty($_POST)) {
    if (empty($_POST['nombre'])|| empty($_POST['contra'])) {
      $alert='Ingrese su usuario y su clave';
      }else {
        require_once 'conexion.php';


        $nombre= $_POST['nombre'];
        $contra= $_POST['contra'];

        $query= mysqli_query($conection,"SELECT * FROM usuario WHERE usuario ='$nombre' AND password ='$contra'");
        $result= mysqli_num_rows($query);

        if ($result > 0)
        {
          $data= mysqli_fetch_array($query);

          $_SESSION['active']= true;
          $_SESSION['idUser']= $data['id'];
          $_SESSION['nombre']= $data['nombre'];
          $_SESSION['contra']= $data['contra'];
          

          header('location: crud/index.php');
          }
          else {
            $alert= 'El usuario o la clave son incorrectos';
              session_destroy();
          }




         }


    }
  }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
    body {
      display:flex;
      min-height: 100vh;
      flex-direction: column;
      background-image: url("img/fondo.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
  </style>
</head>
<body class="bg-ligt">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a href="#" class="navbar-brand mx-auto">Login Usuario</a>
    </nav>
    <div class="container mx-auto" style="margin-top: 15%; width: 40rem;">
        <div class="well">
            <a href="crud/resultados.php"><button class="btn btn-info">Consultar Resultados</button></a>
            <a href="crud/agregar.php"><button class="btn btn-info">Agregar Proyecto</button></a> <br>
            <h1 class=" card bg-secondary text-center">Inicio de sesión Profesor</h1>
        <form method="post" action="index.php">
            <div class="form-group">
                <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input type="password" id="contra" name="contra" class="form-control form-control-lg" placeholder="Contraseña">
            </div>
            <button type="submit" class="btn btn-primary" id="login">ENTRAR</button>
        </form>
        </div>
    </div>
 <!--**************************Termina el codigo********************************-->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>  
</body>
</html>