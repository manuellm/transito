<div class="titulo">INFRACCIONES / BUSQUEDAS</div><br>
<div>      
    <input type="radio" name="tipo_attach" onclick="toggle(this)" value="a" checked> INFRACCIONES <br>
    <input type="radio" name="tipo_attach" onclick="toggle(this)" value="b"> CONDUCTOR <br>
    <input type="radio" name="tipo_attach" onclick="toggle(this)" value="c"> VEHICULO <br> 
</div>
<div class="interior">
    <form id="frm_busqueda"> 
        <div id="uno" style="display:block">
            <div  class="encabezado">
                INFRACCIONES
            </div>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Folio:</td>
                        <td>Fecha desde:</td>                    
                        <td>Fecha hasta:</td>
                        <td>Status:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="numero" id="folio" name="folio"/></td>
                        <td><input type="text" class="" id="f1" name="f1" value="<?= date('Y-m-d'); ?>"/></td>                    
                        <td><input type="text" class="" id="f2" name="f2" value="<?= date('Y-m-d'); ?>"/></td>
                        <td>
                            <select id="estatus" name="estatus">
                                <option value="1">ACTIVOS</option>
                                <option value="0">INACTIVOS</option>
                                <option value="2">SIN REFERENCIA</option>
                                <option value="3">TODOS</option>
                            </select>
                        </td>
                    </tr>  
                </tbody>
            </table>
        </div>
        <div id="dos" style="display:none">
            <div  class="encabezado">
                CONDUCTOR
            </div>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Nombre:</td>                    
                        <td>Apellido paterno:</td>                        
                        <td>Apellido materno:</td>
                        <td>Domicilio conductor:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="" id="nombre" name="nombre"/></td>                    
                        <td><input type="text" class="" id="app" name="app"/></td>
                        <td><input type="text" class="" id="apm" name="apm"/></td>
                        <td><input type="text" class="" id="domicilio" name="domicilio"/></td>
                    </tr>
                </tbody>
            </table>            
        </div>
        <div id="tres" style="display:none">
            <div  class="encabezado">
                VEHICULO
            </div>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Marca:</td>                    
                        <td>Submarca:</td>
                        <td>Placa:</td>
                        <td>Serie:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="" id="marca" name="marca"/></td>                    
                        <td><input type="text" class="" id="submarca" name="submarca"/></td>
                        <td><input type="text" class="" id="placa" name="placa"/></td>
                        <td><input type="text" class="" id="serie" name="serie"/></td>
                    </tr>
                </tbody>
            </table>            
        </div> 
        <br/>
        <input id="ck_busqueda" value="a" name="ck_busqueda" type="hidden">
        <input type="button" class="" id="btn_buscar" value="Buscar">
    </form>
    <div id="resultado">
    </div>
</div>
<script src="js/siosp/views/tm_busqueda_infracciones.js" type="text/javascript"></script>