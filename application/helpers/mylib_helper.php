<?php

function combo_dinamis($name, $table, $field, $pk, $select, $extra) {
	$is = & get_instance();
	$combo  = "<select name='$name' class='form-control col-md-12' $extra>";
	$data 	= $is->db->get($table)->result();
		foreach ($data as $row) {
			$combo .= "<option value='".$row->$pk."'";
			$combo .= $select== $row->$pk?'selected':'';
			$combo .= ">" .$row->$field."</option>";
		}
	$combo .= "</select>";
	return $combo;	
}

function tahun_akademik_aktif ($field) {
	$g = & get_instance();
	$g->db->where('is_aktif','y');
	$tahun_akademik_aktif = $g->db->get('tbl_tahun_akademik')->row_array();
	return $tahun_akademik_aktif[$field];
}

function chekAksesModule() {
    $ci = & get_instance();
    // ambil parameter uri segment untuk controller dan method
    $controller = $ci->uri->segment(1);
    $method = $ci->uri->segment(2);

    // chek url
    if (empty($method)) {
        $url = $controller;
    } else {
        $url = $controller . '/' . $method;
    }

    // chek id menu nya
    $menu = $ci->db->get_where('tabel_menu', array('link' => $url))->row_array();
    $level_user = $ci->session->userdata('id_level_user');

    if (!empty($level_user)) {

        // chek apakah level ini diberikan hak akses atau tidak
        $chek = $ci->db->get_where('tbl_user_rule', array('id_level_user' => $level_user, 'id_menu' => $menu['id']));
        if ($chek->num_rows() < 1 and $method != 'data' and $method != 'add' and $method != 'edit' and $method != 'delete' and $method != 'rule' and $method != 'access' and $method != 'modul' and $method != 'list_kelompok_jurusan' and $method != 'list_siswa_jurusan') {
            redirect('dashboard');
        }
    } else {
        redirect('login');
    }



}
?>