<div class="titulo">DEVOLUCIONES / CONTROL DE FOLIOS</div><br>
<div class="interior">
    <div  class="encabezado">CONTROL DE FOLIOS INVENTARIOS</div>
    <div>
        <input type="button" class="" id="btn_nuevo" value="+" style="font-size: 15px;">
    </div>
    <div  class="encabezado">FILTROS</div>
    <form id="frm_busqueda"> 
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>Nombre:</td>                    
                    <td>Folio:</td>
                    <td>Tipo:</td>
                </tr>
                <tr>
                    <td><input type="text" class="" id="nombre" name="nombre"/></td>                    
                    <td><input type="text" class="numero" id="folio" name="folio"/></td>
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
                    <td>Pension:</td>
                    <td>Fecha:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <select id="pension" name="pension" class="pension">
                            <option value=""> -- Seleccione -- </option>

                        </select>
                    </td>
                    <td><input type="text" class="" id="fecha" name="fecha"></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="button" class="" id="btn_buscar" value="Buscar">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <div id="resultado"> </div>
</div>
<script src="js/siosp/views/tm_control_folios_devolucion.js" type="text/javascript"></script>