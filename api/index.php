<?php

/**
 * Description of Rest
 *
 * @author JFcoDíaz
 */
session_start();
// <editor-fold defaultstate="collapsed" desc="Configuracion Autoload">
/* @var $loader Composer\Autoload\ClassLoader */
$loader = require "../vendor/autoload.php";
$loader->addPsr4("Siosp\\", "../class");
// </editor-fold>
define("PATH_FILES", '/var/www/html/transito/files/');

$res = new Siosp\Core\Rest();
if (!(isset($_SESSION['user']) || isset($_SESSION['pass']))) {
    $res->sessionError();
}
$res->doRes();

