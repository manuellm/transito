<?php
require_once '../class/con_mysql.php';
require_once '../class/PHPPaging.lib.php';
$mysql = new con_mysql();
$link = $mysql->conexion();
$where = "";

if (trim($_REQUEST['nombre']) != '') {
    $where .= " AND infracciones_infractor.nombre LIKE '%" . trim($_REQUEST['nombre']) . "%' ";
}
if (trim($_REQUEST['app']) != '') {
    $where .= " AND infracciones_infractor.appPat LIKE '%" . trim($_REQUEST['app']) . "%' ";
}
if (trim($_REQUEST['apm']) != '') {
    $where .= " AND infracciones_infractor.appMat LIKE '%" . trim($_REQUEST['apm']) . "%' ";
}
if (trim($_REQUEST['domicilio']) != '') {
    $where .= " AND infracciones_infractor.domicilio LIKE '%" . trim($_REQUEST['domicilio']) . "%' ";
}



// Datos paginador
$sqlquery = "
    SELECT
            infracciones_infractor.nombre,
            infracciones_infractor.appPat,
            infracciones_infractor.appMat,
            infracciones_infractor.domicilio,
            infracciones_infractor.colonia
    FROM
            infracciones_infractor
    WHERE 1 $where ORDER BY id DESC ";
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
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apelido materno</th>
                <th>Domicilio</th>
                <th>Colonia</th>                  
            </tr>         
            <?PHP
            while ($row = $paging->fetchResultado()) {
                ?>
            <tr>
                <td  style="padding: 20px;">
                    <a href="#" title="DATOS DEL INFRACTOR"><img src="img/pers.png"></a>
                    <a href="#" title="FRENTE INFRACCION"><img src="img/ver.png"></a>
                </td>
                <td style="vertical-align: middle;"><?= $row['nombre']; ?></td>
                <td style="vertical-align: middle;"><?= $row['appPat']; ?></td>
                <td style="vertical-align: middle;"><?= $row['appMat']; ?></td>
                <td style="vertical-align: middle;"><?= $row['domicilio']; ?></td>                
                <td style="vertical-align: middle;"><?= $row['colonia']; ?></td>                  
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