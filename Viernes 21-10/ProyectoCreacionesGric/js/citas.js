//Agregar servicios a una cita segun la hora escogida
function AgregarServicio(){
var x=document.getElementById("sAgregados");
var contadorAgregados=x.options.length;
var cantidadHora=document.getElementById("horas").length;
if(cantidadHora!=0){// verifica que el usuario haya escogido una hora
var posicion = document.getElementById("horas").options.selectedIndex;// posicion escogida de la hora
var horaInicio = (document.getElementById("horas").options[posicion].text).trim();// hora escogida
horaInicio=longitudHora(horaInicio);
var horario= document.getElementById("horas");//select de horas
var t=0;
var contadorA=0;
var p=0;
var vectorHorario= ["8","9","10","11","12","1","2","3","4"];// array del total del horario por defecto
for(var s=0; s<vectorHorario.length; s++){
  if(vectorHorario[s]== horaInicio){
    p=s;
    s=vectorHorario.length;// se establece cual es la posicion del array que posee la hora escogida
  }
}
for (var i = 0; i < horario.options.length; i++) {    // se calculan cuantos servicios puede agregar 
     t = longitudHora(horario.options[i].value);
         if(t==vectorHorario[p]){
            contadorA=contadorA+1;
            p=p+1;
          }

     }  
   
if(contadorA>contadorAgregados){// verifica que no exedan los servicios para esa hora
var obj2 =  document.getElementById("sAgregados");
var obj=document.getElementById("servicios");
var valor=obj.value;
var txt=obj.options[obj.selectedIndex].text;
obj.options[obj.selectedIndex]=null;
var obj2=document.getElementById("sAgregados");
var opc= new Option(txt,valor);
eval(obj2.options[obj2.options.length]= opc);
val=obj.options[obj.selectedIndex].text;
}else{
  alerta("<b>Na hay mas servicios disponibles a esta hora</b>", "Error");
}
}else{
  alerta("<b>Debe escoger una hora</b>", "Error");

}
}

function QuitarServicio(){
  var obj=document.getElementById("sAgregados");
var valor=obj.value;
var txt=obj.options[obj.selectedIndex].text;
obj.options[obj.selectedIndex]=null;
var obj2=document.getElementById("servicios");
var opc= new Option(txt,valor);
eval(obj2.options[obj2.options.length]= opc);
val=obj.options[obj.selectedIndex].text;
}
//funcion para insertar la cita con sus servicios
function crearCita(){
  var cantidadHora=document.getElementById("horas").length;
  var x=document.getElementById("sAgregados").length;
  if(cantidadHora!=0 && x>0){
  
  var servicios = document.getElementById('servicios'); //Nodo DIV
  var idUsuario=1;
  var fecha=document.getElementById("campofecha").value;
  var posicion = document.getElementById("horas").options.selectedIndex;
  var hora = document.getElementById("horas").options[posicion].text;
  hora=longitudHora(hora);
  var cita=0;
  var contador=0;
  contador=x;
  var cita=0;
//ajax que inserta la cita
$.ajax({
url: 'conexion.php',
type: 'POST',
data: 'idUsuario='+idUsuario+'&fecha='+fecha+'&hora='+hora+'&contador='+contador,
success: function(data) {
var confirmacion = insertarServicios(data.trim());
if(confirmacion==1){
   alerta("<b>Se inserto la cita correctamente</b>", "success");
   horario();
   borrarYCargarServicios();
}else{
   alerta("<b>No se pudo insertar los servicios</b>", "Error");
}
},
error: function(){
alerta("<b>No se pudo insertar la cita</b>", "Error");
}
});
}else{
  alerta("<b>Existen campos vacios</b>", "Error");
}
}

function longitudHora(hora){//cortar Hora
  if(hora.length==7){
    hora=hora.charAt(0);
    return hora;
  }else{
     hora=hora.charAt(0)+hora.charAt(1);
    return hora;

  }

}
function insertarServicios(cita){
//insertar los servicios
var confirmacion=1;
var x=document.getElementById("sAgregados");
for (var i = 0; i < x.options.length; i++) {
        
$.ajax({
url: 'conexion.php',
type: 'POST',
data: 'idCita='+cita+'&servicio='+x.options[i].value,
success: function(data) {
},
error: function(){
  confirmacion=0;
  alerta("<b>Error en la insercion del servicio</b>", "Error");
}
});
 
}

return confirmacion;
}


function borrarYCargarServicios(){
  limpiarSelectServicios();
  cargarServicios();
}
function cargarServicios(){
  var posicion = document.getElementById("animales").options.selectedIndex;
    var animal = document.getElementById("animales").options[posicion].text;
   var servicios = document.getElementById('servicios'); //Nodo DIV
  limpiarSelectServicios();//limpiar los servicios del animal al cambiar
  $.ajax({
url: 'conexion.php',
type: 'POST',
data: 'servicios='+animal,
success: function(data) {
servicios.innerHTML = data;
},
error: function(){
  alerta("<b>Error en la recuperacion de los datos</b>", "Error");
}
});
}

function limpiarSelectServicios(){  
  //borrar el select de servicios agregados si no a escogido animal
var x=document.getElementById("sAgregados");
var t=x.options.length;
for (var i = 0; i < t; i++) {
        x.options[0]=null       
    }
    //borrar el select de servicios  si no a escogido animal
    var x=document.getElementById("servicios");
var t=x.options.length;
for (var i = 0; i < t; i++) {
        x.options[0]=null  
    }
}




