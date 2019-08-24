<?php 

/**
* 
*/
class Jadwal extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('model_jadwal');
	}

	function index() 
	{
		$infoSekolah = "SELECT js.jumlah_kelas FROM tbl_jenjang_sekolah as js, tbl_sekolah_info as si WHERE js.id_jenjang= si.id_jenjang_sekolah";
		$data['info']= $this->db->query($infoSekolah)->row_array();
		$this->template->load('template','jadwal/list',$data);
	}

	function generate_jadwal()
	{
		if(isset($_POST['submit'])) {
			$this->model_jadwal->generateJadwal();
		}
		redirect('jadwal');
		
	}

	function data_jadwal()
	{
		$kelas 			= $_GET['kelas'];
		$jurusan 		= $_GET['jurusan'];
		$id_kurikulum 	= $_GET['id_kurikulum'];
		if ($kelas == 'semua_kelas') {
			$selected_kelas = '';
		} else {
			$selected_kelas= "AND kd.kelas='$kelas'";
		}

		echo "<table class=' align-middle mb-0 table table-borderless table-striped table-hover'>
		<thead>
			<tr>
				<th class='text-center'>No</th>
				<th class='text-center'>Mata Pelajaran</th>
				<th class='text-center'>Guru</th>
				<th class='col-md-2 text-center'>Ruang</th>
				<th class='text-center'>Hari</th>
				<th class='text-center'>Jam</th>
			</tr>
		</thead>";

		$sql = 
		"SELECT tj.hari, tj.id_jadwal, tm.nama_mapel, tg.nama_guru, tj.hari, tr.nama_ruang, tj.jam_mulai, tj.jam_selesai 
		FROM tbl_jadwal AS tj, tbl_guru as tg, tbl_ruangan AS tr, tbl_mapel AS tm
		WHERE tj.kd_mapel=tm.kd_mapel AND tj.id_guru=tg.id_guru AND tj.kd_ruangan=tr.kd_ruang AND tj.kelas='$kelas' AND tj.kd_jurusan = '$jurusan'";
		$jadwal 		= $this->db->query($sql)->result();
		$no 			= 1;
		$hari 			= array (
			'Senin' 	=> 'Senin',
			'Selasa' 	=> 'Selasa',
			'Rabu'		=> 'Rabu',
			'Kamis'		=> 'Kamis',
			'Jumat'		=> 'Jumat',
			'Sabtu'		=> 'Jumat',
			'Minggu'	=> 'Minggu');
		$jam_pelajaran 	= $this->model_jadwal->getJamPelajaran();
		foreach ($jadwal as $row){
			echo "<tr><td class='text-center'>$no</td><td>$row->nama_mapel</td><td>". combo_dinamis('guru', 'tbl_guru', 'nama_guru', 'id_guru', null, "class='form-control'")."</td><td class='text-center'>". combo_dinamis('ruangan', 'tbl_ruangan', 'nama_ruang', 'kd_ruang', null, "class='form-control'")."</td><td>". form_dropdown('hari',$hari,null,"class='form-control'") ."</td><th>". form_dropdown('jam',$jam_pelajaran,null,"class='form-control'") ."</th><td class='text-center'>".anchor('jadwal/deleteJadwal/'.$row->id_jadwal,'<i class="fa fa-trash"></i>')."</td></tr>";
			$no++;
		}
		echo "</table>";

		
	}

}