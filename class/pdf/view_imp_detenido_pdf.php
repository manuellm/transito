<?php

session_start();
include_once("../clases/con_mysql.php"); //Archivo con conexion a bd
$mysql = new con_mysql();
$link = $mysql->connect();
include_once '../clases/cls_Consultas.php';
$cls_Consultas = new cls_Consultas();
require_once '../clases/control_movimientos.php';

$folio = $_GET['folio'];
$control_movimientos = new control_movimientos($_SESSION['buscador_idpantalla'], 20, 'INFORMACION DETENIDO|ID_DETENIDO #' . $folio);
$control_movimientos->CapturaMovimiento();
$nomCompleto = '';
$nom = '';
$app = '';
$apm = '';
$feing1 = '';
$feing = '';
$hoing = '';
$feing21 = '';
$feing2 = '';
$hoing2 = '';
$foto = '';
$calle = '';
$idc = '';
$colonia = '';
$foliocabina = '';
$edad = '';
$sexo = '';
$estadocivil = '';
$escolaridad = '';
$ocupacion = '';
$senias = '';
$npadre = '';
$nmadre = '';
$alias = '';
$agentes = '';
$calleincidente = '';
$coloniaincidente = '';
$idc1 = '';
$corporacion = '';
$foto_med = '';
$result = $mysql->query("select * from tb_detenido WHERE folio='" . $folio . "';");
while ($row1 = $mysql->f_array($result)) {
    $nomCompleto = $row1['nombre'] . ' ' . $row1['app'] . ' ' . $row1['apm'];
    $nom = $row1['nombre'];
    $app = $row1['app'];
    $apm = $row1['apm'];
    $feing1 = explode(" ", $row1['fecha_hora_registro']);
    $feing = explode("-", $feing1[0]);
    $hoing = explode(":", $feing1[1]);
    $foto = $row1['foto_barandilla'];
    $foto_med = $row1['foto'];
    $numero=$row1['numero_domicilio'];
    //calle
    $rcalle = $mysql->query("select calle, id_colonia from tb_calles WHERE id_calle='" . $row1['id_calle'] . "';");
    while ($row2 = $mysql->f_array($rcalle)) {
        $calle = $row2['calle'];
        $idc = $row2['id_colonia'];
    }
    $rcolonia = $mysql->query("select colonia from tb_colonias WHERE id_colonia='" . $idc . "';");
    while ($row2 = $mysql->f_array($rcolonia)) {
        $colonia = $row2['colonia'];
    }
    $rfoliocabina = $mysql->query("select folio_cabina, clave_agente, id_calle, id_colonia, fecha_incidente from tb_incidentes WHERE id_incidente='" . $row1['id_incidente'] . "';");
    while ($row2 = $mysql->f_array($rfoliocabina)) {
        $foliocabina = $row2['folio_cabina'];
        $str_agentes = '';
        $agentes = explode(',', $row2['clave_agente']);
        foreach ($agentes as &$valor) {
            $row_agente = $cls_Consultas->fn_getAgenteN($valor);
            $str_agentes.=$row_agente['id_agente'] . ' ' . $row_agente['nombre'] . ' ' . $row_agente['app'] . $row_agente['apm'] . '<br/>';
        }

        $feing21 = explode(" ", $row2['fecha_incidente']);
        $feing2 = explode("-", $feing21[0]);
        $hoing2 = explode(":", $feing21[1]);

        //calle incidente
        $rcalle = $mysql->query("select calle, id_colonia from tb_calles WHERE id_calle='" . $row2['id_calle'] . "';");
        while ($row3 = $mysql->f_array($rcalle)) {
            $calleincidente = $row3['calle'];
            $idc1 = $row3['id_colonia'];
        }
        $rcolonia = $mysql->query("select colonia from tb_colonias WHERE id_colonia='" . $idc1 . "';");
        while ($row3 = $mysql->f_array($rcolonia)) {
            $coloniaincidente = $row3['colonia'];
        }
    }
    $edad = $row1['edad'];
    $sexo = $row1['sexo'];
    $restadocivil = $mysql->query("select descripcion from tb_estado_civil WHERE id_estado_civil='" . $row1['id_estado_civil'] . "';");
    while ($row2 = $mysql->f_array($restadocivil)) {
        $estadocivil = $row2['descripcion'];
    }
    $rescolaridad = $mysql->query("select descripcion from tb_escolaridad WHERE id_escolaridad='" . $row1['id_escolaridad'] . "';");
    while ($row2 = $mysql->f_array($rescolaridad)) {
        $escolaridad = $row2['descripcion'];
    }
//    $senias = $mysql->query("select descripcion from tb_escolaridad WHERE id_escolaridad='" . $row1['id_escolaridad'] . "';");
    while ($row2 = $mysql->f_array($rescolaridad)) {
        $escolaridad = $row2['descripcion'];
    }
    $rcorporacion = $mysql->query("select corporacion from tb_corporaciones WHERE id_corporacion='" . $row1['id_corporacion'] . "';");
    while ($row2 = $mysql->f_array($rcorporacion)) {
        $corporacion = $row2['corporacion'];
    }
    $ocupacion = $cls_Consultas->fn_getOcupacion($row1['ocupacion'])['ocupacion'];
    $senias = $row1['vestimenta'];
    $alias = $row1['alias'];
    $npadre = $row1['nombre_padre'];
    $nmadre = $row1['nombre_madre'];
    $result_cargos = $mysql->query("select * from tb_cargos_juez WHERE id_detenido='" . $folio . "';");
    if ($row1['etapa'] > 1) {
//            echo 'medico';
        if ($row1['foto'] == '' || $row1['foto'] == '0' || $row1['foto'] == 'silueta.jpg') {
            $foto = "../img/silueta.jpg";
        } else {
            $foto = "../arbitros/fotos_medico/tmp/" . $row1['foto'];
            $foto = trim(ltrim(rtrim($foto)));
        }
    } else {
//            echo 'barandilla';
        if ($row1['foto_barandilla'] == '' || $row1['foto_barandilla'] == '0' || $row1['foto_barandilla'] == 'silueta.jpg') {
            $foto = "../img/silueta.jpg";
        } else {
            $foto = "../arbitros/fotos_barandilla/barandilla_" . $row1['foto_barandilla'];
        }
    }
}

