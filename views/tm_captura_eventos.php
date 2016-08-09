<style>
#floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

    </style>
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
                    <input type="text" id="lat" value="">
                </td>    
                <td>Longitud.<br>
                    <input type="text" id="lon" value="">
                </td>
            </tr>
            </tbody>
        </table><br>


    <div id="map" style="Width: 100%; height: 600px;"></div><br>
       
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
      
        <div  class="encabezado">
            <VAR>VEHICULOS Y CONDUCTORES INVOLUCRADOS</VAR>
        </div>
           
        <div  style="width:100%; overflow: auto; scrollbar:#6cb9ff;">
            <br><br>
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
                        <td>    </td>
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
                <div id="vehiculos" style="display:none">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>
                                      Interviene como:<br>
                                      <input type="text" class="#" id="">
                                    </td>                    
                                    <td>
                                        Clas. Vehículo:<br>
                                        <select>
                                        <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                        Marca:<br>
                                        <select>
                                        <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Submarca:<br>
                                        <select>
                                        <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>                   
                                    <td>
                                        Modelo:<br>
                                        <select>
                                        <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                        Tipo:<br>
                                        <select>
                                        <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      Datos adicionales:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Placas:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      No. Serie:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Color:<br>
                                        <select>
                                        <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                      Detalle del color:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                        Capacidad:<br>
                                        <select>
                                        <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Servicio:<br>
                                        <select>
                                        <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                      No. Eco:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                        Estado:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Estado:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table><br><br>
                        <h5>Datos de pencion</h5>
                        <div  class="encabezado">
                        </div>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td> <input type="checkbox" value="">Aplica</td>
                                </tr>
                                <tr>
                                    <td>
                                      No. de grua:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Estado:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                      No. de Inventario:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                </tr>
                            </tbody>
                        </table><br><br>
                        <h5>Datos del propietario</h5>
                        <div  class="encabezado">
                        </div>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td> <input type="radio" name="propietario" value=""> Nombre</td>
                                    <td> <input type="radio" name="propietario" value=""> Razón social</td>
                                </tr>
                                <tr>
                                    <td>
                                      Nombre(s) o Razón social:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Apellido paterno:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Apellido materno:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      Domicilio:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Telefono:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Codigo postal:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      colonia:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Municipio:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Estado:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                </tr>
                            </tbody>
                        </table><br><br>
                        <h5>Datos del conductor</h5>
                        <div  class="encabezado">
                        </div>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td colspan="2"><input type="checkbox" value=""> Active esta casilla si los datos del propietario son los mismos que los del conductor</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="datos_conductor" value=""> Huir del lugar de los echos</td>
                                    <td><input type="radio" name="datos_conductor" value=""> No proporciono</td>
                                </tr>
                                <tr>  
                                    <td><input type="radio" name="datos_conductor" value=""> Veh. Estacionado</td>
                                    <td><input type="radio" name="datos_conductor" value=""> Cancelar</td>
                                </tr>
                                <tr>
                                    <td>
                                      Nombre:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Apellido paterno:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Apellido materno:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      Domicilio:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Edad:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                        Sexo:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      Colonia:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Folio infracción:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Folio del certificado médico:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="estado_conductor" value=""> Ebriedad completa</td>
                                    <td><input type="radio" name="estado_conductor" value=""> Ebriedad incompleta</td>
                                    <td><input type="radio" name="estado_conductor" value=""> bajo influjo de drogas</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="estado_conductor" value=""> Estado normal</td>
                                    <td><input type="radio" name="estado_conductor" value=""> Inconsciente</td>
                                    <td><input type="radio" name="estado_conductor" value=""> Sin examen</td>
                                </tr>
                                <tr>
                                    <td>
                                        Estado:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                        Municipio:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                        Condiciones fisicas:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Detenido en:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                        En custodia de:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                        A  disposicion de:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        La persona se encontraba:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                        Levantado por:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                        Trasladado a:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      Folio infracción:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                        Tipo de licencia:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                        Restricciones:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      Vigencia:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Expedida por el Gob. del Estado de:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                </tr>                           
                            </tbody>
                        </table>
                        <input type="submit" class="#" id="" value="Aceptar">
                </div>
                <input type="button" id="agregar_vehiculos" value="Agregar"><br>
            <div  class="encabezado">
                <VAR>SALDO DE SANGRE</VAR>
            </div>
            <br><br>
            <table width="100%" border="1" cellpadding="0" cellspacing="0">
                <tbody> 
                    <tr style="background-color: #006a91;color: #fff;">
                        <th>Opcion</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Domicilio</th>
                        <th>Se encontraba</th>
                        <th>Edo. persona</th>
                        <th>Levantado por</th>
                        <th>Traslado a</th>
                    </tr>
                    <tr style="color: #CCC;">
                        <td>       </td>
                        <td>Nombre</td>
                        <td>Edad</td>
                        <td>Domicilio</td>
                        <td>Se encontraba</td>
                        <td>Edo. persona</td>
                        <td>Levantado por</td>
                        <td>Traslado a</td>
                    </tr>
                 </tbody>
            </table>
                <div id="saldo" style="display:none">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>
                                      Nombre:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Estado fisico:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                      Edad:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      Nacionalidad:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                      Domicilio:<br>
                                      <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                      Levantada por:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      Trasladado a:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                      Adisposicion de:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                      Se encontraba:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <input type="button" id="" value="Aceptar">
                </div>
                <input type="button" id="agregar_saldo" value="Agregar"><br>

            <div  class="encabezado">
                <VAR>COMPETENCIA JUDICIAL</VAR>
            </div><br><br>
            <table width="100%" border="1" cellpadding="0" cellspacing="0">
                <tbody> 
                    <tr style="background-color: #006a91;color: #fff;">
                        <th>Opcion</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Edo. persona</th>
                        <th>Se encontraba</th>
                        <th>Detenido</th>
                        <th>A disposición de</th>
                    </tr>
                    <tr style="color: #CCC;">
                        <td>       </td>
                        <td>Nombre</td>
                        <td>Dirección</td>
                        <td>Edo. persona</td>
                        <td>Se encontraba</td>
                        <td>Detenido</td>
                        <td>A disposición de</td>
                    </tr>
                 </tbody>
            </table>
                <div id="judicial" style="display:none">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                  Nombre:<br>
                                  <input type="text" class="#" id="">
                                </td>
                                <td>
                                  Estado fisico:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                                <td>
                                  Edad:<br>
                                  <input type="text" class="#" id="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                  Domicilio:<br>
                                  <input type="text" class="#" id="">
                                </td>
                                <td>
                                  Detenido en:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                                <td>
                                  A disposicion de:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                  Se encontraba:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>                                
                            </tr>
                        </tbody>
                    </table><br><br>
                    <h5>Intervino</h5><div  class="encabezado"></div>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    Gafete:<br>
                                    <input type="text" class="#" id="">
                                </td>
                                <td>
                                    Nombre:<br>
                                    <input type="text" class="#" id="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Unidad:<br>
                                    <input type="text" class="#" id="">
                                </td>
                                <td>
                                    Sector:<br>
                                    <input type="text" class="#" id="">
                                </td>
                            </tr>
                        </tbody>
                    </table><br><br>
                    <h5>Superviso</h5><div  class="encabezado"></div>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    Gafete:<br>
                                    <input type="text" class="#" id="">
                                </td>
                                <td>
                                    Agente:<br>
                                    <input type="text" class="#" id="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Unidad:<br>
                                    <input type="text" class="#" id="">
                                </td>
                                <td>
                                    Sector:<br>
                                    <input type="text" class="#" id="">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="button" id="" value="Aceptar">
                </div>
                <input type="button" id="agregar_judicial" value="Agregar"><br>
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
            
                <div  class="encabezado">
                    COMPLEMENTARIOS
                </div>
                <div>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td id="p_obserbaciones" style="border-bottom: solid 1px #dedddd; background: #dedddd;"><label><input type="radio" name="tipo_attach" onclick="toggle(this)" value="observaciones" style="display:none; background:" checked> Observaciones</label></td>
                                    <td id="p_ficha_tecnica" style="border-bottom: solid 1px #dedddd;"><label><input type="radio" name="tipo_attach" onclick="toggle(this)" value="ficha_tecnica" style="display:none;"> Ficha técnica</label></td>
                                    <td id="p_croquis" style="border-bottom: solid 1px #dedddd;"><label><input type="radio" name="tipo_attach" onclick="toggle(this)" value="croquis" style="display:none;"> Croquis</label></td>
                                    <td id="p_investigaciones" style="border-bottom: solid 1px #dedddd;"><label><input type="radio" name="tipo_attach" onclick="toggle(this)" value="investigaciones" style="display:none;"> Investigaciones</label></td>
                                    <td id="p_infracciones" style="border-bottom: solid 1px #dedddd;"><label><input type="radio" name="tipo_attach" onclick="toggle(this)" value="infracciones" style="display:none;"> Infracciones</label></td>
                                    <td id="p_fotografias" style="border-bottom: solid 1px #dedddd;"><label><input type="radio" name="tipo_attach" onclick="toggle(this)" value="fotografias" style="display:none;"> Fotografias</label></td>
                                </tr>
                            </tbody>
                    </table>                     
                </div>
                <div id="observaciones" style="display:block;">
                <br><br><br>
                    <textarea style="width: 97%; height: 200px;"></textarea>
                    </textarea>                               
                </div>
                <div id="ficha_tecnica" style="display:none">
                    <br><br><br>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    Visibilidad:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                                <td>
                                    Parte del dia:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                                <td>
                                    Tipo Calle:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    No de carriles:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                                <td>
                                    Sentido de calle:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table><br><br>
                    <h5>Estado del as calles</h5><div  class="encabezado"></div>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    Alineación:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                                <td>
                                    Estado del pavimento:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                                <td>
                                    Clima:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Regulación:<br>
                                    <select>
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table><br><br>
                    <h5>Daños acumulados</h5><div  class="encabezado"></div>
                    <table width="100%" border="1" cellpadding="0" cellspacing="0">
                        <tbody> 
                            <tr style="background-color: #006a91;color: #fff;">
                                <th>Opcion</th>
                                <th>Objeto</th>
                                <th>Tipo de daños</th>
                                <th>Dueño</th>
                                <th>Monto</th>
                                
                            </tr>
                            <tr style="color: #CCC;">
                                <td>       </td>
                                <td>Objeto</td>
                                <td>Tipo de daños</td>
                                <td>Dueño</td>
                                <td>Monto</td>
                            </tr>
                         </tbody>
                    </table>
                    
                    <div id="peritos" style="display: none;"><br><br>
                    <h6>Los daños de los objetos fijos serán valuados por peritos en la materia</h6><br><br>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>
                                        Objetos dañados:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                    <td>
                                        Tipo de daños:<br>
                                        <input type="text" class="#" id="">
                                    </td>
                                    <td>
                                        Dueño:<br>
                                        <select>
                                            <option value=""> -- Seleccione -- </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Monto:<br>
                                        <input type="text" class="#" id="">
                                    </td>
                                </tr>
                            </tbody>
                        </table><br>
                        <input type="button"  value="Agregar">
                    </div>
                    <input type="button" id="agregar_valuo" value="Agregar">
                </div>
                <div id="croquis" style="display:none">
                    <br><br><br>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    Simbología
                                    <textarea style="width: 97%; height: 300px;"></textarea>
                                </td>
                                <td>
                                    Croquis
                                    <div style="background-color: #ccc; width: 100%; height: 300px;"></div><br>
                                    <input type="file" class="#" id="">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="investigaciones" style="display:none">
                    <br><br><br>
                    <textarea style="width: 97%; height: 200px;"></textarea>
                    </textarea>
                </div>
                <div id="infracciones" style="display:none">
                    Articulo:<br>
                    <input type="text" class="#" id=""> <input type="submit" value=" + "><br><br>

                    <h6>Articulso Seleccionados</h6>
                    <table width="100%" border="1" cellpadding="0" cellspacing="0">
                        <tbody> 
                            <tr style="background-color: #006a91;color: #fff;">
                                <th>Opcion</th>
                                <th>Articulo</th>
                                <th>Fracción</th>
                                <th>Descripcion</th>                                
                            </tr>
                            <tr style="color: #CCC;">
                                <td>       </td>
                                <td>Articulo</td>
                                <td>Fracción</td>
                                <td>Descripcion</td>
                            </tr>
                         </tbody>
                    </table>
                </div>
                <div id="fotografias" style="display:none">
                    <div style="background-color: #ccc; width: 291px; height: 291px;"><br></div>
                    <input type="file" class="#" id=""> <br>
                </div><br><br><br>

            

        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        <input type="submit" value="Guardar">
                        <input type="submit" value="Cancelar">
                        <a href="#"><img width="30" src="img/pdf_logo.png"></a>
                        <a href="#"><img width="30" src="img/Download-128.png"></a>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </form>
