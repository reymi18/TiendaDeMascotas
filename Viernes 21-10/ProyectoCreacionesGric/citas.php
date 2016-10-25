<html>
<head>
 <link href="css/calendario_dw-estilos.css" type="text/css" rel="STYLESHEET">
   <link href="css/StyleSheet1.css" rel="stylesheet" />
   <link href="css/estiloCitas.css" rel="stylesheet" />
   <script type="text/javascript" src="jquery-1.4.4.min.js"></script>
   <script type="text/javascript" src="js/calendario_dw.js"></script>
   <script type="text/javascript" src="js/citas.js"></script>
   
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
<body onload="cargarAnimales()">
	
   <script type="text/javascript">
   $(document).ready(function(){
      $(".campofecha").calendarioDW();
    
   })
   </script>
   <div class="divFechas">
  <h2>Fecha:</h2> <input type="text" id="campofecha"  name="fecha" class="campofecha" size="12" onblur="borrarHorario()"/>
   <div id="prueba">
      <input type="button" class="button" name="buscar" value="Buscar" onClick="horario()"/>
      <h2>Hora: </h2><select id="horas"></select>
   </div>
   <div>
   <h2>Tipo animal:</h2><select id="animales" onchange="cargarServicios()"></select>
</div>
   </div>
  

<div class="seleccionServicios">
<div>
<h2>Servicios: </h2><select id="servicios"  multiple="multiple"></select>
<div>
<input type="button" class="button" value="Agregar Servicio" id="bAgregarServicio" onClick="AgregarServicio()"/>
   </div>
   </div>

   <div id="serviciosAgregados">
<h2>Servicios Agregados: </h2><select id="sAgregados"  multiple="multiple"></select>
<div>
<input type="button" class="button" value="Quitar Servicio" id="bAgregarServicio" onClick="QuitarServicio()"/>

   </div>
   </div>
   
   <div>

<input type="button" class="button" value="Crear cita" id="crearCita"  onClick="crearCita()"/>

   </div>
   </div>

   

<script src="js/alertify.js"></script>

</body>



</html>