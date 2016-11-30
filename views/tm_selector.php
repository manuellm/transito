<?php

session_start();
require_once '../class/con_mysql.php';
require_once '../class/funciones_sp.php';
$funciones = new funciones_sp();

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
    case 4:
        $_POST['fecha_recibido'] = date('Y-m-d H:i:s');
        echo $funciones->insert('folinv_block', $_POST);
        break;
    /* Captura infraccion */
    case 5:
        $_POST['feccre'] = date('Y-m-d H:i:s');

        if ($_POST['servicio'] === 'Servicio Publico') {
            $_POST['servicio'] = $_POST['servicio_publico'];
        }
        $_POST['activo'] = 1;
        $_POST['nombreAgente'] = $_POST['nombre_agente'];
        $_POST['fecha_captura'] = $_POST['feccre'];
        $_POST['infraccion_id'] = $funciones->insert('infracciones_infraccion', $_POST);

        $funciones->insert('infracciones_infractor', $_POST);

        $_POST['colonia'] = $_POST['colonia_infractor'];


        $funciones->insert('infracciones_vehiculo', $_POST);

        foreach ($_POST['lista_articulos'] as $articulo) {
            $arr = explode("|", $articulo);
            $_POST['articulo'] = $arr[0];
            $_POST['parrafo'] = $arr[1];
            $_POST['concepto'] = $arr[2];
            $funciones->insert('infracciones_detalle', $_POST);
        }

        $mysql = new con_mysql();
        $mysql->connect();
        $query = "update infracciones_folioinfraccion set infracciones_folioinfraccion.`status` = 'CAPTURADO'  where infracciones_folioinfraccion.folio =" . $_POST['folio'];
        $mysql->query($query);
        $query = "
            SELECT
                count(*) AS usados,
                (folio_final - folio_inicial) + 1 AS total
            FROM
                infracciones_block
                JOIN infracciones_folioinfraccion ON infracciones_block.id = infracciones_folioinfraccion.block_id
            WHERE
                infracciones_folioinfraccion. STATUS = 'CAPTURADO'
                AND
                infracciones_block.id = " . $_POST['id_bloc'];

        $result = $mysql->query($query);
        $row = $mysql->f_array($result);

        if ($row[0] == $row[1]) {
            $query = "update infracciones_block set activo = 3 where id = " . $_POST['id_bloc'];
            $result = $mysql->query($query);
        }

        $mysql->close();
        echo $_POST['infraccion_id'];
        break;
    case 6:
        echo $funciones->insert('accidentes_accidente', $_POST);
        break;
    default:
        echo json_encode(['error' => 404]);
        break;
}