function registrar() {
	var nombre 	 	= $('#nombre').val();
	var password 	= $('#password').val();
	var re_password = $('#re_password').val();
	var canal 	 	= $('#canal').val();
	var correo   	= $('#correo').val();
	var pais 	 	= $('#pais').val();
	var terminos = $('#checkbox-1').is(':checked');
	if(nombre == '' && canal == '' && canal == '' && correo == '' && pais == ''){
		msj('error', 'Ingrese sus datos');
		return;
	}
	if(nombre == null || nombre == undefined || nombre == ''){
		msj('error', 'Ingrese su nombre');
		return;
	}
	if(canal == ''){
		msj('error', 'Ingrese su canal');
		return;
	}
	if(pais == ''){
		msj('error', 'Ingrese su país');
		return;
	}
	if(correo == ''){
		msj('error', 'Ingrese su correo');
		return;
	}
	if (!validateEmail(correo)){
		msj('error', 'El formato del correo es incorrecto');
		return;
	}
	if(password == ''){
		msj('error', 'Ingrese su contraseña');
		return;
	}
	if(re_password == ''){
		msj('error', 'Repita su contraseña');
		return;
	}
	if(re_password != password){
		msj('error', 'Una de sus contraseñas es incorrecta');
		return;
	}
	if(terminos == false){
		msj('error', 'Acepte los términos y condiciones');
		return;
	}
	$.ajax({
		data : {nombre 	 : nombre,
				canal 	 : canal,
				usuario  : correo,
				password : password,
				pais 	 : pais},
		url  : 'registro/registrar',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        	$('#nombre').val("");
    			$('#password').val("");
    			$('#canal').val("");
    			$('#correo').val("");
    			$('#pais').val("");
			msj('error', 'Se registró correctamente');
			setTimeout(function(){ 
				location.href = "Login";
			}, 1500);
        }else {
			msj('error', 'Su usuario o contraseña son incorrectas');
        	return;
        }
      }catch(err){
        msj('error',err.message);
      }
	});
}

function soloLetras(e){
    key 	     = e.keyCode || e.which;
    tecla 	   = String.fromCharCode(key).toLowerCase();
    letras     = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }
     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
 }
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function seleccionarPais(){
  var pais = $('#pais').val();
  if(pais == 'Costa Rica'){
    $('.canal').html("");
  	$('.canal').append('<div class="form-group">'+
                                  '<select class="form-control" id="canal" name="canal">'+
                                            '<option value="">Canal</option>'+
                                            '<option value="Alfatec De CR Sa">Alfatec De CR Sa</option>'+
                                            '<option value="Cdc Internacional Sa">Cdc Internacional Sa</option>'+
                                            '<option value="Compubetel Sa">Compubetel Sa</option>'+
                                            '<option value="Distribuidora Comercial Tres Ases Sa">Distribuidora Comercial Tres Ases Sa</option>'+
                                            '<option value="Distribuidora Ramirez Y Castillo Sa">Distribuidora Ramirez Y Castillo Sa</option>'+
                                            '<option value="Importadora de Tecnologia Global Ysrm Sa">Importadora de Tecnologia Global Ysrm Sa</option>'+
                                            '<option value="Jimenez Y Tanzi Sa">Jimenez Y Tanzi Sa</option>'+
                                            '<option value="Pc Lider De Costa Rica Sa">Pc Lider De Costa Rica Sa</option>'+
                                  '</select>'+
                                '</div>');
  }else if(pais == 'El Salvador'){
  	$('.canal').html("");
    $('.canal').append('<div class="form-group">'+
                                  '<select class="form-control" id="canal" name="canal">'+
                                            '<option value="">Canal</option>'+
                                            '<option value="C&M Sistemas Sa De Cv">C&M Sistemas Sa De Cv</option>'+
                                            '<option value="Equipos Electronicos Valdes Sa De Cv">Equipos Electronicos Valdes Sa De Cv</option>'+
                                            '<option value="Data & Graphics Sa De Cv">Data & Graphics Sa De Cv</option>'+
                                            '<option value="Raf SA de CV">Raf SA de CV</option>'+
                                            '<option value="Dataprint De El Salvador Sa De CV">Dataprint De El Salvador Sa De CV</option>'+
                                            '<option value="Dpg Sa De Cv">Dpg Sa De Cv</option>'+
                                            '<option value="STB Computer Sa De Cv">STB Computer Sa De Cv</option>'+
                                  '</select>'+
                                '</div>');
  }else if(pais == 'Guatemala'){
  	$('.canal').html("");
    $('.canal').append('<div class="form-group">'+
                                  '<select class="form-control" id="canal" name="canal">'+
                                            '<option value="">Canal</option>'+
                                            '<option value="C&M Sistemas Sa De Cv">C&M Sistemas Sa De Cv</option>'+
                                            '<option value="Equipos Electronicos Valdes Sa De Cv">Equipos Electronicos Valdes Sa De Cv</option>'+
                                            '<option value="Data & Graphics Sa De Cv">Data & Graphics Sa De Cv</option>'+
                                            '<option value="Raf SA de CV">Raf SA de CV</option>'+
                                            '<option value="Dataprint De El Salvador Sa De CV">Dataprint De El Salvador Sa De CV</option>'+
                                            '<option value="Dpg Sa De Cv">Dpg Sa De Cv</option>'+
                                            '<option value="STB Computer Sa De Cv">STB Computer Sa De Cv</option>'+
                                  '</select>'+
                                '</div>');
  }else if(pais == 'Honduras'){
  	$('.canal').html("");
    $('.canal').append('<div class="form-group">'+
                                  '<select class="form-control" id="canal" name="canal">'+
                                            '<option value="">Canal</option>'+
                                            '<option value="Canella Sa">Canella Sa</option>'+
                                            '<option value="Compusersa Sa">Compusersa Sa</option>'+
                                            '<option value="Dataflex Sa">Dataflex Sa</option>'+
                                            '<option value="Electronica Pan Americana Sa">Electronica Pan Americana Sa</option>'+
                                            '<option value="Intelaf Sa">Intelaf Sa</option>'+
                                            '<option value="Sintegradas SA">Sintegradas SA</option>'+
                                  '</select>'+
                                '</div>');
  }else if(pais == 'Nicaragua'){
  	$('.canal').html("");
    $('.canal').append('<div class="form-group">'+
                                  '<select class="form-control" id="canal" name="canal">'+
                                            '<option value="">Canal</option>'+
                                            '<option value="Cash Business S De Rl">Cash Business S De Rl</option>'+
                                            '<option value="Tecnologia Computarizada SA">Tecnologia Computarizada SA</option>'+
                                            '<option value="Vargas Y Compania Ltda">Vargas Y Compania Ltda</option>'+
                                            '<option value="Libreria y Distribuidora Jardin Sa">Libreria y Distribuidora Jardin Sa</option>'+
                                            '<option value="Representaciones Foraneas Del Istmo Sa">Representaciones Foraneas Del Istmo Sa</option>'+
                                            '<option value="Suministros De Informatica Quinonez Rl">Suministros De Informatica Quinonez Rl</option>'+
                                  '</select>'+
                                '</div>');
  }else if(pais == 'Panamá'){
  	$('.canal').html("");
    $('.canal').append('<div class="form-group">'+
                                  '<select class="form-control" id="canal" name="canal">'+
                                            '<option value="">Canal</option>'+
                                            '<option value="Supricom Sa">Supricom Sa</option>'+
                                  '</select>'+
                                '</div>');
  }
}