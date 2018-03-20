<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

	public function index(){
		$this->load->view('v_registro');
	}

	function registrar(){
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
         try {
         	$nombre   = $this->input->post('nombre');
         	$canal    = $this->input->post('canal');
         	$usuario  = $this->input->post('usuario');
         	$password = $this->input->post('password');
         	$pais  	  = $this->input->post('pais');
         	$arrayInsert = array('Nombre' 		=> $nombre,
                                 'Nombre_canal' => $canal,
                                 'Email'        => $usuario,
                                 'pass'         => base64_encode($password),
                                 'Pais'         => $pais);
            $datoInsert = $this->M_login->insertarDatos($arrayInsert, 'Users');
            $session    = array('nombre' 	 => $nombre,
                                'canal'      => $canal,
                                'usuario'    => $usuario,
                                'pais'       => $pais,
                                'pass'       => $password,
                                'id_capitan' => $datoInsert['Id']);
            $this->session->set_userdata($session);
            $this->sendGmailSap($usuario);
			$data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}

    function sendGmailSap($email){
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
       $this->email->subject('¡Sé el próximo Súper Vendedor HP Tank!');
        $texto = '<!DOCTYPE html>
                    <html>
                    <body>
                        <table width="500px" cellpadding="0" cellspacing="0" align="center" style="border: solid 1px #ccc;">
                            <tr>
                                <td>
                                    <table width="500" cellspacing="0" cellpadding="0" border="0" align="center">
                                        <tr>
                                            <td><a href="#"><img src="http://incentivoshptank.marketinghp.net/public/img/logos/fondo_registro.png" width="500" height="272" alt="alternative text" border="0" style="display: block;"></a></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="400" cellspacing="0" cellpadding="0" border="0" align="center" style="padding: 30px 0">
                                        <tr>
                                            <td style="text-align: center;padding-bottom: 0;"><font style="font-family: arial;color: #00A0DC;font-size: 25px;font-weight: 600;">¡Gracias por registrarte!</font></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;padding: 0;margin: 0;"><font style="font-family: arial;color: #000000;font-size: 22px;">Haz que tus ventas dejen huella</font></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;padding-top: 20px;padding-bottom: 0;"><font style="font-family: arial;color: #757575;font-size: 14px;">Inicia sesi&oacute;n con tu usuario y contrase&ntilde;a</font></td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 20px 0;">
                                                <table width="360" cellspacing="0" cellpadding="0" border="0" align="center" style="border: solid 1px #ccc;padding: 20px;">
                                                    <tr>
                                                        <td style="text-align: right;padding: 2px 10px;"><fonts style="font-family: arial;color: #757575;font-size: 14px;color: #757575;">Usuario</font></td>
                                                        <td style="text-align: left;padding: 2px 10px;"><font style="font-family: arial;color: #00A0DC;font-size: 14px;">'.$this->session->userdata('nombre').'</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;padding: 2px 10px;"><font style="font-family: arial;color: #757575;font-size: 14px;color: #757575;">Email</font></td>
                                                        <td style="text-align: left;padding: 2px 10px;"><font style="font-family: arial;color: #00A0DC;font-size: 14px;">'.$this->session->userdata('usuario').'</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;padding: 2px 10px;"><font style="font-family: arial;color: #757575;font-size: 14px;color: #757575;">Contrase&ntilde;a</font></td>
                                                        <td style="text-align: left;padding: 2px 10px;"><font style="font-family: arial;color: #00A0DC;font-size: 14px;">'.$this->session->userdata('pass').'</font></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;padding: 20px 0"><a href="http://incentivoshptank.marketinghp.net/login" target="_blank" style="font-family: arial;color: #00A0DC;font-size: 14px; text-decoration: underline;font-weight: 600;">Regresar al portal</a></td>
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
