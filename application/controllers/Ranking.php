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
        $cont = 1;
        if($this->session->userdata('usuario') == null){
            header("location: Login");
        } else {
            $data['nombre'] = $this->session->userdata('nombre');
            $data['canal']  = $this->session->userdata('canal');
            $ranking = $this->M_solicitud->rankingTotal();
            $data['ranking'] = '-'; 
            if(count($ranking) == 0){
                $data['ranking'] = '-';
            }else {
                foreach ($ranking as $key) {
                    if($key->Id == $this->session->userdata('Id_user')){
                        $data['ranking'] = $cont;
                    }/*else {
                       $data['ranking'] = '-'; 
                    }*/
                    $cont++;
                }
            }
            $i          = 3;
            $mes        = '';
            $htmlPremio = '';
            $mesServidor= date("n");
            $puntos     = '';
            switch ($mesServidor-1) {
                case 1:
                    $mesServidor = 'Enero';
                    break;
                case 2:
                    $mesServidor = 'Febrero';
                    break;
                case 3:
                    $mesServidor = 'Marzo';
                    break;
                case 4:
                    $mesServidor = 'Abril';
                    break;
                case 5:
                    $mesServidor = 'Mayo';
                    break;
                case 6:
                    $mesServidor = 'Junio';
                    break;
                case 7:
                    $mesServidor = 'Julio';
                    break;
                case 8:
                    $mesServidor = 'Agosto';
                    break;
                case 9:
                    $mesServidor = 'Setiembre';
                    break;
                case 10:
                    $mesServidor = 'Octubre';
                    break;
                case 11:
                    $mesServidor = 'Noviembre';
                    break;
                case 12:
                    $mesServidor = 'Diciembre';
                    break;
                default: 
                    $mesServidor = 'Diciembre';
                    break;
            }
            for($i; $i < 8; $i ++) {
                switch ($i) {
                    case 3:
                        $mes = 'Marzo';
                        break;
                    case 4:
                        $mes = 'Abril';
                        break;
                    case 5:
                        $mes = 'Mayo';
                        break;
                    case 6:
                        $mes = 'Junio';
                        break;
                    case 7:
                        $mes = 'Julio';
                        break;
                }
                $datosGeneral = $this->M_solicitud->getTotalMes($this->session->userdata('Id_user'), '0'.$i);
                $puntos       = ($datosGeneral[0]->total != '') ? $datosGeneral[0]->total : '0'; 
                $htmlPremio .= '<tr>
                                    <td class="text-left bold">'.$mes.'</td>
                                    <td class="text-right bold">$'.$puntos.'</td>
                                </tr>';
            }
            $data['premios']     = $htmlPremio;
            $data['mesServidor'] = $mesServidor;

            $htmlRanking = '';
            $primeros = $this->M_solicitud->get5Primeros();
            $j = 1;
            if(count($primeros) == 0) {
                for ($j; $j < 6; $j++){
                    $htmlRanking .= '<tr>
                                         <td><img src="'.RUTA_IMG.'ranking/ranking'.$j.'.png""></td>
                                         <td class="text-left"> - </td>
                                         <td class="text-right"> - </td>
                                     </tr>';    
                }
            } else {
                for($j; $j < 6; $j++) {
                    $primeros[$j-1]->Nombre = ($primeros[$j-1]->Nombre != '' ) ? $primeros[$j-1]->Nombre : '-';
                    $primeros[$j-1]->Canal = ($primeros[$j-1]->Canal != '' ) ? $primeros[$j-1]->Canal : '-';
                    $htmlRanking .= '<tr>
                                         <td><img src="'.RUTA_IMG.'ranking/ranking'.$j.'.png""></td>
                                         <td class="text-left">'.$primeros[$j-1]->Nombre.'</td>
                                         <td class="text-right">'.$primeros[$j-1]->Canal.'</td>
                                     </tr>';
                }
            }
            $data['rankingTOP'] = $htmlRanking;

            //primeros del mes de marzo
            $primeros_m = $this->M_solicitud->get5PrimerosMes('03');
            if(count($primeros_m) == 0){
                $data['uno_nombre_m'] = '-';
                $data['dos_nombre_m'] = '-';
                $data['tres_nombre_m'] = '-';
                $data['cuatro_nombre_m'] = '-';
                $data['cinco_nombre_m'] = '-';
            }else {
                if(count($primeros_m) == 1){
                    $data['uno_nombre_m']    = $primeros_m[0]->Nombre == '' ? '-' : $primeros_m[0]->Nombre;
                    $data['dos_nombre_m'] = '-';
                    $data['tres_nombre_m'] = '-';
                    $data['cuatro_nombre_m'] = '-';
                    $data['cinco_nombre_m'] = '-';
                }
                if(count($primeros_m) == 2){
                    $data['uno_nombre_m']    = $primeros_m[0]->Nombre == '' ? '-' : $primeros_m[0]->Nombre;
                    $data['dos_nombre_m']    = $primeros_m[1]->Nombre == '' ? '-' : $primeros_m[1]->Nombre;
                    $data['tres_nombre_m'] = '-';
                    $data['cuatro_nombre_m'] = '-';
                    $data['cinco_nombre_m'] = '-';
                }
                if(count($primeros_m) == 3){
                    $data['uno_nombre_m']    = $primeros_m[0]->Nombre == '' ? '-' : $primeros_m[0]->Nombre;
                    $data['dos_nombre_m']    = $primeros_m[1]->Nombre == '' ? '-' : $primeros_m[1]->Nombre;
                    $data['tres_nombre_m']   = $primeros_m[2]->Nombre == '' ? '-' : $primeros_m[2]->Nombre;
                    $data['cuatro_nombre_m'] = '-';
                    $data['cinco_nombre_m'] = '-';
                }
                if(count($primeros_m) == 4){
                    $data['uno_nombre_m']    = $primeros_m[0]->Nombre == '' ? '-' : $primeros_m[0]->Nombre;
                    $data['dos_nombre_m']    = $primeros_m[1]->Nombre == '' ? '-' : $primeros_m[1]->Nombre;
                    $data['tres_nombre_m']   = $primeros_m[2]->Nombre == '' ? '-' : $primeros_m[2]->Nombre;
                    $data['cuatro_nombre_m'] = $primeros_m[3]->Nombre == '' ? '-' : $primeros_m[3]->Nombre;
                    $data['cinco_nombre_m'] = '-';
                }
                if(count($primeros_m) == 5){
                    $data['uno_nombre_m']    = $primeros_m[0]->Nombre == '' ? '-' : $primeros_m[0]->Nombre;
                    $data['dos_nombre_m']    = $primeros_m[1]->Nombre == '' ? '-' : $primeros_m[1]->Nombre;
                    $data['tres_nombre_m']   = $primeros_m[2]->Nombre == '' ? '-' : $primeros_m[2]->Nombre;
                    $data['cuatro_nombre_m'] = $primeros_m[3]->Nombre == '' ? '-' : $primeros_m[3]->Nombre;
                    $data['cinco_nombre_m']  = $primeros_m[4]->Nombre == '' ? '-' : $primeros_m[4]->Nombre;
                }
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
                if(count($primeros_a) == 1){
                    $data['uno_nombre_a']    = $primeros_a[0]->Nombre;
                    $data['dos_nombre_a'] = '-';
                    $data['tres_nombre_a'] = '-';
                    $data['cuatro_nombre_a'] = '-';
                    $data['cinco_nombre_a'] = '-';
                }
                if(count($primeros_a) == 2){
                    $data['uno_nombre_a']    = $primeros_a[0]->Nombre;
                    $data['dos_nombre_a']    = $primeros_a[1]->Nombre;
                    $data['tres_nombre_a']   = '-';
                    $data['cuatro_nombre_a'] = '-';
                    $data['cinco_nombre_a']  = '-';
                }
                if(count($primeros_a) == 3){
                    $data['uno_nombre_a']    = $primeros_a[0]->Nombre;
                    $data['dos_nombre_a']    = $primeros_a[1]->Nombre;
                    $data['tres_nombre_a']   = $primeros_a[2]->Nombre;
                    $data['cuatro_nombre_a'] = '-';
                    $data['cinco_nombre_a']  = '-';
                }
                if(count($primeros_a) == 4){
                    $data['cuatro_nombre_a'] = $primeros_a[0]->Nombre;
                    $data['cinco_nombre_a']  = $primeros_a[1]->Nombre;
                    $data['uno_nombre_a']    = $primeros_a[2]->Nombre;
                    $data['dos_nombre_a']    = $primeros_a[3]->Nombre;
                    $data['tres_nombre_a']   = '-';
                }
                if(count($primeros_a) == 5){
                    $data['cinco_nombre_a']  = $primeros_a[0]->Nombre;
                    $data['uno_nombre_a']    = $primeros_a[1]->Nombre;
                    $data['dos_nombre_a']    = $primeros_a[2]->Nombre;
                    $data['tres_nombre_a']   = $primeros_a[3]->Nombre;
                    $data['cuatro_nombre_a'] = $primeros_a[4]->Nombre;
                }
            }

            //primeros del mes de mayo
            $primeros_ma = $this->M_solicitud->get5PrimerosMes('05');
            if(count($primeros_ma) == 0){
                $data['uno_nombre_ma']    = '-';
                $data['dos_nombre_ma']    = '-';
                $data['tres_nombre_ma']   = '-';
                $data['cuatro_nombre_ma'] = '-';
                $data['cinco_nombre_ma']  = '-';
            }else {
                if(count($primeros_ma) == 1){
                    $data['uno_nombre_ma']    = $primeros_ma[0]->Nombre;
                    $data['dos_nombre_ma']    = '-';
                    $data['tres_nombre_ma']   = '-';
                    $data['cuatro_nombre_ma'] = '-';
                    $data['cinco_nombre_ma']  = '-';
                }
                if(count($primeros_ma) == 2){
                    $data['uno_nombre_ma']    = $primeros_ma[0]->Nombre;
                    $data['dos_nombre_ma']    = $primeros_ma[1]->Nombre;
                    $data['tres_nombre_ma']   = '-';
                    $data['cuatro_nombre_ma'] = '-';
                    $data['cinco_nombre_ma']  = '-';
                }
                if(count($primeros_ma) == 3){
                    $data['uno_nombre_ma']    = $primeros_ma[0]->Nombre;
                    $data['dos_nombre_ma']    = $primeros_ma[1]->Nombre;
                    $data['tres_nombre_ma']   = $primeros_ma[2]->Nombre;
                    $data['cuatro_nombre_ma'] = '-';
                    $data['cinco_nombre_ma'] = '-';
                }
                if(count($primeros_ma) == 4){
                    $data['uno_nombre_ma']    = $primeros_ma[0]->Nombre;
                    $data['dos_nombre_ma']    = $primeros_ma[1]->Nombre;
                    $data['tres_nombre_ma']   = $primeros_ma[2]->Nombre;
                    $data['cuatro_nombre_ma'] = $primeros_ma[3]->Nombre;
                    $data['cinco_nombre_ma']  = '-';
                }
                if(count($primeros_ma) == 5){
                    $data['uno_nombre_ma']    = $primeros_ma[0]->Nombre;
                    $data['dos_nombre_ma']    = $primeros_ma[1]->Nombre;
                    $data['tres_nombre_ma']   = $primeros_ma[2]->Nombre;
                    $data['cuatro_nombre_ma'] = $primeros_ma[3]->Nombre;
                    $data['cinco_nombre_ma']  = $primeros_ma[4]->Nombre;
                }
            }
            //primeros del mes de junio
            $primeros_j = $this->M_solicitud->get5PrimerosMes('06');
            if(count($primeros_j) == 0){
                $data['uno_nombre_j'] = '-';
                $data['dos_nombre_j'] = '-';
                $data['tres_nombre_j'] = '-';
                $data['cuatro_nombre_j'] = '-';
                $data['cinco_nombre_j'] = '-';
            }else {
                if(count($primeros_j) == 1){
                    $data['uno_nombre_j']    = $primeros_j[0]->Nombre;
                    $data['dos_nombre_j']    = '-';
                    $data['tres_nombre_j']   = '-';
                    $data['cuatro_nombre_j'] = '-';
                    $data['cinco_nombre_j']  = '-';
                }
                if(count($primeros_j) == 2){
                    $data['uno_nombre_j']    = $primeros_j[0]->Nombre;
                    $data['dos_nombre_j']    = $primeros_j[1]->Nombre;
                    $data['tres_nombre_j']   = '-';
                    $data['cuatro_nombre_j'] = '-';
                    $data['cinco_nombre_j']  = '-';
                }
                if(count($primeros_j) == 3){
                    $data['uno_nombre_j']    = $primeros_j[0]->Nombre;
                    $data['dos_nombre_j']    = $primeros_j[1]->Nombre;
                    $data['tres_nombre_j']   = $primeros_j[2]->Nombre;
                    $data['cuatro_nombre_j'] = '-';
                    $data['cinco_nombre_j']  = '-';
                }
                if(count($primeros_j) == 4){
                    $data['uno_nombre_j']    = $primeros_j[0]->Nombre;
                    $data['dos_nombre_j']    = $primeros_j[1]->Nombre;
                    $data['tres_nombre_j']   = $primeros_j[2]->Nombre;
                    $data['cuatro_nombre_j'] = $primeros_j[3]->Nombre;
                    $data['cinco_nombre_j']  = '-';
                }
                if(count($primeros_j) == 5){
                    $data['uno_nombre_j']    = $primeros_j[0]->Nombre;
                    $data['dos_nombre_j']    = $primeros_j[1]->Nombre;
                    $data['tres_nombre_j']   = $primeros_j[2]->Nombre;
                    $data['cuatro_nombre_j'] = $primeros_j[3]->Nombre;
                    $data['cinco_nombre_j']  = $primeros_j[4]->Nombre;
                }
            }
            //primeros del mes de julio
            $primeros_ju = $this->M_solicitud->get5PrimerosMes('07');
            if(count($primeros_ju) == 0){
                $data['uno_nombre_ju'] = '-';
                $data['dos_nombre_ju'] = '-';
                $data['tres_nombre_ju'] = '-';
                $data['cuatro_nombre_ju'] = '-';
                $data['cinco_nombre_ju'] = '-';
            }else {
                if(count($primeros_ju) == 1){
                    $data['uno_nombre_ju']    = $primeros_ju[0]->Nombre;
                    $data['dos_nombre_ju']    = '-';
                    $data['tres_nombre_ju']   = '-';
                    $data['cuatro_nombre_ju'] = '-';
                    $data['cinco_nombre_ju']  = '-';
                }
                if(count($primeros_ju) == 2){
                    $data['uno_nombre_ju']    = $primeros_ju[0]->Nombre;
                    $data['dos_nombre_ju']    = $primeros_ju[1]->Nombre;
                    $data['tres_nombre_ju']   = '-';
                    $data['cuatro_nombre_ju'] = '-';
                    $data['cinco_nombre_ju']  = '-';
                }
                if(count($primeros_ju) == 3){
                    $data['uno_nombre_ju']    = $primeros_ju[0]->Nombre;
                    $data['dos_nombre_ju']    = $primeros_ju[1]->Nombre;
                    $data['tres_nombre_ju']   = $primeros_ju[2]->Nombre;
                    $data['cuatro_nombre_ju'] = '-';
                    $data['cinco_nombre_ju']  = '-';
                }
                if(count($primeros_ju) == 4){
                    $data['uno_nombre_ju']    = $primeros_ju[0]->Nombre;
                    $data['dos_nombre_ju']    = $primeros_ju[1]->Nombre;
                    $data['tres_nombre_ju']   = $primeros_ju[2]->Nombre;
                    $data['cuatro_nombre_ju'] = $primeros_ju[3]->Nombre;
                    $data['cinco_nombre_ju']  = '-';
                }
                if(count($primeros_ju) == 5){
                    $data['uno_nombre_ju']    = $primeros_ju[0]->Nombre;
                    $data['dos_nombre_ju']    = $primeros_ju[1]->Nombre;
                    $data['tres_nombre_ju']   = $primeros_ju[2]->Nombre;
                    $data['cuatro_nombre_ju'] = $primeros_ju[3]->Nombre;
                    $data['cinco_nombre_ju']  = $primeros_ju[4]->Nombre;
                }
            }

            if(count($primeros) != 0){
                if(count($primeros) == 5) {
                    $data['directory'] = 'http://incentivoshptank.marketinghp.net/RankingTop5?nam1='.$primeros[0]->Nombre.'&can1='.$primeros[0]->Canal.'&nam2='.$primeros[1]->Nombre.'&can2='.$primeros[1]->Canal.'&nam3='.$primeros[2]->Nombre.'&can3='.$primeros[2]->Canal.'&nam4='.$primeros[3]->Nombre.'&can4='.$primeros[3]->Canal.'&nam5='.$primeros[4]->Nombre.'&can5='.$primeros[4]->Canal;
                }else {
                    $data['directory'] = '';
                }
            }
            // $data['directory'] = '';
    		$this->load->view('v_ranking', $data);
        }
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