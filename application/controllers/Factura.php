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
            if(count($_FILES) == 0){
                $data['msj'] = 'Seleccione su factura';
                return $data;
            }else {
                $tipo = $_FILES['archivo']['type']; 
                $tamanio = $_FILES['archivo']['size']; 
                $archivotmp = $_FILES['archivo']['tmp_name'];
                $namearch = $_FILES['archivo']['name'];
                $nuevo = explode(".",$namearch);
                if($nuevo[1] == 'pdf' || $nuevo[1] == 'jpeg' || $nuevo[1] == 'jpg' || $nuevo[1] == 'png'){
                    $target = getcwd().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'archivos'.DIRECTORY_SEPARATOR.'1'.basename($_FILES['archivo']['name']);
                    if(move_uploaded_file($archivotmp, $target) ){
                       $data['msj'] = 'Su factura se subió correctamente';
                       $data['error'] = EXIT_SUCCESS;
                    } else {
                       $data['msj'] = 'Hubo un problema en la subida de su factura';
                       $data['error'] = EXIT_ERROR;
                       return $data;
                    }
                }else {
                    $data['msj'] = 'El formato de la factura es incorrecto';
                    $data['error'] = EXIT_ERROR;
                    return $data;
                }
            }
            $arrInsert = array('fecha'       => $fecha,
                               'nro_factura' => $nro_fact,
                               'modelo'      => $modelo,
                               'cantidad'    => $cantidad,
                               'spiff'       => $spiff,
                               'monto'       => $monto);
            $dataInsert = $this->M_solicitud->insertarDatos($arrInsert, 'anotacion');
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
            if($nuevo[1] == 'pdf' || $nuevo[1] == 'jpeg' || $nuevo[1] == 'jpg' || $nuevo[1] == 'png'){
                $target = getcwd().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'archivos'.DIRECTORY_SEPARATOR.'1'.basename($_FILES['archivo']['name']);
                if(move_uploaded_file($archivotmp, $target) ){
                   $respuesta->mensaje = 'Su factura se subió correctamente';
                } else {
                   $respuesta->mensaje = 'Hubo un problema en la subida de su factura';
                }
            }else {
                $respuesta->mensaje = 'El formato de la factura es incorrecto';
            }
            echo json_encode($respuesta);
        }
       /*$tipo = $_FILES['archivo']['type']; 
        $tamanio = $_FILES['archivo']['size']; 
        $archivotmp = $_FILES['archivo']['tmp_name'];*/

        /*$respuesta = new stdClass();
        $respuesta->mensaje = "";
        if( $tipo == 'application/vnd.ms-excel'){
            throw new Exception("Error Processing Request", 1);
        }
        $target = getcwd().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'archivos'.DIRECTORY_SEPARATOR.'1'.basename($_FILES['archivo']['name']);
 
        if(move_uploaded_file($archivotmp, $target) ){
           $respuesta->estado = true;
        } else {
           $respuesta->estado = false;
           $respuesta->mensaje = "El archivo no se pudo subir al servidor, inténtalo mas tarde";
        }*/
    }
}
