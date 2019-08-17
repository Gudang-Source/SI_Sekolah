<?php 


class Sekolah extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_sekolah');
	}

	function index()
	{
		$data['info'] = $this->db->get_where('tbl_sekolah_info', array('id_sekolah'=>1))->row_array();
		$this->template->load('template','sekolah/info',$data);
	}

	function update()
	{
		if (isset($_POST['submit'])) {
			$this->Model_sekolah->update();
			redirect('sekolah');
		} else {
			$id            = $this->uri->segment(3);
			$data['info']  = $this->db->get_where('tbl_sekolah_info',array('id_sekolah'=>$id))->row_array();
			$this->template->load('template','sekolah/update',$data);
		}
	}
}