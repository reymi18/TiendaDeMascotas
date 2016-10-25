<html>
<head>
<link href="css/StyleSheet1.css" rel="stylesheet" />
<link href="cssTabla.css" rel="stylesheet" />
  <script type="text/javascript" src="jquery-1.4.4.min.js"></script>
  <script type="text/javascript" src="js/citas.js"></script>
  <link href="css/style.css" rel="stylesheet" />
<nav>
<link href="css/StyleSheet1.css" rel="stylesheet" />
  <ul class="menu">
    <li><a href="paginaUsuario.php">Inicio</a></li>
    <li><a href="./AdministarUsuario/FormularioModificarUsuario.php">Perfil</a></li>
    <li><a href="#s1">Citas</a>
        <ul class="submenu">
            <li><a href="citas.php">Solicitar Citas</a></li>
            <li><a href="#">Mis citas</a></li>
        </ul>
    </li>
    <li><a href="obtenerDatos.php">Materia Prima</a></li>
    <li><a href="index.php">Cerrar sesión</a></li>
</ul>
        </nav>
<h1>Inventario de Materias Primas </h1> <br><br>
</head>
<body>

<form action='accionBMP.php' method='get'>

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buscar Materia prima <input type="text" name="buscar"/>  

 
 <input type="submit" value="Buscar" class="boton"/><br><br>
 
</form>
<br><a href="insertarMP.php" type="button" ><button class="boton">Ingresar una materia prima</button></a><br><br>
<?php 
function vertabla(){
include("conexion.php");  
$link = Conectarse();  
//se envia la consulta  
$result = mysql_query("SELECT * FROM materiaprima;", $link);  
//se despliega el resultado 
echo "<div style='text-align:center;'>" ;
echo "<table border='1' style='margin: 0 auto;'>";  
echo "<tr>";  
echo "<th>ID</th>";  
echo "<th>Nombre</th>";  
echo "<th>Medida</th>";  
echo "<th>Cantidad</th>";  
echo "<th>Opción</th>";  
echo "<th>Opción</th>";  
echo "</tr>";  
while ($row = mysql_fetch_row($result)){   
    echo "<tr>";  
    echo "<td>$row[0]</td>";  
    echo "<td>$row[1]</td>";  
    echo "<td>$row[2]</td>";  
    echo "<td>$row[3]</td>";
    
?>
<?php
echo "<td><a href='modificarMateriaP.php?clave=$row[0]'>Modificar</a></td>";
echo"<td><a href='accionEMP.php?clave=$row[0]' >Eliminar</a></td>";
?>
<?php

    echo "</tr>";  
}  
echo "</table>";  
echo "</div>";  


}
?> 
<?php vertabla(); ?>
<br><br><br><br><br><br>



</body>
</html>
