function agregarCarrito(idProducto){
  var posicion = document.getElementById("cant").options.selectedIndex;
  var cant = document.getElementById("cant").options[posicion].text;;
  alert(cant+" cantidad  "+idProducto);
  $.ajax({
url: 'conexion.php',
type: 'POST',
data: 'idProductoCarrito='+idProducto+'&cant='+cant,
success: function(data) {
  alert(data+"  Entro al carrito");
    window.location.href="carrito.php";
},
error: function(){
alert('Error!');
}
});
}


function cargarProductosCarrito(){
  
var productosCarrito = document.getElementById('productosCarrito'); //Nodo DIV
  $.ajax({
url: 'conexion.php',
type: 'POST',
data: 'cargarCarrito',
success: function(data) {
  //alert(data+"   carritoproductos cargar");
productosCarrito.innerHTML = data;
},
error: function(){
alert('Error!');
}
});
}

function alerta(dialog, evento){
      alertify.notify(dialog, evento, 5);
}