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
var factura = undefined;
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
  if(factura == undefined){
    return;
  }
  $('#cargarAnotacion').prop("disabled", true);
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
$( "#archivo" ).change(function() {
  $('#btnSubirFact').text('Cargado');
  $('#btnSubirFact').css('background-color','#5CB85C');
  $('#btnSubirFact').css('color','#FFFFFF');
});
function agregarDatos(){
  var datos = new FormData();
  factura = $('#archivo')[0].files[0];
  if(factura == undefined){
    msj('error', 'Se requiere cargar el sustento de la factura (pdf)');
    return;
  }
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
        $('#fecha').val("");
        $('#modelo').val("0");
        $('.selectpicker').selectpicker('refresh');
        $('#nro_factura').val("");
        $('#monto').val("");
        $('#cantidad').val("");
        setTimeout(function(){ location.href = 'Factura'; }, 2000);
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
var numberSpiff = null;
var cantidad = null;
var read_glob = null;
function selectPrint(){
  var spiff = $('#spiff');
  var read = $('#cantidad').val();
  var print = $('#modelo').val();
  if(print == 'HP Tank 5810'){
    spiff.val('$5');
  }else if (print == 'HP Tank 5820'){
    spiff.val('$8');
  }
  var res = spiff.val().substr(1,2);
  if(res != 0){
    if(read != ''){
      $('#spiff').val("$"+read*res);
    }
  }
}
function readCount(){
  var print = $('#modelo').val();
  if(print == 'HP Tank 5810'){
    $('#spiff').val('$5');
  }else if (print == 'HP Tank 5820'){
    $('#spiff').val('$8');
  }
  var read1 = $('#cantidad').val();
  var spiffread = $('#spiff').val().substr(1,2);
  if(spiffread != 0){
    if(read1 != ''){
      var nuevoSpiff = read1*spiffread;
      $('#spiff').val("$"+nuevoSpiff);
    }
  }
}