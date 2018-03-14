<!DOCTYPE html>
<html lang="es">
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description"            content="HP Super Vendendor">
        <meta name="keywords"               content="HP Super Vendendor">
        <meta name="robots"                 content="Index,Follow">
        <meta name="date"                   content="Febrero 15, 2018"/>
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#000000">
        <title>HP Super Vendendor</title>
    	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.png">
    	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>datetimepicker/css/bootstrap-material-datetimepicker.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
    </head>
    <body>
        <section id="login">
            <video autoplay loop muted>
                <source src="<?php echo RUTA_VIDEO?>video_hp.mp4">
            </video>
            <div class="header">
                <div class="header-left">
                    <img class="logo-header" src="<?php echo RUTA_IMG?>logos/favicon.png">
                    <h2>Programa de incentivos DeskJet HP Tank</h2>
                </div>
            </div>
            <div class="mdl-card-container">
                <div class="center-login registro">
                    <div class="mdl-card mdl-card-login mdl-registro">
                        <div class="mdl-card__supporting-text">
                            <div class="mdl-card__supporting-text">
                                <div class="col-xs-12">
                                    <h2>Nuevo registro</h2>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mdl-input">
                                        <input type="text" class="form-control" placeholder="*Nombres y Apellidos" id="nombre" maxlength="50" onkeypress="return soloLetras(event);">
                                    </div>
                                    <div class="mdl-input">
                                        <select class="selectpicker" id="pais"  name="pais">
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Panamá">Panam&aacute;</option>
                                        </select>
                                    </div>
                                    <div class="mdl-input">
                                        <select class="selectpicker" id="canal"  name="canal">
                                            <option value="Alfatec De CR Sa">Alfatec De CR Sa</option>
                                            <option value="Cdc Internacional Sa">Cdc Internacional Sa</option>
                                            <option value="Compubetel Sa">Compubetel Sa</option>
                                            <option value="Distribuidora Comercial Tres Ases Sa">Distribuidora Comercial Tres Ases Sa</option>
                                            <option value="Distribuidora Ramirez Y Castillo Sa">Distribuidora Ramirez Y Castillo Sa</option>
                                            <option value="Importadora de Tecnologia Global Ysrm Sa">Importadora de Tecnologia Global Ysrm Sa</option>
                                            <option value="Jimenez Y Tanzi Sa">Jimenez Y Tanzi Sa</option>
                                            <option value="Pc Lider De Costa Rica Sa">Pc Lider De Costa Rica Sa</option>
                                            <option value="C&M Sistemas Sa De Cv">C&M Sistemas Sa De Cv</option>
                                            <option value="Equipos Electronicos Valdes Sa De Cv">Equipos Electronicos Valdes Sa De Cv</option>
                                            <option value="Data & Graphics Sa De Cv">Data & Graphics Sa De Cv</option>
                                            <option value="Raf SA de CV">Raf SA de CV</option>
                                            <option value="Dataprint De El Salvador Sa De CV">Dataprint De El Salvador Sa De CV</option>
                                            <option value="Dpg Sa De Cv">Dpg Sa De Cv</option>
                                            <option value="STB Computer Sa De Cv">STB Computer Sa De Cv</option>
                                            <option value="Canella Sa">Canella Sa</option>
                                            <option value="Compusersa Sa">Compusersa Sa</option>
                                            <option value="Dataflex Sa">Dataflex Sa</option>
                                            <option value="Electronica Pan Americana Sa">Electronica Pan Americana Sa</option>
                                            <option value="Intelaf Sa">Intelaf Sa</option>
                                            <option value="Sintegradas SA">Sintegradas SA</option>
                                            <option value="Random Industrial S de Rl">Random Industrial S de Rl</option>
                                            <option value="Utiles de Honduras S De Rl">Utiles de Honduras S De Rl</option>
                                            <option value="Can Computers S de Rl de Cv">Can Computers S de Rl de Cv</option>
                                            <option value="Accesorios para Computadoras y Oficina Acosa">Accesorios para Computadoras y Oficina Acosa</option>
                                            <option value="Cash Business S De Rl">Cash Business S De Rl</option>
                                            <option value="Tecnologia Computarizada SA">Tecnologia Computarizada SA</option>
                                            <option value="Vargas Y Compania Ltda">Vargas Y Compania Ltda</option>
                                            <option value="Libreria y Distribuidora Jardin Sa">Libreria y Distribuidora Jardin Sa</option>
                                            <option value="Representaciones Foraneas Del Istmo Sa">Representaciones Foraneas Del Istmo Sa</option>
                                            <option value="Suministros De Informatica Quinonez Rl">Suministros De Informatica Quinonez Rl</option>
                                            <option value="Supricom Sa">Supricom Sa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mdl-input">
                                        <input type="text" class="form-control" placeholder="*email" id="correo">
                                    </div>
                                    <div class="mdl-input">
                                        <input type="password" class="form-control" placeholder="*contrase&ntilde;a" id="password">
                                    </div>
                                    <div class="mdl-input">
                                        <input type="password" class="form-control" placeholder="*Repetir contrase&ntilde;a" id="re_password">
                                    </div>
                                    <div class="col-xs-12 p-0">
                                        <div class="col-xs-8 p-0">
                                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
                                                <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input">
                                                <span class="mdl-checkbox__label"><a>Acepto t&eacute;rminos y condiciones</a></span>
                                            </label>
                                        </div>
                                        <div class="col-xs-4 p-0 text-right">
                                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login ingresar" onclick="registrar();">Grabar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 required">
                                    <p>*Complete todos los campos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <p>&copy; Copyright 2018 Hewlett-Packard Development Company, L.P.</p>
            </div>
        </section>

        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>moment/moment.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>datetimepicker/js/bootstrap-material-datetimepicker.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>jquery-mask/jquery.mask.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsregistro.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        </script>
    </body>
</html>