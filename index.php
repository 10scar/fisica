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
    <div style="margin-bottom: 23px"></div>
    <div class="container fluid">
        <div class="">
            <center>
            <a href="crud/resultados.php"><button class="btn btn-success" style="margin-bottom: 10px">Consultar Resultados</button></a>
            <a href="crud/agregar.php"><button class="btn btn-warning" style="margin-bottom: 10px">Agregar Proyecto</button></a>
            </center>
  <div class="" style="margin-top: 30px">
            <h1 class="col card bg-info" style="font-family:Matura MT Script Capitals"><strong>Sesión Profesor</strong></h1>
        <form method="post" action="index.php" class="col">
            <div class="form-group">
                <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input type="password" id="contra" name="contra" class="form-control form-control-lg" placeholder="Contraseña">
            </div>
            <center><button type="submit" class="btn btn-primary" id="login">ENTRAR</button></center>
        </form>
    </div>
        </div>
    </div>
 <!--**************************Termina el codigo********************************-->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>  
</body>
</html>