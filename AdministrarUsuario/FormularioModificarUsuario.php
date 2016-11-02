<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="../Js/AdministrarUsuario.js"></script>
        <script type="text/javascript" src="../jquery-1.4.4.min.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
        <title>Modificar Usuario</title>
    </head>
    <body onload="cargarDatos(),cargarImagen()">

        <div id="imagen">
            
        </div>
        <?php
        // Del login obtener el id usuario

        
        session_start();

        $idUsuario = '3';
        $_SESSION["id"] = $idUsuario;
/*
        $csql = "select *from usuario where idUsuario =" . $idUsuario . ";";

        $con = mysql_connect($host, $user, $pw) or die("problemas al conectar");
        mysql_select_db($db, $con)or die("Problemas al conectar la bd");

        $resultado = mysql_query($csql);


        if (!$resultado) {
            echo 'No se pudo ejecutar la consulta: ' . mysql_error();
            exit;
        }

        $fila = mysql_fetch_row($resultado);


        $_SESSION["nombre"] = $fila[1];
        $_SESSION["apellido"] = $fila[2];
        $_SESSION["edad"] = $fila[3];
        $_SESSION["telefono"] = $fila[4];
        $_SESSION["correo"] = $fila[7];
        $_SESSION["clave"] = $fila[6];
        $_SESSION["foto"] = $fila[5];

*/
//echo 'Hola Mundo  '.$fila[0];
//echo 'Hola Mundo  '.$fila[1];
        // put your codebn here
        ?>
        
        
        <?php
        //echo '<img src="' . $_SESSION["foto"] . '" width="100" heigth="100"><br>';
        ?>
        <form action="../Data/conexion.php" method="post" name="actualizaImg" enctype="multipart/form-data">
            <table border="1"> 

                Actualizar foto de perfil:


                <input type="hidden" name="idFoto" value="<?= $v1; ?>"/>


                <tr bgcolor="skyblue">       


                </tr>

                <tr bgcolor="skyblue">
                    <td bgcolor="skyblue"><strong>

                            Foto:</strong></td>  <td><input type="file" name="foto" id="foto" ></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" bgcolor="skyblue">



                </tr>
            </table>

            <input type="submit" name="actualizaImg" value="Actualizar foto de perfil"/>
</form>
        <div id="formulario"> 
        <!--
        <form> 
        
        <center><table border="1"> 
                Nombre: <br/><input type="text"  name="nombre" id="nombre"/><br/>
                Apellidos: <br/><input type="text"  name="apellidos" id="apellidos" /><br/>
                Edad:<br/><input type="number"  name="edad" id="edad"/><br/>
                Telefono:<br/> <input type="text" name="telefono" id="telefono" /><br/>
                Correo:<br/> <input type="email" name="correo" id="correo"/><br/>
                Clave:<br/><input type="password" name="clave" id="clave"/><br/>
                


            </center></table>

            <input type="submit" value="Modificar Usuario" onclick="modificarUsuario()"/>
        
        
        </form>
            -->

</div>
    
</html>
