<?php
include("conexion.php");
?>

<html>
<head>
    <link href="css/StyleSheet1.css" rel="stylesheet" />
    <script type="text/javascript" src="jquery-1.4.4.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="js/carrito.js"></script>
     <link href="css/galeria.css" rel="stylesheet" />

     <link href="css/alertify.css" rel="stylesheet">
     <link href="css/alertify.core.css" rel="stylesheet">

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
<body onload="cargarProductosCarrito()">

<div id="productosCarrito"></div>
</body>
</body>
</html>