</div>

<script type="text/javascript">

$(document).ready(function(){

    $("#agregar_vehiculos").on( "click", function() {    
        $('#vehiculos').toggle(function(){
                            $(".block").animate("slow");
                        });
            if(document.getElementById("agregar_vehiculos").value=="Agregar") {
                document.getElementById("agregar_vehiculos").value = "Cancelar";
            }           
            else if(document.getElementById("agregar_vehiculos").value=="Cancelar") {
                document.getElementById("agregar_vehiculos").value = "Agregar";
            }         
    });
    $("#agregar_saldo").on( "click", function() {    
        $('#saldo').toggle(function(){
                            $(".block").animate("slow");
                        });
            if(document.getElementById("agregar_saldo").value=="Agregar") {
                document.getElementById("agregar_saldo").value = "Cancelar";
            }           
            else if(document.getElementById("agregar_saldo").value=="Cancelar") {
                document.getElementById("agregar_saldo").value = "Agregar";
            }         
    });
    $("#agregar_judicial").on( "click", function() {    
        $('#judicial').toggle(function(){
                            $(".block").animate("slow");
                        });
            if(document.getElementById("agregar_judicial").value=="Agregar") {
                document.getElementById("agregar_judicial").value = "Cancelar";
            }           
            else if(document.getElementById("agregar_judicial").value=="Cancelar") {
                document.getElementById("agregar_judicial").value = "Agregar";
            }         
    });

    $("#agregar_valuo").on( "click", function() {    
        $('#peritos').toggle(function(){
                            $(".block").animate("slow");
                        });
            if(document.getElementById("agregar_valuo").value=="Agregar") {
                document.getElementById("agregar_valuo").value = "Cancelar";
            }           
            else if(document.getElementById("agregar_valuo").value=="Cancelar") {
                document.getElementById("agregar_valuo").value = "Agregar";
            }         
    });
});


