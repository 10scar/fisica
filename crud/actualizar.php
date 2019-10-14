<?php

  session_start();
  if (empty($_SESSION['active'])) {
     header('location: ../');
  }

   ?>

<?php if (isset($_GET['id'])) {
      $id=intval($_GET['id']);
    }else{
  header("location:index.php");
    } ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Actualizar</title>

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

  <?php 
    include('../extend/conexion.php');
    $proyecto = new clsconexion();
    if (isset($_POST) && !empty($_POST)) 
    {
      $nombre = $_POST['nombre'];
      $integrantes = $_POST['integrantes'];
      $descripcion = $_POST['descripcion'];
      $nota = $_POST['nota'];
      $id_proyecto=intval($_POST['id_proyecto']);
      $res = $proyecto->update($nombre, $integrantes, $descripcion,  $nota, $id_proyecto);
      if ($res) { ?>
     <script type="text/javascript">    
          alert("Proyecto Actualizado");
          window.location.replace("index.php");
      </script>
    <?php }else {
        $mensaje ="error";
      }
    }
      $datos_proyecto=$proyecto->leer_uno($id);
     ?>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a href="#" class="navbar-brand mx-auto">Gestión Proyectos</a>
  </nav>
 <!--**************************Empieza el codigo********************************-->
    <h1 class="text-white"><center>Actualizar Proyecto</center></h1>
<div class="container fluid">
  <a href="../logout.php"><button class="btn btn-danger">Salir</button></a>
    <a href="index.php"><button class="btn btn-warning">Regresar</button></a>
     <form method="POST" class="col card" style="background-color: white">

      <input type="hidden"  name="id_proyecto" value="<?php echo $datos_proyecto->id_proyecto;?>">
        <div class="form-group">
          <div class="form-group">
          <label for="nom"><strong>Nombre Integrante</strong></label>
          <input type="text" class="form-control"  id="nom" name="integrantes" value="<?php echo$datos_proyecto->integrantes ?>" required>
        </div>

        <div class="form-group">
          <label for="nom"><strong>Nombre Proyecto</strong></label>
          <input type="text" class="form-control"  id="nom" name="nombre" value="<?php echo$datos_proyecto->nombre ?>" required>
        </div>

        <div class="form-group">
          <label for="des"><strong>Descripcion</strong></label>
          <input type="text" class="form-control"  id="des" name="descripcion" value="<?php echo$datos_proyecto->descripcion ?>" required>
        </div>

        <div class="form-group">
          <label for="nota"><strong>Nota</strong></label>
          <input type="number" class="form-control"  id="nota" name="nota" value="<?php echo$datos_proyecto->nota ?>">
        </div>
          <center><input type="submit" value="Actualizar Datos" class="btn btn-info"></center>
     </form>
</div>
 <!--**************************Empieza el codigo********************************-->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js" ></script>  
  </body>
</html>