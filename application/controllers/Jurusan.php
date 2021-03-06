<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ssp');
        $this->load->model('Model_jurusan');

	}

	function data() {
		// nama tabel
		$table = 'tbl_jurusan';
        // nama PK
		$primaryKey = 'kd_jurusan';
        // list field
		$columns = array(
			array('db' => 'kd_jurusan', 'dt' => 'kd_jurusan'),
			array('db' => 'nama_jurusan', 'dt' => 'nama_jurusan'),
			array(
				'db' => 'kd_jurusan',
				'dt' => 'aksi',
				'formatter' => function( $d) {
                    return //"<a href='edit.php?id=$d' class='btn btn-outline-danger'><i class='metis-menu pe-7s-note'></i></a>";
                    anchor('jurusan/edit/'.$d,'<i class="fas fa-edit"></i>','class="btn btn-outline-success"').'
                    '.anchor('jurusan/delete/'.$d,'<i class="fas fa-trash"></i>','class="btn btn-outline-danger"');
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
		$this->template->load('template','jurusan/list');
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Model_jurusan->add();
			redirect('jurusan');
		} else {
			$this->template->load('template','jurusan/add');
		}
	}

	function edit()
	{
		if (isset($_POST['submit'])) {
            $this->Model_jurusan->edit();
            redirect('jurusan');
        } else {
            $id 			= $this->uri->segment(3);
            $data['jurusan']  = $this->db->get_where('tbl_jurusan',array('kd_jurusan'=>$id))->row_array();
            $this->template->load('template','jurusan/edit',$data);
        }
	}

	function delete() {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            
            $this->db->where('kd_jurusan',$id);
            $this->db->delete('tbl_jurusan');
            redirect('jurusan');
        }
    }

}