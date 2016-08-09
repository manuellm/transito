<?PHP
require_once '../class/con_mysql.php';
require_once '../class/PHPPaging.lib.php';
$mysql = new con_mysql();
$link = $mysql->conexion();
$where = "";
if (trim($_REQUEST['nombre_det']) != '') {
    $where .= " 
            WHERE
                accidentes_competenciajudicial.nombre LIKE '%" . trim($_REQUEST['nombre_det']) . "%' ";
}
if (trim($_REQUEST['anio_det']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_competenciajudicial.edad LIKE '%" . trim($_REQUEST['anio_les']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_competenciajudicial.edad LIKE '%" . trim($_REQUEST['anio_les']) . "%' ";
    }
}
if (trim($_REQUEST['domicilio_det']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_competenciajudicial.domicilio LIKE '%" . trim($_REQUEST['domicilio_det']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_competenciajudicial.domicilio LIKE '%" . trim($_REQUEST['domicilio_det']) . "%' ";
    }
}
if (trim($_REQUEST['detenido_det']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_competenciajudicial.detenido_en LIKE '%" . trim($_REQUEST['detenido_det']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_competenciajudicial.detenido_en LIKE '%" . trim($_REQUEST['detenido_det']) . "%' ";
    }
}




// Datos paginador
$sqlquery = "
    SELECT
            accidentes_competenciajudicial.id,
            accidentes_competenciajudicial.detenido_en,
            accidentes_competenciajudicial.disposicion,
            accidentes_competenciajudicial.domicilio,
            accidentes_competenciajudicial.edad,
            accidentes_competenciajudicial.estado_herido,
            accidentes_competenciajudicial.nombre,
            accidentes_competenciajudicial.se_encontraba,
            accidentes_competenciajudicial.accidente_id,
            accidentes_competenciajudicial.sexo
    FROM
            accidentes_competenciajudicial
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
    <table width="100%" border="1" cellpadding="0" cellspacing="0"> 
        <tr style="background-color: #006a91;color: #fff;">
            <th>Opcion</th>
            <th>Nombre</th>
            <th>Años</th>
            <th>Domicilio</th>
            <th>Detenido</th>                  
        </tr>
        <?PHP
        while ($row = $paging->fetchResultado()) {
            ?>
            <tr>
                <td style="padding: 20px; text-align: center; vertical-align: middle;">
                    <a href="#" title="PARTE FRONTAL"><img src="img/ver.png"></a>
                    <a href="#" title="PARTE POSTERIOR"><img src="img/ver.png"></a>
                    <a href="#" title="DATOS DEL DETENIDO"><img src="img/pers.png"></a>
                </td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['nombre']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['edad']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['domicilio']; ?></td>
                <td style="vertical-align: middle; text-align: center;"><?= $row['detenido_en']; ?></td>
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