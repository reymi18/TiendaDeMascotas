function cargarcitas(){
var divCitas= document.getElementById('contenedorCitas');
var idUsuario=1;
$.ajax({
url: 'conexion.php',
type: 'POST',
data: 'idUsuarioMisCias='+idUsuario,
success: function(data) {
divCitas.innerHTML= data;
},
error: function(){
alerta("<b>No se pudo insertar la cita</b>", "Error");
}
});
}

function eliminarCita(idCita){
	var divCitas= document.getElementById('contenedorCitas');
	var idUsuario=1;

	$.ajax({
url: 'conexion.php',
type: 'POST',
data: 'idUsuarioMisCitasEliminar='+idUsuario+'&idcita='+idCita,
success: function(data) {
divCitas.innerHTML= data;
},
error: function(){
alerta("<b>No se pudo insertar la cita</b>", "Error");
}
});


}