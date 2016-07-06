<?php

$id_foto=date('YmdHis');//extraemos la fecha del servidor
$filename = "../arbitros/fotos_barandilla/tmp/".$id_foto.'.jpg';//nombre del archivo
$result = file_put_contents( $filename, file_get_contents('php://input') );//renombramos la fotografia y la subimos
if (!$result) {
	print "No se pudo subir al servidor\n";
	exit();
}


print $id_foto.'.jpg';//20120214060943.jpg

?>
