<?php

session_start();

function conexion(){
$servidor = "localhost"; //el servidor que utilizaremos, en este caso ser� el localhost
$usuario = "root"; //El usuario que acabamos de crear en la base de datos
$contrasenha = "1234"; //La contrase�a del usuario que utilizaremos
$BD = "creacionesgric"; //El nombre de la base de datos 
$mysqli = new mysqli($servidor, $usuario, $contrasenha, $BD);
$tildes = $mysqli->query("SET NAMES 'utf8'");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{	
}
return $mysqli;// retorna la conexion
}


function cargarUsuarios(){
$link=conexion(); 
$result = mysqli_query($link, "SELECT * from usuario"); 
$salida= "<table border=1 width=300 class=\"galeria\">";
if($result!=NULL){
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
      $aux = $row['idUsuario'];
      $salida= $salida."<tr> <td width=100 class=\"galeria__item\"><img src=".$row['imagen']." class=\"galeria__img\"  width=\"200\" heigth=\"200\"></td> <td width=100>".$row['nombre']."</td> <td> <a href=\"\">Ver Expediente </a></td> <td> <a href=\"FormularioModificarUsuarioAdmi.php?idU=".$aux."\">Modificar</a></td> <td> <a href=\"../conexionAdmi.php?eliminarA=".$aux."\"\">Eliminar </a></td> </tr> <br />";
      }  
  }
}
 $salida= $salida."</table>";
return $salida;
}


if(isset($_POST['dusuario'])) {
  echo cargarUsuarios();
} 


  
 function seleccionarUsuarioAdmi($idUsuario){
     
     $link=conexion(); 
     $csql = "select *from usuario where idUsuario =" . $idUsuario . ";";
     $salida=" <form action=\"../conexionAdmi.php\"  method=\"post\"> <center><table border=\"1\"> ";
        
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
                window.location.assign("VistaAdmiAUsuario/VerUsuarios.php");
                </script>';
} else {
   echo '<script type="text/javascript">
                alert("***************No se pudo actualizar la imagen");
                window.location.assign("VistaAdmiAUsuario/FormularioModificarUsuarioAdmi.php?idU="'.$idUsuario.');
                </script>';
}
//////////////////////////////////////////////////////////////////////////77
$link->close();
 }


function modificarUsuario($nombre,$apellido,$edad,$telefono,$idUsuario){
    
$link=  conexion();
/*    
 echo '<script type="text/javascript">
                alert("'.$idUsuario.'");
                
                </script>';   
 * 
 */
 
$sql = "UPDATE usuario SET nombre='".$nombre."',apellido='".$apellido."', edad=".$edad.", telefono=".$telefono." where idUsuario=".$idUsuario.";";
//mysql_query($sql,$link);
if ($link->query($sql) === TRUE) {
    
    echo '<script type="text/javascript">
                alert("***************Se actualizo la informacion");
                window.location.assign("VistaAdmiAUsuario/VerUsuarios.php");
                </script>';
   //header('Location: VerUsuarios.php');../VistaAdmiAUsuario/VerUsuarios.php
} else {
   echo '<script type="text/javascript">
                alert("***************No se pudo actualizar la informacion");
                window.location.assign("VistaAdmiAUsuario/FormularioModificarUsuarioAdmi.php?idU="'.$idUsuario.');
                </script>';
}
//////////////////////////////////////////////////////////////////////////77
$link->close();
    
    
}

if(isset($_POST['nombrem'])) {
  
    
    echo modificarUsuario($_POST['nombrem'], $_POST['apellidosm'], $_POST['edadm'], $_POST['telefonom'], $_SESSION["idAdmi"]);
   
   
}

 if(isset($_POST['datosUsuariosAdmi'])) {
  echo seleccionarUsuarioAdmi( $_POST['datosUsuariosAdmi']);
  $_SESSION['idAdmi']= $_POST['datosUsuariosAdmi'];
}        
        
  if(isset($_POST['imagen'])) {
  echo cargarImagen( $_POST['imagen']);
}
  if(isset($_POST['actualizaImg'])) {
    
      
    //$nom = $_REQUEST["txtnom"];
    $foto = $_FILES["foto"] ["name"];
    $ruta = $_FILES["foto"] ["tmp_name"];
    $destino = "../Fotos/" . $foto;
    copy($ruta, $destino);
    
    echo actualizarImagen($_SESSION["idAdmi"], $destino);
  
}  

function eliminarUsuario($idUsuario){
  $link=conexion(); 
  
  $sql = "delete from usuario  where idUsuario =" . $idUsuario . ";"; 
  if ($link->query($sql) === TRUE) {
    
    echo '<script type="text/javascript">
                alert("***************Se elimino con exito");
                window.location.assign("VistaAdmiAUsuario/VerUsuarios.php");
                </script>';
} else {
   echo '<script type="text/javascript">
                alert("***************No se elimino");
                
                </script>';
}
//////////////////////////////////////////////////////////////////////////77
$link->close();

  
}

if(isset($_GET['eliminarA'])) {
  echo eliminarUsuario($_GET['eliminarA']);
   
}