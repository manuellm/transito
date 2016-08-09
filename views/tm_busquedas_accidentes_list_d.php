<?PHP
require_once '../class/con_mysql.php';
require_once '../class/PHPPaging.lib.php';
$mysql = new con_mysql();
$link = $mysql->conexion();
$where = "";
if (trim($_REQUEST['marca']) != '') {
    $where .= " 
            WHERE
                accidentes_vehiculo.marca LIKE '%" . trim($_REQUEST['marca']) . "%' ";
}
if (trim($_REQUEST['submarca']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_vehiculo.submarca LIKE '%" . trim($_REQUEST['submarca']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_vehiculo.submarca LIKE '%" . trim($_REQUEST['submarca']) . "%' ";
    }
}
if (trim($_REQUEST['placas']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_vehiculo.placa LIKE '%" . trim($_REQUEST['placas']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_vehiculo.placa LIKE '%" . trim($_REQUEST['placas']) . "%' ";
    }
}
if (trim($_REQUEST['serie']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_vehiculo.serie LIKE '%" . trim($_REQUEST['serie']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_vehiculo.serie LIKE '%" . trim($_REQUEST['serie']) . "%' ";
    }
}
if (trim($_REQUEST['noeconomico']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_vehiculo.num_economico LIKE '%" . trim($_REQUEST['noeconomico']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_vehiculo.num_economico LIKE '%" . trim($_REQUEST['noeconomico']) . "%' ";
    }
}
// Datos paginador
$sqlquery = "
    SELECT
            accidentes_vehiculo.id,
            accidentes_vehiculo.intervino_como,
            accidentes_vehiculo.capacidad,
            accidentes_vehiculo.clas_vehiculo,
            accidentes_vehiculo.color,
            accidentes_vehiculo.color_detalle,
            accidentes_vehiculo.datos_adicionales,
            accidentes_vehiculo.estadov,
            accidentes_vehiculo.folio_certificado_medico,
            accidentes_vehiculo.folio_infraccion,
            accidentes_vehiculo.marca,
            accidentes_vehiculo.modelo,
            accidentes_vehiculo.num_economico,
            accidentes_vehiculo.num_grua,
            accidentes_vehiculo.pension,
            accidentes_vehiculo.placa,
            accidentes_vehiculo.serie,
            accidentes_vehiculo.submarca,
            accidentes_vehiculo.tipo,
            accidentes_vehiculo.tipo_dueno,
            accidentes_vehiculo.vehiculo_servicio,
            accidentes_vehiculo.accidente_id,
            accidentes_vehiculo.numero_inventario,
            accidentes_vehiculo.dano
    FROM
            accidentes_vehiculo
    $where
    ORDER BY
            id DESC";
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
            <th>Marca</th>
            <th>Submarca</th>
            <th>Serie</th>
            <th>Placas</th>                  
            <th>No.Economico</th>                  
        </tr>
        <?PHP
        while ($row = $paging->fetchResultado()) {
            ?>
            <tr>
                <td style="padding: 20px; vertical-align: middle;">
                    <a href="#" title="PARTE FRONTAL"><img src="img/ver.png"></a>
                    <a href="#" title="PARTE POSTERIOR"><img src="img/ver.png"></a>
                    <a href="#" title="DATOS DEL DETENIDO"><img src="img/vehiculo.png"></a>
                </td>                
                <td style="vertical-align: middle; text-align: center;"><?= $row['marca']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['submarca']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['serie']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['placa']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['num_economico']; ?></td>
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