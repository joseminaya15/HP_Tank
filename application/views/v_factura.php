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
        <link rel="stylesheet"    href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
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
                <div class="header-right">
                    <div id="Menu" class="header-menu" onclick="goToMenu(this.id)">
                        <p>Menu</p>
                        <img src="<?php echo RUTA_IMG?>logos/home.png"">
                    </div>
                    <div class="header-sesion" onclick="cerrarCesion()">
                        <p>Cerrar Sesi&oacute;n</p>
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                </div>
            </div>
            <div class="container mdl-card-container factura">
                <div class="center">
                    <div class="text-right">
                        <h2 class="person_name">Bienvenido(a) <?php echo $nombre == null ? '' : $nombre; ?></h2>
                        <p class="team_name">Canal <?php echo $canal == null ? '' : $canal; ?></p>
                    </div>
                    <div class="mdl-card mdl-card-menu ganancia">
                        <div class="mdl-ganancia">
                            <p>Total ganado hasta hoy</p>
                            <div class="mdl-money">
                                <img src="<?php echo RUTA_IMG?>logos/money.png"">
                                <h2>997</h2>
                            </div>
                            <div id="content" style="display: none;">
                                 <h3>Hello, this is a H3 tag</h3>

                                <p>a pararaph</p>
                            </div>
                            <div id="editor"></div>
                            <a id="cmd">Descargar factura cargada<i class="mdi mdi-play_arrow"></i></a>
                            <!--<button id="cmd">Descargar factura cargada</button>-->
                        </div>
                    </div>
                    <div class="mdl-card mdl-factura">
                        <div class="mdl-card__supporting-text">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Fecha de venta</th>
                                            <th class="text-center">N&uacute;mero de factura</th>
                                            <th class="text-center">Modelo DeskJet</th>
                                            <th class="text-center">Cantidad</th>
                                            <th class="text-center">Spiff ganado</th>
                                            <th class="text-center">Monto de la factura</th>
                                            <th class="text-center">Subir factura (PDF)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                
                                            </td>
                                            <td class="text-center">
                                                <div class="mdl-input">
                                                    <input type="text" class="form-control" id="factura">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="mdl-input">
                                                    <select class="selectpicker" id="pais" name="pais">
                                                        <option value="HP Tank 5810">HP Tank 5810</option>
                                                        <option value="HP Tank 5820">HP Tank 5820</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="mdl-input">
                                                    <input type="text" class="form-control" id="factura">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="mdl-input">
                                                    <input type="text" class="form-control" id="factura">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="mdl-input">
                                                    <input type="text" class="form-control" id="factura">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mdl-input">
                                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Seleccionar Archivo</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mdl-card__actions">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login ingresar">Cargar factura<i class="mdi mdi-play_arrow"></i></button>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js" integrity="sha384-CchuzHs077vGtfhGYl9Qtc7Vx64rXBXdIAZIPbItbNyWIRTdG0oYAqki3Ry13Yzu" crossorigin="anonymous"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jslogin.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
            var doc = new jsPDF();
            var specialElementHandlers = {
                '#editor': function (element, renderer) {
                    return true;
                }
            };

            $('#cmd').click(function () {
                doc.fromHTML($('#content').html(), 15, 15, {
                    'width': 170,
                        'elementHandlers': specialElementHandlers
                });
                doc.save('sample-file.pdf');
            });
        </script>
    </body>
</html>