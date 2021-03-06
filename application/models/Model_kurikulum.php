<?php 


class Model_kurikulum extends CI_Model
{
	public $table = "tbl_kurikulum";

	function add()
	{
		$data = array (
			'id_kurikulum'		=> $this->input->post('id',TRUE),
			'is_aktif'		=> $this->input->post('status',TRUE),
			'nama_kurikulum'	=> $this->input->post('nama',TRUE),
			);
		$this->db->insert($this->table,$data);
	}

	function edit()
	{
		$data = array (
			'is_aktif'		=> $this->input->post('status',TRUE),
			'nama_kurikulum'	=> $this->input->post('nama',TRUE),
			);
		$id = $this->input->post('id_kurikulum');
		$this->db->where('id_kurikulum',$id);
		$this->db->update($this->table,$data);
	}

	function addKurikulumDetail()
	{
		$data = array (
			'kd_mapel'				=> $this->input->post('mapel',TRUE),
			'kd_jurusan' 			=> $this->input->post('jurusan',TRUE),
			'kelas' 				=> $this->input->post('kelas',TRUE),
			'id_kurikulum'	=> $this->input->post('kurikulum',TRUE)
			);
		$this->db->insert('tbl_kurikulum_detail',$data);
	}
}