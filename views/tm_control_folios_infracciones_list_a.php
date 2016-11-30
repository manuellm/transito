<?php

    require_once '../class/con_mysql.php';
    require_once '../class/PHPPaging.lib.php';
    $mysql = new con_mysql();
    $link = $mysql->conexion();
    $where = "";
    
    if (trim($_REQUEST['numero_block']) != '') 
    {
        $where .= " 
            and
                infracciones_block.id = '" . trim($_REQUEST['numero_block']) . "' ";
    }
    
    if (trim($_REQUEST['numero_cobro']) != '') 
    {
        $where .= " 
                and
                    infracciones_block.id_agente = " . trim($_REQUEST['numero_cobro']);
        
    }
    
    if (trim($_REQUEST['folio']) != '') 
    {
        $where .= " 
                and
                    (infracciones_block.folio_inicial <= ".trim($_REQUEST['folio'])." "
                . " and "
                . "infracciones_block.folio_final >= " .trim($_REQUEST['folio'])." )"; 
    }
    
    if(trim($_REQUEST['']) != '')
    {
        $where .= "
                and 
                    infracciones_block.fecha BETWEEN '" . $_REQUEST['f1'] . " 00:00:00' and '" . $_REQUEST['f1']." 23:59:59' ";           
    }
    
    if($_REQUEST['estatus'] != 0)
    {
        $where .= "
                and
                    infracciones_block.activo = ".$_REQUEST['estatus'] ;
    }
    
    $query =" 
            SELECT
                infracciones_block.id,
                infracciones_block.id_agente,
                infracciones_block.folio_inicial,
                infracciones_block.folio_final,
                infracciones_block.fecha_recibido,
                infracciones_block.tipo,
                infracciones_block.activo,
                count(*) as uso, 
                (folio_final - folio_inicial) as cuantos
            FROM
                infracciones_block
            JOIN infracciones_folioinfraccion ON infracciones_block.id = infracciones_folioinfraccion.block_id
            where
                1
                and
                    infracciones_folioinfraccion.status = 'CAPTURADO'
                $where
            GROUP BY
                infracciones_block.id
            ORDER BY
                infracciones_block.id DESC

            ";

    $paging = new PHPPaging($link);
    $paging->div('resultado');
    $paging->agregarConsulta($query);
    $paging->porPagina(20);
    $paging->ejecutar();
    
?>


<div  class="encabezado">
    Resultado
</div>
<div style="padding: 10px;">
    <!--
    <input type="image" width="50" src="img/xlsx.png" title="Exportar excel"/>
    <input type="image" width="50" src="img/pdf_logo.png" title="Exportar PDF"/>
    -->
</div>
<div  style="width:100%; overflow: auto; scrollbar:#6cb9ff;">
    <table width="100%" border="1" cellpadding="0" cellspacing="0">
        <tbody> 
            <tr style="background-color: #006a91;color: #fff;">
                <th>No.</th>                  
                <th>Opciones</th>
                <th>Cobro</th>
                <th>Folio inicial</th>
                <th>Folio final</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Uso</th>
            </tr>            
            <?PHP
            while ($row = $paging->fetchResultado()) {
                ?>
                <tr>
                    <td>
                        <?= $row['id']; ?>
                    </td>
                    <td>
                        <a href="#" title="VER INFRACCION"><img src="img/ver.png"></a>
                        <a href="#" title="VER INFRACCION"><img src="img/ver.png"></a>
                    </td>	              
                    <td><?= $row['id_agente']; ?></td>
                    <td><?= $row['folio_inicial']; ?></td>
                    <td><?= $row['folio_final']; ?></td>                
                    <td><?= $row['fecha_recibido']; ?></td>
                    <td><?= $row['tipo']; ?></td>
                    <td><?= $row['uso'] . " de ". $row['cuantos'] ?></td>
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
