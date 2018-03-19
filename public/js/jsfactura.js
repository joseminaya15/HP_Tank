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
 $.ajax({
    data : {fecha     : fecha,
            nro_fact  : nro_fact,
            modelo    : modelo,
            spiff     : spiff,
            monto     : monto,
            cantidad  : cantidad},
    url  : 'Factura/crearAnotacion',
    type : 'POST'
  }).done(function(data){
    try{
        data = JSON.parse(data);
        if(data.error == 0){
          $('#fecha').val("");
          $('#modelo').val("0");
          $('.selectpicker').selectpicker('refresh');
          $('#nro_factura').val("");
          $('#monto').val("");
          $('#cantidad').val("");
          $('#gtotal').text(data.total);
          msj('error', 'Su factura se registró correctamente')
          setTimeout(function(){ location.href = 'Factura'; }, 2000);
        }else{
          return;
        }
      } catch (err){
        msj('error',err.message);
      }
  });
}
function subirFactura(){
  $( "#archivo" ).trigger( "click" );
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

/ MASK DE FECHA /
function initMaskInputs() {
  for(var i = 0; i < arguments.length; i++) {
    var text  = arguments[i];
    var input = $('#'+text);
    input.mask('00/00/0000');
  }
}
function clonarFecha(inputNew,idButton) {
  $('#'+inputNew.data('time')).val(inputNew.val());
  $('#'+inputNew.data('time')).focus();
  $('#'+inputNew.data('time')).blur();
  if(idButton){
    $("#"+idButton).trigger("change");
  }
}
function initCalendarDaysMaxToday(id, currentDate, fecha){
  var startDate = new Date();
   if (currentDate != undefined) {
            var startDate = new Date(currentDate);
        }
  $("#"+id).bootstrapMaterialDatePicker({ 
    weekStart : 0, 
    date  : true, 
    time  : false, 
    format  : 'DD/MM/YYYY',
    currentDate : startDate,
    maxDate : (fecha == undefined) ? new Date() : fecha
  });
}
function initButtonCalendarDaysMaxToday(idButton, currentDate, fecha) {
  var text    = idButton;
  var id      = $("#"+text);
  var newInput  = null;
  var iconButton  = id.closest('.mdl-input').find('.mdl-icon');
  iconButton.find('.mdl-button').click(function(){
    newInput = text+'ForCalendar';
    if ( $('#'+newInput).length < 1 ) {
      $('<input>').attr({
          type    : 'text',
          id      : newInput,
          name    : newInput,
          'data-time' : text,
          onchange  : 'clonarFecha($(this))',
          style   : 'position: absolute; top: 40px; background-color: transparent; border: transparent; color: transparent; z-index: -4'
      }).appendTo(iconButton);
      initCalendarDaysMaxToday(newInput, currentDate, fecha);
    }
    $("#"+newInput).focus();      
  });   
  var valueNewInput = $("#"+newInput).val();   
  id.text(valueNewInput);
}
var numberCantidad = null;
var numberSpiff = null;
var cantidad = null;
function selectPrint(){
  var spiff = $('#spiff');
  var print = $('#modelo').val();
  if(print == 'HP Tank 5810')
    spiff.val('$5');
  else if (print == 'HP Tank 5820')
    spiff.val('$7');
  var res = spiff.val().substr(1,2);
  numberSpiff = res;
  $('#monto').val(numberCantidad*numberSpiff);
}
function readCount(){
  selectPrint();
  var read       = $('#cantidad').val();
  var Monto      = $('#monto').val(read*numberSpiff);
  numberCantidad = read; 
}