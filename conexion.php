
<?php
// cargar la lista de servicios por tipo de animal
function cargarServicios($animal){

$link=conexion(); 
$result = mysqli_query($link, "SELECT tipo from servicio where mascota = '".$animal."'"); 
$salida= "<select id=\"servicios\" multiple=\"multiple\" >";

if($result!=NULL){
  if(mysqli_num_rows($result)>0){
  
while($row=mysqli_fetch_array($result)){
  $salida= $salida."<option>".$row['tipo']."</option>";
       
     }  
    }
  }
 $salida= $salida."</select>";

return $salida;

}
// buscando id de servicios
function buscarServicio($servicio){
  $link=conexion(); 
$result = mysqli_query($link, "SELECT idServicio from servicio where tipo = '".$servicio."'"); 

if($result!=NULL){
  if(mysqli_num_rows($result)>0){ 
while($row=mysqli_fetch_array($result)){
  $salida= $row['idServicio'];
       echo "llegue";    
     }  
    }
  }
return $salida;
}

// conexion a base de datos
function conexion(){
$servidor = "68.178.143.152"; //el servidor que utilizaremos, en este caso será el localhost
$usuario = "ucrgrupo1"; //El usuario que acabamos de crear en la base de datos
$contrasenha = "BelwQGrup1#"; //La contraseña del usuario que utilizaremos
$BD = "ucrgrupo1"; //El nombre de la base de datos 
$mysqli = new mysqli($servidor, $usuario, $contrasenha, $BD);
$tildes = $mysqli->query("SET NAMES 'utf8'");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{ 
  $mysqli = new mysqli($servidor, $usuario, $contrasenha, $BD);
}
return $mysqli;// retorna la conexion
}

// cargar el select de animales
function cargarAnimales(){
$link=conexion(); 
$result = mysqli_query($link, "SELECT DISTINCT mascota from servicio"); 
$salida= "<select id=\"animales\" onchange=\"cargarServicios()\"> <option>"."Escoje un animal"."</option>";
if($result!=NULL){
  if(mysqli_num_rows($result)>0){
  
while($row=mysqli_fetch_array($result)){
  $salida= $salida."<option>".$row['mascota']."</option>";
       echo "llegue";    
     }  
}
  }
 $salida= $salida."</select>";
return $salida;
}

// consultar horas segun fecha
function consultaHorario($fecha){
$link=conexion(); 
$horas= array(8,9,10,11,12,1,2,3,4);
$contador=0;

$salida="<input type=\"button\" class=\"button\" name=\"buscar\" value=\"Buscar\" onClick=\"horario()\"/>
<h2>Hora: </h2> <select id=\"horas\"  onchange=\"borrarYCargarServicios()\">";
foreach ($horas as $valor) {

$respaldo = mysqli_query($link, "SELECT hora, duracion from cita where fecha='".$fecha."'");
if($respaldo!=NULL){
  if(mysqli_num_rows($respaldo)>0){   
while($row=mysqli_fetch_array($respaldo)){
       if($valor==$row['hora'] ){
         $contador=$row['duracion'];      
       }       
     }  
}
  }else{
    echo "vacio";

  }
   if($contador==0){
    if($valor<12&&$valor>=8){
    $salida= $salida."<option>".$valor.":00 am"."</option>"; 
    }else{
      $salida= $salida."<option>".$valor.":00 pm"."</option>"; 

    }
}else{
  if($contador!=0){
    $contador=$contador-1;
  }
}
}
 $salida=$salida."</select>";
 if($respaldo!=NULL){
 mysqli_free_result($respaldo);
}
mysqli_close($link);
return $salida;
}
 
//insertar la cita
 function insertarCita($fecha, $hora, $contador){
 $link=conexion();   
 $atendido=0;
 session_start();
 $idUsuario=$_SESSION["id"];
$sql = "INSERT INTO cita (fecha, hora, atendido, duracion, idUsuario)
VALUES ('".$fecha."', '".$hora."', '".$atendido."', '".$contador."', '".$idUsuario."')";

if ($link->query($sql) === TRUE) {
   
} else {
   
}
//////////////////////////////////////////////////////////////////////////77
$link->close();
$salida= buscarIdCita($fecha,$hora,$idUsuario);

return $salida;
 }


 function buscarIdCita($fecha,$hora,$idUsuario){
   $link=conexion(); 
$result = mysqli_query($link, "SELECT  idcita from cita where fecha='".$fecha."' and hora='".$hora."' and idusuario='".$idUsuario."'"); 

if($result!=NULL){
  if(mysqli_num_rows($result)>0){
  
while($row=mysqli_fetch_array($result)){
  $salida= $row['idcita'];    
     }  
}
  }
//////////////////////////////////////////////////////////////////////////

 if($result!=NULL){
 mysqli_free_result($result);
}
mysqli_close($link);

return $salida;
 }
