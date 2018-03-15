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
            $nro_fact = $this->input->post('nro_factura');
            $modelo   = $this->input->post('modelo');
            $cantidad = $this->input->post('cantidad');
            $spiff    = $this->input->post('spiff');
            $monto    = $this->input->post('monto');
            $arrInsert = $arrayName = array('fecha'       => $fecha,
                                            'nro_factura' => $nro_factura,
                                            'modelo'      => $modelo,
                                            'cantidad'    => $cantidad,
                                            'spiff'       => $spiff,
                                            'monto'       => $monto);
            $dataInsert = $this->M_solicitud->insrtDatos($arrInsert, 'anotacion');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
