<?php
require_once '../class/con_mysql.php';
require_once '../class/PHPPaging.lib.php';
$mysql = new con_mysql();
$link = $mysql->conexion();
$where = "";

if (trim($_REQUEST['marca']) != '') {
    $where .= " infracciones_vehiculo.marca LIKE '%" . trim($_REQUEST['marca']) . "%' ";
}
if (trim($_REQUEST['submarca']) != '') {
    $where .= " AND infracciones_vehiculo.submarca LIKE '%" . trim($_REQUEST['submarca']) . "%' ";
}
if (trim($_REQUEST['placa']) != '') {
    $where .= " AND infracciones_vehiculo.placas LIKE '%" . trim($_REQUEST['placa']) . "%' ";
}
if (trim($_REQUEST['serie']) != '') {
    $where .= " AND infracciones_vehiculo.serie LIKE '%" . trim($_REQUEST['serie']) . "%' ";
}

// Datos paginador
$sqlquery = "
    SELECT
            infracciones_vehiculo.marca,
            infracciones_vehiculo.submarca,
            infracciones_vehiculo.placas,
            infracciones_vehiculo.serie
    FROM
            infracciones_vehiculo
    WHERE 1 $where 
    ORDER BY
            infracciones_vehiculo.id DESC";
$paging = new PHPPaging($link);
$paging->div('resultado');
$paging->agregarConsulta($sqlquery);
$paging->porPagina(20);
$paging->ejecutar();
?>
<div  class="encabezado">
    Resultados
</div>
<div style="width:100%; overflow: auto; scrollbar:#6cb9ff;">
    <table width="100%" border="1" cellpadding="0" cellspacing="0" style="text-align: center;">
        <tbody> 
            <tr style="background-color: #006a91;color: #fff;">
                <th>Opcion</th>
                <th>Marca</th>
                <th>Submarca</th>
                <th>Placas</th>
                <th>Serie</th>                                   
            </tr>     
            <?PHP
            while ($row = $paging->fetchResultado()) {
                ?>
            <tr>
                <td style="padding: 20px;">
                    <a href="#" title="DATOS DEL VEHICULO"><img src="img/vehiculo.png"></a>
                    <a href="#" title="INFRACCION"><img src="img/ver.png"></a>
                </td>
                <td style="vertical-align: middle;"><?= $row['marca']; ?></td>
                <td style="vertical-align: middle;"><?= $row['submarca']; ?></td>
                <td style="vertical-align: middle;"><?= $row['placa']; ?></td>
                <td style="vertical-align: middle;"><?= $row['serie']; ?></td>                                                   
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