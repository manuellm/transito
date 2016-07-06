<?php
header('Content-Type: text/html; charset=UTF-8');
include_once("../clases/con_mysql.php"); //Archivo con conexion a bd
$mysql = new con_mysql();
$link = $mysql->connect();

if($_POST['action']=='g_senias'){
	$s_senias = $mysql->f_num($mysql->query('SELECT id_detenido, id_sena FROM tb_senaxdetenido WHERE id_detenido="'.$_POST['folio'].'";'));
	if($s_senias>0){
		$u_senias = $mysql->query('UPDATE tb_senaxdetenido SET id_sena="'.$_POST['senias'].'" WHERE id_detenido="'.$_POST['folio'].'";');
		echo 'Las señas particulares se actualizaron correctamente';
	}else{
		$i_senias = $mysql->query('INSERT tb_senaxdetenido (id_detenido, id_sena) VALUES ("'.$_POST['folio'].'", "'.$_POST['senias'].'");');
		echo 'Las señas particulares se actualizaron correctamente';
	}
}
if($_POST['action']=='u_situacion_delito'){
	if($_POST['falta']){
		$u_situacion = $mysql->query('UPDATE tb_delitoxincidente SET id_sena="'.$_POST['senias'].'" WHERE id_detenido="'.$_POST['folio'].'";');
	}if($_POST['delito']){
		$u_situacion = $mysql->query('UPDATE tb_delitoxincidente SET id_sena="'.$_POST['senias'].'" WHERE id_detenido="'.$_POST['folio'].'";');
	}if($_POST['custodia']){
		$u_situacion = $mysql->query('UPDATE tb_delitoxincidente SET id_sena="'.$_POST['senias'].'" WHERE id_detenido="'.$_POST['folio'].'";');
	}
}
?>