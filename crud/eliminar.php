<?php 
if (isset($_GET['id']))
{
	include('../extend/conexion.php');
	$proyecto = new clsconexion();
	$id= intval($_GET['id']);
	$res = $proyecto->delete($id);
	header('location: index.php');
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Eliminar</title>
</head>
<body>
<h1>Error al eliminar proyecto</h1>
<a href="index.php">Regresar</a>
</body>
</html>