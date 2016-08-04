<?PHP
require_once '../class/con_mysql.php';
require_once '../class/PHPPaging.lib.php';
$mysql = new con_mysql();
$link = $mysql->conexion();
$where = "";
if ($_REQUEST['folio'] != '') {
    $where .= " 
        WHERE
            accidentes_cabina.folio_evento = '" . $_REQUEST['folio'] . "' ";
} else {
    if ($_REQUEST['nocobro'] != '') {
        $where .= " 
            WHERE
                accidentes_cabina.gafete_agente = '" . $_REQUEST['nocobro'] . "' ";
    }
    if ($_REQUEST['unidad'] != '') {
        if ($where == '') {
            $where .= " 
            WHERE
                accidentes_cabina.gafete_agente = '" . $_REQUEST['unidad'] . "' ";
        } else {
            $where .= " 
            AND
                accidentes_cabina.gafete_agente = '" . $_REQUEST['unidad'] . "' ";
        }
    }
    if ($_REQUEST['f1'] != '' && $_REQUEST['f2'] != '') {
        if ($where == '') {
            $where .= " 
            WHERE
                accidentes_cabina.fecha BETWEEN '" . $_REQUEST['f1'] . "' AND '" . $_REQUEST['f2'] . "' ";
        } else {
            $where .= " 
            AND
                accidentes_cabina.fecha BETWEEN '" . $_REQUEST['f1'] . "' AND '" . $_REQUEST['f2'] . "' ";
        }
    }
}
// Datos paginador
$sqlquery = "
    SELECT
            accidentes_cabina.id,
            accidentes_cabina.folio_evento,
            accidentes_cabina.fecha,
            accidentes_cabina.hora,
            accidentes_cabina.delegacion,
            accidentes_cabina.comandancia,
            accidentes_cabina.turno,
            accidentes_cabina.clasificacion_de_accidente,
            accidentes_cabina.calle1,
            accidentes_cabina.calle2,
            accidentes_cabina.ref,
            accidentes_cabina.colonia,
            accidentes_cabina.no_vehiculos_participantes,
            accidentes_cabina.no_de_detenidos,
            accidentes_cabina.no_de_heridos,
            accidentes_cabina.no_de_muertos,
            accidentes_cabina.nombre_agente,
            accidentes_cabina.gafete_agente,
            accidentes_cabina.unidad,
            accidentes_cabina.sector,
            accidentes_cabina.observaciones_evento,
            accidentes_cabina.activo,
            accidentes_cabina.tipo_evento,
            accidentes_cabina.feccre,
            accidentes_cabina.fecmod,
            accidentes_cabina.useradd,
            accidentes_cabina.usermod,
            accidentes_cabina.id_unico,
            accidentes_cabina.latitud,
            accidentes_cabina.longitud,
            accidentes_cabina.reporta,
            accidentes_cabina.normales,
            accidentes_cabina.ei,
            accidentes_cabina.ec,
            accidentes_cabina.tipo_accidente,
            accidentes_cabina.servicio,
            accidentes_cabina.grua,
            accidentes_cabina.no_de_spublico
    FROM
            accidentes_cabina
            $where
    ORDER BY
            id DESC";
$paging = new PHPPaging($link);
$paging->div('resultado');
$paging->agregarConsulta($sqlquery);
$paging->porPagina(20);
$paging->ejecutar();
?>
<div  class="encabezado">RESULTADO</div>
<div  style="width:100%; overflow: auto; scrollbar:#6cb9ff;">
    <table width="100%" border="1" cellpadding="0" cellspacing="0">
        <tr style="background-color: #006a91;color: #fff;">
            <th>Opcion</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Folio</th>
            <th>Comandancia</th>
            <th>Lugar</th>
            <th>Agente</th>
            <th>Tipo Evento</th>
        </tr>
        <?PHP
        while ($row = $paging->fetchResultado()) {
            ?>
            <tr>
                <td>
                    <a href="#" onclick="edit_folio(<?= $row['id']; ?>);" title="EDITAR EVENTO"><img src="img/editar.png"></a>
                    <a href="#" onclick="delete_folio(<?= $row['id']; ?>);" title="ELIMINAR EVENTO"><img src="img/eliminar.png"></a>
                    <a href="#" onclick="view_folio(<?= $row['id']; ?>);" title="VER EVENTO"><img src="img/ver.png"></a>
                </td>
                <td><?= $row['fecha']; ?></td>
                <td><?= $row['hora']; ?></td>
                <td><?= $row['folio_evento']; ?></td>
                <td><?= $row['comandancia']; ?></td>
                <td><?= $row['calle1']; ?></td>
                <td><?= $row['nombre_agente']; ?></td>
                <td><?= $row['tipo_evento']; ?></td>
            </tr>
            <?PHP
        }
        ?>
    </table>   
</div>
<center>
    <div style="margin: 10px 0 0 0;">
        <?php
        echo "RESULTADOS: $paging->numTotalRegistros <br/><br/>";
        echo 'Paginas ' . $paging->fetchNavegacion();
        ?>
    </div>
</center>
<script type="text/javascript">
    function fn_paginar(var_div, url) {
        var form = $('#frm_busqueda').serialize();
        var div = $("#" + var_div);
        $("#cargando").show();
        $.ajax({
            url: url,
            type: 'post',
            //data: datospost,
            data: form,
            success: function (data) {
                div.html(data);
                $("#cargando").hide();
            }
        });
    }
    function edit_folio(folio) {
        $('#contenido').load('views/tm_control_eventos.php', {folio: folio, control: 1});
    }
    function view_folio(folio) {
        $('#contenido').load('views/tm_control_eventos.php', {folio: folio, control: 2});
    }
    function delete_folio(folio) {
        alertify.confirm("SIOSP - TRANSITO", "¿Está seguro de eliminar el folio " + folio + "?", function () {
            alertify.alert("Folio " + folio + " eliminado");
        }, function () {

        });
    }
</script>