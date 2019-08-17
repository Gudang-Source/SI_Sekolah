<?php 

/**
* 
*/
class Kurikulum extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ssp');
		$this->load->model('Model_kurikulum');
	}

	function data() {
		// nama tabel
		$table = 'tbl_kurikulum';
        // nama PK
		$primaryKey = 'id_kurikulum';
        // list field
		$columns = array(
			array('db' => 'nama_kurikulum', 'dt' => 'kurikulum'),
			array('db' => 'is_aktif',
				'dt' => 'status',
				'formatter' => function( $d) {
					return $d=='y'?' Aktif ':' Tidak Aktif ';
				}
				),
			array(
				'db' => 'id_kurikulum',
				'dt' => 'aksi',
				'formatter' => function( $d) {
					return 
					anchor('kurikulum/edit/'.$d,'<i class="fas fa-edit"></i>','class="btn btn-outline-success"').'
					'.anchor('kurikulum/delete/'.$d,'<i class="fas fa-trash"></i>','class="btn btn-outline-danger"')
					.' '.anchor('kurikulum/detail/'.$d,'<i class="fas fa-eye"></i>','class="btn btn-outline-warning"');
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
		$this->template->load('template','kurikulum/list');
	}

	function add()
	{
		if (isset($_POST['submit'])) {
			$this->Model_kurikulum->add();
			redirect('kurikulum');
		} else {
			$this->template->load('template','kurikulum/add');
		}
	}

	function edit()
	{
		if (isset($_POST['submit'])) {
			$this->Model_kurikulum->edit();
			redirect('kurikulum');
		} else {
			$id 						= $this->uri->segment(3);
			$data['kurikulum'] 	= $this->db->get_where('tbl_kurikulum',array('id_kurikulum'=>$id))->row_array();
			$this->template->load('template','kurikulum/edit',$data);
		}
	}

	function delete() {
		$id = $this->uri->segment(3);
		if (!empty($id)) {

			$this->db->where('id_kurikulum',$id);
			$this->db->delete('tbl_kurikulum');
			redirect('kurikulum');
		}
	}

	function detail()
	{
		$infoSekolah = "SELECT jumlah_kelas FROM tbl_jenjang_sekolah as js, tbl_sekolah_info as si WHERE js.id_jenjang= si.id_jenjang_sekolah";
		$data['info']= $this->db->query($infoSekolah)->row_array();
		$this->template->load('template','kurikulum/detail',$data);
	}

	function kurikulumDetail()
	{
		$kelas = $_GET['kelas'];
		$jurusan = $_GET['jurusan'];

		echo "<table class=' align-middle mb-0 table table-borderless table-striped table-hover'>
		<thead>
			<tr>
				<th class='text-center'>No</th>
				<th class='text-center'>Kode Pelajaran</th>
				<th class='text-center'>Nama Mata Pelajaran</th>
				<th class='text-center'>Kelas</th>
				<th class='text-center'></th>
			</tr>
		</thead>";

		$sql = 
		"SELECT tm.kd_mapel, tm.nama_mapel, kd.kelas FROM tbl_kurikulum_detail as kd, tbl_kurikulum as tk, tbl_mapel as tm,tbl_jurusan as tj WHERE kd.id_kurikulum=tk.id_kurikulum AND kd.kd_mapel=tm.kd_mapel AND kd.kd_jurusan=tj.kd_jurusan AND kd.kelas='$kelas' AND kd.kd_jurusan='$jurusan'";
		$kurikulum = $this->db->query($sql)->result();
		$no = 1;
		foreach ($kurikulum as $row){
			echo "<tr><td class='text-center'>$no</td><td>$row->kd_mapel</td><td>$row->nama_mapel</td><td class='text-center'>$row->kelas</td><td></td></tr>";
			$no++;
		}
		echo "</table>";
	}

}