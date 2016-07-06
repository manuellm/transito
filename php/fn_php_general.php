<?php
include 'clases/cls_Consultas.php';
function buscar_Delegacion(){
//	$del="X";
//	$_SESSION['delegacion']="OTRA";
//	$_SESSION['ur']="N/A";
        $objipv=new cls_Consultas();
        $resultado=$objipv->fn_ipcamv(getIP());
             $div=  explode("|", $resultado);
             $_SESSION['delegacion']=$div[1];
             $_SESSION['id_zona']=$div[0];   
	
}
function getIP() {
//    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//       $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//    }
//    elseif (isset($_SERVER['HTTP_VIA'])) {
//       $ip = $_SERVER['HTTP_VIA'];
//    }
//    elseif (isset($_SERVER['REMOTE_ADDR'])) {
//       $ip = $_SERVER['REMOTE_ADDR'];
//    }
//    else {
//       $ip = "unknown";
//    }
//   return "$ip";
   
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    $ip=$_SERVER['REMOTE_ADDR'];
    return "$ip";

}
?>