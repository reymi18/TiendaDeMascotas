<html>
<head>

<link href="cssTabla.css" rel="stylesheet" />
 <link href="css/style.css" rel="stylesheet" />
 <nav>
 <link href="css/StyleSheet1.css" rel="stylesheet" />
  <ul class="menu">
    <li><a href="paginaUsuario.php">Inicio</a></li>
    <li><a href="./AdministarUsuario/FormularioModificarUsuario.php">Perfil</a></li>
    <li><a href="#s1">Citas</a>
        <ul class="submenu">
            <li><a href="citas.php">Solicitar Citas</a></li>
            <li><a href="miscitas.php">Mis citas</a></li>
        </ul>
    </li>
    <li><a href="obtenerDatos.php">Materia Prima</a></li>
    <li><a href="index.php">Cerrar sesion</a></li>
</ul>
        </nav>
</head>
<body>
<br><br><br><br>

 <form action='accionIMP.php' method='get'style="text-align:center;">

 
 Nombre: <input type='text' name='nombre' /><br><br>

 Cantidad: <input type='text' name='cant' /><br><br>

 Unidad de medida: <input type='text' name='unidad' /><br><br><br>
<br>
<br>
<br>


 <input type="submit" value="Insertar" class="boton"/><br><br>

</form>

</body>
</html>