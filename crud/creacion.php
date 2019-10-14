<?php

  session_start();
  if (empty($_SESSION['active'])) {
     header('location: ../');
  }

   ?>

<!doctype html>
<html lang="es">
  <head>
    <?php 
    include('../extend/conexion.php');
    $proyecto = new clsconexion();
    $mensaje= "";
    if (isset($_POST) && !empty($_POST)) 
    {
      $nombre = $_POST['nombre'];
      $integrantes = $_POST['integrantes'];
      $descripcion = $_POST['descripcion'];
      $nota = $_POST['nota'];
      $res = $proyecto->create($nombre, $integrantes, $descripcion, $nota);
      if ($res) {?>
          <script type="text/javascript">    
          alert("Proyecto Creado");
          window.location.replace("index.php");
          </script>
          }<?php }else { ?>
          <script type="text/javascript">    
          alert("Proyecto No creado");
          </script>
     <?php }
    }
     ?>
    <title>Actualizar Proyecto</title>

   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie-edge">

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

  <style>
    body {
      display:flex;
      min-height: 100vh;
      flex-direction: column;
      background-image: url("../img/crear.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
  </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a href="#" class="navbar-brand mx-auto">Gestión Proyectos</a>
  </nav>    
 <!--**************************Empieza el codigo********************************-->
    <h1 class="text-white"><center>Adicionar Proyecto</center></h1>
<div class="container fluid">
  <a href="../logout.php"><button class="btn btn-danger">Salir</button></a>
    <a href="index.php"><button class="btn btn-warning">Regresar</button></a>
     <form action="" method="POST" class="col card">
        <div class="form-group">
          <label for="nom"><strong>Nombre Integrante</strong></label>
          <input type="text" class="form-control"  id="nom" name="integrantes" placeholder="Digite el nombre del estudiante" required>
        </div>

        <div class="form-group">
          <label for="nom"><strong>Nombre Proyecto</strong></label>
          <input type="text" class="form-control"  id="nom" name="nombre" placeholder="Digite el nombre del experimento" required>
        </div>

        <div class="form-group">
          <label for="des"><strong>Descripcion</strong></label>
          <input type="text" class="form-control"  id="des" name="descripcion" placeholder="Digite la descripción" required>
        </div>

        <div class="form-group">
          <label for="nota"><strong>Nota</strong></label>
          <input type="number" class="form-control"  id="nota" name="nota" placeholder="Digite Nota">
        </div>

          <center><input type="submit" name="" value="Guardar Datos" class="btn btn-info"></center>
     </form>
</div>
 <!--**************************Empieza el codigo********************************-->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js" ></script>  
  </body>
</html>