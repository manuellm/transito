<?php
session_start();
?>
<div class="titulo">DEVOLUCIONES / AGREGANDO BLOCK</div><br>
<div class="interior">
    <div  class="encabezado">NUEVO BLOCK</div>
    <form id="frm_captura"> 
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>Nombre:</td>                    
                    <td>Pension:</td>                   
                    <td>Tipo:</td>
                </tr>
                <tr>
                    <td><input type="text" class="" id="nombre_recibido" name="nombre_recibido"/></td>                    
                    <td>
                        <select id="pension_id" name="pension_id" class="pension">
                            <option value=""> -- Seleccione -- </option>
                        </select>
                    </td>                   
                    <td>
                        <select id="tipo" name="tipo">
                            <option value=""> -- Seleccione -- </option>
                            <option value="BICICLETA">BICICLETA</option>
                            <option value="MOTO">MOTO</option>
                            <option value="VEHICULO">VEHICULO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Folio inicial:</td>
                    <td>Folio final:</td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" class="numero" id="folio_inicial" name="folio_inicial"/></td>
                    <td><input type="text" class="numero" id="folio_final" name="folio_final"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="button" class="" id="btn_guardar" value="Guardar"/>&nbsp;&nbsp;&nbsp;
                        <input type="button" class="" id="btn_cancelar" value="Cancelar"/>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="usuario" value="<?= $_SESSION['user']; ?>"/>
        <input type="hidden" name="opc" value="4"/>
        <input type="hidden" name="activo" value="1"/>
    </form>
</div>
<script src="js/siosp/views/tm_captura_folios_devolucion.js" type="text/javascript"></script>