<html>
<head>
<link href="css/StyleSheet1.css" rel="stylesheet" />
<link href="cssTabla.css" rel="stylesheet" />
  <script type="text/javascript" src="jquery-1.4.4.min.js"></script>
  <script type="text/javascript" src="js/citas.js"></script>
  <link href="css/style.css" rel="stylesheet" />
 <nav>
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
    <li><a href="index.php">Cerrar sesion</a></li>
</ul>
        </nav>
</head>
<body>
<br><br><a href="obtenerDatos.php"> <button class="boton"> Regresar a la pagina principal</button></a><br> <br>
<?php
$buscar = $_GET['buscar'];

include("conexion.php");  
$link = Conectarse();  
//se envia la consulta  
$result = mysql_query("SELECT * FROM materiaprima where nombre like '%".$buscar."%' ;", $link);  
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
    echo "<td><a href='modificarMateriaP.php?clave=$row[0]'>Modificar</a></td>";
echo"<td><a href='accionEMP.php?clave=$row[0]' >Eliminar</a></td>";

}
echo "</table>";  
echo "</div>";  


?>


<br><br>
</body>
</html>
