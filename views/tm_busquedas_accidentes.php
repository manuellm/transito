<div class="titulo">ACCIDENTES / BUSQUEDAS</div>
<div class="interior">
    <div  class="encabezado">
        BUSQUEDAS
    </div>
    <div>      
        <label><input type="radio" name="tipo_attach" onclick="toggle(this)" value="a" checked> Conductor</label><br/>
        <label><input type="radio" name="tipo_attach" onclick="toggle(this)" value="b"> Lesionado</label><br/>
        <label><input type="radio" name="tipo_attach" onclick="toggle(this)" value="c"> Detenido</label><br/>
        <label><input type="radio" name="tipo_attach" onclick="toggle(this)" value="d"> Vehiculo</label><br/>
        <label><input type="radio" name="tipo_attach" onclick="toggle(this)" value="e"> Lista de accidentes</label>
    </div>
    <form id="frm_busqueda">
        <div id="uno" style="display:block">
            <div  class="encabezado">
                BUSQUEDA POR CONDUCTOR
            </div>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Nombre:</td>                    
                    <td>Apellido paterno:</td>
                    <td>Apellido materno:</td>
                </tr>
                <tr>
                    <td><input type="text" class="" id="nombre_con" name="nombre_con"/></td>                    
                    <td><input type="text" class="" id="ap_con" name="ap_con"/></td>
                    <td><input type="text" class="" id="am_con" name="am_con"/></td>
                </tr>
                <tr>
                    <td>Calle:</td>
                    <td>Colonia:</td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" class="" id="calle_con" name="calle_con"/></td>
                    <td><input type="text" class="" id="colonia_con" name="colonia_con"/></td>
                    <td>
                    </td>
                </tr>
            </table>
        </div>
        <div id="dos" style="display:none">
            <div  class="encabezado">
                LESIONADO
            </div>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Nombre:</td>                    
                    <td>Años:</td>
                    <td>Domicilio:</td>
                </tr>
                <tr>
                    <td><input type="text" class="" id="nombre_les" name="nombre_les" /></td>                    
                    <td><input type="text" class="numero" id="anio_les" name="anio_les" /></td>
                    <td><input type="text" class="" id="domicilio_les" name="domicilio_les" /></td>
                </tr>
                <tr>
                    <td>Traslado a:</td>
                    <td></td>
                    <td></td>                    
                </tr>
                <tr>
                    <td><input type="text" class="" id="traslado_les" name="traslado_les" /></td>
                    <td></td>
                    <td></td>                    
                </tr>
            </table>
        </div>
        <div id="tres" style="display:none">
            <div  class="encabezado">
                DETENIDO
            </div>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Nombre:</td>                    
                    <td>Años:</td>                    
                    <td>Domicilio:</td>
                </tr>
                <tr>
                    <td><input type="text" class="" id="nombre_det" name="nombre_det"/></td>                    
                    <td><input type="text" class="numero" id="anio_det" name="anio_det"/></td>

                    <td><input type="text" class="" id="domicilio_det" name="domicilio_det"/></td>
                </tr>
                <tr>
                    <td>Detenido en:</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" class="" id="detenido_det" name="detenido_det"/></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div id="cuatro" style="display:none">
            <div  class="encabezado">
                VEHICULO
            </div>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Marca:</td>                    
                    <td>Submarca:</td>
                    <td>Placas:</td>
                </tr>
                <tr>
                    <td><input type="text" class="" id="marca" name="marca"></td>                    
                    <td><input type="text" class="" id="submarca" name="submarca"></td>
                    <td><input type="text" class="" id="placas" name="placas"></td>
                </tr>

                <tr>
                    <td>Serie:</td>
                    <td>No economico:</td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" class="" id="serie" name="serie"></td>
                    <td><input type="text" class="" id="noeconomico" name="noeconomico"></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div id="cinco" style="display:none">
            <div  class="encabezado">
                LISTA DE ACCIDENTES
            </div>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">                
                <tr>
                    <td>Folio:</td>
                    <td>Calle:</td>           
                    <td>Colonia:</td>
                </tr>
                <tr>
                    <td><input type="text" class="numero" id="folio_la" name="folio_la"/></td>
                    <td><input type="text" class="" id="calle_la" name="calle_la"/></td>
                    <td><input type="text" class="" id="colonia_la" name="colonia_la"/></td>
                </tr>
                <tr>
                    <td>Fecha desde:</td>                    
                    <td>Fecha hasta:</td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" class="" id="f1" name="f1"/></td>                    
                    <td><input type="text" class="" id="f2" name="f2"/></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <br/>
        <input type="hidden" value="a" id="ck_busqueda" name="ck_busqueda"/>
        <input type="button" id="btn_buscar" value="Buscar"/>
    </form>
    <div id="resultado">
    </div>
    <script src="js/siosp/views/tm_busquedas_accidentes.js" type="text/javascript"></script>