function cargarAnimales(){
  
  var animales = document.getElementById('animales'); //Nodo DIV
  $.ajax({
url: 'conexion.php',
type: 'POST',
data: 'animales',
success: function(data) {
animales.innerHTML = data;
},
error: function(){
  alerta("<b>Error en la recuperacion de los datos</b>", "Error");
}
});


}

function horario(){
var fecha = document.getElementById('campofecha').value; //Nodo DIV
if(fecha.length==10){
var horas = document.getElementById('prueba'); //Nodo DIV

$.ajax({
url: 'conexion.php',
type: 'POST',
data: 'iduser='+fecha,
success: function(data) {
horas.innerHTML = data;
},
error: function(){
alert('Error!');
}
});
}else{
   alerta("<b>La fecha es invalida</b>", "Error");

}

}  



function alerta(dialog, evento){
      alertify.notify(dialog, evento, 5);
}



function borrarHorario(){
  var x=document.getElementById("horas");
var t=x.options.length;
for (var i = 0; i < t; i++) {
        x.options[0]=null       
    }

}
//////////////////////////////////////////////////////////////////////////////////////////////////////

function inicioSesion(){

var divRedactar = document.getElementById("divlogin");//valor del div   
 divRedactar.innerHTML="<form method=\"post\" class=\"login\"><p><label for=\"login\">Correo:</label><input type=\"text\" name=\"login\" id=\"login\" placeholder=\"nombre@ejemplo.com\"></p><p><label for=\"password\">Contraseña:</label><input type=\"password\" name=\"password\" id=\"password\" placeholder=\"********\"></p><p class=\"login-submit\"><button type=\"submit\" class=\"login-button\" onClick=\"verificar()\">Ingresar</button></p><p class=\"forgot-password\"><a onClick=\"cambiarContrasena()\">Olvido su contraseña?</a></p></form>";

 $("#divlogin").dialog({
	autoOpen: true,
	width: 550,
	minWidth: 400,
	maxWidth: 650,
	show: "fold",
	hide: "explode",
	modal: true,
});
}


function verificar(){
  var correo = document.getElementById("login").value;
  var contra = document.getElementById("password").value;
  $.ajax({
url: 'conexion.php',
type: 'POST',
data: 'correo='+correo+'&contra='+contra,
success: function(data) {
  if(data.trim() == "Dicsely"){
    window.location.href="paginaAdministrador.php";
  }else{
    var x=data.trim()+"no";
    //alert(data.trim()+'  data');
    if(x != "no"){
      window.location.href="paginaUsuario.php";
      alerta("<b>Bienvenido</b>", "success");
     }else{
       alerta("<b>Los datos ingresados no son validos</b>", "Error");
       //alert('emtrto');
    }
  }
},
error: function(){
alert('Error!');
}
});
}

function cargarProductos(){
	
var productos = document.getElementById('productos'); //Nodo DIV
	$.ajax({
url: 'conexion.php',
type: 'POST',
data: 'productos',
success: function(data) {
productos.innerHTML = data;
},
error: function(){
alert('Error!');
}
});
}

function cargarDatosProductos(idProducto){
	var divCargar = document.getElementById("datosProductos");//valor del div   

$.ajax({
	url: 'conexion.php',
	type: 'POST',
	data: 'idProducto='+idProducto,
	success: function(data) {
	 divCargar.innerHTML=data
	},
	error: function(){
	alert('Error!');
	}
});

 $("#datosProductos").dialog({
	autoOpen: true,
	width: 550,
	minWidth: 400,
	maxWidth: 650,
	show: "fold",
	hide: "explode",
	modal: true,
});
}


function cambiarContrasena(){
alert("Holils");
var divRedactar = document.getElementById("divlogin");//valor del div   
 divRedactar.innerHTML="<form method=\"post\" class=\"login\"><p>Ingresa el correo al que desea se le envie la contraseña nueva:</p><p><label for=\"login\">Correo:</label><input type=\"email\" name=\"login\" id=\"login\" placeholder=\"nombre@ejemplo.com\"></p><p class=\"login-submit\"><button type=\"submit\" class=\"login-button\" onClick=\"enviarMensaje()\">Enviar</button></p></form>";

 $("#divlogin").dialog({
  autoOpen: true,
  width: 550,
  minWidth: 400,
  maxWidth: 650,
  show: "fold",
  hide: "explode",
  modal: true,
});
}


function enviarMensaje(){
  var correo = document.getElementById("login").value
  alert(correo);
  $.ajax({
    url: 'conexion.php',
    type: 'POST',
    data: 'correoVerificacion='+correo,
    success: function(data) {
    alert(data+" mensaje enviado js");
    },
    error: function(){
    alert('Error!');
    }
  });
}

////////////////////////////////////////////////Carrito/////////////////////////////////////////////////////////

/*function agregarCarrito(idProducto){
  var posicion = document.getElementById("cant").options.selectedIndex;
  var cant = document.getElementById("cant").options[posicion].text;;
  alert(cant+"   cantidad");
  $.ajax({
url: 'conexion.php',
type: 'POST',
data: 'idProductoCarrito='+idProducto+'&cant='+cant,
success: function(data) {
  //alert("Entro al carrito");
    window.location.href="carrito.php";
},
error: function(){
alert('Error!');
}
});
}*/