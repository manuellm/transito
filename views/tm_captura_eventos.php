<div class="titulo">ACCIDENTES / CAPTURA PARTES</div><br>
<div>
    RADIO OPERACION <br>
    <strong>AGREGAR EVENTO</strong>
</div>

<div class="interior">
    <form action="" id="" method="POST">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <div  class="encabezado">
            DATOS GENERALES
        </div>
        <tbody>            
            <tr>
                <td>Folio propuesto:<br>
                    <input type="text" class="#" id=""></td>
                <td>
                    Delegacion: <br>
                    <select>
                    <option value=""> -- Seleccione -- </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Comandancia:<br>
                    <select>
                    <option value=""> -- Seleccione -- </option>
                    </select>
                </td>
                <td>
                    Turno: <br>
                    <select>
                    <option value=""> -- Seleccione -- </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Fecha:<br>
                    <input type="text" class="#" id="">
                </td>
                
                <td>Hora.<br>
                    <input type="text" class="#" id="">
                </td>
            </tr>
            <tr>
                <td>
                    Calificacion: <br>
                    <select>
                    <option value=""> -- Seleccione -- </option>
                    </select>
                </td>
                <td>
                    Tipo de choque: <br>
                    <select>
                    <option value=""> -- Seleccione -- </option>
                    </select>
                </td>
            </tr>    
            <tr>
                <td>Calle1:<br>
                    <input type="text" class="#" id="">
                </td>
                
                <td>Calle 2:<br>
                    <input type="text" class="#" id="">
                </td>
            </tr>
            <tr>     
                <td>Freante a numero:<br>
                    <input type="text" class="#" id="">
                </td>    
                <td>Colonia.<br>
                    <input type="text" class="#" id="">
                </td>
            </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <div  class="encabezado">
                <VAR>UBICACION</VAR>
            </div>
            <tr>                
                <td>Latitud:<br>
                    <input type="text" class="#" id="">
                </td>    
                <td>Longitud.<br>
                    <input type="text" class="#" id=""></td>
                <td>
            </tr>
            </tbody>
        </table><br>

        <div style="width: 100%;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.5918731244064!2d-101.72278118471066!3d21.128831385944288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bc090f8995309%3A0x4b71d5b0d447d75d!2sCalle+Arturo+Soto+Rangel+Nte.%2C+Residencial+el+Faro%2C+37353+Le%C3%B3n%2C+Gto.!5e0!3m2!1ses-419!2smx!4v1465929766198" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div><br>
        
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <td>Estado:<br>
                    <input type="text" class="#" id="">
                </td>    
                <td>Municipio:<br>
                    <input type="text" class="#" id=""></td>
                <td>
            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <div  class="encabezado">
                    <VAR>VEHICULOS Y CONDUCTORES INVOLUCRADOS</VAR>
                </div>
            </tbody>
        </table>
        <div  style="width:100%; overflow: auto; scrollbar:#6cb9ff;">
            <table width="100%" border="1" cellpadding="0" cellspacing="0">
                <tbody> 
                    <tr style="background-color: #006a91;color: #fff;">
                        <th>Opcion</th>
                        <th>I.C.</th>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Submarca</th>
                        <th>Tipo</th>
                        <th>Modelo</th>
                        <th>Color</th>
                    </tr>
                    <tr style="color: #CCC;">
                        <td>
                            <a href="#" title="EDITAR EVENTO"><img src="img/editar.png"></a>
                            <a href="#" title="ELIMINAR EVENTO"><img src="img/eliminar.png"></a>
                            <a href="#" title="VER EVENTO"><img src="img/ver.png"></a>
                        </td>
                        <td>I.C.</td>
                        <td>Placa</td>                        
                        <td>Marca</td>
                        <td>Submarca</td>
                        <td>Tipo</td>
                        <td>Modelo</td>
                        <td>Color</td>
                    </tr>
                 </tbody>
            </table>
        </div>
        <table width="100%">
            <div  class="encabezado">
                <VAR>VEHICULOS Y CONDUCTORES INVOLUCRADOS</VAR>
            </div>
                <tbody>
                    <tr>
                        <td>Gafete:<br>
                            <input type="text" class="#" id="">
                        </td>    
                        <td>Agente.<br>
                            <input type="text" class="#" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>Unidad:<br>
                            <input type="text" class="#" id="">
                        </td>    
                        <td>Sector.<br>
                            <input type="text" class="#" id="">
                        </td>
                    </tr>                       
                </tbody>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <div  class="encabezado">
                    COMPLEMENTARIOS
                </div>
                <tbody>
                    <tr>
                        <td>
                            Investigaciones:<br>
                            <textarea style="width: 97%;"></textarea>
                            </textarea>
                        </td>
                    </tr>
                </tbody>
            </table>   
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        
                        <input type="submit" value="Guardar">
                        <input type="submit" value="Cancelar">
                    </td>
                </tr>
            </tbody>
        </table>
        
    </form>
</div>