// insertar el servicio
function insertarServicio($idCita, $servicio){
$idServicio= buscarServicio($servicio);
echo "johan aguilar quesada jeje esta es la sita  ".$idCita." servicio: ".$idServicio;
 $link=conexion();   
$sql = "INSERT INTO cita_servicio (idServicio, idcita)
VALUES ('".$idServicio."', '".$idCita."')";

if ($link->query($sql) === TRUE) {
    echo "se inserto una nueva fila servicio cita";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//////////////////////////////////////////////////////////////////////////77
$link->close();
}
  
 function misCitas(){
$link=conexion(); 
 session_start();
 session_start();
 $idUsuario= $_SESSION["id"];
$result = mysqli_query($link, "SELECT  * from cita  where idusuario='".$idUsuario."' order by fecha"); 
$salida="";
if($result!=NULL){
  if(mysqli_num_rows($result)>0){
  $salida="<table>";
  $salida=$salida."<tr><th>Fecha</th><th>Hora inicio</th><th>Duracion</th><th>Opcion</th></tr>";
while($row=mysqli_fetch_array($result)){
  $salida= $salida."<tr><td>".$row['fecha']."</td><td>".$row['hora']."</td><td>".$row['duracion']."</td><td>"."<input type=\"button\" value=\"Eliminar\" onClick=\"eliminarCita(".$row['idcita'].")\" >"."</td></tr>";    
     }  
}
  }
//////////////////////////////////////////////////////////////////////////

 if($result!=NULL){
 mysqli_free_result($result);
}
mysqli_close($link);

return $salida;
 }


 function eliminarCita($idcita){
 $link=conexion(); 
 session_start();
 $idUsuarioMisCitas=$_SESSION["id"];
$sql = "Delete from  cita where idcita='".$idcita."' and idUsuario='".$idUsuarioMisCitas."'";
$link->query($sql);
$link->close();
$salida= misCitas($idUsuarioMisCitas);
return $salida;
 }


 //llamada al metodo consultaHorario
  if(isset($_POST['iduser'])) {
  echo consultaHorario($_POST['iduser']);
} 
   if(isset($_GET['animales'])) {
  echo cargarAnimales($_GET['animales']);
} 
   if(isset($_POST['fecha']) && ($_POST['hora']) && ($_POST['contador'])) {
  echo insertarCita($_POST['fecha'], $_POST['hora'], $_POST['contador']);
} 

 if(isset($_POST['servicios'])) {
  echo cargarServicios($_POST['servicios']);
} 

if(isset($_POST['idCita']) && ($_POST['servicio'])) {
  echo insertarServicio($_POST['idCita'], $_POST['servicio']);
} 
if(isset($_POST['idUsuarioMisCitas'])) {
  echo misCitas();
} 
if(isset($_POST['idcita'])) {
  
  echo eliminarCita($_POST['idcita']);
} 


//////////////////////////////////////////////////Verificacion, Pagina Usuario/////////////////////////////////////////////////////

function verificarUsuario($contra, $correo){
  $link=conexion();
  $salida= ""; 
  $result = mysqli_query($link, "SELECT * FROM usuario WHERE correo = '".$correo."' AND contraseña = '".$contra."'"); 
// $result = mysqli_query($link, "SELECT * FROM usuario"); 
  if($result!=NULL){
    $row=mysqli_fetch_array($result);
    $salida= $row['nombre'];

    session_start();
        $_SESSION["id"] = $row['idUsuario'];
        $_SESSION["nombre"] = $row['nombre'];
        $_SESSION["apellido"] = $row['apellido'];
        $_SESSION["edad"] = $row['edad'];
        $_SESSION["telefono"] = $row['telefono'];
        $_SESSION["correo"] = $row['correo'];
        $_SESSION["clave"] = $row['contraseña'];
        $_SESSION["foto"] = $row['imagen'];

//$salida=$salida." id usurio ". $_SESSION["id"];
  }
return $salida;
}

function cargarProductos(){
$link=conexion(); 
$result = mysqli_query($link, "SELECT * from producto"); 
$salida= "<ul class=\"galeria\">";
if($result!=NULL){
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
      $aux = $row['idProduto'];
      $salida= $salida."<div class=\"producto\"><li class=\"galeria__item\"><img src=".$row['imagen']." class=\"galeria__img\" type=\"submit\" onClick=\"cargarDatosProductos($aux)\"></li><span>".$row['nombre']."</span></div>";
      }  
  }
}
 $salida= $salida."</ul>";
