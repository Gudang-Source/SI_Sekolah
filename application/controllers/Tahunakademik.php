<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahunakademik extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ssp');
        $this->load->model('Model_tahunakademik');

     }

	function data() {
		// nama tabel
		$table = 'tbl_tahun_akademik';
        // nama PK
		$primaryKey = 'id_tahun_akademik';
        // list field
		$columns = array(
			array('db' => 'tahun_akademik', 'dt' => 'tahun_akademik'),
			array('db' => 'is_aktif',
			 'dt' => 'status',
			 'formatter' => function( $d) {
                    return $d=='y'?' Aktif ':' Tidak Aktif ';
                }
			 ),
			array(
				'db' => 'id_tahun_akademik',
				'dt' => 'aksi',
				'formatter' => function( $d) {
                    return 
                    anchor('tahunakademik/edit/'.$d,'<i class="fas fa-edit"></i>','class="btn btn-outline-success"').'
                    '.anchor('tahunakademik/delete/'.$d,'<i class="fas fa-trash"></i>','class="btn btn-outline-danger"');
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
		$this->template->load('template','tahunakademik/list');
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Model_tahunakademik->add();
			$idTahunAkademik = $this->db->insert_id();
			//insert to tabel walikelas
			$this->load->model('Model_walikelas');
			$this->Model_walikelas->set_wali($idTahunAkademik);

			redirect('tahunakademik');

		} else {
			$this->template->load('template','tahunakademik/add');
		}
	}

	function edit()
	{
		if (isset($_POST['submit'])) {
            $this->Model_tahunakademik->edit();
            redirect('tahunakademik');
        } else {
            $id 						= $this->uri->segment(3);
            $data['tahun_akademik'] 	= $this->db->get_where('tbl_tahun_akademik',array('id_tahun_akademik'=>$id))->row_array();
            $this->template->load('template','tahunakademik/edit',$data);
        }
	}

	function delete() {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            
            $this->db->where('id_tahun_akademik',$id);
            $this->db->delete('tbl_tahun_akademik');
            redirect('tahunakademik');
        }
    }

}