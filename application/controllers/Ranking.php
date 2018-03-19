<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking extends CI_Controller {

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
        $datos = $this->M_solicitud->getTotalMes($this->session->userdata('Id_user'), '03');
        $data['total_marzo'] = $datos[0]->total == '' ? '0' : $datos[0]->total;
        $ranking = $this->M_solicitud->rankingTotal($this->session->userdata('Id_user'));
        foreach ($ranking as $key) {
            if($key->Id == $this->session->userdata('Id_user')){
                $data['ranking'] = $key->rank == '' ? '-' : $key->rank;
            }
        }
        $datos_abril = $this->M_solicitud->getTotalMes($this->session->userdata('Id_user'), '04');
        $data['total_abril'] = $datos_abril[0]->total == '' ? '0' : $datos_abril[0]->total;
        $primeros = $this->M_solicitud->get5Primeros();
        if(count($primeros) == 0){
            $data['uno_nombre'] = '-';
            $data['uno_canal'] = '-';
            $data['dos_nombre'] = '-';
            $data['dos_canal'] = '-';
            $data['tres_nombre'] = '-';
            $data['tres_canal'] = '-';
            $data['cuatro_nombre'] = '-';
            $data['cuatro_canal'] = '-';
            $data['cinco_nombre'] = '-';
            $data['cinco_canal'] = '-';
        }else {
            $data['uno_nombre'] = $primeros[0]->Nombre;
            $data['uno_canal'] = $primeros[0]->Canal;
            $data['dos_nombre'] = $primeros[1]->Nombre;
            $data['dos_canal'] = $primeros[1]->Canal;
            $data['tres_nombre'] = $primeros[2]->Nombre;
            $data['tres_canal'] = $primeros[2]->Canal;
            $data['cuatro_nombre'] = $primeros[3]->Nombre;
            $data['cuatro_canal'] = $primeros[3]->Canal;
            $data['cinco_nombre'] = $primeros[4]->Nombre;
            $data['cinco_canal'] = $primeros[4]->Canal;
        }

        //primeros del mes de marzo
        $primeros_m = $this->M_solicitud->get5PrimerosMes('03');

        if(count($primeros_m) == 0){
            $data['uno_nombre_m'] = '-';
            $data['dos_nombre_m'] = '-';
            $data['tres_nombre_m'] = '-';
            $data['cuatro_nombre_m'] = '-';
            $data['cinco_nombre_m'] = '-';
        }else {
            $data['uno_nombre_m']    = $primeros_m[0]->Nombre;
            $data['dos_nombre_m']    = $primeros_m[1]->Nombre;
            $data['tres_nombre_m']   = $primeros_m[2]->Nombre;
            $data['cuatro_nombre_m'] = $primeros_m[3]->Nombre;
            $data['cinco_nombre_m']  = $primeros_m[4]->Nombre;
        }

        //primeros del mes de abril
        $primeros_a = $this->M_solicitud->get5PrimerosMes('04');

        if(count($primeros_a) == 0){
            $data['uno_nombre_a'] = '-';
            $data['dos_nombre_a'] = '-';
            $data['tres_nombre_a'] = '-';
            $data['cuatro_nombre_a'] = '-';
            $data['cinco_nombre_a'] = '-';
        }else {
            $data['uno_nombre_a']    = $primeros_a[0]->Nombre;
            $data['dos_nombre_a']    = $primeros_a[1]->Nombre;
            $data['tres_nombre_a']   = $primeros_a[2]->Nombre;
            $data['cuatro_nombre_a'] = $primeros_a[3]->Nombre;
            $data['cinco_nombre_a']  = $primeros_a[4]->Nombre;
        }

		$this->load->view('v_ranking', $data);
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
}