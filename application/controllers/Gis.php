<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Gis extends CI_controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_gis');
		$this->load->library(array('session','pagination'));
		$this->load->helper(array('url','date'));
		$this->load->database();

	}

	function index(){
		$param=array(
				'about'=>$this->M_gis->get_about(),
			);
		$this->load->view('public/index',$param);
	}

	function gizi(){
		$param=array(
				'gizi'=>$this->M_gis->get_about(),
			);
		$this->load->view('public/gizi',$param);
	}


	function map($tahun='1'){
		$param=array(
				'year'      => $this->M_gis->sel_tahun(),
				'puskesmas' => $this->M_gis->get_stunted_puskesmas($tahun),
				'param'     => $this->get_result_stunted($tahun),
				'tahun'		=> $tahun,
				'total'		=>$this->total($tahun),
			);
		
		if($tahun=='1'){
			$this->load->view('public/map2',$param);
		}else{
			
		$this->load->view('public/map',$param);
	}
}


	function grafik($tahun='1'){
		$year = $this->input->post('tahun');
		if($year !=''){
			$tahun = $year;
		}
		//echo $year;
		$param=array(
				'param'=>$this->get_result_stunted($tahun),
				'tahun'=>$tahun,
				'year' => $this->M_gis->sel_tahun(),
			);
		
	$this->load->view('public/grafik',$param);
	}

    function report($tahun='2016'){
    	$param=array(
				'param'     => $this->get_result_stunted($tahun),
				'tahun'		=> $tahun,
				'total'		=>$this->total($tahun),
			);
		$this->load->view('public/report',$param);

    }

	function login(){
		redirect('Admin');
	}

	function get_result_stunted($tahun){
		$data=$this->M_gis->get_stunted($tahun);
		$datum=array();
		if(count($data) == 17){
		foreach ($data as $key) {
			$var=array(
                    $key->nama_kecamatan.'_s_l'=>$key->total_s_l,  // total stunted laki2
                    $key->nama_kecamatan.'_s_p'=>$key->total_s_p,  // total stunted wanita
                    $key->nama_kecamatan.'_b_l'=>$key->balita_u_l,  // total balita ukur laki2
                    $key->nama_kecamatan.'_b_p'=>$key->balita_u_p,  // total balita ukur laki2
                    $key->nama_kecamatan.'_total_s'=>$key->total_s_l + $key->total_s_p,  // total stunted laki2
                    $key->nama_kecamatan.'_total_b'=>$key->balita_u_l + $key->balita_u_p ,  // total stunted wanita

				);

			array_push($datum, $var);
		}
		$result=array_merge($datum[0],$datum[1],$datum[2],$datum[3],$datum[4],$datum[5],$datum[6],$datum[7],$datum[8],$datum[9],$datum[10],$datum[11],$datum[12],$datum[13],$datum[14],$datum[15],$datum[16]);
	}else{
       $result=0;

	}

//		echo '<pre>'.print_r($data, true) .'</pre>';
//		echo '<pre>'.print_r($datum, true) .'</pre>';
//		$result=array_merge($datum[0],$datum[1],$datum[3],$datum[4],$datum[5],$datum[6],$datum[7],$datum[8],$datum[9],$datum[10],$datum[11],$datum[12],$datum[13],$datum[14],$datum[15],$datum[16]);
//		echo count($data);
return $result;

	}
	function cc($tahun='2017'){
		//$data = $this->get_result_stunted($tahun);
		//$data = $this->M_gis->get_total($tahun);
		$data = $this->M_gis->get_kec();
		//echo '<pre>'.print_r($data, true) .'</pre>';
		foreach($data as $key){
			//echo 'var '. strtolower($key->nama_kecamatan) .' =; </br>';
			echo $key->nama_kecamatan .' '. $key->lat .', '.$key->lng.'</br>';
		}
	}

function total($tahun){
	$data = $this->M_gis->get_total($tahun);
	$param=array(
		'total_balita' => $data['balita_l'] + $data['balita_p'],
		'total_stunted' => $data['stunted_p'] + $data['stunted_l'],
		'stunted_p'    =>$data['stunted_p'],
		'stunted_l'	   => $data['stunted_l']
		);

//	echo '<pre>'.print_r($param, true) .'</pre>'; 
return $param;
}

}