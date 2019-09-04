<?php 


class Model_siswa extends CI_Model
{
	public $table = "tbl_siswa";

	function add($foto)
	{
		$data = array (
			'nim'			=> $this->input->post('nim',TRUE),
			'nama'			=> $this->input->post('nama',TRUE),
			'gender'		=> $this->input->post('gender',TRUE),
			'kd_agama'		=> $this->input->post('agama',TRUE),
			'tempat_lahir'	=> $this->input->post('tempat_lahir',TRUE),
			'tanggal_lahir'	=> $this->input->post('tanggal_lahir',TRUE),
			'id_kelompok'	=> $this->input->post('kelompok',TRUE),
			'foto'			=> $foto
			);
		$this->db->insert($this->table,$data);


		$tahun_akademik = $this->db->get_where('tbl_tahun_akademik', array('is_aktif'=>'y'))->row_array();

		$history = array(
			'nim' 				=> $this->input->post('nim',TRUE),
			'id_tahun_akademik' => $tahun_akademik['id_tahun_akademik'],
			'id_kelompok'		=> $this->input->post('kelompok',TRUE)
			);
		$this->db->insert('tbl_history_kelas',$history);
	}

	function edit($foto)
	{
		if (empty($foto)) {
		$data = array (
			'nama'			=> $this->input->post('nama',TRUE),
			'gender'		=> $this->input->post('gender',TRUE),
			'kd_agama'		=> $this->input->post('agama',TRUE),
			'tempat_lahir'	=> $this->input->post('tempat_lahir',TRUE),
			'id_kelompok'	=> $this->input->post('kelompok',TRUE),
			'tanggal_lahir'	=> $this->input->post('tanggal_lahir',TRUE)
			);
		} else {

		$data = array (
			'nama'			=> $this->input->post('nama',TRUE),
			'gender'		=> $this->input->post('gender',TRUE),
			'kd_agama'		=> $this->input->post('agama',TRUE),
			'tempat_lahir'	=> $this->input->post('tempat_lahir',TRUE),
			'id_kelompok'	=> $this->input->post('kelompok',TRUE),
			'tanggal_lahir'	=> $this->input->post('tanggal_lahir',TRUE),
			'foto'			=> $foto
			);
		}
		$nim = $this->input->post('nim');
		$this->db->where('nim',$nim);
		$this->db->update($this->table,$data);	
			
	}
}