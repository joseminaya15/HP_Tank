<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require getcwd().'\vendor\autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

class Pdf extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('M_solicitud');
    }

	public function index(){
		$tabla = $this->M_solicitud->getDatosTabla($this->session->userdata('Id_user'));
        if(count($tabla) == 0){
            $html  = '<tr>
                        <td class="text-center"></td>
                      </tr>';
            $data['tabla'] = $html;
        }else {
            foreach ($tabla as $key){
                $html .= '<tr>
                            <td class="text-center">'.$key->Nombre.'</td>
                            <td class="text-center">'.$key->fecha.'</td>
                            <td class="text-center">'.$key->nro_factura.'</td>
                            <td class="text-center">'.$key->modelo.'</td>
                            <td class="text-center">'.$key->cantidad.'</td>
                            <td class="text-center">'.$key->spiff.'</td>
                        </tr>';
            }
        }
		$html='<html>
					<head>
						<link rel="shortcut icon" href="http://hpedigitalmarketingacademy.com/Certificados/public/img/logo/favicon.ico">
						<link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
					</head>
					<body>
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
                                    '.$html.'
                                </tbody>
                            </table>
                        </div>
					</body>
				  </html>';
		$mpdf  = new \Mpdf\Mpdf();
		$mpdf ->writeHTML($html);
		$mpdf ->output();
	}
}
