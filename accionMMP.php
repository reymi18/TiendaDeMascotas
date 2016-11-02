<?php 

$nombre = $_GET['nombre'];
$id=$_GET['id'];
$unidad =$_GET['unidad'];
$cant = $_GET['cant'];

include("conexion.php");
$link = Conectarse();
echo $nombre;
 mysqli_query($link,"UPDATE  materiaprima SET  nombre='$nombre', medida ='$unidad', cantidad=$cant WHERE id= $id ;");  
 mysqli_close($link);

 header('Location: obtenerDatos.php');
?>