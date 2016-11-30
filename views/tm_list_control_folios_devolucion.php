<?php
require_once '../class/con_mysql.php';
require_once '../class/PHPPaging.lib.php';
$mysql = new con_mysql();
$link = $mysql->conexion();
$where = "";


if (trim($_REQUEST['nombre']) != '') {
    $where .= " AND folinv_block.nombre_recibido LIKE '%" . trim($_REQUEST['nombre']) . "%' ";
}

if (trim($_REQUEST['folio']) != '') {
    $where .= " AND folinv_block.folio_inicial <= '" . trim($_REQUEST['folio']) . "' AND folinv_block.folio_final >= '" . trim($_REQUEST['folio']) . "' ";
}

if ($_REQUEST['tipo'] != '') {
    $where .= " AND folinv_block.tipo = '" . $_REQUEST['tipo'] . "' ";
}

if ($_REQUEST['pension'] != '') {
    $where .= " AND folinv_block.pension_id = '" . $_REQUEST['pension'] . "' ";
}

if (trim($_REQUEST['fecha']) != '') {
    $where .= " AND folinv_block.fecha_recibido BETWEEN '" . trim($_REQUEST['fecha']) . " 00:00:00' AND '" . trim($_REQUEST['fecha']) . " 23:59:59' ";
}

// Datos paginador
$sqlquery = "
    SELECT
            folinv_block.id,
            folinv_block.nombre_recibido,
            folinv_block.folio_inicial,
            folinv_block.folio_final,
            folinv_block.fecha_recibido,
            folinv_block.usuario,
            folinv_block.activo,
            folinv_block.pension_id,
            folinv_block.tipo,
            cat_pension.nombre_pension
    FROM
            folinv_block
    INNER JOIN cat_pension ON folinv_block.pension_id = cat_pension.id
    WHERE
            1  
            $where";
$paging = new PHPPaging($link);
$paging->div('resultado');
$paging->agregarConsulta($sqlquery);
$paging->porPagina(20);
$paging->ejecutar();
?>
<div  class="encabezado">
    RESULTADO
</div>

<div  style="width:100%; overflow: auto; scrollbar:#6cb9ff;">

    <table width="100%" border="1" cellpadding="0" cellspacing="0" style="text-align: center;">
        <tbody> 
            <tr style="background-color: #006a91;color: #fff;">
                <th>Opcion</th>
                <th>Nombre</th>
                <th>Pension</th>
                <th>Folio inicial</th>
                <th>Folio final</th>
                <th>Fecha</th>
                <th>Tipo</th>
            </tr>
            <?PHP
            while ($row = $paging->fetchResultado()) {
                ?>
                <tr>
                    <td style="padding: 20px;">
                        <a href="#" title="EDITAR PARTE"><img src="img/editar.png"></a>
                        <a href="#" title="ELIMINAR PARTE"><img src="img/eliminar.png"></a>
                        <a href="#" title="VER PARTE"><img src="img/ver.png"></a>
                    </td>
                    <td style="vertical-align: middle;"><?= $row['nombre_recibido']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['nombre_pension']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['folio_inicial']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['folio_final']; ?></td>                
                    <td style="vertical-align: middle;"><?= explode(' ', $row['fecha_recibido'])[0]; ?></td>
                    <td style="vertical-align: middle;"><?= $row['tipo']; ?></td>
                </tr>
                <?PHP
            }
            ?>
        </tbody>
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
<?php
$mysql->close();
?>