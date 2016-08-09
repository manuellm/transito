<?PHP
require_once '../class/con_mysql.php';
require_once '../class/PHPPaging.lib.php';
$mysql = new con_mysql();
$link = $mysql->conexion();
$where = "";
if (trim($_REQUEST['nombre_les']) != '') {
    $where .= " 
            WHERE
                accidentes_saldosangre.nombre LIKE '%" . trim($_REQUEST['nombre_les']) . "%' ";
}
if (trim($_REQUEST['anio_les']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_saldosangre.edad = '" . trim($_REQUEST['anio_les']) . "' ";
    } else {
        $where .= " 
            AND
                accidentes_saldosangre.edad = '" . trim($_REQUEST['anio_les']) . "' ";
    }
}
if (trim($_REQUEST['domicilio_les']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_saldosangre.domicilio LIKE '%" . trim($_REQUEST['domicilio_les']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_saldosangre.domicilio LIKE '%" . trim($_REQUEST['domicilio_les']) . "%' ";
    }
}
if (trim($_REQUEST['traslado_les']) != '') {
    if ($where == '') {
        $where .= " 
            WHERE
                accidentes_saldosangre.trasladado_a LIKE '%" . trim($_REQUEST['traslado_les']) . "%' ";
    } else {
        $where .= " 
            AND
                accidentes_saldosangre.trasladado_a LIKE '%" . trim($_REQUEST['traslado_les']) . "%' ";
    }
}
	
	
	

// Datos paginador
$sqlquery = "
    SELECT
            accidentes_saldosangre.id,
            accidentes_saldosangre.nombre,
            accidentes_saldosangre.edad,
            accidentes_saldosangre.domicilio,
            accidentes_saldosangre.estado_herido,
            accidentes_saldosangre.levantado_por,
            accidentes_saldosangre.se_encontraba,
            accidentes_saldosangre.trasladado_a,
            accidentes_saldosangre.accidente_id,
            accidentes_saldosangre.nacionalidad,
            accidentes_saldosangre.disposicion,
            accidentes_saldosangre.sexo
    FROM
            accidentes_saldosangre
    $where
    ORDER BY
            accidentes_saldosangre.id DESC";
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
            <th>Años</th>
            <th>Domicilio</th>
            <th>Traslado a</th>                  
        </tr>        
        <?PHP
        while ($row = $paging->fetchResultado()) {
            ?>
            <tr>
                <td style="padding: 20px;">
                    <a href="#" title="PARTE FRONTAL"><img src="img/ver.png"></a>
                    <a href="#" title="PARTE POSTERIOR"><img src="img/ver.png"></a>
                    <a href="#" title="DATOS DE LA PERSONA"><img src="img/pers.png"></a>
                </td>
                <td style="vertical-align: middle;"><?= $row['nombre']; ?></td>
                <td style="vertical-align: middle;"><?= $row['edad']; ?></td>
                <td style="vertical-align: middle;"><?= $row['domicilio']; ?></td>
                <td style="vertical-align: middle;"><?= $row['trasladado_a']; ?></td>
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