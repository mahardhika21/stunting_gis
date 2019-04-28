<?php  class Admin extends CI_Controller{


	function __construct(){
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->library(array('session','pagination'));
		$this->load->helper(array('url','date'));
		$this->load->database();

	}

	function index(){
		if($this->status_login() == true){
			redirect('admin/home');
		}else{
			$param= $this->session->userdata('msg');
			if(empty($param)){
				$param=array(
						'msg'    => '',
						'status' => ''
					);
			}
			$this->load->view('admin/login',$param);
		}
	}

	function login(){
		$data['username'] = $this->input->post('username');
		$data['password'] = md5($this->input->post('password'));
		if($this->M_admin->login($data) == true){
				$data_login = $this->M_admin->get_user_detail($data['username']);
				$row = $data_login->row_array();
				$datum=array(
				  'username' =>    $row['username'],
				  'password' =>    $this->input->post('password'),
				  'level_user'=>   $row['level'],
				  'status'		=>'login'
				);
				if($row['status'] == 'aktif'){
				$this->session->set_userdata('login_data',$datum);
				redirect('admin');
			   }else{
					$param=array(
						'msg'    => 'Akun anda di nonaktifka oleh user root',
						'status' => 'galat'
					);
					$this->session->set_flashdata('msg',$param);
					redirect('admin');
				}
		}else{
			$param=array(
				'msg'    => 'password atau username anda masukkan salah',
				'status' => 'galat'
			);
			$this->session->set_flashdata('msg',$param);
			redirect('admin');
		}
	}

	function home(){
		if($this->status_login() == true){
			$param = $this->session->userdata('login_data');
			
			$this->load->view('admin/home',$param);
		}else{
			$param= $this->session->userdata('msg');
			$this->load->view('admin/login',$param);
		}
	}

	function user_setting(){
		if($this->status_login() == true){
			$nama = $this->session->userdata('login_data');
			$param['param'] = $this->session->userdata('login_data');
			$param['msg']   = $this->session->userdata('msg');
			$param['nama'] = $this->M_admin->get_name($nama['username']);
			$this->load->view('admin/profil',$param);
		}else{
			$param= $this->session->userdata('msg');
			$this->load->view('admin/login',$param);
		}	
	}


	function user_acount(){
		if($this->status_login() == true and $this->status_user() == 'root'){
		 $param = $this->session->userdata('login_data');
			if($param['level_user']=='root'){
				$param['param'] = $this->session->userdata('login_data');
				$param['data']  = $this->M_admin->user_all();
				$param['msg']   = $this->session->userdata('msg');
				$this->load->view('admin/acount',$param);
			}else{
				redirect('admin');
			}
		}else{
			$param= $this->session->userdata('msg');
			$this->load->view('admin/login',$param);
		}	
	}
	

	function add_user(){
		$data['level']    = $this->input->post('level');
		$data['name']     = $this->input->post('nama');
		$data['username'] = $this->input->post('username');
		$data['password'] =md5($data['username']);
		$data['status']	  = 'aktif';
        if($this->cek_uname($data['username']) == true){
			$this->session->set_flashdata('msg','Insert data gagal : Username yang dimasukan telah terdafata');
			redirect('Admin/user_acount');
		}else{
			$this->M_admin->add_user($data);
			redirect('admin/user_acount');
		}

	}

	function up_stat($username,$stat){
		$this->M_admin->update_stat('$username,$stat');
		redirect('Admin/user_acount');
	}

	function del_user($username){
		if($this->status_login() == true and $this->status_user() == 'root'){
		 $this->M_admin->del_user($username);
			}else{
				redirect('admin');
			}
		
	}


	function update_profil($uname){
		$data['username'] = $this->input->post('username');
		$data['uname']	  = $uname;
		$data['password'] = $this->input->post('password');
		$data['name']	  = $this->input->post('name');
		if($this->cek_uname($data['username']) == true){
			$this->session->set_flashdata('msg','Update data gagal : Username yang dimasukan telah terdafata');
			redirect('Admin/user_setting');
		}else{
			$this->M_admin->update_profil($data,$uname);
			redirect('admin/user_setting');
		}
	}

	
	
	function media(){
		if($this->status_login() == true){
			$param['param']=$this->session->userdata('login_data');
			$param['about']=$this->M_admin->get_about();
			$this->load->view('admin/media',$param);
		}else{
			$param= $this->session->userdata('msg');
			$this->load->view('admin/login',$param);
		}	
	}




	function up_about(){
		if($this->status_login() == true){
			$data['about']=$this->input->post('about');
			$this->M_admin->up_about($data);
			redirect('Admin/media');
		}else{
			redirect('Admin');
		}	

	}

	function up_gizi(){
		if($this->status_login() == true){
			$data['gizi']=$this->input->post('gizi');
			$this->M_admin->up_about($data);
			redirect('Admin/media');
		}else{
			redirect('Admin');
		}	

	}



	
	function list_stunting(){
		if($this->status_login() == true){
			$param=array(
				//'msg'   => $msg,
				'param' => $this->session->userdata('login_data'),
				'data'  => $this->M_admin->sel_data(),
			);
			$this->load->view('admin/list_stunting',$param);
		}else{
			$param= $this->session->userdata('msg');
			$this->load->view('admin/login',$param);
		}	
	}



	function stunting(){
		if($this->status_login() == true){
			$param=array(
				//'msg'   => $msg,
				'param' => $this->session->userdata('login_data'),
				'kec'	=> $this->M_admin->sel_kec(),
			);
			$this->load->view('admin/add_stunting',$param);
		}else{
			$param= $this->session->userdata('msg');
			$this->load->view('admin/login',$param);
		}	
	}




	function insert_stunting(){
		if($this->status_login() == true){
			$param=array(
				//'msg'   => $msg,
				'param' => $this->session->userdata('login_data'),
				'kec'	=> $this->M_admin->sel_kec(),
				//'data'  => $this->M_admin->get_list_standting(),
			);

			$data['puskesmas']= $this->input->post('puskesmas');
			$data['balita_laki']= $this->input->post('j_bl');
			$data['balita_perempuan']= $this->input->post('j_bp');
			$data['total_balita'] = $data['balita_laki'] + $data['balita_perempuan'];
			$data['balita_ukur_l']= $this->input->post('j_blu');
			$data['balita_ukur_p']= $this->input->post('j_bpu');
			$data['stuted_l']= $this->input->post('j_bsl');
			$data['stunted_p']= $this->input->post('j_bsp');
			$data['tahun']= $this->input->post('tahun');
			$data['id_kecamatan']= $this->input->post('kec');
			$this->M_admin->add_data($data);
			$this->load->view('admin/list_stunting',$param);
		}else{
			$param= $this->session->userdata('msg');
			$this->load->view('admin/login',$param);
		}	

	}

   function select_stunting($id){
   	if($this->status_login() == true){
			$param=array(
				//'msg'   => $msg,
				'param' => $this->session->userdata('login_data'),
				'kec'	=> $this->M_admin->sel_kec(),
				'data'  => $this->M_admin->sel_up($id),
			);
		//	echo '<pre>'.print_r($param['data'],true) .'</pre>';
			$this->load->view('admin/up_stunting',$param);
		}else{
			$param= $this->session->userdata('msg');
			$this->load->view('admin/login',$param);
		}	

   }

   function update_stunting($id){
   	if($this->status_login() == true){
			$data['puskesmas']= $this->input->post('puskesmas');
			$data['balita_laki']= $this->input->post('j_bl');
			$data['balita_perempuan']= $this->input->post('j_bp');
			$data['total_balita'] = $data['balita_laki'] + $data['balita_perempuan'];
			$data['balita_ukur_l']= $this->input->post('j_blu');
			$data['balita_ukur_p']= $this->input->post('j_bpu');
			$data['stuted_l']= $this->input->post('j_bsl');
			$data['stunted_p']= $this->input->post('j_bsp');
			$data['tahun']= $this->input->post('tahun');
			$data['id_kecamatan']= $this->input->post('kec');
			$id= $this->input->post('id');
			$this->M_admin->up_data($data,$id);
			$this->load->view('admin/list_stunting',$param);
			
		}else{
			$param= $this->session->userdata('msg');
			$this->load->view('admin/login',$param);
		}	

   }

   function del_data($id){
   	if($this->status_login() == true){
   		$this->M_admin->del_stun($id);
   		redirect('Admin/list_stunting');
   	}else{
   		$param= $this->session->userdata('msg');
			$this->load->view('admin/login',$param);
   	}

   }

   
   function logout(){
		$this->session->unset_userdata('login_data');
		$param=array(
			'msg'	 => 'Anda telah keluar dari sistim',
			'status' => 'ok',
			);
		if(empty($param)){ $param=array(
			'msg'	 => 'Anda belum melakukan login',
			'status' => 'ok',
			);}
		$this->session->set_flashdata('msg',$param);
			redirect('admin');
   }

  function status_login(){
		$status = $this->session->userdata('login_data');
		if($status['status'] == 'login'){
			return true;
		}else{
			return false;
		}
	}

function status_user(){
	$status = $this->session->userdata('login_data');
		return $status['level_user'];
}
	
	function cek_uname($uname){
		$cek = $this->M_admin->cek_uname($uname);
		return $cek;
	}
	
function test(){
/*
$datum=array(
				  'username' =>    'yayay',
				  'password' =>    "asdasdas",
				  'level_user'=>   "root",
				  'status'		=>'login'
				);

				$this->session->set_userdata('login_data',$datum);
				$data = $this->session->userdata('login_data');
				echo '<pre>', print_r($data, true) .'</pre>';
				echo $data['status'];*/
			//	$data = $this->session->userdata('login_data');
				$data = $this->M_admin->sel_data();
				echo '<pre>', print_r($data, true) .'</pre>';
}
}