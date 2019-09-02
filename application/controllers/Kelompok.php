<?php 

/**
* 
*/
class Kelompok extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ssp');
        $this->load->model('Model_kelompok');
	}

	function data() {
		// nama tabel
		$table = 'view_tbl_kelompok';
        // nama PK
		$primaryKey = 'id_kelompok';
        // list field
		$columns = array(
			array('db' => 'id_kelompok', 'dt' => 'id_kelompok'),
			array('db' => 'nama_kelompok', 'dt' => 'nama_kelompok'),
			array('db' => 'nama_jurusan', 'dt' => 'nama_jurusan'),
			array('db' => 'kelas', 'dt' => 'kelas'),
			array(
				'db' => 'id_kelompok',
				'dt' => 'aksi',
				'formatter' => function( $d) {
                    return //"<a href='edit.php?id=$d' class='btn btn-outline-danger'><i class='metis-menu pe-7s-note'></i></a>";
                    anchor('kelompok/edit/'.$d,'<i class="fas fa-edit"></i>','class="btn btn-outline-success"').'
                    '.anchor('kelompok/delete/'.$d,'<i class="fas fa-trash"></i>','class="btn btn-outline-danger"');
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
		$this->template->load('template','kelompok/list');
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Model_kelompok->add();
			redirect('kelompok');
		} else {
			$jumlah_kelas = "SELECT jumlah_kelas FROM tbl_jenjang_sekolah as js, tbl_sekolah_info as si WHERE js.id_jenjang= si.	id_jenjang_sekolah";
			$data['info']= $this->db->query($jumlah_kelas)->row_array();
			$this->template->load('template','kelompok/add',$data);
		}
	}

	function edit()
	{
		if (isset($_POST['submit'])) {
            $this->Model_kelompok->edit();
            redirect('kelompok');
        } else {
        	$jumlah_kelas = "SELECT jumlah_kelas FROM tbl_jenjang_sekolah as js, tbl_sekolah_info as si WHERE js.id_jenjang= si.	id_jenjang_sekolah";
			$data['info']= $this->db->query($jumlah_kelas)->row_array();
            $id 				= $this->uri->segment(3);
            $data['kelompok']	= $this->db->get_where('tbl_kelompok',array('id_kelompok'=>$id))->row_array();
            $this->template->load('template','kelompok/edit',$data);
        }
	}

	function delete() {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            
            $this->db->where('id_kelompok',$id);
            $this->db->delete('tbl_kelompok');
            redirect('kelompok');
        }
    }

}