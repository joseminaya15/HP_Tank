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
        }else {
          return;
        }
      }catch(err){
        msj('error',err.message);
      }
  });
}