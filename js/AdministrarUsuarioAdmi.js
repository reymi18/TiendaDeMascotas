

function cargarDatosAdmi(idUsuario) {
 //alert('Hola'+idUsuario);
    var form = document.getElementById('formulario'); //Nodo DIV
    $.ajax({
        url: '../conexionAdmi.php',
        type: 'POST',
        data: 'datosUsuariosAdmi='+idUsuario,
        success: function (data) {
            form.innerHTML = data
           // alert('FOKAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'+data);
        },
        error: function () {
            alerta("<b>Error en la recuperacion de los datos</b>", "Error");
        }
    });

}

function cargarImagenAdmi(idUsuario) {
    var img = document.getElementById('imagen'); //Nodo DIV
    $.ajax({
        url: '../conexionAdmi.php',
        type: 'POST',
        data: 'imagen='+idUsuario,
        success: function (data) {
            img.innerHTML = data;
        },
        error: function () {
            alerta("<b>Error en la recuperacion de los datos</b>", "Error");
        }
    });

}


function cargarUsuario(){
	
var usuario = document.getElementById('usuarios'); //Nodo DIV
	$.ajax({
url: '../conexionAdmi.php',
type: 'POST',
data: 'dusuario',
success: function(data) {
usuario.innerHTML = data;
},
error: function(){
alert('Error!');
}
});
}


