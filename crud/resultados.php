<!doctype html>
<html lang="es">
  <head>
    <title>Proyectos Fisica</title>

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
      background-image: url("../img/resultados.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
  </style>

  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a href="#" class="navbar-brand mx-auto">Resultados Proyectos</a>
  </nav>

 <!--**************************Empieza el codigo********************************-->
    <h1><center class="card">Lista de Proyectos</center></h1>
  <div class="" style="margin-top: 1%;">
    <a href="../index.php"><button class="btn btn-warning">Regresar</button></a>
    <div class="card bg-white border-info text-black ">
      <div class="table-responsive">
      <table class="table" style="">
        <thead>
        <td scope="col"><strong>Nombre Integrante</strong></td>
        <td scope="col"><strong>Nombre Proyecto</strong></td>
        <td scope="col"><strong>Descripción</strong></td>
        <td scope="col"><strong>Nota</strong></td>
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