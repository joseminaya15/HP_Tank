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
            <div class="video-opacity"></div>
            <div class="fondo-imagen"></div>
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
                            <div class="col-xs-12">
                                <h2>Nuevo registro</h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="mdl-input">
                                    <input type="text" class="form-control" placeholder="*Nombres y Apellidos" id="nombre" maxlength="50" onkeypress="return soloLetras(event);">
                                </div>
                                <div class="mdl-input">
                                    <select class="selectpicker" id="pais"  name="pais" title="País" onchange="seleccionarPais()">
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Panamá">Panam&aacute;</option>
                                    </select>
                                </div>
                                <div class="mdl-input canal">
                                    <div class="form-group">
                                      <select class="form-control" id="canal" name="canal">
                                                <option value="">Canal</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <a href="Login" style="color: #fff">Retroceder</a>
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
                                            <span class="mdl-checkbox__label"><a href="" data-toggle="modal" data-target="#ModalTerminos">Acepto t&eacute;rminos y condiciones</a></span>
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
            <div class="footer">
                <p>&copy; Copyright 2018 Hewlett-Packard Development Company, L.P.</p>
            </div>
        </section>
        <!--MODAL-->
        <div class="modal fade" id="ModalTerminos" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm text-center">
                <div class="modal-content">
                    <div class="mdl-card" >
                        <div class="mdl-card__title">
                            <h2>T&eacute;rminos y condiciones</h2>
                        </div>
                        <div class="mdl-card__supporting-text text-left">
                            <ul>
                                <li>El premio se entregar&aacute; directamente al vendedor de la compa&ntilde;&iacute;a.</li>
                                <li>La compa&ntilde;&iacute;a que no acepte esta directriz, no recibir&aacute; la tarjeta. </li>
                                <li>El vendedor debe de acumular como mínimo $50 para realizarle la entrega de la tarjeta. </li>
                                <li>HP se reserva el derecho de modificar los t&eacute;rminos y condiciones del incentivo sin previo aviso. </li>
                                <li>Los premios se entregarán un mes despu&eacute;s del cierre del mes a trav&eacute;s de una tarjeta de regalo que se entregar&aacute; directamente en las oficinas del canal.</li>
                            </ul>
                        </div> 
                        <div class="mdl-card__actions text-right">                          
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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