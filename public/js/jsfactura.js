function cerrarCesion(){
	$.ajax({
		url  : 'Factura/cerrarCesion',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        	location.href = 'Login';
        }else {
        	return;
        }
      }catch(err){
        msj('error',err.message);
      }
	});
}
function crearAnotacion(){
  var fecha    = $('#fecha').val();
  var nro_fact = $('#nro_factura').val();
  var modelo   = $('#modelo').val();
  var spiff    = $('#spiff').val();
  var monto    = $('#monto').val();
  var cantidad = $('#cantidad').val();

  if(fecha == null || fecha == ''){
    msj('error', 'Ingrese la fecha');
  }
  if(nro_fact == null || nro_fact == ''){
    msj('error', 'Ingrese el número de factura');
  }
  if(modelo == null || modelo == ''){
    msj('error', 'Ingrese el modelo');
  }
  if(spiff == null || spiff == ''){
    msj('error', 'Ingrese el spiff');
  }
  if(monto == null || monto == ''){
    msj('error', 'Ingrese el monto');
  }
  if(cantidad == null || cantidad == ''){
    msj('error', 'Ingrese la cantidad');
  }
  agregarDatos();
  $.ajax({
    url  : 'Factura/crearAnotacion',
    type : 'POST'
  }).done(function(data){
    try{
        data = JSON.parse(data);
        if(data.error == 0){
          $('#fecha').val("0");
          $('.selectpicker').selectpicker('refresh');
          $('#modelo').val("0");
          $('.selectpicker').selectpicker('refresh');
          $('#nro_factura').val("");
          $('#monto').val("");
          $('#cantidad').val("");
        }else {
          return;
        }
      }catch(err){
        msj('error',err.message);
      }
  });
}
function subirFactura(){
  $( "#archivo" ).trigger( "click" );
  /*if($('#archivo')[0].files[0].name) {
    $('#btnSubirFact').text('CARGADO');
  }*/
}
function agregarDatos(){
  var datos = new FormData();
    datos.append('archivo',$('#archivo')[0].files[0]);
     $.ajax({
        type:"post",
        dataType:"json",
        url:"Factura/cargarFact",
        contentType:false,
        data:datos,
        processData:false,
      }).done(function(respuesta){
        msj('error', respuesta.mensaje);
    });
}

