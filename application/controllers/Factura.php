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
            return;
        }else {
            foreach ($tabla as $key){
                $html .= '<tr>
                            <td class="text-center">'.$key->Nombre.'</td>
                            <td class="text-center">'.$key->fecha.'</td>
                            <td class="text-center">'.$key->nro_factura.'</td>
                            <td class="text-center">'.$key->modelo.'</td>
                            <td class="text-center">'.$key->cantidad.'</td>
                            <td class="text-center">'.$key->monto.'</td>
                        </tr>';
            }
            $data['tabla'] = $html;
        }
        $data['total'] = $datos[0]->total == '' ? '0' : $datos[0]->total;
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
                   $arrUpdt = array('documento' => $namearch);
                   $this->M_solicitud->updateDatos($arrUpdt, $this->session->userdata('id_anotacion'), 'anotacion');
                   $respuesta->mensaje = 'Su factura se subió correctamente';
                } else {
                   $respuesta->mensaje = 'Hubo un problema en la subida de su factura';
                }
            }else {
                $respuesta->mensaje = 'El formato de la factura es incorrecto';
            }
            echo json_encode($respuesta);
        }
    }
}
