<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ssp');
        $this->load->model('Model_ruang');
	}

	function data() {
		// nama tabel
		$table = 'tbl_ruangan';
        // nama PK
		$primaryKey = 'kd_ruang';
        // list field
		$columns = array(
			array('db' => 'kd_ruang', 'dt' => 'kd_ruang'),
			array('db' => 'nama_ruang', 'dt' => 'nama_ruang'),
			array(
				'db' => 'kd_ruang',
				'dt' => 'aksi',
				'formatter' => function( $d) {
                    return //"<a href='edit.php?id=$d' class='btn btn-outline-danger'><i class='metis-menu pe-7s-note'></i></a>";
                    anchor('ruang/edit/'.$d,'<i class="fas fa-edit"></i>','class="btn btn-outline-success"').'
                    '.anchor('ruang/delete/'.$d,'<i class="fas fa-trash"></i>','class="btn btn-outline-danger"');
                }
                )
			);

		$sql_details = array(
			'user'  => $this->db->username,
			'pass'  => $this->db->password,
			'db'    => $this->db->database,
			'host'  => $this->db->hostname
			);

		echo json_encode(
			SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
			);
	}

	function index()
	{
		$this->template->load('template','ruang/list');
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Model_ruang->add();
			redirect('ruang');
		} else {
			$this->template->load('template','ruang/add');
		}
	}

	function edit()
	{
		if (isset($_POST['submit'])) {
            $this->Model_ruang->edit();
            redirect('ruang');
        } else {
            $id 			= $this->uri->segment(3);
            $data['ruang']  = $this->db->get_where('tbl_ruangan',array('kd_ruang'=>$id))->row_array();
            $this->template->load('template','ruang/edit',$data);
        }
	}

	function delete() {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            
            $this->db->where('kd_ruang',$id);
            $this->db->delete('tbl_ruangan');
            redirect('ruang');
        }
    }

}