return $salida;
}


function cargarDatosProductos($idProducto){
  $link=conexion(); 
  $i =1;
  $result = mysqli_query($link, "SELECT * From producto WHERE idProduto = '".$idProducto."'"); 
  $salida= "<ul class=\"galeria\">";
  if($result!=NULL){
      $row=mysqli_fetch_array($result);
      $salida= $salida."<li class=\"datos__item\"><img src=".$row['imagen']." class=\"datos__img\" type=\"submit\"></li><p class=\"nombre\">".$row['nombre']."</p> <p class=\"precio\">Precio: â‚¡".$row['precioUnitario']."</p> <p class=\"stock\">Stock: ".$row['stock']."</p><p class=\"cantL\">Cantidad:</p> <select class=\"cantidad\" id=\"cant\">";

      while($row['stock'] >= $i){
          $salida= $salida."<option>".$i."</option>";
          $i=$i+1;
      }

      $salida= $salida."</select><p class=\"categoria\">Categoria: ".$row['categoria']."</p><button type=\"submit\" class=\"comprar\" onClick=\"agregarCarrito($idProducto)\" id=\"bComprarProducto\">Comprar</button>";
     }  
 $salida= $salida."</ul>";
return $salida;
}


function enviarMensaje($correo){
  echo "Entre";
  $link=conexion();
  $salida= ""; 
  $result = mysqli_query($link, "SELECT * FROM usuario WHERE correo = '".$correo."'"); 
// $result = mysqli_query($link, "SELECT * FROM usuario"); 
  if($result!=NULL){
    $row=mysqli_fetch_array($result);
    $header = "Gracias por preferir nuestra pagina";
    $contenido = "Usted ha olvidado la contraseña de su cuenta en la tienda virtual para mascotas Creacions Gric \n Correo: ".$row['correo']."\n Contraseña: ".$row['contraseña']."\n";
    $asunto = "Cambio Contraseña";
    mail($correo,$asunto,$contenido,$header);
  }
  echo "Mensaje enviado conexion";
  $salida= "Gina";
return $salida;
}

if(isset($_POST['correo']) && ($_POST['contra'])) {
  echo verificarUsuario($_POST['contra'], $_POST['correo']);
} 

if(isset($_GET['productos'])) {
  echo cargarProductos();
} 

if(isset($_POST['idProducto'])) {
  echo cargarDatosProductos($_POST['idProducto']);
}

if(isset($_POST['correoVerificacion'])) {
  echo enviarMensaje($_POST['correoVerificacion']);
}



//////////////////////////////////////////////////Carrito/////////////////////////////////////////////////////

function insertarCarrito($idProductoCarrito, $cant){
 
$link=conexion(); 
session_start();

if(!$link->query('CALL paInsertarCarrito("'.$_SESSION["id"].'","'.$idProductoCarrito.'", "'.$cant.'")')) {
    echo "Falló CALL: (" . $link->errno . ") " . $link->error;
}

if(!$link->query('CALL paInsertarCarrito_Producto("'.$idProductoCarrito.'","'.$_SESSION["id"].'", "'.$cant.'")')) {
    echo "Falló CALL: (" . $link->errno . ") " . $link->error;
}

 $salida= "El id es: " . $_SESSION["id"] . ".<br>";
return $salida;
}

function cargarProductosCarrito(){
$link=conexion(); 
$i = 1;
session_start();

if(!($result=$link->query('CALL paSeleccionarProductosCarrito("'.$_SESSION["id"].'")'))) {
    echo "Falló CALL: (" . $link->errno . ") " . $link->error;
}

$salida= "<ul class=\"galeria\">";
if($result!=NULL){
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
      $aux = $row['idProduto'];

      $cant = buscarCantidad($_SESSION["id"], $aux);
//paBuscarCatidadProductosCarrito
      $salida= $salida."<div class= \"contenedor\"><div class=\"producto\"><li class=\"galeria__item\"><img src=".$row['imagen']." class=\"galeria__img\" type=\"submit\"></li><span>".$row['nombre']."</span></div><p class=\"precio\">Precio: â‚¡".$row['precioUnitario']."</p> <p class=\"stock\">Stock: ".$row['stock']."</p><p class=\"cantL\">Cantidad:</p><select class=\"cantidad2\" id=\"cant\">";

      while($row['stock'] >= $i){
        if($i == $cant){
          $salida= $salida."<option selected>".$i."</option>";
        }else{
          $salida= $salida."<option>".$i."</option>";
        }
          $i=$i+1;
      }
      $i = 1;
      $salida= $salida."</select><p class=\"categoria\">Categoria: ".$row['categoria']."</p></div>";
      }  
  }
}
 $salida= $salida."</ul>";
