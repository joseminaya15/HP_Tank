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
        <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logos/favicon.png">
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
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
            </style>
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
                <div class="text-right">
                    <h2 class="person_name">Bienvenido(a) <?php echo $nombre == null ? '' : $nombre; ?></h2>
                    <p class="team_name">Canal <?php echo $canal == null ? '' : $canal; ?></p>
                </div>
                <div class="center">
                    <div class="mdl-card mdl-card-menu ganancia">
                        <div class="mdl-ganancia">
                            <p>Total ganado hasta hoy</p>
                            <div class="mdl-money">
                                <img src="<?php echo RUTA_IMG?>logos/money.png"">
                                <h2 id="gtotal"><?php echo $total ?></h2>
                            </div>
                            <div id="content" style="display: none;width: 100%;">
                                <table class="table" width="100">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Fecha</th>
                                            <th>Nro Factura</th>
                                            <th>Modelo</th>
                                            <th>Cantidad</th>
                                            <th>Spiff ganado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $tabla ?>
                                    </tbody>
                                  </table>
                            </div>
                            <div id="editor"></div>
                            <a href="Pdf" target="_blank">Descargar factura cargada<i class="mdi mdi-play_arrow"></i></a>
                        </div>
                    </div>
                    <div class="mdl-card mdl-factura">
                        <div class="mdl-card__supporting-text">
                            <div class="table-responsive">
                                <table class="table m-0">
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
                                            <td class="text-center">
                                                <div class="mdl-input mdl-fecha factura">
                                                    <div class="mdl-icon">
                                                        <button id="butonFecha" class="mdl-button mdl-js-button mdl-button--icon"><i class="mdi mdi-date_range"></i></button>
                                                    </div>
                                                    <input class="form-control text-center" type="text" id="fecha" name="fecha" maxlength="10" placeholder="dd/mm/aaaa" onclick="triggerFecha();">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="mdl-input factura">
                                                    <input type="text" class="form-control text-center" id="nro_factura">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="mdl-input factura">
                                                    <select class="selectpicker" id="modelo" name="modelo" onchange="selectPrint()">
                                                        <option value="HP DeskJet GT 5810">HP DeskJet GT 5810</option>
                                                        <option value="HP Tank 315">HP Tank 315</option>
                                                        <option value="HP DeskJet GT 5820">HP DeskJet GT 5820</option>
                                                        <option value="HP Tank 415">HP Tank 415</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="mdl-input factura">
                                                    <input id="cantidad" type="text" class="form-control text-center numeros" onkeyup="readCount()">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="mdl-input factura">
                                                    <input id="spiff" type="text" class="form-control text-center" value="$5" disabled>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="mdl-input factura">
                                                    <input id="monto" type="text" class="form-control text-center numeros">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mdl-input factura">
                                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-select" onclick="subirFactura()" id="btnSubirFact">Seleccionar Archivo</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mdl-card__actions">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login ingresar" onclick="crearAnotacion();" id="cargarAnotacion">Cargar factura<i class="mdi mdi-play_arrow"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <p>&copy; Copyright 2018 Hewlett-Packard Development Company, L.P.</p>
            </div>
        </section>

        <form id="frmArchivo" method="post" style="display: none;">
            <input id="archivo" type="file" name="archivo" />
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
            <input class="boton" type="submit" name="enviar" value="Importar" style="display: none" />
        </form>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsfactura.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
            var doc = new jsPDF('landscape');
            // var specialElementHandlers = {
            //     '#editor': function (element, renderer) {
            //         return true;
            //     }
            // };
            $('#cmd').click(function () {
                doc.fromHTML($('#content').html(), 15, 15, {
                    'width': 100,
                    'height':  100
                    // 'elementHandlers': specialElementHandlers
                });
                doc.save('factura.pdf');
            });
            initButtonCalendarDaysMaxToday('fecha');
            initMaskInputs('fecha');
        </script>
    </body>
</html>