//if ($foto_med != NULL || $foto_med != '') {
//    $foto = '../arbitros/fotos_medico/tmp/' . $foto_med;
//} else if ($foto != NULL || $foto != '') {
//    $foto = '../arbitros/fotos_barandilla/barandilla_' . $foto;
//} else {
//    $foto = '../arbitros/fotos_barandilla/barandilla_silueta.jpg';
//}
$cuerpo = '
<style>
body{ margin: 0; border: none; font-family:Arial, Helvetica, sans-serif; font-size:12px; }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
    <table width="550" border="0" cellpadding="0" cellspacing="0">
            <thead>
                    <tr>
                            <th align="left" width="150">
                                    <img src="../img/logo_escudompio.png" />
                            </th>
                            <th align="center" colspan="5">
                                    Secretar&iacute;a de Seguridad P&uacute;blica<br/>
                                    LEON, Guanajuato<br/>
                                    Informaci&oacute;n Detenido
                            </th>
                            <th align="right" width="150">
                                    <img src="../img/logo_ayuntamiento.png" />
                            </th>
                    </tr>
            </thead>
    </table>
    <br/><br/>';




$cuerpo .='<table width="550" border="0" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="5" align="center" style="background-color: rgb(109, 156, 67); color:white;">DATOS DEL DETENIDO</th>
                    </tr>
                </thead>
                <tr>
                    <td><b>FECHA INGRESO:</b></td>
                    <td>' . $feing[2] . '/' . $feing[1] . '/' . $feing[0] . '</td>
                    <td><b>HORA INGRESO:</b></td>
                    <td>' . $hoing[0] . ':' . $hoing[1] . ':' . $hoing[2] . '</td>
                    <td align="center" rowspan="9" style="vertical-align:top"><img src="' . $foto . '" width="140"/><br/></td>
                </tr>
                <tr>
                    <td><b>FOLIO CABINA:</b></td>
                    <td>' . $foliocabina . '</td>
                    <td><b>FOLIO DETENCION:</b></td>
                    <td>' . $folio . '</td>
                </tr>
                <tr>
                    <td><b>NOMBRE:</b></td>
                    <td>' . $nom . '</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>AP. PATERNO:</b></td>
                    <td>' . $app . '</td>
                    <td><b>AP. MATERNO</b></td>
                    <td>' . $apm . '</td>
                </tr>
                <tr>
                    <td><b>EDAD:</b></td>
                    <td>' . $edad . '</td>
                    <td><b>SEXO</b></td>
                    <td>' . $sexo . '</td>
                </tr>
                <tr>
                    <td><b>CALLE:</b></td>
                    <td colspan="3">' . $calle ." # ".$numero. '</td>
                </tr>
                <tr>
                    <td><b>COLONIA:</b></td>
                    <td colspan="3">' . $colonia . '</td>
                </tr>
                <tr>
                    <td><b>ESTADO CIVIL:</b></td>
                    <td>' . $estadocivil . '</td>
                    <td><b>ESCOLARIDAD</b></td>
                    <td>' . $escolaridad . '</td>
                </tr>
                <tr>
                    <td><b>OCUPACION:</b></td>
                    <td colspan="3">' . $ocupacion . '</td>
                </tr>
                <tr>
                    <td><b>SEÑAS PARTICULARES:</b></td>
                    <td colspan="3">' . $senias . '</td>
                </tr>
                <tr>
                    <td><b>ALIAS:</b></td>
                    <td colspan="3">' . $alias . '</td>
                </tr>
                <tr>
                    <td><b>NOMBRE PADRE:</b></td>
                    <td>' . $npadre . '</td>
                    <td><b>NOMBRE MADRE</b></td>
                    <td>' . $nmadre . '</td>
                </tr>
                </table>
                <table width="550" border="0" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="5" align="center" style="background-color: rgb(109, 156, 67); color:white;">DATOS DE LA DETENCION</th>
                    </tr>
                </thead>
                <tr>
                    <td><b>FECHA DETENCION:</b></td>
                    <td>' . $feing2[2] . '/' . $feing2[1] . '/' . $feing2[0] . '</td>
                    <td><b>HORA DETENCION:</b></td>
                    <td>' . $hoing2[0] . ':' . $hoing2[1] . ':' . $hoing2[2] . '</td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>AGENTES:</b></td>
                    <td colspan="3">' . $str_agentes . '</td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>CALLE:</b></td>
                    <td colspan="3">' . $calleincidente . '</td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>COLONIA:</b></td>
                    <td colspan="3">' . $coloniaincidente . '</td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>CORPORACION:</b></td>
                    <td colspan="3">' . $corporacion . '</td>
                    <td></td>
                </tr>
                </table>
                <table width="550" border="0" cellpadding="0" cellspacing="0">
                <tr style="text-align: center;">
                    <th colspan="2" style="background-color: rgb(109, 156, 67); color:white;">MOTIVOS DE LA DETENCION</th>
                </tr>
                ';

