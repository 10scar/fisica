<?php 
/**
Conexión Base de datos
 */
class clsconexion
{
	private $conexion;
	private $server="remotemysql.com";
	private $user="NOx0cRhQPG";
	private $clave="Vb3ahZWAFx";
	private $nombrebd="NOx0cRhQPG";

	function __construct() {
		$this->connect_db();
	}

	public function connect_db()
	{
		$this->conexion = mysqli_connect($this->server, $this->user, $this->clave, $this->nombrebd);
		if (mysqli_connect_error()) {
			die("Fallo conectar".mysqli_connect_error().mysqli_connect_errorno());
		}
	}
	public function leer()
	{
		$sql = "SELECT * FROM proyecto";
		$data = mysqli_query($this->conexion,$sql);
		return $data;
	}

	public function create($nombre, $integrantes, $descripcion, $nota)
	{
		$sql = "INSERT INTO proyecto(nombre, integrantes, descripcion, nota)";
		$sql = $sql."VALUES('$nombre', '$integrantes', '$descripcion', '$nota')";
		$res = mysqli_query($this->conexion,$sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}

	public function create2($nombre, $integrantes, $descripcion)
	{
		$sql = "INSERT INTO proyecto(nombre, integrantes, descripcion)";
		$sql = $sql."VALUES('$nombre', '$integrantes', '$descripcion')";
		$res = mysqli_query($this->conexion,$sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}

	public function update($nombre, $integrantes, $descripcion,  $nota, $id){
		$sql = "UPDATE proyecto SET nombre='$nombre', integrantes='$integrantes', descripcion='$descripcion', nota='$nota'";
		$sql = $sql." WHERE id_proyecto=$id";
		$res = mysqli_query($this->conexion,$sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}
	public function leer_uno($id)
	{
		$sql = "SELECT * FROM proyecto WHERE id_proyecto='$id'";
		$data= mysqli_query($this->conexion,$sql);
		$record= mysqli_fetch_object($data);
		return $record;
	}
	public function delete($id)
	{
		$sql= "DELETE FROM proyecto WHERE id_proyecto='$id'";
		$res= mysqli_query($this->conexion,$sql);
		if ($res)
		{
			return true;
		}else 
		{
			return false;
		}
	}
}
 ?>