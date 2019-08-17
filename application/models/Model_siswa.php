<?php 


class Model_siswa extends CI_Model
{
	public $table = "tbl_siswa";

	function add()
	{
		$data = array (
			'nim'			=> $this->input->post('nim',TRUE),
			'nama'			=> $this->input->post('nama',TRUE),
			'gender'		=> $this->input->post('gender',TRUE),
			'kd_agama'		=> $this->input->post('agama',TRUE),
			'tempat_lahir'	=> $this->input->post('tempat_lahir',TRUE),
			'tanggal_lahir'	=> $this->input->post('tanggal_lahir',TRUE),
			);
		$this->db->insert($this->table,$data);
	}

	function edit()
	{
		$data = array (
			'nama'			=> $this->input->post('nama',TRUE),
			'gender'		=> $this->input->post('gender',TRUE),
			'kd_agama'		=> $this->input->post('agama',TRUE),
			'tempat_lahir'	=> $this->input->post('tempat_lahir',TRUE),
			'tanggal_lahir'	=> $this->input->post('tanggal_lahir',TRUE),
			);
		$nim = $this->input->post('nim');
		$this->db->where('nim',$nim);
		$this->db->update($this->table,$data);
	}
}