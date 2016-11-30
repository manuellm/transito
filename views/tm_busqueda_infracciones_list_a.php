<?php
require_once '../class/con_mysql.php';
require_once '../class/PHPPaging.lib.php';
$mysql = new con_mysql();
$link = $mysql->conexion();
$where = "";


if (trim($_REQUEST['folio']) != '') {
    $where .= " AND infracciones_infraccion.folio = '" . trim($_REQUEST['folio']) . "' ";
}

if (trim($_REQUEST['f1']) != '' && trim($_REQUEST['f2'] != '')) {
    $where .= " AND infracciones_infraccion.fecha_infrac BETWEEN '" . trim($_REQUEST['f1']) . "' AND '" . trim($_REQUEST['f2']) . "' ";
}

if ($_REQUEST['estatus'] != '3') {
    $where .= " AND infracciones_infraccion.activo = '" . trim($_REQUEST['estatus']) . "' ";
}


// Datos paginador
$sqlquery = "
    SELECT
            infracciones_infraccion.folio,
            infracciones_infraccion.delegacion,
            infracciones_infraccion.comandancia,
            infracciones_infraccion.fecha_infrac,
            infracciones_infraccion.hora_infrac,
            infracciones_infraccion.servicio,
            infracciones_infraccion.useradd,
            infracciones_detalle.articulo,
            infracciones_detalle.parrafo,
            infracciones_infraccion.activo
    FROM
            infracciones_infraccion
    INNER JOIN infracciones_detalle ON infracciones_detalle.infraccion_id = infracciones_infraccion.id WHERE 1 $where ORDER BY fecha_infrac DESC";
$paging = new PHPPaging($link);
$paging->div('resultado');
$paging->agregarConsulta($sqlquery);
$paging->porPagina(20);
$paging->ejecutar();
?>
<div  class="encabezado">
    Resultado
</div>
<div style="padding: 10px;">
    <input type="image" width="50" src="img/xlsx.png" title="Exportar excel"/>
    <input type="image" width="50" src="img/pdf_logo.png" title="Exportar PDF"/>
</div>
<div  style="width:100%; overflow: auto; scrollbar:#6cb9ff;">
    <table width="100%" border="1" cellpadding="0" cellspacing="0" style="text-align: center;">
        <tbody> 
            <tr style="background-color: #006a91;color: #fff;">
                <th>Opcion</th>                  
                <th>Folio</th>
                <th>Delegación</th>
                <th>Comandancia</th>
                <th>Fecha</th>
                <th>Articulos</th>
                <th>Servicio</th>
                <th>Capturo</th>
            </tr>            
            <?PHP
            while ($row = $paging->fetchResultado()) {
                ?>
                <tr>
                    <td style="padding: 20px;">
                        <a href="#" title="VER INFRACCION"><img src="img/ver.png"></a>
                        <a href="#" title="VER INFRACCION"><img src="img/ver.png"></a>
                    </td>	              
                    <td style="vertical-align: middle;"><?= $row['folio']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['delegacion']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['comandancia']; ?></td>                
                    <td style="vertical-align: middle;"><?= $row['fecha_infrac']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['articulo']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['servicio']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['useradd']; ?></td>
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