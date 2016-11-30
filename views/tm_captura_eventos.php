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
<div class="interior">
    <form id="frm_captura">
        <div  class="encabezado">
            DATOS GENERALES
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>Folio:</td>
                <td>Delegacion:</td>
                <td>Comandancia:</td>
            </tr>
            <tr>
                <td><input type="text" class="" id="folio_accidente" name="folio_accidente" disabled value="<?= $_REQUEST['folio']; ?>"/></td>
                <td>
                    <select class="delegacion" name="delegacion" id="delegacion">
                        <option value=""> -- Seleccione -- </option>
                    </select>
                </td>
                <td>
                    <select class="comandancia" name="comandancia" id="comandancia">
                        <option value=""> -- Seleccione -- </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Turno:</td>
                <td>Fecha:</td>
                <td>Hora:</td>
            </tr>
            <tr>
                <td>
                    <select class="turno" name="turno" id="turno">
                        <option value=""> -- Seleccione -- </option>
                    </select>
                </td>
                <td><input type="text" id="fecha" name="fecha" value="<?= date('Y-m-d'); ?>" style="width:80px;"/></td>
                <td><input type="text"  id="hora" name="hora" value="<?= date('H:i'); ?>" style="width:40px;" /></td>
            </tr>
            <tr>
                <td>Calificacion:</td>
                <td>Tipo de choque:</td>
                <td>Colonia:</td>
            </tr>  
            <tr>
                <td>
                    <select class="clas_accidente" name="clasificacion" id="clasificacion">
                        <option value=""> -- Seleccione -- </option>
                    </select>
                </td>
                <td>
                    <select class="tipo_accidente" name="tipo_choque" id="tipo_choque">
                        <option value=""> -- Seleccione -- </option>
                    </select>
                </td>
                <td>
                    <select class="colonia" name="colonia" id="colonia">
                        <option value=""></option>
                    </select>

                </td>
            </tr>    
            <tr>
                <td>Calle1:</td>
                <td>Calle 2:</td>
                <td>Freante a numero:</td>    
            </tr>
            <tr>
                <td>
                    <select class="calle1" name="calle1" id="calle1">
                        <option value=""></option>
                    </select>
                </td>
                <td>
                    <select class="calle2" name="calle2" id="calle2">
                        <option value=""></option>
                    </select>
                </td>
                <td><input type="text" class="" id="frentea" name="frentea" /></td>    

            </tr>
        </table>

        <div  class="encabezado">
            UBICACION
        </div>

        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>                
                <td style="width: 100px;">Latitud:</td>    
                <td style="width: 100px;">Longitud:</td>
                <td>&nbsp;</td>
            </tr>
            <tr>                
                <td><input type="text" id="lat" name="latitud" value="" disabled></td>    
                <td><input type="text" id="lon" name="longitud" value="" disabled></td>
                <td><input type="button" id="btn_mapa" value="Mapa"/></td>
            </tr>
        </table>

        <div id="map" style="Width: 100%; height: 600px; display: none; padding-top: 20px; "></div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td style="width: 100px;">Estado:</td>    
                <td style="width: 100px;">Municipio:</td>
                <td></td>
            </tr>       
            <tr>
                <td>
                    <select class="estado" name="estado" id="estado">
                        <option value=""></option>
                    </select>
                </td>    
                <td>
                    <select class="municipio" name="municipio" id="municipio">
                        <option value=""></option>
                    </select>
                </td>
                <td></td>
        </table>

        <div  class="encabezado">
            VEHICULOS Y CONDUCTORES INVOLUCRADOS
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
            <div id="vehiculos" style="display:none; padding-top: 10px;">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>Interviene como:</td>                    
                        <td>Clas. Vehículo:</td>
                        <td>Marca:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>                    
                        <td>
                            <select class="descveh">
                                <option value="" > -- Seleccione -- </option>
                            </select>
                        </td>
                        <td>
                            <select class="marca" id="marca" name="marca">
                                <option value=""> -- Seleccione -- </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Submarca:</td>                   
                        <td>Modelo:</td>
                        <td>Tipo:</td>
                    </tr>
                    <tr>
                        <td>
                            <select id="submarca" name="submarca">

                            </select>
                        </td>                   
                        <td>
                            <select>
                                <option value=""> -- Seleccione -- </option>
                                <?php
                                for ($index = (date('Y') * 1) + 1; $index >= 1950; $index--) {
                                    echo '<option value="' . $index . '">' . $index . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select class="vehiculotipo">
                                <option value=""> -- Seleccione -- </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Datos adicionales:</td>
                        <td>Placas:</td>
                        <td>No. Serie:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td><input type="text" class="#" id=""></td>
                        <td><input type="text" class="#" id=""></td>
                    </tr>
                    <tr>
                        <td>Color:</td>
                        <td>Detalle del color:</td>
                        <td>Capacidad:</td>
                    </tr>
                    <tr>
                        <td>
                            <select class="color">
                                <option value=""> -- Seleccione -- </option>
                            </select>
                        </td>
                        <td><input type="text" class="#" id=""></td>
                        <td>
                            <select class="capveh">
                                <option value=""> -- Seleccione -- </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Servicio:</td>
                        <td>No. Eco:</td>
                        <td>Estado:</td>
                    </tr>
                    <tr>
                        <td>
                            <select>
                                <option value=""> -- Seleccione -- </option>

                                <option value="Servicio Particular">Servicio Particular</option>
                                <option value="Servicio Public">ServicioPublico</option>
                                <option value="Servicio Publico Federal">Servicio Publico Federal</option>
                            </select>
                        </td>
                        <td><input type="text" class="#" id=""></td>
                        <td>
                            <select class="estado" name="" id="">
                                <option value=""></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Municipio:</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <select class="municipio" name="" id="">
                                <option value=""></option>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <br><br>
                <h5>Datos de pencion</h5>
                <hr/>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="3"><input type="checkbox" value="">&nbsp;&nbsp;Aplica</td>
                    </tr>
                    <tr>
                        <td>No. de grua:</td>
                        <td>Pensión:</td>
                        <td>No. de Inventario:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td>
                            <select class="pension">
                                <option value=""> -- Seleccione -- </option>
                            </select>
                        </td>
                        <td><input type="text" class="#" id=""></td>
                    </tr>
                </table>
                <br><br>
                <h5>Datos del propietario</h5>
                <hr/>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td><input type="radio" name="propietario" value="">&nbsp;&nbsp;Nombre</td>
                        <td><input type="radio" name="propietario" value="">&nbsp;&nbsp;Razón social</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nombre(s) o Razón social:</td>
                        <td>Apellido paterno:</td>
                        <td>Apellido materno:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td><input type="text" class="#" id=""></td>
                        <td><input type="text" class="#" id=""></td>
                    </tr>
                    <tr>
                        <td>Domicilio:</td>
                        <td>Telefono:</td>
                        <td>Codigo postal:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td><input type="text" class="#" id=""></td>
                        <td><input type="text" class="#" id=""></td>
                    </tr>
                    <tr>
                        <td>colonia:</td>
                        <td>Estado:</td>
                        <td>Municipio:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td>
                            <select class="estado" name="" id="">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <select class="municipio" name="" id="">
                                <option value=""></option>
                            </select>

                        </td>
                    </tr>
                </table>
                <br><br>
                <h5>Datos del conductor</h5>
                <hr/>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="3"><input type="checkbox" value="">&nbsp;&nbsp;Active esta casilla si los datos del propietario son los mismos que los del conductor</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="datos_conductor" value="">&nbsp;&nbsp;Huir del lugar de los echos</td>
                        <td><input type="radio" name="datos_conductor" value="">&nbsp;&nbsp;No proporciono</td>
                        <td></td>
                    </tr>
                    <tr>  
                        <td><input type="radio" name="datos_conductor" value="">&nbsp;&nbsp;Veh. Estacionado</td>
                        <td><input type="radio" name="datos_conductor" value="">&nbsp;&nbsp;Cancelar</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nombre:</td>
                        <td>Apellido paterno:</td>
                        <td>Apellido materno:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td><input type="text" class="#" id=""></td>
                        <td><input type="text" class="#" id=""></td>
                    </tr>
                    <tr>
                        <td>Domicilio:</td>
                        <td>Edad:</td>
                        <td>Sexo:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td><input type="text" class="#" id=""></td>
                        <td>
                            <select>
                                <option value=""> -- Seleccione -- </option>
                                <option value="HOMBRE">HOMBRE</option>
                                <option value="MUJER">MUJER</option>
                                <option value="NO">NO</option>
                                <option value="SE DESCONOCE">SE DESCONOCE</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Colonia:</td>
                        <td>Folio infracción:</td>
                        <td>Folio del certificado médico:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td><input type="text" class="#" id=""></td>
                        <td><input type="text" class="#" id=""></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="estado_conductor" value="">&nbsp;&nbsp;Ebriedad completa</td>
                        <td><input type="radio" name="estado_conductor" value="">&nbsp;&nbsp;Ebriedad incompleta</td>
                        <td><input type="radio" name="estado_conductor" value="">&nbsp;&nbsp;bajo influjo de drogas</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="estado_conductor" value="">&nbsp;&nbsp;Estado normal</td>
                        <td><input type="radio" name="estado_conductor" value="">&nbsp;&nbsp;Inconsciente</td>
                        <td><input type="radio" name="estado_conductor" value="">&nbsp;&nbsp;Sin examen</td>
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td>Municipio:</td>
                        <td>Condiciones fisicas:</td>
                    </tr>
                    <tr>
                        <td>
                            <select class="estado" name="" id="">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <select class="municipio" name="" id="">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <select class="edoconductor" id="edoconductor" name="edoconductor">
                                <option value=""> -- Seleccione -- </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Detenido en:</td>
                        <td>En custodia de:</td>
                        <td>A  disposicion de:</td>
                    </tr>
                    <tr>
                        <td>
                            <select id="detenido_en" name="detenido_en">
                            </select>
                        </td>
                        <td>
                            <select class="encustodia">
                                <option value=""> -- Seleccione -- </option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=""> -- Seleccione -- </option>
                                <option value="OFICIAL CALIFICADOR EN TURNO">OFICIAL CALIFICADOR EN TURNO</option>
                                <option value="AGENCIA DE MENORES">AGENCIA DE MENORES</option>
                                <option value="NO">NO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>La persona se encontraba:</td>
                        <td>Levantado por:</td>
                        <td>Trasladado a:</td>
                    </tr>
                    <tr>
                        <td>
                            <select class="edofisico">
                                <option value=""> -- Seleccione -- </option>
                            </select>
                        </td>
                        <td>
                            <select id="levantado_por" name="levantado_por">
                            </select>
                        </td>
                        <td>
                            <select id="trasladado_a" name="trasladado_a">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Folio infracción:</td>
                        <td>Tipo de licencia:</td>
                        <td>Restricciones:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td>
                            <select class="tipolicencia">
                                <option value=""> -- Seleccione -- </option>
                            </select>
                        </td>
                        <td>
                            <select class="restriccioneslicencia">
                                <option value=""> -- Seleccione -- </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Vigencia:</td>
                        <td>Expedida por el Gob. del Estado de:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td><input type="text" class="#" id=""></td>
                        <td></td>
                    </tr>                           
                </table>
                <div style="text-align: right; padding-top: 10px;">
                    <input type="button" class="#" id="" value="Aceptar">
                </div>
            </div>
            <div style="text-align: right; padding-top: 10px;">
                <input type="button" id="agregar_vehiculos" value="Agregar">
            </div>
            <div  class="encabezado">
                SALDO DE SANGRE
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
            <div id="saldo" style="display:none; padding-top: 10px;">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>Nombre:</td>
                        <td>Estado fisico:</td>
                        <td>Edad:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td>
                            <select>
                                <option value=""> -- Seleccione -- </option>
                                <option value="Lesionado">Lesionado</option>
                                <option value="Lesionado y Detenido">Lesionado y Detenido</option>
                                <option value="Finado">Finado</option>
                            </select>
                        </td>
                        <td><input type="text" class="#" id=""></td>
                    </tr>
                    <tr>
                        <td>Nacionalidad:</td>
                        <td>Domicilio:</td>
                        <td>Levantada por:</td>
                    </tr>
                    <tr>
                        <td>
                            <select>
                                <option value=""> -- Seleccione -- </option>
                                <option value="EXTRANJERO">EXTRANJERO</option>
                                <option value="MEXICANA">MEXICANA</option>
                                <option value="SE DESCONOCE">SE DESCONOCE</option>
                            </select>
                        </td>
                        <td><input type="text" class="#" id=""></td>
                        <td>
                            <select id="levantado_por_ss" name="levantado_por_ss">

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Trasladado a:</td>
                        <td>Adisposicion de:</td>
                        <td>Se encontraba:</td>
                    </tr>
                    <tr>
                        <td>
                            <select id="trasladado_a_ss" name="trasladado_a_ss">
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=""> -- Seleccione -- </option>
                                <option value="C. OFICIAL CALIFICADOR EN TURNO">C. OFICIAL CALIFICADOR EN TURNO</option>
                                <option value="AREA ESPECIAL DE MENORES INFRACTORES">AGENCIA DE MENORES</option>
                                <option value="NO">NO</option>
                            </select>
                        </td>
                        <td>
                            <select class="edofisico">
                                <option value=""> -- Seleccione -- </option>
                            </select>
                        </td>
                    </tr>

                </table>

                <div style="text-align: right; padding-top: 10px;">
                    <input type="button" id="" value="Aceptar">
                </div>
            </div>

            <div style="text-align: right; padding-top: 10px;">
                <input type="button" id="agregar_saldo" value="Agregar"><br>
            </div>
            <div  class="encabezado">
                COMPETENCIA JUDICIAL
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
            <div id="judicial" style="display:none; padding-top: 20px;">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>Nombre:</td>
                        <td>Estado fisico:</td>
                        <td>Edad:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td>
                            <select>
                                <option value=""> -- Seleccione -- </option>
                                <option value="Detenido">Detenido</option>
                                <option value="Lesionado y Detenido">Lesionado y Detenido</option>
                            </select>
                        </td>
                        <td><input type="text" class="#" id=""></td>
                    </tr>
                    <tr>
                        <td>Domicilio:</td>
                        <td>Detenido en:</td>
                        <td>A disposicion de:</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="#" id=""></td>
                        <td>
                            <select id="detenido_en_cj" name="detenido_en_cj">                                
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=""> -- Seleccione -- </option>
                                <option value="C. OFICIAL CALIFICADOR EN TURNO">C. OFICIAL CALIFICADOR EN TURNO</option>
                                <option value="AREA ESPECIAL DE MENORES INFRACTORES">AGENCIA DE MENORES</option>
                                <option value="SE DESCONOCE">SE DESCONOCE</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Se encontraba:</td>        
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <select class="edofisico">
                                <option value=""> -- Seleccione -- </option>
                            </select>
                        </td>       
                        <td></td>
                        <td></td>                         
                    </tr>
                </table>
                <br><br>
                <div style="text-align: right; padding-top: 10px;">
                    <input type="button" id="" value="Aceptar">
                </div>
            </div>
            <div style="text-align: right; padding-top: 10px;">
                <input type="button" id="agregar_judicial" value="Agregar">
            </div>
        </div>
        <div  class="encabezado">
            INTERVINO
        </div>
        <table width="100%">

            <tr>
                <td style="width: 20px;">Gafete:</td>    
                <td>Agente:</td>                       
                <td>Unidad:</td>  
                <td>Sector:</td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" id="gafete_agente" name="gafete_agente"/>
                    <select class="agente" name="agente" id="agente">
                        <option value=""></option>
                    </select>
                </td>
                <td colspan="1"><input type="text" class="input_disablet" id="nombre_agente" name="nombre_agente" disabled/></td>
                <td>
                    <input type="hidden" id="unidad" name="unidad"/>
                    <select class="unidades" name="unidades" id="unidades">
                        <option value=""></option>
                    </select>                        
                </td>
                <td colspan="1"><input type="text" class="input_disablet" id="sector" name="sector" disabled/></td>
            </tr>     
        </table>
        <div  class="encabezado">
            SUPERVISO
        </div>
        <table width="100%">
            <tr>
                <td style="width: 20px;">Gafete:</td>    
                <td>Agente:</td>                       
                <td>Unidad:</td>  
                <td>Sector:</td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" id="gafete_agente_superviso" name="gafete_agente_superviso"/>
                    <select class="agente" name="agente_superviso" id="agente_superviso">
                        <option value=""></option>
                    </select>
                </td>
                <td colspan="1"><input type="text" class="input_disablet" id="nombre_agente_superviso" name="nombre_agente_superviso" disabled/></td>
                <td>
                    <input type="hidden" id="unidad_superviso" name="unidad_superviso"/>
                    <select class="unidades" name="unidades_superviso" id="unidades_superviso">
                        <option value=""></option>
                    </select>                        
                </td>
                <td colspan="1"><input type="text" class="input_disablet" id="sector_superviso" name="sector_superviso" disabled/></td>
            </tr>     

        </table>

        <div  class="encabezado">
            COMPLEMENTARIOS
        </div>
        <div>

            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Observaciones</a></li>
                    <li><a href="#tabs-2">Ficha técnica</a></li>
                    <li><a href="#tabs-3">Croquis</a></li>
                    <li><a href="#tabs-4">Investigaciones</a></li>
                    <li><a href="#tabs-5">Infracciones</a></li>
                    <li><a href="#tabs-6">Fotografias</a></li>
                </ul>
                <div id="tabs-1">
                    <textarea style="min-width: 1000px; max-width: 1000px; min-height: 200px; max-height: 200px;"></textarea>
                </div>
                <div id="tabs-2">

                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>Visibilidad:</td>
                            <td>Parte del dia:</td>
                            <td>Tipo Calle:</td>
                        </tr>
                        <tr>
                            <td>
                                <select class="visibilidad" id="visibilidad" name="visibilidad">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td>
                                <select class="dianoche" id="dianoche" name="dianoche">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td>
                                <select class="tipocalle" id="tipocalle" name="tipocalle">
                                    <option value=""></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>No de carriles:</td>
                            <td>Sentido de calle:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <select class="nocarriles" id="nocarriles" name="nocarriles">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td>
                                <select class="sentido" id="sentido" name="sentido">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                    <br/><br/>
                    <h5>Estado del as calles</h5>
                    <hr/>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>Alineación:</td>
                            <td>Estado del pavimento:</td>
                            <td>Clima:</td>
                        </tr>
                        <tr>
                            <td>
                                <select class="alicamino" id="alicamino" name="alicamino">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td>
                                <select class="edopavimento" id="edopavimento" name="edopavimento">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td>
                                <select class="clima" id="clima" name="clima">
                                    <option value=""></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Regulación:</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <select class="regulacioncrucero" id="regulacioncrucero" name="regulacioncrucero">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <br/><br/>
                    <h5>Daños acumulados</h5>
                    <hr/>
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

                            <tr>
                                <td>Objetos dañados:</td>
                                <td>Tipo de daños:</td>
                                <td>Dueño:</td>
                            </tr>
                            <tr>
                                <td>
                                    <select  class="dano" id="dano" name="dano">
                                        <option value=""> -- Seleccione -- </option>
                                    </select>
                                </td>
                                <td><input type="text" class="#" id=""></td>
                                <td>
                                    <select id="dueno_o">
                                        <option value=""></option>
                                        <option value="C.F.E.">C.F.E.</option>
                                        <option value="TELMEX">TELMEX</option>
                                        <option value="MUNICIPIO">MUNICIPIO</option>
                                        <option value="SAPAL">SAPAL</option>
                                        <option value="PROPIEDAD PRIVADA">PROPIEDAD PRIVADA</option>
                                        <option value="NO APLICA">NO APLICA</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Monto:</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="#" id=""></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <br/><br/>
                        <div style="text-align: right">
                            <input type="button"  value="Agregar">
                        </div>
                        <br/>
                    </div>
                    <div style="text-align: right; padding-top: 10px;">
                        <input type="button" id="agregar_valuo" value="Agregar">
                    </div>
                </div>
                <div id="tabs-3">
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
                <div id="tabs-4">
                    <textarea style="min-width: 1000px; max-width: 1000px; min-height: 200px; max-height: 200px;"></textarea>
                </div>
                <div id="tabs-5">
                    Articulo:<br>
                    <input type="text" class="#" id=""> <input type="button" value=" + "><br><br>

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
                <div id="tabs-6">
                    <div style="background-color: #ccc; width: 291px; height: 291px;"><br></div>
                    <input type="file" class="#" id="">                  
                </div>
            </div>





            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            <input type="submit" id="btn_guardar" value="Guardar">
                            <input type="button" id="btn_cancelar" value="Cancelar">
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" value="<?= $_REQUEST['do']; ?>" id="do" name="do"/>
            <input type="hidden" value="<?= date('Y'); ?>" id="anio" name="anio" />

        </div>
        <input type="hidden" id="opc" name="opc" value="6"/>
        <input type="hidden" id="cabina_id" name="cabina_id" value=""/>
    </form>
</div>
<script src="js/siosp/views/tm_captura_eventos.js" type="text/javascript"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKQH_v6dldrN4WwSOdbdwdsfgJgYNBIVA">
</script>