return $salida;
}

function buscarCantidad($idUsuario, $idProducto){
$link=conexion(); 

if(!($result=$link->query('CALL paBuscarCatidadProductosCarrito("'.$idUsuario.'","'.$idProducto.'")'))) {
    echo "Falló CALL: (" . $link->errno . ") " . $link->error;
  }
    if($result!=NULL){
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
          $salida = $row['cantidad'];
        }
      }
    }
    return $salida;
}

if(isset($_POST['idProductoCarrito']) && ($_POST['cant'])) {
  echo insertarCarrito($_POST['idProductoCarrito'],$_POST['cant']); 
}

if(isset($_GET['cargarCarrito'])) {
  echo cargarProductosCarrito();
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php
function Conectarse(){
$servidor = "68.178.143.152"; //el servidor que utilizaremos, en este caso será el localhost
$usuario = "ucrgrupo1"; //El usuario que acabamos de crear en la base de datos
$contrasenha = "BelwQGrup1#"; //La contraseña del usuario que utilizaremos
$BD = "ucrgrupo1"; //El nombre de la base de datos
 $con=null;
$mysqli = new mysqli($servidor, $usuario, $contrasenha, $BD);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
	
 $con =mysql_connect($servidor,$usuario,$contrasenha);
 mysql_select_db($BD,$con);

}
return $con;
}

//*********************************************CONEXION REYMI************ADMINISTRACION DE USUARIOS*************************************
//****************************************************
//*******************************************************

function modificarUsuario($nombre,$apellido,$edad,$telefono,$correo, $clave,$idUsuario){
    
$link=  conexion();
/*    
 echo '<script type="text/javascript">
                alert("'.$idUsuario.'");
                
                </script>';   
 * 
 */
 
$sql = "UPDATE usuario SET nombre='".$nombre."',apellido='".$apellido."', edad=".$edad.", telefono=".$telefono.", contraseña='".$clave."', correo='".$correo."' where idUsuario=".$idUsuario.";";
//mysql_query($sql,$link);
if ($link->query($sql) === TRUE) {
    
    echo '<script type="text/javascript">
                alert("***************Se actualizo la informacion");
                window.location.assign("../AdministarUsuario/FormularioModificarUsuario.php");
                </script>';
} else {
   echo '<script type="text/javascript">
                alert("***************No se pudo actualizar la informacion");
                window.location.assign("../AdministarUsuario/FormularioModificarUsuario.php");
                </script>';
}
//////////////////////////////////////////////////////////////////////////77
$link->close();
    
    
}

