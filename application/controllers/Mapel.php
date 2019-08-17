<?php 

/**
* 
*/
class Mapel extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ssp');
        $this->load->model('Model_mapel');
	}

	function data() {
		// nama tabel
		$table = 'tbl_mapel';
        // nama PK
		$primaryKey = 'kd_mapel';
        // list field
		$columns = array(
			array('db' => 'kd_mapel', 'dt' => 'kd_mapel'),
			array('db' => 'nama_mapel', 'dt' => 'nama_mapel'),
			array(
				'db' => 'kd_mapel',
				'dt' => 'aksi',
				'formatter' => function( $d) {
                    return //"<a href='edit.php?id=$d' class='btn btn-outline-danger'><i class='metis-menu pe-7s-note'></i></a>";
                    anchor('mapel/edit/'.$d,'<i class="fas fa-edit"></i>','class="btn btn-outline-success"').'
                    '.anchor('mapel/delete/'.$d,'<i class="fas fa-trash"></i>','class="btn btn-outline-danger"');
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
		$this->template->load('template','mapel/list');
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Model_mapel->add();
			redirect('mapel');
		} else {
			$this->template->load('template','mapel/add');
		}
	}

	function edit()
	{
		if (isset($_POST['submit'])) {
            $this->Model_mapel->edit();
            redirect('mapel');
        } else {
            $id 			= $this->uri->segment(3);
            $data['mapel']  = $this->db->get_where('tbl_mapel',array('kd_mapel'=>$id))->row_array();
            $this->template->load('template','mapel/edit',$data);
        }
	}

	function delete() {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            
            $this->db->where('kd_mapel',$id);
            $this->db->delete('tbl_mapel');
            redirect('mapel');
        }
    }

}