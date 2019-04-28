<?php class M_gis extends CI_Model{


function get_about(){
	$this->db->where('id_media','1');
	$query=$this->db->get('media')->row_array();
	return $query;
}


/*

SELECT stunted. * , SUM( stuted_l ) AS tt
FROM  `stunted` 
WHERE tahun =  '2016'
GROUP BY id_kecamatan

SELECT stunted.*,kecamatan.nama_kecamatan, SUM(stuted_l) AS total_s_l, sum(stunted_p) as total_s_p, sum(balita_ukur_l) as balita_u_l, sum(balita_ukur_p) as balita_u_p FROM  stunted,kecamatan  WHERE kecamatan.id_kecamatan=stunted.id_kecamatan and stunted.tahun =  '2016' GROUP BY id_kecamatan
*/



function get_stunted($tahun){
		$this->db->select("stunted.*,kecamatan.nama_kecamatan, SUM(stuted_l) AS total_s_l, sum(stunted_p) as total_s_p, sum(balita_ukur_l) as balita_u_l, sum(balita_ukur_p) as balita_u_p");
		$this->db->from('stunted');
		$this->db->join('kecamatan','kecamatan.id_kecamatan=stunted.id_kecamatan');
		$this->db->group_by('stunted.id_kecamatan');
		$this->db->where('stunted.tahun', $tahun);
		return $this->db->get()->result();
}

function sel_tahun(){
		$this->db->select('stunted.tahun');
		$this->db->from('stunted');
		$this->db->group_by('stunted.tahun');
		$query =$this->db->get();
		return $query->result();
	}

function get_stunted_puskesmas($tahun){
	$this->db->select('stunted.*,kecamatan.nama_kecamatan');
	$this->db->from('stunted');
	$this->db->join('kecamatan','kecamatan.id_kecamatan=stunted.id_kecamatan');
	$this->db->where('stunted.tahun', $tahun);
	return $this->db->get()->result();
}

function get_total($tahun){
	$this->db->select('SUM(stunted.balita_ukur_l) as balita_l, SUM(stunted.balita_ukur_p) as balita_p,SUM(stunted.stunted_p) as stunted_p, SUM(stunted.stuted_l) as stunted_l');
	$this->db->from('stunted');
	$this->db->where('stunted.tahun',$tahun);
	$query=$this->db->get()->row_array();
	return $query;
}

function get_kec(){
	$this->db->select('kecamatan.nama_kecamatan,kecamatan.lat,kecamatan.lng');
	$this->db->order_by('kecamatan.nama_kecamatan','asc');
	$this->db->from('kecamatan');
	$query = $this->db->get()->result();
	return $query;
}


}