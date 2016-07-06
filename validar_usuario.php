<?php

require 'class/con_mysql.php';
$usr = $_POST['usuario'];
$passw = $_POST['password'];
$mysql = new con_mysql();
$mysql->connect();
$qry = "SELECT * FROM tb_usuarios WHERE usuario='" . $usr . "' AND password='" . $passw . "' AND estatus=1";
$res = $mysql->query($qry);
$num = $mysql->f_num($res);
$row = $mysql->f_array($res);
$qry = "SELECT * FROM tb_usuarios WHERE usuario='" . $usr . "' AND estatus=1";
$res = $mysql->query($qry);
$num1 = $mysql->f_num($res);
$row1 = $mysql->f_array($res);
$mysql->close();

if ($num == 0) {
    if ($num1 == 0) {
        $responce = array("url" => "0");
    } else {
        $responce = array("url" => "2");
    }
} else {
    $responce = array("url" => "1");
}

echo json_encode($responce);
?>