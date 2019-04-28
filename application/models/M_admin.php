<?php class M_admin extends CI_Model{
	
	
	function login($data){
		$this->db->where('username',$data['username']);
		$this->db->where('password',$data['password']);
		$query = $this->db->get('user');
		$datum = $query->result();
		if(count($datum)>0){
			return true;
		}else{
			return false;
		}
	}
	
	function get_user_detail($username){
		$this->db->where('username',$username);
		$query=$this->db->get('user');
		return $query;
	}

	function cek_uname($uname){
		$this->db->where('username',$uname);
		$query = $this->db->get('user');
		$datum = $query->result();
		if(count($datum)>0){
			return true;
		}else{
			return false;
		}
	}


	function get_name($uname){
		$this->db->where('username',$uname);
		$query=$this->db->get('user');
		$data = $query->row_array();
		return $data['name'];

	}

	function update_stat($id,$stat){
		if($stat =='aktif'){
			$stat = 'deaktif';
		}else{
			$stat =='aktif';
		}
		$val=array('status'=>$stat);
		$this->db->where('username',$id);
		$query = $this->db->update('user',$val);
		return $query;
	}
	
	function update_profile($data,$uname){
		$val = array('name'=>$data['name'],'unsername'=>$data['unasername'],'password'=>md5($data['password']));
		$this->db->where('username',$uname);
		$query=$this->db->update('user',$val);
		return $query;
	}

	function add_user($data){
		$query= $this->db->insert('user',$data);
		return $query;
	}

	function del_user($id){
		$this->db->where('username',$id);
		$query = $this->db->delete('user');
		return $qery;

	}


	function user_all(){
		$level = array('root');
		$this->db->where_not_in('level',$level);
		$query = $this->db->get('user');
		return $query->result();
	}

	function up_about($data){
		$this->db->where('id_media','1');
		return $this->db->update('media',$data);
	}

	function get_about(){
		$this->db->where('id_media','1');
		$query = $this->db->get('media')->row_array();
		return $query;
	}

	function sel_kec(){
		return $this->db->get('kecamatan')->result();
	}

	function add_data($data){
		return $this->db->insert('stunted',$data);
	}

	function up_data($data,$id){
		$this->db->where('id',$id);
		return $this->db->update('stunted',$data);
	}

	function del_stun($id){
		$this->db->where('id',$id);
		return $this->db->delete('stunted');

	}

	function sel_up($id){
		$this->db->select('stunted.*,kecamatan.nama_kecamatan');
		$this->db->from('stunted');
		$this->db->join('kecamatan','kecamatan.id_kecamatan=stunted.id_kecamatan');
		$this->db->where('id',$id);
		return $this->db->get()->row_array();
	}

	function sel_data(){
		$this->db->select('stunted.*,kecamatan.nama_kecamatan');
		$this->db->from('stunted');
		$this->db->join('kecamatan','kecamatan.id_kecamatan=stunted.id_kecamatan');
		return $this->db->get()->result();
	}

	

}