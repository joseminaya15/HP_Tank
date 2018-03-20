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
        <!-- <link rel="stylesheet"    href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"> -->
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
                <div class="text-right">
                    <h2 class="person_name">Bienvenido(a) <?php echo $nombre == null ? '' : $nombre; ?></h2>
                    <p class="team_name">Canal <?php echo $canal == null ? '' : $canal; ?></p>
                </div>
                <div class="center">
                    <div class="mdl-ranking">
                        <div id="ranking" class="mdl-card mdl-top">
                            <div class="mdl-card__title">
                                <h2>Ranking TOP 5</h2>
                            </div>
                            <div class="mdl-card__supporting-text p-t-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="bold">VENDEDOR</th>
                                                <th class="bold">CANAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="<?php echo RUTA_IMG?>ranking/ranking1.png""></td>
                                                <td class="text-left"><?php echo $uno_nombre ?></td>
                                                <td class="text-left"><?php echo $uno_canal ?></td>
                                            </tr>
                                            <tr>
                                                <td><img src="<?php echo RUTA_IMG?>ranking/ranking2.png""></td>
                                                <td class="text-left"><?php echo $dos_nombre ?></td>
                                                <td class="text-left"><?php echo $dos_canal ?></td>
                                            </tr>
                                            <tr>
                                                <td><img src="<?php echo RUTA_IMG?>ranking/ranking3.png""></td>
                                                <td class="text-left"><?php echo $tres_nombre ?></td>
                                                <td class="text-left"><?php echo $tres_canal ?></td>
                                            </tr>
                                            <tr>
                                                <td><img src="<?php echo RUTA_IMG?>ranking/ranking4.png""></td>
                                                <td class="text-left"><?php echo $cuatro_nombre ?></td>
                                                <td class="text-left"><?php echo $cuatro_canal ?></td>
                                            </tr>
                                            <tr>
                                                <td><img src="<?php echo RUTA_IMG?>ranking/ranking5.png""></td>
                                                <td class="text-left"><?php echo $cinco_nombre ?></td>
                                                <td class="text-left"><?php echo $cinco_canal ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mdl-card__actions p-r-20">
                                <div id="fb-root"></div>
                                <div class="fb-share-button" data-href="http://localhost/HP_Tank/RankingTop5" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="http://localhost/HP_Tank/RankingTop5" class="fb-xfbml-parse-ignore">Compartir</a></div>
                            </div>
                        </div>
                        <div class="mdl-card mdl-premio">
                            <div class="mdl-card__title">
                                <h2>Mis premios ganados</h2>
                            </div>
                            <div class="mdl-card__supporting-text p-t-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th class="bold">MES</th>
                                                <th class="bold">SPIFFS GANADOS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-left bold">Marzo</td>
                                                <td class="text-left bold">$<?php echo $total_marzo ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-left bold">Abril</td>
                                                <td class="text-left bold">$<?php echo $total_abril ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-left texto p-t-30 p-b-20">En Marzo quedaste en el puesto</td>
                                                <td class="text-left puesto p-t-30 p-b-20"><?php echo $ranking ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-center retate">¡Rétate y haz que el próximo mes tenga tu huella!</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-card mdl-ganador">
                            <div class="mdl-card__title">
                                <h2>Ganadores TOP 5 del mes</h2>
                            </div>
                            <div class="mdl-card__supporting-text p-t-0">
                                <div class="col-xs-6">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="bold">MES MARZO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador1.png""></td>
                                                    <td class="text-left"><?php echo $uno_nombre_m ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador2.png""></td>
                                                    <td class="text-left"><?php echo $dos_nombre_m ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador3.png""></td>
                                                    <td class="text-left"><?php echo $tres_nombre_m ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador4.png""></td>
                                                    <td class="text-left"><?php echo $cuatro_nombre_m ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador5.png""></td>
                                                    <td class="text-left"><?php echo $cinco_nombre_m ?></td>
                                                </tr>
                                                <tr>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div id="content" style="display: none;">
                                             <table class="table">
                                                <h1>Top 5 Mes de Marzo</h1>
                                                <thead>
                                                  <tr>
                                                    <th>Puesto</th>
                                                    <th>Nombre</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>1</td>
                                                    <td><?php echo $uno_nombre_m ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>2</td>
                                                    <td><?php echo $dos_nombre_m ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>3</td>
                                                    <td><?php echo $tres_nombre_m ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>4</td>
                                                    <td><?php echo $cuatro_nombre_m ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>5</td>
                                                    <td><?php echo $cinco_nombre_m ?></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                        </div>
                                        <div id="editor"></div>
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-pdf" id="pdf1">Descargar PDF<i class="mdi mdi-play_arrow"></i></button>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="bold">MES ABRIL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador1.png""></td>
                                                    <td class="text-left"><?php echo $uno_nombre_a ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador2.png""></td>
                                                    <td class="text-left"><?php echo $dos_nombre_a ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador3.png""></td>
                                                    <td class="text-left"><?php echo $tres_nombre_a ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador4.png""></td>
                                                    <td class="text-left"><?php echo $cuatro_nombre_a ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador5.png""></td>
                                                    <td class="text-left"><?php echo $cinco_nombre_a ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div id="content2" style="display: none;">
                                             <table class="table">
                                                <h1>Top 5 Mes de Abril</h1>
                                                <thead>
                                                  <tr>
                                                    <th class="text-center">Puesto</th>
                                                    <th class="text-center">Nombre</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center"><?php echo $uno_nombre_a ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center"><?php echo $dos_nombre_a ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center"><?php echo $tres_nombre_a ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center"><?php echo $cuatro_nombre_a ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-center">5</td>
                                                    <td class="text-center"><?php echo $cinco_nombre_a ?></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                        </div>
                                        <div id="editor2"></div>
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-pdf" id="pdf2">Descargar PDF<i class="mdi mdi-play_arrow"></i></button>
                                    </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js" integrity="sha384-CchuzHs077vGtfhGYl9Qtc7Vx64rXBXdIAZIPbItbNyWIRTdG0oYAqki3Ry13Yzu" crossorigin="anonymous"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
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
            $('#pdf1').click(function () {
                doc.fromHTML($('#content').html(), 15, 15, {
                    'width': 170,
                        'elementHandlers': specialElementHandlers
                });
                doc.save('rankingTop5Marzo.pdf');
            });
            var doc2 = new jsPDF();
            var specialElementHandlers = {
                '#editor2': function (element, renderer) {
                    return true;
                }
            };
            $('#pdf2').click(function () {
                doc2.fromHTML($('#content2').html(), 15, 15, {
                    'width': 170,
                        'elementHandlers': specialElementHandlers
                });
                doc2.save('rankingTop5Marzo.pdf');
            });
            /*function downloadCanvas(canvasId, filename) {
                var domElement = document.getElementById(canvasId);
                html2canvas(domElement, {
                    onrendered: function(domElementCanvas) {
                        var context = domElementCanvas.getContext('2d');
                        var link = document.createElement('a');
                        link.href = domElementCanvas.toDataURL("image/png");
                        link.download = filename;
                        if (document.createEvent) {
                            var event = document.createEvent('MouseEvents');
                            event.initMouseEvent("click", true, true, window, 0,
                                0, 0, 0, 0,
                                false, false, false, false,
                                0, null);
                            link.dispatchEvent(event);
                        } else {
                            link.click();
                        }
                    }
                });
            }
            $('#boton-descarga').click(function() {
                downloadCanvas('ranking','ranking.png');
            });*/
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.12';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </body>
</html>