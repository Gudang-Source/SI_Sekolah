<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wali extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ssp');

	}

	function data() {
		// nama tabel
		$table = 'v_walikelas';
        // nama PK
		$primaryKey = 'id_walikelas';
        // list field
		$columns = array(
			array('db' => 'nama_kelompok', 'dt' => 'nama_kelompok'),
			array('db' => 'nama_jurusan', 'dt' => 'nama_jurusan'),
			array('db' => 'kelas', 'dt' => 'kelas'),
			array(
				'db' => 'id_walikelas',
				'dt' => 'nama_guru',
				'formatter' => function( $d) {
					$walikelas = $this->db->get_where('tbl_walikelas',array('id_walikelas'=>$d))->row_array();
                    return combo_dinamis('guru','tbl_guru','nama_guru','id_guru',$walikelas['id_guru'],"id='guru$d' onChange='updateWali($d)'");
                }
                )
			);

		$sql_details = array(
			'user'  => $this->db->username,
			'pass'  => $this->db->password,
			'db'    => $this->db->database,
			'host'  => $this->db->hostname
			);

		$where = "tahun_akademik='".tahun_akademik_aktif('tahun_akademik')."'";

		echo json_encode(
			SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)
			);
	}

	function index()
	{
		$this->template->load('template','wali/list');
	}

	function update_wali()
	{
		$id_walikelas	= $_GET['id_walikelas'];
		$id_guru		= $_GET['id_guru'];
		$this->db->where('id_walikelas',$id_walikelas);
		$this->db->update('tbl_walikelas',array('id_guru'=>$id_guru));
	}
}