while ($rows = $mysql->f_array($result_cargos)) {
    $cuerpo.= '<tr style="text-align: justify;">
        
                    <td width="520">

                        <strong><ul><li>';
    if ($rows['tipo'] == 'Delito') {
        $cuerpo .='<font color="red"><strong>';
        $cuerpo .= $cls_Consultas->fn_getCargo($rows['id_delito'], $rows['tipo'])['descripcion'] . '</strong></font>';
    } else {
        $cuerpo.= $cls_Consultas->fn_getCargo($rows['id_delito'], $rows['tipo'])['descripcion'] . '';
    }
    $cuerpo.= '</li></ul></strong>    
                        

                    </td>
                    <td></td>
                </tr>';
}

$cuerpo.='                        
            </table></boby>';

require_once("../clases/pdf/dompdf_config.inc.php");
// We check wether the user is accessing the demo locally
$local = array("::1", "http://www.c4.com.mx");
//$is_local = in_array($_SERVER['REMOTE_ADDR'], $local);
$is_local = in_array("http://www.c4.com.mx", $local);
if (isset($cuerpo) && $is_local) {
    if (get_magic_quotes_gpc())
        $cuerpo = stripslashes($cuerpo);

    $dompdf = new DOMPDF();
    $dompdf->load_html($cuerpo);
    //$dompdf->set_paper("letter","landscape");
    $dompdf->render();
    $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
    exit(0);
}
?>