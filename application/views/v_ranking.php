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
                                            <?php echo $rankingTOP ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mdl-card__actions p-r-20">
                                <div id="fb-root"></div>
                                <div class="fb-share-button" data-href="<?php echo $directory ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="<?php echo $directory ?>" class="fb-xfbml-parse-ignore">Compartir</a></div>
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
                                                <th class="text-right bold">SPIFFS GANADOS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $premios ?>
                                            <tr>
                                                <td class="text-left texto p-t-10 p-b-10">En <?php echo $mesServidor; ?> quedaste en el puesto</td>
                                                <td class="text-left puesto p-t-10 p-b-10"><?php echo $ranking; ?></td>
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
                            <div class="mdl-card__supporting-text" id="TopRanking">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default js-top">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">MES MARZO</a>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador1.png"></td>
                                                            <td class="text-left"><?php echo $uno_nombre_m == null ? '-' : $uno_nombre_m; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador2.png"></td>
                                                            <td class="text-left"><?php echo $dos_nombre_m == null ? '-' : $dos_nombre_m; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador3.png"></td>
                                                            <td class="text-left"><?php echo $tres_nombre_m == null ? '-' : $tres_nombre_m; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador4.png"></td>
                                                            <td class="text-left"><?php echo $cuatro_nombre_m == null ? '-' : $cuatro_nombre_m; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador5.png"></td>
                                                            <td class="text-left"><?php echo $cinco_nombre_m == null ? '-' : $cinco_nombre_m; ?></td>
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
                                                <div class="mdl-card__actions">
                                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-pdf" id="pdf1">Descargar PDF<i class="mdi mdi-play_arrow"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default js-top">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">MES ABRIL</a>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="table-responsive">
                                                <table class="table m-0">
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
                                                <div class="mdl-card__actions">
                                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-pdf" id="pdf2">Descargar PDF<i class="mdi mdi-play_arrow"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default js-top">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">MES MAYO</a>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador1.png""></td>
                                                            <td class="text-left"><?php echo $uno_nombre_ma ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador2.png""></td>
                                                            <td class="text-left"><?php echo $dos_nombre_ma ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador3.png""></td>
                                                            <td class="text-left"><?php echo $tres_nombre_ma ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador4.png""></td>
                                                            <td class="text-left"><?php echo $cuatro_nombre_ma ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador5.png""></td>
                                                            <td class="text-left"><?php echo $cinco_nombre_ma ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div id="content3" style="display: none;">
                                                    <table class="table">
                                                        <h1>Top 5 Mes de Mayo</h1>
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Puesto</th>
                                                                <th class="text-center">Nombre</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center">1</td>
                                                                <td class="text-center"><?php echo $uno_nombre_ma ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">2</td>
                                                                <td class="text-center"><?php echo $dos_nombre_ma ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">3</td>
                                                                <td class="text-center"><?php echo $tres_nombre_ma ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">4</td>
                                                                <td class="text-center"><?php echo $cuatro_nombre_ma ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">5</td>
                                                                <td class="text-center"><?php echo $cinco_nombre_ma ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="editor3"></div>
                                                <div class="mdl-card__actions">
                                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-pdf" id="pdf3">Descargar PDF<i class="mdi mdi-play_arrow"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default js-top">
                                        <div class="panel-heading" role="tab" id="headingFour">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">MES JUNIO</a>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador1.png""></td>
                                                            <td class="text-left"><?php echo $uno_nombre_j ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador2.png""></td>
                                                            <td class="text-left"><?php echo $dos_nombre_j ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador3.png""></td>
                                                            <td class="text-left"><?php echo $tres_nombre_j ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador4.png""></td>
                                                            <td class="text-left"><?php echo $cuatro_nombre_j ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador5.png""></td>
                                                            <td class="text-left"><?php echo $cinco_nombre_j ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div id="content4" style="display: none;">
                                                    <table class="table">
                                                        <h1>Top 5 Mes de Junio</h1>
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Puesto</th>
                                                                <th class="text-center">Nombre</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center">1</td>
                                                                <td class="text-center"><?php echo $uno_nombre_j ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">2</td>
                                                                <td class="text-center"><?php echo $dos_nombre_j ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">3</td>
                                                                <td class="text-center"><?php echo $tres_nombre_j ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">4</td>
                                                                <td class="text-center"><?php echo $cuatro_nombre_j ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">5</td>
                                                                <td class="text-center"><?php echo $cinco_nombre_j ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="editor4"></div>
                                                <div class="mdl-card__actions">
                                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-pdf" id="pdf4">Descargar PDF<i class="mdi mdi-play_arrow"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default js-top">
                                        <div class="panel-heading" role="tab" id="headingFive">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">MES JULIO</a>
                                        </div>
                                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador1.png""></td>
                                                            <td class="text-left"><?php echo $uno_nombre_ju ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador2.png""></td>
                                                            <td class="text-left"><?php echo $dos_nombre_ju ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador3.png""></td>
                                                            <td class="text-left"><?php echo $tres_nombre_ju ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador4.png""></td>
                                                            <td class="text-left"><?php echo $cuatro_nombre_ju ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="width: 55px;"><img src="<?php echo RUTA_IMG?>ranking/ganador5.png""></td>
                                                            <td class="text-left"><?php echo $cinco_nombre_ju ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div id="content5" style="display: none;">
                                                     <table class="table">
                                                        <h1>Top 5 Mes de Julio</h1>
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Puesto</th>
                                                                <th class="text-center">Nombre</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center">1</td>
                                                                <td class="text-center"><?php echo $uno_nombre_ju ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">2</td>
                                                                <td class="text-center"><?php echo $dos_nombre_ju ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">3</td>
                                                                <td class="text-center"><?php echo $tres_nombre_ju ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">4</td>
                                                                <td class="text-center"><?php echo $cuatro_nombre_ju ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">5</td>
                                                                <td class="text-center"><?php echo $cinco_nombre_ju ?></td>
                                                            </tr>
                                                        </tbody>
                                                      </table>
                                                </div>
                                                <div id="editor5"></div>
                                                <div class="mdl-card__actions">
                                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-pdf" id="pdf5">Descargar PDF<i class="mdi mdi-play_arrow"></i></button>
                                                </div>
                                            </div>
                                        </div>
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
                    'width': 250,
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
                    'width': 250,
                        'elementHandlers': specialElementHandlers
                });
                doc2.save('rankingTop5Abril.pdf');
            });
            var doc3 = new jsPDF();
            var specialElementHandlers = {
                '#editor3': function (element, renderer) {
                    return true;
                }
            };
            $('#pdf3').click(function () {
                doc3.fromHTML($('#content3').html(), 15, 15, {
                    'width': 250,
                        'elementHandlers': specialElementHandlers
                });
                doc3.save('rankingTop5Mayo.pdf');
            });
            var doc4 = new jsPDF();
            var specialElementHandlers = {
                '#editor4': function (element, renderer) {
                    return true;
                }
            };
            $('#pdf4').click(function () {
                doc4.fromHTML($('#content4').html(), 15, 15, {
                    'width': 250,
                        'elementHandlers': specialElementHandlers
                });
                doc4.save('rankingTop5Junio.pdf');
            });
            var doc5 = new jsPDF();
            var specialElementHandlers = {
                '#editor5': function (element, renderer) {
                    return true;
                }
            };
            $('#pdf5').click(function () {
                doc5.fromHTML($('#content5').html(), 15, 15, {
                    'width': 250,
                        'elementHandlers': specialElementHandlers
                });
                doc5.save('rankingTop5Julio.pdf');
            });
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