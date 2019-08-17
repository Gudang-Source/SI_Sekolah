<?php 


class Model_guru extends CI_Model
{
	public $table = "tbl_guru";

	function add()
	{
		$data = array (
			'nuptk'			=> $this->input->post('nuptk',TRUE),
			'nama_guru'			=> $this->input->post('nama',TRUE),
			'gender'		=> $this->input->post('gender',TRUE),
			'kd_agama'		=> $this->input->post('agama',TRUE),
			);
		$this->db->insert($this->table,$data);
	}

	function edit()
	{
		$data = array (
			'nuptk'			=> $this->input->post('nuptk',TRUE),
			'nama_guru'		=> $this->input->post('nama',TRUE),
			'gender'		=> $this->input->post('gender',TRUE),
			'kd_agama'		=> $this->input->post('agama',TRUE),
			);
		$nim = $this->input->post('id_guru');
		$this->db->where('id_guru',$nim);
		$this->db->update($this->table,$data);
	}
}