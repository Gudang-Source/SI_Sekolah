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