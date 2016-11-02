function cargarcitas(){
var divCitas= document.getElementById('contenedorCitas');

$.ajax({
url: 'conexion.php',
type: 'POST',
data: 'idUsuarioMisCitas='+"si",
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
	

	$.ajax({
url: 'conexion.php',
type: 'POST',
data: 'idcita='+idCita,
success: function(data) {
divCitas.innerHTML= data;
},
error: function(){
alerta("<b>No se pudo insertar la cita</b>", "Error");
}
});


}