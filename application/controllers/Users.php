<?php 
/**
* 
*/
class Users extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->library('ssp');
		$this->load->model('Model_user');

        chekAksesModule();
	}

	function data() {
		// nama tabel
		$table = 'v_user';
        // nama PK
		$primaryKey = 'username';
        // list field
		$columns = array(
			array('db' => 'foto', 
                'dt'   => 'foto',
                'formatter' => function( $d) {
                    return "<img width='50px' class='rounded-circle' src='". base_url()."/uploads/".$d."'>";}),
			array('db' => 'nama_lengkap', 'dt' => 'nama_lengkap'),
			array('db' => 'nama_level', 'dt' => 'nama_level'),
			array(
				'db' => 'username',
				'dt' => 'aksi',
				'formatter' => function( $d) {
                    return //"<a href='edit.php?id=$d' class='btn btn-outline-danger'><i class='metis-menu pe-7s-note'></i></a>";
                    anchor('users/edit/'.$d,'<i class="fas fa-edit"></i>','class="btn btn-outline-success"').'
                    '.anchor('users/delete/'.$d,'<i class="fas fa-trash"></i>','class="btn btn-outline-danger"');
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
		$this->template->load('template','users/list');
	}

	function add()
	{
		if (isset($_POST['submit'])) {

            $upload_foto = $this->upload_foto_users();

            $this->Model_user->add($upload_foto);
            redirect('users');
        } else {
            $this->template->load('template','users/add');
        }
	}

	function edit()
	{
		if (isset($_POST['submit'])) {
            $upload_foto = $this->upload_foto_users();
            $this->Model_user->edit($upload_foto);
            redirect('users');
        } else {
            $nim            = $this->uri->segment(3);
            $data['users']  = $this->db->get_where('tbl_user',array('username'=>$nim))->row_array();
            $this->template->load('template','users/edit',$data);
        }
	}

	function delete() {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            
            $this->db->where('username',$id);
            $this->db->delete('tbl_user');
            redirect('users');
        }
    }

    function upload_foto_users() {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 2048;
        $this->load->library('upload', $config);

            //proses upload

        $this->upload->do_upload('userfile');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

    function access() {
    	$this->template->load('template','users/list_akses');
    }

    function modul() {
        $level = $_GET['level_user'];
    	echo "<table class='align-middle mb-0 table table-borderless table-striped table-hover'>
                    <thead>
                        <tr>
                            <th class='text-center'>NO</th>
                            <th class='text-center'>MODUL</th>
                            <th class='text-center'>LINK</th>
                            <th class='text-center'>ACCESS</th>
                        </tr>";
                        $no     =1;
                        $menu   = $this->db->get('tabel_menu');
                        foreach ($menu->result() as $row) {
                            echo "<tr><td align='center'>$no .</td><td>$row->nama_menu</td><td>$row->link</td><td align='center'><input type='checkbox'";
                            $this->checklist_menu($level, $row->id);
                            echo " onClick='check_akses($row->id)' name='check'></input></td></tr>";
                            $no++;    
                        }
                        
            echo "</thead>
            </table>";
    }

    function checklist_menu($level, $menu) {
        $data   = array('id_level_user'=>$level,'id_menu'=>$menu);
        $table  = $this->db->get_where('tbl_user_rule',$data);
        if ($table->num_rows()>0) {
            echo "checked";
        }
    }

    function rule() {
        $level  = $_GET['level_user'];
        $menu   = $_GET['id_menu'];
        $data   = array('id_level_user'=>$level,'id_menu'=>$menu);
        $table  = $this->db->get_where('tbl_user_rule',$data);
        if ($table->num_rows()<1) {
            $this->db->insert('tbl_user_rule',$data);
            echo "Hak akses ditambahkan";
        } else {
            $this->db->where('id_level_user',$level);
            $this->db->where('id_menu',$menu);
            $this->db->delete('tbl_user_rule');
            echo "Hak akses dihapus";
        }

    }
}