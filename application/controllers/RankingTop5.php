<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RankingTop5 extends CI_Controller {

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
            $n1 = $_GET['nam1'];
            $c1 = $_GET['can1'];
            $n2 = $_GET['nam2'];
            $c2 = $_GET['can2'];
            $n3 = $_GET['nam3'];
            $c3 = $_GET['can3'];
            $n4 = $_GET['nam4'];
            $c4 = $_GET['can4'];
            $n5 = $_GET['nam5'];
            $c5 = $_GET['can5'];

            $data['uno_nombre'] = $n1 == '' ? '-' : $n1;
            $data['uno_canal'] = $c1 == '' ? '-' : $c1;
            $data['dos_nombre'] = $n2 == '' ? '-' : $n2;
            $data['dos_canal'] = $c2 == '' ? '-' : $c2;
            $data['tres_nombre'] = $n3 == '' ? '-' : $n3;
            $data['tres_canal'] = $c3 == '' ? '-' : $c3;
            $data['cuatro_nombre'] = $n4 == '' ? '-' : $n4;
            $data['cuatro_canal'] = $c4 == '' ? '-' : $c4;
            $data['cinco_nombre'] = $n5 == '' ? '-' : $n5;
            $data['cinco_canal'] = $c5 == '' ? '-' : $c5;
		$this->load->view('v_ranking_top5', $data);
	}
}