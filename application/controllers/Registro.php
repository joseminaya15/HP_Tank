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
         	$arrayInsert = array('Nombre' => $nombre,
                                 'Nombre_canal'   => $canal,
                                 'Email'        => $usuario,
                                 'pass'           => base64_encode($password),
                                 'Pais'           => $pais);
            $datoInsert = $this->M_datos->insertarDatos($arrayInsert, 'Users');
            $session    = array('nombre' => $nombre,
                                'canal'          => $canal,
                                'usuario'        => $usuario,
                                'pais'           => $pais,
                                'id_capitan'     => $datoInsert['Id']);
            $this->session->set_userdata($session);
			$data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}
}
