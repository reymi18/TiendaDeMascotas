<?php
include("conexion.php");
?>

<html>
<head>
    <link href="css/StyleSheet1.css" rel="stylesheet" />
    <link href="css/galeria.css" rel="stylesheet" />
    <script type="text/javascript" src="js/citas.js"></script>
    <script type="text/javascript" src="jquery-1.4.4.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.js"></script>
    <title>Pagina Administrador</title>
 <nav>
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
<body onload="cargarProductos()">
  
    <div id="productos"></div>
    <div id="datosProductos"></div>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
</body>
</body>
</html>