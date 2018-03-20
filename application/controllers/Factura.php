<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_solicitud');
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
	public function index(){
        if($this->session->userdata('usuario') == null){
            header("location: Login");
        }
        $data['nombre'] = $this->session->userdata('nombre');
        $data['canal']  = $this->session->userdata('canal');
        $datos = $this->M_solicitud->getTotal($this->session->userdata('Id_user'));
        $html  = '';
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
            $data['tabla'] = $html;
        }
        $data['total'] = $datos[0]->total == '' ? '0' : $datos[0]->total;
        $arrUpdt = array('total' => $datos[0]->total);
        $this->M_solicitud->updateDatos($arrUpdt, $this->session->userdata('Id_user'), 'users');
		$this->load->view('v_factura', $data);
	}

    function cerrarCesion(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $this->session->unset_userdata('usuario');
            $this->session->unset_userdata('Id_user');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }

    function crearAnotacion(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $fecha    = $this->input->post('fecha');
            $nro_fact = $this->input->post('nro_fact');
            $modelo   = $this->input->post('modelo');
            $cantidad = $this->input->post('cantidad');
            $spiff    = $this->input->post('spiff');
            $monto    = $this->input->post('monto');
            $date     = str_replace('/', '-', $fecha);

            $arrInsert = array('fecha'       => date('Y-m-d', strtotime($date)),
                               'nro_factura' => $nro_fact,
                               'modelo'      => $modelo,
                               'cantidad'    => $cantidad,
                               'spiff'       => $spiff,
                               'monto'       => $monto,
                               'Id_user'     => $this->session->userdata('Id_user'));
            $datoInsert = $this->M_solicitud->insertarDatos($arrInsert, 'anotacion');
            $session    = array('fecha'      => $fecha,
                               'nro_factura'  => $nro_fact,
                               'modelo'       => $modelo,
                               'cantidad'     => $cantidad,
                               'spiff'        => $spiff,
                               'monto'        => $monto,
                               'id_anotacion' => $datoInsert['Id']);
            $this->session->set_userdata($session);
            $datos = $this->M_solicitud->getTotal($this->session->userdata('Id_user'));
            $data['total'] = $datos[0]->total == '' ? '0' : $datos[0]->total;
            //$this->sendGmailSap();
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }

    function cargarFact(){
        $respuesta = new stdClass();
        $respuesta->mensaje = "";
        if(count($_FILES) == 0){
            $respuesta->mensaje = 'Seleccione su factura';
        }else {
            $tipo = $_FILES['archivo']['type']; 
            $tamanio = $_FILES['archivo']['size']; 
            $archivotmp = $_FILES['archivo']['tmp_name'];
            $namearch = $_FILES['archivo']['name'];
            $nuevo = explode(".",$namearch);
            if($tamanio > '2000000'){
                $respuesta->mensaje = 'El tamaño de su pdf debe ser menor';
            }else {
                if($nuevo[1] == 'pdf' || $nuevo[1] == 'jpeg' || $nuevo[1] == 'jpg' || $nuevo[1] == 'png'){
                    $target = getcwd().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'archivos'.DIRECTORY_SEPARATOR.'1'.basename($_FILES['archivo']['name']);
                    if(move_uploaded_file($archivotmp, $target) ){
                       $arrUpdt = array('documento' => $namearch);
                       $this->M_solicitud->updateDatos($arrUpdt, $this->session->userdata('id_anotacion'), 'anotacion');
                       $respuesta->mensaje = 'Su factura se subió correctamente';
                    } else {
                       $respuesta->mensaje = 'Hubo un problema en la subida de su factura';
                    }
                }else {
                    $respuesta->mensaje = 'El formato de la factura es incorrecto';
                }
            }
            echo json_encode($respuesta);
        }
    }

    function sendGmailSap(){
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {  
       $this->load->library("email");
       $configGmail = array('protocol'  => 'smtp',
                            'smtp_host' => 'smtpout.secureserver.net',
                            'smtp_port' => 3535,
                            'smtp_user' => 'confirmaciones@merino.com.pe',
                            'smtp_pass' => 'cFm$17Pe',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n");
       $this->email->initialize($configGmail);
       $this->email->from('info@sap-latam.com');
       $this->email->to($this->session->userdata('usuario'));
       $this->email->subject('Acabas de dejar una huella');
        $texto = '<!DOCTYPE html>
                    <html>
                    <body>
                        <table width="500px" cellpadding="0" cellspacing="0" align="center" style="border: solid 1px #ccc;">
                            <tr>
                                <td>
                                    <table width="500" cellspacing="0" cellpadding="0" border="0" align="center">
                                        <tr>
                                            <td><a href="#"><img src="http://incentivoshptank.marketinghp.net/public/img/logos/fondo_factura.png" width="500" height="272" alt="alternative text" border="0" style="display: block;"></a></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="400" cellspacing="0" cellpadding="0" border="0" align="center" style="padding: 30px 0">
                                        <tr>
                                            <td style="text-align: center;"><font style="font-family: arial;color: #00A0DC;font-size: 25px;font-weight: 600;">Tu factura se registró con éxito</font></td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 20px 0;">
                                                <table width="360" cellspacing="0" cellpadding="0" border="0" align="center" style="border: solid 1px #ccc;padding: 20px;">
                                                    <tr>
                                                        <td style="text-align: right;padding: 2px 10px;"><fonts style="font-family: arial;color: #757575;font-size: 14px;">N° de factura</font></td>
                                                        <td style="text-align: left;padding: 2px 10px;""><font style="font-family: arial;color: #00A0DC;font-size: 14px;">'.$this->session->userdata('nro_factura').'</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;padding: 2px 10px;"><font style="font-family: arial;color: #757575;font-size: 14px;">Spiff ganado</font></td>
                                                        <td style="text-align: left;padding: 2px 10px;""><font style="font-family: arial;color: #00A0DC;font-size: 14px;">'.$this->session->userdata('spiff').'</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;padding: 2px 10px;"><font style="font-family: arial;color: #757575;font-size: 14px;">Fecha de Registro</font></td>
                                                        <td style="text-align: left;padding: 2px 10px;""><font style="font-family: arial;color: #00A0DC;font-size: 14px;">'.$this->session->userdata('fecha').'</font></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><font style="font-family: arial;color: #D3D3D3;font-size: 12px;">&copy;Copyright 2018 HP Development Company, L.P.</font></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </body>
                    </html>';
        $this->email->message($texto);
        $this->email->send();
        $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
        $data['msj'] = $e->getMessage();
      }
      return json_encode(array_map('utf8_encode', $data));
    }
}
