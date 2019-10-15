<?php

  session_start();
  if (empty($_SESSION['active'])) {
     header('location: ../');
  }

   ?>

<!doctype html>
<html lang="es">
  <head>
    <title>Agregar Proyectos</title>

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
      background-image: url("../img/index.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
  </style>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a href="#" class="navbar-brand mx-auto">Gestión Proyectos</a>
  </nav>

 <!--**************************Empieza el codigo********************************-->
    <h1 class=""><center>Lista de Proyectos</center></h1>
    <div class="" style="margin-top: 1%;">
      <div class="row">
      <a href="../logout.php"><button class="btn btn-danger">Salir</button></a>
    <div class="col"><a href="creacion.php"><button class="btn btn-success">Adicionar Proyecto</button></a></div>
      </div>
    <div class=" card bg-info">
      <div class="table-responsive">
      <table class="table" style="">
        <thead>
        <td><strong>Nombre Integrante</strong></td>
        <td><strong>Nombre Proyecto</strong></td>
        <td><strong>Descripción</strong></td>
        <td><strong>Nota</strong></td>
        <td><strong>Acciones</strong></td>
        </thead>
        <?php include('../extend/conexion.php');
        $proyectos = new clsconexion();
        $listado = $proyectos->leer();
        ?>
        <tbody>
          <?php 
          while ($row = mysqli_fetch_object($listado)) {
            $id = $row->id_proyecto;
            $nombre= $row->nombre;
            $integrante = $row->integrantes;
            $descripcion = $row->descripcion;
            $nota = $row->nota; 
          ?>
          <tr>

            <td><?php echo $integrante; ?></td>
            <td><?php echo $nombre ?></td>
            <td><?php echo $descripcion ?></td>
            <td><?php echo $nota ?></td>
            <td>
              <a href="eliminar.php?id=<?php echo $id ?>"><button class="btn btn-danger">Borrar</button></a>
              <a href="actualizar.php?id=<?php echo $id ?>"><button class="btn btn-warning">Actualizar</button></a>
            </td>
          </tr>
          </tr>
         <?php } ?>
        </tbody>  
      </table>

      </div>
    </div>
    
   </div>

 <!--**************************Empieza el codigo********************************-->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js" ></script>  
  </body>
</html>