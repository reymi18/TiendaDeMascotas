
<?php

$clave=$_GET['clave'];
echo $clave;

include("conexion.php");
$link = Conectarse();
 mysql_query("DELETE FROM materiaprima WHERE id=$clave;",$link);  
 mysql_close($link);
?>
<?php
header('Location: obtenerDatos.php');

?>