function toggle(elemento) {
          if(elemento.value=="observaciones") {
              document.getElementById("p_obserbaciones").style.background = "#dedddd";
              document.getElementById("observaciones").style.display = "block";
              document.getElementById("p_ficha_tecnica").style.background = "#fff";
              document.getElementById("ficha_tecnica").style.display = "none";
              document.getElementById("p_croquis").style.background = "#fff";
              document.getElementById("croquis").style.display = "none";
              document.getElementById("p_investigaciones").style.background = "#fff";
              document.getElementById("investigaciones").style.display = "none";
              document.getElementById("p_infracciones").style.background = "#fff";
              document.getElementById("infracciones").style.display = "none";
              document.getElementById("p_fotografias").style.background = "#fff";
              document.getElementById("fotografias").style.display = "none";
           }
           else if(elemento.value=="ficha_tecnica") {
              document.getElementById("p_obserbaciones").style.background = "#fff";
              document.getElementById("observaciones").style.display = "none";
              document.getElementById("p_ficha_tecnica").style.background = "#dedddd";
              document.getElementById("ficha_tecnica").style.display = "block";
              document.getElementById("p_croquis").style.background = "#fff";
              document.getElementById("croquis").style.display = "none";
              document.getElementById("p_investigaciones").style.background = "#fff";
              document.getElementById("investigaciones").style.display = "none";
              document.getElementById("p_infracciones").style.background = "#fff";
              document.getElementById("infracciones").style.display = "none";
              document.getElementById("p_fotografias").style.background = "#fff";
              document.getElementById("fotografias").style.display = "none";
           }
           else if(elemento.value=="croquis") {
              document.getElementById("p_obserbaciones").style.background = "#fff";
              document.getElementById("observaciones").style.display = "none";
              document.getElementById("p_ficha_tecnica").style.background = "#fff";
              document.getElementById("ficha_tecnica").style.display = "none";
              document.getElementById("p_croquis").style.background = "#dedddd";
              document.getElementById("croquis").style.display = "block";
              document.getElementById("p_investigaciones").style.background = "#fff";
              document.getElementById("investigaciones").style.display = "none";
              document.getElementById("p_infracciones").style.background = "#fff";
              document.getElementById("infracciones").style.display = "none";
              document.getElementById("p_fotografias").style.background = "#fff";
              document.getElementById("fotografias").style.display = "none";
           }
           else if(elemento.value=="investigaciones") {
              document.getElementById("p_obserbaciones").style.background = "#fff";
              document.getElementById("observaciones").style.display = "none";
              document.getElementById("p_ficha_tecnica").style.background = "#fff";
              document.getElementById("ficha_tecnica").style.display = "none";
              document.getElementById("p_croquis").style.background = "#fff";
              document.getElementById("croquis").style.display = "none";
              document.getElementById("p_investigaciones").style.background = "#dedddd";
              document.getElementById("investigaciones").style.display = "block";
              document.getElementById("p_infracciones").style.background = "#fff";
              document.getElementById("infracciones").style.display = "none";
              document.getElementById("p_fotografias").style.background = "#fff";
              document.getElementById("fotografias").style.display = "none";
           }
           else if(elemento.value=="infracciones") {
              document.getElementById("p_obserbaciones").style.background = "#fff";
              document.getElementById("observaciones").style.display = "none";
              document.getElementById("p_ficha_tecnica").style.background = "#fff";
              document.getElementById("ficha_tecnica").style.display = "none";
              document.getElementById("p_croquis").style.background = "#fff";
              document.getElementById("croquis").style.display = "none";
              document.getElementById("p_investigaciones").style.background = "#fff";
              document.getElementById("investigaciones").style.display = "none";
              document.getElementById("p_infracciones").style.background = "#dedddd";
              document.getElementById("infracciones").style.display = "block";
              document.getElementById("p_fotografias").style.background = "#fff";
              document.getElementById("fotografias").style.display = "none";
           }
           else if(elemento.value=="fotografias") {
              document.getElementById("p_obserbaciones").style.background = "#fff";
              document.getElementById("observaciones").style.display = "none";
              document.getElementById("p_ficha_tecnica").style.background = "#fff";
              document.getElementById("ficha_tecnica").style.display = "none";
              document.getElementById("p_croquis").style.background = "#fff";
              document.getElementById("croquis").style.display = "none";
              document.getElementById("p_investigaciones").style.background = "#fff";
              document.getElementById("investigaciones").style.display = "none";
              document.getElementById("p_infracciones").style.background = "#fff";
              document.getElementById("infracciones").style.display = "none";
              document.getElementById("p_fotografias").style.background = "#dedddd";
              document.getElementById("fotografias").style.display = "block";
           }

         

        }

function initMap() {

    var ciudad = {lat: 21.121897,lng: -101.682680 };
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: ciudad
    });


google.maps.event.addListener(map, 'click', function(e) {
    placeMarker(e.latLng, map);
    document.getElementById("lat").value = e.latLng.lat();
    document.getElementById("lon").value = e.latLng.lng();
  });



function placeMarker(position, map) {
    if($("#lat").val() == ''){
        var marker = new google.maps.Marker({
        position: position,
        map: map
        });  
        map.panTo(position);
    }
        
        else{
            alert('Datos en el campo')
        }
    }
    
    
}

      
      
</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKQH_v6dldrN4WwSOdbdwdsfgJgYNBIVA&callback=initMap">
</script>