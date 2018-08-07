<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require getcwd().'\vendor\autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

class Pdf extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper("url");
    }

	public function index(){
		$html='<html>
					<head>
						<link rel="shortcut icon" href="http://hpedigitalmarketingacademy.com/Certificados/public/img/logo/favicon.ico">
						<link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
						<style>
							body,html{
								margin: 0;
								padding: 0;
								font-family: "MetricRegular";
							}
							.fondo-imagen{
								position: absolute;
								top: 0;
								left: 0;
								right: 0;
								bottom: 0;
								width: 100%;
								height: 100%;
							}
							.js-logo{
								padding-top: 150px;
							}
							.js-information{
								text-align: center;
								padding-top: 20px;
							}
							.js-information h2{
								font-size: 40px;
								font-family: "Roboto",sans-serif;
								font-weight: 100;
							}
							.js-information p{
								font-size: 20px;
								font-family: "Roboto",sans-serif;
								font-weight: light;
								color: #231F20;
							}
							.js-information h3{
								font-size: 42px;
								font-family: "Roboto",sans-serif;
								font-weight: bold;
							}
							.js-information span{
								font-size: 14px;
								font-family: "Roboto",sans-serif;
								font-weight: light;
								display: block;
								color: #231F20;
							}
						</style>
					</head>
					<body>
						<div class="fondo-imagen">
							<img style="width: 100%;" src="http://hpedigitalmarketingacademy.com/Certificados/public/img/fondo/fondo.png"/>
						</div>
						<div class="js-logo"><img width="180" src="http://hpedigitalmarketingacademy.com/Certificados/public/img/logo/logo-footer.png"/></div>
						<div class="js-information">
							<h2 style="font-family: "MetricRegular";">Certificado de Participación</h2>
							<p>Por el presente certificamos que</p>
							<h3></h3>
							<div width="360" style="margin:auto;">
								<p>ha completado satisfactoriamente el<br> <strong>HPE Digital Marketing Academy</strong> compuesto por 10 workshops dictados bajo la modalidad de webinar y ahora cuenta con los conocimientos esenciales para desarrollar campañas de Marketing Digital.</p>
							</div><br><br>
							<img width="250" style="border-bottom: 1px solid #757575;" src="http://hpedigitalmarketingacademy.com/Certificados/public/img/fondo/firma.jpg"/><br><br>
							<span>Gabriella Guazzo</span><br>
							<span>EG Geography Marketing Manager Latin America</span><br>
							<span>Hewlett Packard Enterprise</span><br><br>
							<span>Junio, 2018</span><br>
						</div>
					</body>
				  </html>';
		$mpdf  = new \Mpdf\Mpdf();
		$mpdf ->writeHTML($html);
		$mpdf ->output();
	}
}
