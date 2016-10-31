<?php 

$nombre = $_GET['nombre'];
$id=$_GET['id'];
$unidad =$_GET['unidad'];
$cant = $_GET['cant'];

include("conexion.php");
$link = Conectarse();
echo $nombre;
 mysql_query("UPDATE  materiaprima SET  nombre='$nombre', medida ='$unidad', cantidad=$cant WHERE id= $id ;",$link);  
 mysql_close($link);

 header('Location: obtenerDatos.php');
?>