<?PHP
require_once '../class/con_mysql.php';
require_once '../class/PHPPaging.lib.php';
$mysql = new con_mysql();
$link = $mysql->conexion();
$where = "";
if (trim($_REQUEST['nombre_con']) != '') {
    $where .= " 
            WHERE
                accidentes_conductorvehiculo.nombre = '" . trim($_REQUEST['nombre_con']) . "' ";
}
if (trim($_REQUEST['ap_con']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_conductorvehiculo.apepaterno LIKE '%" . trim($_REQUEST['ap_con']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_conductorvehiculo.apepaterno LIKE '%" . trim($_REQUEST['ap_con']) . "%' ";
    }
}
if (trim($_REQUEST['am_con']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_conductorvehiculo.apematerno LIKE '%" . trim($_REQUEST['am_con']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_conductorvehiculo.apematerno LIKE '%" . trim($_REQUEST['am_con']) . "%' ";
    }
}
if (trim($_REQUEST['calle_con']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_conductorvehiculo.calle LIKE '%" . trim($_REQUEST['calle_con']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_conductorvehiculo.calle LIKE '%" . trim($_REQUEST['calle_con']) . "%' ";
    }
}
if (trim($_REQUEST['colonia_con']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_conductorvehiculo.colonia LIKE '%" . trim($_REQUEST['colonia_con']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_conductorvehiculo.colonia LIKE '%" . trim($_REQUEST['colonia_con']) . "%' ";
    }
}
// Datos paginador
$sqlquery = "
    SELECT
            accidentes_conductorvehiculo.id,
            accidentes_conductorvehiculo.apematerno,
            accidentes_conductorvehiculo.apepaterno,
            accidentes_conductorvehiculo.calle,
            accidentes_conductorvehiculo.colonia,
            accidentes_conductorvehiculo.custodia,
            accidentes_conductorvehiculo.detenido_en,
            accidentes_conductorvehiculo.disposicion,
            accidentes_conductorvehiculo.edad,
            accidentes_conductorvehiculo.edo_licencia,
            accidentes_conductorvehiculo.estado,
            accidentes_conductorvehiculo.estado_droga,
            accidentes_conductorvehiculo.fecha_vigencia,
            accidentes_conductorvehiculo.levantado_por,
            accidentes_conductorvehiculo.municipio,
            accidentes_conductorvehiculo.nombre,
            accidentes_conductorvehiculo.num_licencia,
            accidentes_conductorvehiculo.rest_licencia,
            accidentes_conductorvehiculo.se_encontraba,
            accidentes_conductorvehiculo.sexo,
            accidentes_conductorvehiculo.tipo_edad,
            accidentes_conductorvehiculo.trasladado_a,
            accidentes_conductorvehiculo.vehiculo_id,
            accidentes_conductorvehiculo.estado_herido,
            accidentes_conductorvehiculo.tipo_licencia
    FROM
            accidentes_conductorvehiculo
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
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Calle</th>
                <th>Colonia</th>
            </tr>
            <?PHP
            while ($row = $paging->fetchResultado()) {
                ?>
                <tr>
                    <td style="padding: 20px;"><a href="#" title="PARTE FRONTAL"><img src="img/ver.png"></a>
                        <a href="#" title="PARTE POSTERIOR"><img src="img/ver.png"></a>
                        <a href="#" title="DATOS DEL VEHICULO"><img src="img/vehiculo.png"></a>
                    </td>
                    <td style="vertical-align: middle;"><?= $row['nombre']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['apepaterno']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['apematerno']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['calle']; ?></td>                
                    <td style="vertical-align: middle;"><?= $row['colonia']; ?></td>
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
</script>