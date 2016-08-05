<?PHP
require_once '../class/con_mysql.php';
require_once '../class/PHPPaging.lib.php';
$mysql = new con_mysql();
$link = $mysql->conexion();
$where = "";
if ($_REQUEST['folio'] != '') {
    $where .= " 
        WHERE
            accidentes_accidente.folio_accidente = '" . $_REQUEST['folio'] . "' ";
} else {
    if ($_REQUEST['status'] != '2') {
        $where .= " 
            WHERE
                accidentes_accidente.activo = '" . $_REQUEST['status'] . "' ";
    }
    if ($_REQUEST['f1'] != '' && $_REQUEST['f2'] != '') {
        if ($where == '') {
            $where .= " 
            WHERE
                accidentes_accidente.fecha BETWEEN '" . $_REQUEST['f1'] . "' AND '" . $_REQUEST['f2'] . "' ";
        } else {
            $where .= " 
            AND
                accidentes_accidente.fecha BETWEEN '" . $_REQUEST['f1'] . "' AND '" . $_REQUEST['f2'] . "' ";
        }
    }
}
// Datos paginador
$sqlquery = "
    SELECT
            accidentes_accidente.id,
            accidentes_accidente.folio_accidente,
            accidentes_accidente.fecha,
            accidentes_accidente.hora,
            accidentes_cabina.nombre_agente,
            accidentes_cabina.unidad,
            accidentes_cabina.clasificacion_de_accidente,
            accidentes_cabina.tipo_evento,
            accidentes_accidente.useradd
    FROM
            accidentes_accidente
    INNER JOIN accidentes_cabina ON accidentes_accidente.cabina_id = accidentes_cabina.id
            $where
    ORDER BY
            folio_accidente DESC";
$paging = new PHPPaging($link);
$paging->div('resultado');
$paging->agregarConsulta($sqlquery);
$paging->porPagina(20);
$paging->ejecutar();
?>
<div  class="encabezado">RESULTADO</div>
<a href="#"><img width="50" src="img/xlsx.png" title="Exportar excel"></a>
<div  style="width:100%; overflow: auto; scrollbar:#6cb9ff;">
    <table width="100%" border="1" cellpadding="0" cellspacing="0" style="text-align: center; vertical-align: middle;">
        <tr style="background-color: #006a91;color: #fff;">
            <th>Opcion</th>
            <th>Folio</th>
            <th>Fecha</th>
            <th>Agente</th>
            <th>Unidad</th>
            <th>Clasificación</th>
            <th>Evento</th>
            <th>Capturo</th>
        </tr>
        <?PHP
        while ($row = $paging->fetchResultado()) {
            ?>
            <tr>
                <td style="padding: 20px;">
                    <a href="#" title="EDITAR PARTE"><img src="img/editar.png"></a>
                    <a href="#" title="VER PARTE FRONTAL"><img src="img/ver.png"></a>
                    <a href="#" title="VER PARTE POSTERIOR"><img src="img/ver.png"></a><br/>
                    <a href="#" title="ELIMINAR PARTE"><img src="img/eliminar.png"></a>
                    <a href="#" title="VER PARTE"><img src="img/ver.png"></a>
                    <a href="#" title="VER PARTE"><img src="img/descargar.png"></a>
                </td>
                <td style="vertical-align:middle"><?= $row['folio_accidente']; ?></td>
                <td style="vertical-align:middle"><?= $row['fecha'] . ' ' . $row['hora']; ?></td>                
                <td style="vertical-align:middle"><?= $row['nombre_agente']; ?></td>                
                <td style="vertical-align:middle"><?= $row['unidad']; ?></td>
                <td style="vertical-align:middle"><?= $row['clasificacion_de_accidente']; ?></td>
                <td style="vertical-align:middle"><?= $row['tipo_evento']; ?></td>
                <td style="vertical-align:middle"><?= $row['useradd']; ?></td>
            </tr>
            <?php
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
</script>