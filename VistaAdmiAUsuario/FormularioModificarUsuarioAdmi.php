<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="../js/AdministrarUsuarioAdmi.js"></script>
        <script type="text/javascript" src="../jquery-1.4.4.min.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
        <title>Modificar Usuario</title>
    </head>
    <?php
    $idUsuario= $_GET['idU'];
    
    ?>
    <body onload="cargarDatosAdmi(<?php echo $idUsuario?>),cargarImagenAdmi(<?php echo $idUsuario?>)">

        <div id="imagen">
            
        </div>
        <?php
    
        ?>
        
        
        <?php
        //echo '<img src="' . $_SESSION["foto"] . '" width="100" heigth="100"><br>';
        ?>
        <form action="../conexionAdmi.php" method="post" name="actualizaImg" enctype="multipart/form-data">
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
        

</div>
    
        <div id="datos"> 
        

</div>
</html>
