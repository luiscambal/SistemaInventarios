<?php session_start();
if (isset($_SESSION['usuario'])) {

  require ('controlador/conexion_bd.php');
  $conexion = dbConnect();
  $id_bus= $_POST['id_eo'];
  $conexion = dbConnect();

  $result = $conexion->prepare("SELECT * FROM EquipoOficina WHERE id_sistema ='$id_bus' LIMIT 1");
  $result->execute(array($id_bus));
  $rows = $result->fetch();
  if ($rows == false){
  $error .= "Este registro no se encuentra o no existe";

}
require ('vista/equipo_oficina_editar.view.php');
}
else {
	header('Location: index.php');
}
?>
