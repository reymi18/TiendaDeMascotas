<?php 

$nombre = $_GET['nombre'];
$unidad =$_GET['unidad'];
$cant = $_GET['cant'];

include("conexion.php");
$link = Conectarse();
 mysql_query("INSERT INTO materiaprima VALUES(0,'$nombre','$unidad',$cant);",$link);  
 mysql_close($link);
?>
<?php
header('Location: obtenerDatos.php');
?>