<?PHP
require_once '../class/con_mysql.php';
require_once '../class/PHPPaging.lib.php';
$mysql = new con_mysql();
$link = $mysql->conexion();
$where = "";

if (trim($_REQUEST['folio_la']) != '') {
    $where .= " 
            WHERE
                accidentes_accidente.folio_accidente = '" . trim($_REQUEST['folio_la']) . "' ";
} else {
    if (trim($_REQUEST['calle_la']) != '') {
        $where .= " 
            WHERE
                accidentes_accidente.calle1 LIKE '%" . trim($_REQUEST['calle_la']) . "%' ";
    }
    if (trim($_REQUEST['colonia_la']) != '') {
        if ($where == '') {
            $where .= " 
            WHERE
                accidentes_accidente.colonia LIKE '%" . trim($_REQUEST['colonia_la']) . "%' ";
        } else {
            $where .= " 
            AND
                accidentes_accidente.colonia LIKE '%" . trim($_REQUEST['colonia_la']) . "%' ";
        }
    }
    if (trim($_REQUEST['f1']) != '' || trim($_REQUEST['f2']) != '') {
        if ($where == '') {
            $where .= " 
            WHERE
                accidentes_accidente.fecha BETWEEN '" . trim($_REQUEST['f1']) . "' AND '" . trim($_REQUEST['f2']) . "' ";
        } else {
            $where .= " 
            AND
                accidentes_accidente.fecha BETWEEN '" . trim($_REQUEST['f1']) . "' AND '" . trim($_REQUEST['f2']) . "' ";
        }
    }
}
// Datos paginador
$sqlquery = "
    SELECT
            accidentes_accidente.id,
            accidentes_accidente.calle1,
            accidentes_accidente.calle2,
            accidentes_accidente.calle3,
            accidentes_accidente.clasificacion,
            accidentes_accidente.colonia,
            accidentes_accidente.comandancia,
            accidentes_accidente.delegacion,
            accidentes_accidente.estado,
            accidentes_accidente.fecha,
            accidentes_accidente.folio_accidente,
            accidentes_accidente.frentea,
            accidentes_accidente.hora,
            accidentes_accidente.investigaciones,
            accidentes_accidente.latitud,
            accidentes_accidente.longitud,
            accidentes_accidente.municipio,
            accidentes_accidente.observaciones,
            accidentes_accidente.simbologia_croquis,
            accidentes_accidente.tipo_choque,
            accidentes_accidente.turno,
            accidentes_accidente.croquis,
            accidentes_accidente.activo,
            accidentes_accidente.cabina_id,
            accidentes_accidente.feccre,
            accidentes_accidente.fecmod,
            accidentes_accidente.useradd,
            accidentes_accidente.usermod,
            accidentes_accidente.id_unico,
            accidentes_accidente.folio_cabina_066,
            accidentes_cabina.gafete_agente,
            accidentes_cabina.nombre_agente
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
<div  class="encabezado">
    Resultado
</div>
<div  style="width:100%; overflow: auto; scrollbar:#6cb9ff;">
    <table width="100%" border="1" cellpadding="0" cellspacing="0" style="text-align: center;"> 

        <tr style="background-color: #006a91;color: #fff;">
            <th>Opcion</th>
            <th>Folio</th>
            <th>Fecha</th>
            <th>Cobro</th>
            <th>Agente</th>                  
            <th>Calle</th>                  
            <th>Colonia</th>                  
        </tr>        
        <?PHP
        while ($row = $paging->fetchResultado()) {
            ?>
            <tr>
                <td style="vertical-align: middle; padding: 20px;">
                    <a href="#" title="PARTE FRONTAL"><img src="img/ver.png"></a>
                    <a href="#" title="PARTE POSTERIOR"><img src="img/ver.png"></a>
                    <a href="#" title="DATOS DEL DETENIDO"><img src="img/pers.png"></a>
                </td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['folio_accidente']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['fecha']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['gafete_agente']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['nombre_agente']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['calle1']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['colonia']; ?></td>
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