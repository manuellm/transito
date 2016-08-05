<div class="titulo">ACCIDENTES / LISTADO PARTES</div>
<div class="interior">
    <form id="frm_busqueda">
        <div  class="encabezado">
            FILTRO
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0"> <tr>
                <td>Folio:</td>
                <td>Status:</td>
                <!--<td>Delegacion:</td>-->
                <td></td>
            </tr>
            <tr>
                <td>
                    <input type="text" class="numero" id="folio" name="folio">
                </td>
                <td>
                    <select id="status" name="status">
                        <option value="2">TODOS</option>
                        <option value="1">ACTIVOS</option>
                        <option value="0">INACTIVOS</option>
                    </select>
                </td>
                <td>
<!--                    <select>
                        <option value=""> -- Seleccione -- </option>
                    </select>-->
                </td>
            </tr>
<!--            <tr>
                <td>Comandancia:</td>
                <td>Turno:</td>
                <td></td>
            </tr>     
            <tr>
                <td>
                    <select>
                        <option value=""> -- Seleccione -- </option>
                    </select>
                </td>
                <td>
                    <select>
                        <option value=""> -- Seleccione -- </option>
                    </select>
                </td>
                <td>
            </tr>           -->
            <tr>
                <td>Fecha desde:</td>                    
                <td>Fecha Hasta:</td>
                <td></td>
            </tr>
            <tr>
                <td><input type="text" class="" id="f1" name="f1"/></td>                    
                <td><input type="text" class="" id="f2" name="f2"/></td>
                <td></td>
            </tr>
            <tr>              
                <td colspan="3">
                    <input type="button" class="" id="btn_buscar" value="Buscar"/>
                </td>
            </tr>
        </table>
    </form>
    <div id="resultado"></div>
</div>
<script src="js/siosp/views/tm_listado_eventos.js" type="text/javascript"></script>