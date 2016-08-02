<?php
session_start();
require_once '../class/con_mysql.php';

switch ($_POST['opc']) {
    case 1:
        $response = [];
        $mysql = new con_mysql();
        $mysql->connect();
        $sql = "
            SELECT
                    accidentes_folioaccidente.Folio + 1 AS total
            FROM
                    accidentes_folioaccidente
            ORDER BY
                    accidentes_folioaccidente.Folio DESC
            LIMIT 1";
        $row = $mysql->f_array($mysql->query($sql));
        $response['feccre'] = date('Y-m-d H:i:s');
        $response['folio_evento'] = $row[0];
        $sql_insert = "INSERT INTO accidentes_folioaccidente(Folio, usuario) VALUES ('" . $response['folio_evento'] . "', '" . $_SESSION['user'] . "');";
        $mysql->query($sql_insert);
        $mysql->close();
        echo json_encode($response);
        break;
    case 2:
        echo \Siosp\Models\Transito\Cat_unidad::getSector('011');
        break;
    case 3:
        echo date('Y-m-d H:i.s');
        break;
    default:
        echo json_encode(['error' => 404]);
        break;
}