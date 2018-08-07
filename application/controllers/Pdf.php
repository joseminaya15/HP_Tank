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
                        <style>
                            .table{
                                width: 100%; 
                            }
                            .table tr td,
                            .table tr th{
                                border: 1px solid #000000;
                                padding: 5px;
                            }
                        </style>
					</head>
					<body>
                        <div style="text-align: center;">
                            <h2>Total de Facturas</h2>
                        </div>
                        <table class="table" cellspacing="0">
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
					</body>
				  </html>';
		$mpdf  = new \Mpdf\Mpdf();
		$mpdf ->writeHTML($html);
		$mpdf ->output();
	}
}
