<?php
include("conexion.php");
?>

<html>
<head>
  <link href="css/StyleSheet1.css" rel="stylesheet" />
  <script type="text/javascript" src="jquery-1.4.4.min.js"></script>
  <script type="text/javascript" src="js/citas.js"></script>
  <link href="css/style.css" rel="stylesheet" />

   <link href="css/alertify.css" rel="stylesheet">
   <link href="css/alertify.core.css" rel="stylesheet">

  <title>Pagina Principal</title>
  <nav>
      <ul class="menu">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="#">.</a></li>
        <li><a href="#">.</a></li>
        <li><a href="./AdministarUsuario/FormularioInsertUsuario.php">Registarse</a></li>
        <li><a type="submit" name="InicioSesion" onClick="inicioSesion()">Iniciar Sesion</a></li>
      </ul>
  </nav>
</head>
<body onload="cargarProductos()">
    <div id="divlogin" style="background:#373737 url("./img/bg.png") 0 0 repeat;"></div>
    <div id="productos"></div>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>

</body>
</html>