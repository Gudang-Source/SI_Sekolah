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

		chekAksesModule();
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
		"SELECT tj.hari, tj.id_jadwal, tm.nama_mapel, tg.id_guru, tg.nama_guru, tj.hari, tr.nama_ruang, tr.kd_ruang, tj.jam, tj.kd_ruangan
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
			echo "
			<tr>
				<td class='text-center'>$no</td>
				<td>$row->nama_mapel</td>
				<td>". combo_dinamis('guru', 'tbl_guru', 'nama_guru', 'id_guru',$row->id_guru,"id='guru".$row->id_jadwal."'onChange='updateGuru(".$row->id_jadwal.")'")."</td>
				<td class='text-center'>". combo_dinamis('ruangan', 'tbl_ruangan', 'nama_ruang', 'kd_ruang',$row->kd_ruangan,"id='ruang".$row->id_jadwal."'onChange='updateRuang(".$row->id_jadwal.")'")."</td>
				<td>". form_dropdown('hari',$hari,$row->hari,"class='form-control' id='hari".$row->id_jadwal."'onChange='updateHari(".$row->id_jadwal.")'") ."</td>
				<th>". form_dropdown('jam',$jam_pelajaran,$row->jam,"class='form-control' id='jam".$row->id_jadwal."'onChange='updateJam(".$row->id_jadwal.")'") ."</th>
				<td class='text-center'>".anchor('jadwal/deleteJadwal/'.$row->id_jadwal,'<i class="fa fa-trash"></i>')."</td>
			</tr>";
			$no++;
		}
		echo "</table>";

		
	}

	function update_guru()
	{
		$id_guru 	= $_GET['id_guru'];
		$id_jadwal	= $_GET['id_jadwal'];
		$this->db->where('id_jadwal',$id_jadwal);
		$this->db->update('tbl_jadwal',array('id_guru'=>$id_guru)); }

	function update_ruang()
	{
		$kd_ruang 	= $_GET['kd_ruangan'];
		$id_jadwal	= $_GET['id_jadwal'];
		$this->db->where('id_jadwal',$id_jadwal);
		$this->db->update('tbl_jadwal',array('kd_ruangan'=>$kd_ruang)); }

	function update_hari()
	{
		$hari 		= $_GET['hari'];
		$id_jadwal	= $_GET['id_jadwal'];
		$this->db->where('id_jadwal',$id_jadwal);
		$this->db->update('tbl_jadwal',array('hari'=>$hari)); }

	function update_jam()
	{
		$jam 		= $_GET['jam'];
		$id_jadwal	= $_GET['id_jadwal'];
		$this->db->where('id_jadwal',$id_jadwal);
		$this->db->update('tbl_jadwal',array('jam'=>$jam)); }

	function kelompok()
	{
		echo "<select id='list_kelompok' class='form-control'>";
		$this->db->where('kelas', $_GET['kelas']);
		$this->db->where('kd_jurusan', $_GET['jurusan']);
		$kelompok 	= $this->db->get('tbl_kelompok');
		foreach ($kelompok->result() as $row) {
			echo "<option value='$row->id_ke;omppk'>$row->nama_kelompok</option>";
		}
		echo "</select>";
	}
}