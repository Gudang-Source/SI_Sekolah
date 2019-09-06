<?php
/**
* 
*/
class Model_walikelas extends CI_Model
{
	
	function set_wali($idTahunAkademik) 
	{
		$kelompok = $this->db->get('tbl_kelompok');
		foreach ($kelompok->result() as $row) {
			$wali = array('
				id_guru' 			=> 2,
				'id_tahun_akademik'	=> $idTahunAkademik,
				'id_kelompok'		=> $row->id_kelompok);
			$this->db->insert('tbl_walikelas',$wali);
		}
	}
}