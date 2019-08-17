<?php 

/**
* 
*/
class Guru extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ssp');
        $this->load->model('Model_guru');
	}

	function data() {
		// nama tabel
		$table = 'tbl_guru';
        // nama PK
		$primaryKey = 'id_guru';
        // list field
		$columns = array(
			array('db' => 'nuptk', 'dt' => 'nuptk'),
			array('db' => 'nama_guru', 'dt' => 'nama_guru'),
			array(
				'db' => 'id_guru',
				'dt' => 'aksi',
				'formatter' => function( $d) {
                    return //"<a href='edit.php?id=$d' class='btn btn-outline-danger'><i class='metis-menu pe-7s-note'></i></a>";
                    anchor('guru/edit/'.$d,'<i class="fas fa-edit"></i>','class="btn btn-outline-success"').'
                    '.anchor('guru/delete/'.$d,'<i class="fas fa-trash"></i>','class="btn btn-outline-danger"');
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
		$this->template->load('template','guru/list');
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Model_guru->add();
			redirect('guru');
		} else {
			$this->template->load('template','guru/add');
		}
	}

	function edit()
	{
		if (isset($_POST['submit'])) {
            $this->Model_guru->edit();
            redirect('guru');
        } else {
            $id            = $this->uri->segment(3);
            $data['guru']  = $this->db->get_where('tbl_guru',array('id_guru'=>$id))->row_array();
            $this->template->load('template','guru/edit',$data);
        }
	}

	function delete() {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            
            $this->db->where('id_guru',$id);
            $this->db->delete('tbl_guru');
            redirect('guru');
        }
    }

}