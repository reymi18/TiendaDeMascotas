
<?php

$clave=$_GET['clave'];
echo $clave;

include("conexion.php");
$link = Conectarse();
 mysqli_query($link,"DELETE FROM materiaprima WHERE id=$clave;");  
 mysqli_close($link);
?>
<?php
header('Location: obtenerDatos.php');

?>