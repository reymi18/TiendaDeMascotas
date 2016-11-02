function modificarUsuario() {



    //var usuario = document.getElementById('FormularioInsertarUsuario'); //Nodo DIV
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellidos').value;
    var edad = document.getElementById('edad').value;
    var telefono = document.getElementById('telefono').value;
    var correo = document.getElementById('correo').value;
    var clave = document.getElementById('clave').value;
  
    $.ajax({
        url: '../Data/conexion.php',
        type: 'POST',
        data: 'nombre=' + nombre + '&apellido=' + apellido + '&edad=' + edad + '&telefono=' + telefono + '&correo=' + correo + '&clave=' + clave,
        //data: 'nombre='+nombre,
       
        success: function (data) {
           // alert('Se actualizo los datos de ');
        },
        error: function () {
            alert('Error!');
        }
    });


}

function cargarDatos() {

    var form = document.getElementById('formulario'); //Nodo DIV
    $.ajax({
        url: '../Data/conexion.php',
        type: 'POST',
        data: 'datosUsuarios',
        success: function (data) {
            form.innerHTML = data
           // alert('FOKAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'+data);
        },
        error: function () {
            alerta("<b>Error en la recuperacion de los datos</b>", "Error");
        }
    });

}

function cargarImagen() {
    var img = document.getElementById('imagen'); //Nodo DIV
    $.ajax({
        url: '../Data/conexion.php',
        type: 'POST',
        data: 'imagen',
        success: function (data) {
            img.innerHTML = data;
        },
        error: function () {
            alerta("<b>Error en la recuperacion de los datos</b>", "Error");
        }
    });

}