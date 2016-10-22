<html>
<head>
 <link href="calendario_dw-estilos.css" type="text/css" rel="STYLESHEET">
   <link href="css/StyleSheet1.css" rel="stylesheet" />
   <link href="css/estiloCitas.css" rel="stylesheet" />
   <script type="text/javascript" src="jquery-1.4.4.min.js"></script>
   <script type="text/javascript" src="js/calendario_dw.js"></script>
   <script type="text/javascript" src="js/miscitas.js"></script>
   <link href="cssTabla.css" rel="stylesheet" />
        <link href="css/alertify.css" rel="stylesheet">
        <link href="css/alertify.core.css" rel="stylesheet">

  <nav>
  <ul class="menu">
    <li><a href="paginaUsuario.php">Inicio</a></li>
    <li><a href="#s1">Citas</a>
        <ul class="submenu">
            <li><a href="citas.php">Solicitar Citas</a></li>
            <li><a href="miscitas.php">Mis citas</a></li>
        </ul>
    </li>
    <li class="active"><a href="#s2">Mensageria</a>
        <ul class="submenu">
            <li><a href="#">Mis Mensajes</a></li>
            <li><a href="#">Enviar</a></li>
        </ul>
    </li>
    <li><a href="#">Carrito</a>
        <ul class="submenu">
            <li><a href="carrito.php">Ver Carrito</a></li>
            <li><a href="#">Historial</a></li>
        </ul>
    </li>
    <li><a href="index.php">Cerrar sesion</a></li>
</ul>
        </nav>


</head>
<body onload="cargarcitas()">
	<div id="contenedorCitas"></div>
<script src="js/alertify.js"></script>

</body>



</html>