function insertarUsuario($nombre,$apellido,$edad,$telefono,$correo, $clave,$destino){

    $link=conexion();   

/*
 echo '<script type="text/javascript">
                alert("'.$destino.'");
                </script>';*/
 //INSERT INTO usuario
//VALUES (id,nombre,apellido,edad,telefono,foto_perfil,clave,correo);

$sql = "INSERT INTO usuario 
VALUES (0,'".$nombre."', '".$apellido."',".$edad.",".$telefono.",'".$destino."','".$clave."','".$correo."');";

//mysql_query($sql,$link);
if ($link->query($sql) === TRUE) {
    
    echo '<script type="text/javascript">
                alert("***************Se inserto");
                
                </script>';
} else {
   echo '<script type="text/javascript">
                alert("***************NOOOOO inserto");
                
                </script>';
}
//////////////////////////////////////////////////////////////////////////77
$link->close();
$salida= '';

return $salida;
 }

  
 function seleccionarUsuario($idUsuario){
     
     $link=conexion(); 
     $csql = "select *from usuario where idUsuario =" . $idUsuario . ";";
     $salida=" <form action=\"../Data/conexion.php\"  method=\"post\"> <center><table border=\"1\"> ";
        
     $resultado = mysqli_query($link,"select *from usuario where idUsuario =" . $idUsuario . ";");


        if (!$resultado) {
            echo 'No se pudo ejecutar la consulta: ' . mysql_error();
            exit;
        }

        $fila = mysqli_fetch_row($resultado);
     
        $salida= $salida."Nombre: <br/><input type=\"text\"  name=\"nombrem\" id=\"nombre\" value=\"".$fila[1]."\"/><br/>
                Apellidos: <br/><input type=\"text\"  name=\"apellidosm\" id=\"apellidos\" value=\"".$fila[2]."\"/><br/>
                Edad:<br/><input type=\"number\"  name=\"edadm\" id=\"edad\"value=\"".$fila[3]."\"/><br/>
                Telefono:<br/> <input type=\"text\" name=\"telefonom\" id=\"telefono\" value=\"".$fila[4]."\"/><br/>
                Correo:<br/> <input type=\"email\" name=\"correom\" id=\"correo\" value=\"".$fila[7]."\"/><br/>
                Clave:<br/><input type=\"password\" name=\"clavem\" id=\"clave\" value=\"".$fila[6]."\"/><br/>
                </center></table>

            <input type=\"submit\" value=\"Modificar Usuario\" />
        
        
        </form>";
        
        $link->close();
        
        return $salida;
        
 }
 
 function cargarImagen($idUsuario){
        
    $link=conexion(); 
     $csql = "select imagen from usuario where idUsuario =" . $idUsuario . ";";
     $salida="<img src=";
             $resultado = mysqli_query($link,$csql);


        if (!$resultado) {
            echo 'No se pudo ejecutar la consulta: ' . mysql_error();
            exit;
        }

        $fila = mysqli_fetch_row($resultado);
     
        $salida= $salida."\"". $fila[0] ."\" width=\"200\" heigth=\"200\"><br/>;";
        
        $link->close();
        
        return $salida;
     
     
 }

 function actualizarImagen($idUsuario,$destino){
     
    // update usuario set imagen = '../Fotos/1.jpg' where idUsuario=1;
     
     
    $link=conexion();   


$sql = "UPDATE usuario SET imagen='".$destino."'where idUsuario=".$idUsuario.";";
//mysql_query($sql,$link);
if ($link->query($sql) === TRUE) {
    
    echo '<script type="text/javascript">
                alert("***************Se actualizo la imagen de perfil");
                window.location.assign("../AdministarUsuario/FormularioModificarUsuario.php");
                </script>';
} else {
   echo '<script type="text/javascript">
                alert("***************No se pudo actualizar la imagen");
                window.location.assign("../AdministarUsuario/FormularioModificarUsuario.php");
                </script>';
}
//////////////////////////////////////////////////////////////////////////77
$link->close();
 }


if (isset($_POST['correo']) && !empty($_POST['correo']) &&
        isset($_POST['clave']) && !empty($_POST['clave'])) {
    
   //$nom = $_REQUEST["txtnom"];
    $foto = $_FILES["foto"] ["name"];
    $ruta = $_FILES["foto"] ["tmp_name"];
    $destino = "../Fotos/" . $foto;
    copy($ruta, $destino);
   // echo "$foto , $destino ";
    echo insertarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['edad'], $_POST['telefono'], $_POST['correo'],$_POST['clave'], $destino);
   
    
        }
 if(isset($_POST['datosUsuarios'])) {
  echo seleccionarUsuario( $_SESSION["id"]);
}        
        
  if(isset($_POST['imagen'])) {
  echo cargarImagen( $_SESSION["id"]);
}
  if(isset($_POST['actualizaImg'])) {
    
      
    //$nom = $_REQUEST["txtnom"];
    $foto = $_FILES["foto"] ["name"];
    $ruta = $_FILES["foto"] ["tmp_name"];
    $destino = "../Fotos/" . $foto;
    copy($ruta, $destino);
    
    echo actualizarImagen($_SESSION["id"], $destino);
  
}   
if(isset($_POST['nombre']) && ($_POST['apellidos']) && ($_POST['edad']) && ($_POST['telefono']) && ($_POST['correo']) && ($_POST['clave'])) {
  //echo cargarImagen( $_SESSION["id"]);

 echo '<script type="text/javascript">
                alert("***************Hola Mundo");
                 window.location.assign("../AdministarUsuario/FormularioInsertUsuario.php");
                </script>';
 
}

if(isset($_POST['nombrem'])) {
  
    
    echo modificarUsuario($_POST['nombrem'], $_POST['apellidosm'], $_POST['edadm'], $_POST['telefonom'], $_POST['correom'],$_POST['clavem'], $_SESSION["id"]);
   
   
}
?>