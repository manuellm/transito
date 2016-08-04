<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo '<script>MatarSession();</script>';
    exit(0);
}
?>
<div class="titulo">ACCIDENTES / BUSQUEDA DE EVENTOS</div><br/>
<div class="interior">
    <form action="" id="frm_busqueda"> 
        <div  class="encabezado">
            FILTRO
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>Folio:</td>                    
                <td>Unidad:</td>               
                <td>No Cobro:</td>
            </tr>
            <tr>
                <td><input type="text" class="numero" id="folio" name="folio"/></td>                    
                <td><input type="text" class="numero" id="unidad" name="unidad"/></td>                
                <td><input type="text" class="numero" id="nocobro" name="nocobro"/></td>
            </tr>
            <tr>
                <td>Fecha desde:</td>                    
                <td>Fecha Hasta:</td>
                <td></td>
            </tr>
            <tr>
                <td><input type="text" id="f1" name="f1"/></td>                    
                <td><input type="text" id="f2" name="f2"/></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="button" id="btn_buscar" value="Buscar">
                </td>
            </tr>
        </table>
    </form>
    <div id="resultado"></div>    
</div>
<script src="js/siosp/views/tm_busqueda_eventos.js" type="text/javascript"></script>