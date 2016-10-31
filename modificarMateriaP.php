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
    <li><a href="index.php">Cerrar sesion</a></li>
</ul>
        </nav>
</head>
<body>
<?php
$clave=$_GET['clave'];
 include('conexion.php');
$link=Conectarse();
$result = mysql_query("SELECT * FROM materiaprima where id = $clave;", $link);  
 $id=0;
 $nombre="";
 $cant=0;
 $unidad="";

while ($row = mysql_fetch_row($result)){   
     
    $id=$row[0];  
    $nombre=$row[1]; 
    $unidad= $row[2];  
    $cant= $row[3];
  } 

  ?> 
  <br>  <br>
  <br>

 <form action='accionMMP.php' method='get'  style="text-align:center;">

 ID: <?php echo $id ?> <br>
 <input type="hidden" name="id" value ="<?php echo $id ?>" /><br><br>

 Nombre: <input type='text' name='nombre' value= "<?php echo $nombre ?>"/><br><br>

 Cantidad: <input type='text' name='cant' value= "<?php echo $cant ?>" /><br><br>

 Unidad de medida: <input type='text' name='unidad' value= "<?php echo $unidad ?>" /><br><br>

 <input type="submit" value="Modificar" class="boton"/><br><br>

</form>


</body>
</html>