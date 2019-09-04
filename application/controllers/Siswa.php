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
                    return "<img width='50px' class='rounded-circle' src='". base_url()."/uploads/".$d."'>";}),
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

            $upload_foto = $this->upload_foto_siswa();

            $this->Model_siswa->add($upload_foto);
            redirect('siswa');
        } else {
            $this->template->load('template','siswa/add');
        }
    }

    function edit() {
        if (isset($_POST['submit'])) {
            $upload_foto = $this->upload_foto_siswa();
            $this->Model_siswa->edit($upload_foto);
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

    function upload_foto_siswa() {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 2048;
        $this->load->library('upload', $config);

            //proses upload

        $this->upload->do_upload('userfile');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

    function siswa_didik() {
     $this->template->load('template','siswa/peserta_didik');   
    }

    function list_siswa_jurusan() {
        $list = $_GET['kelompok'];
        echo "<table class='align-middle table table-striped table-hover' onChange='load_list_siswa()'>
        <tr class='text-center'><th>NIM</th><th>Nama</th></tr>";
        $this->db->where('id_kelompok',$list);
        $siswa = $this->db->get('tbl_siswa');
        foreach ($siswa->result() as $row) {
            echo "<tr><td class='text-center'>$row->nim</td><td>$row->nama</td></tr>";
        }
        echo "</table>";
    }
}