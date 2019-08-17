<?php 

/**
* 
*/
class Model_sekolah extends CI_Model
{
	public $table = "tbl_sekolah_info";
	
	function update()
	{
		$data = array (
			'id_sekolah'	=> $this->input->post('id_sekolah',TRUE),
			'nama_sekolah'	=> $this->input->post('nama_sekolah',TRUE),
			'alamat_sekolah'=> $this->input->post('alamat',TRUE),
			'id_jenjang_sekolah'		=> $this->input->post('jenjang',TRUE),
			'telpon'		=> $this->input->post('telpon',TRUE),
			'email'			=> $this->input->post('email',TRUE),
			);
		$id = $this->input->post('id_sekolah');
		$this->db->where('id_sekolah',$id);
		$this->db->update($this->table,$data);
	}
}