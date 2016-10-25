<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ingresar Usuario</title>
        <link href="../css/StyleSheet1.css" rel="stylesheet" />
  <script type="text/javascript" src="jquery-1.4.4.min.js"></script>
  <script type="text/javascript" src="js/citas.js"></script>
  <link href="../css/style.css" rel="stylesheet" />

   <link href="../css/alertify.css" rel="stylesheet">
   <link href="../css/alertify.core.css" rel="stylesheet">

        <script type="text/javascript" src="../js/AdministrarUsuario.js"></script>
        <script type="text/javascript" src="jquery-1.4.4.min.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
    </head>
    <body>
        
        <?php
        
       // session_start();
        
        //$_SESSION["id"]= 0;
        // put your code here
        ?>
        
        <div id="FormularioInsertarUsuario">
            <form action="../conexion.php" method="post" name="form"enctype="multipart/form-data">
          <center><table border="1"> 
                  Nombre: <br/><input type="text"  name="nombre" id="nombre"/><br/>
                  Apellidos: <br/><input type="text"  name="apellidos" id="apellidos"/><br/>
                  Edad:<br/><input type="number"  name="edad" id="edad"/><br/>
                  Telefono:<br/> <input type="text" name="telefono" id="telefono"/><br/>
                  Correo:<br/> <input type="email" name="correo" id="correo"/><br/>
                  Clave:<br/><input type="password" name="clave" id="clave"/><br/>
           FotoPerfil:
           
            
            
        <input type="hidden" name="idFoto" value="<?=$v1;?>"/>
            
            
                    <tr bgcolor="skyblue">       
                
               
            </tr>
          
            <tr bgcolor="skyblue">
            <td bgcolor="skyblue"><strong>
                    
            Foto:</strong></td>  <td><input type="file" name="foto" id="foto"></td>
            </tr>
            <tr>
            <td colspan="2" align="center" bgcolor="skyblue">
              
                
                  
            </tr>
            </center></table>
             
                  
              <input type="submit" value="Insertar Usuario" />
         
           
        </form>
        </div>
    </body>
</html>
