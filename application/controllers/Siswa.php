<?php

class Siswa extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_siswa');
	}

	function data() {
		// nama tabel
        $table = 'tbl_siswa';
        // nama PK
        $primaryKey = 'nim';
        // list field
        $columns = array(
            array('db' => 'foto', 
                'dt'   => 'foto',
                'formatter' => function( $d) {
                    return "<img class='rounded-circle' src='https://demo.dashboardpack.com/architectui-html-free/assets/images/avatars/1.jpg'></img>";}),
            array('db' => 'nim', 'dt' => 'nim'),
            array('db' => 'nama', 'dt' => 'nama'),
            array('db' => 'tempat_lahir', 'dt' => 'tempat_lahir'),
            array('db' => 'tanggal_lahir', 'dt' => 'tanggal_lahir'),
            array(
                'db' => 'nim',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    return 
                    anchor('siswa/edit/'.$d,'<i class="fas fa-edit"></i>','class="btn btn-outline-success"').'
                    '.anchor('siswa/delete/'.$d,'<i class="fas fa-trash"></i>','class="btn btn-outline-danger"');
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

    function index() {
        $this->template->load('template','siswa/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_siswa->add();
            redirect('siswa');
        } else {
            $this->template->load('template','siswa/add');
        }
    }

    function edit() {
        if (isset($_POST['submit'])) {
            $this->Model_siswa->edit();
            redirect('siswa');
        } else {
            $nim            = $this->uri->segment(3);
            $data['siswa']  = $this->db->get_where('tbl_siswa',array('nim'=>$nim))->row_array();
            $this->template->load('template','siswa/edit',$data);
        }
    }

    function delete() {
        $nim = $this->uri->segment(3);
        if (!empty($nim)) {
            
            $this->db->where('nim',$nim);
            $this->db->delete('tbl_siswa');
            redirect('siswa');
        }
    }
}