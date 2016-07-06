<?PHP session_start(); ?>
<style>
    #commentForm {
        width: 500px;
    }
    #commentForm label {
        width: 250px;
    }
    #commentForm label.error, #commentForm input.submit {
        margin-left: 253px;
    }
    #signupForm {
        width: 670px;
    }
    #signupForm label.error {
        margin-left: 10px;
        width: auto;
        display: inline;
    }
    #newsletter_topics label.error {
        display: none;
        margin-left: 103px;
    }
</style>
<div class="titulo">ACCIDENTES / CONTROL DE EVENTOS</div><br>
<div>
    RADIO OPERACION <br>
    <strong>AGREGAR EVENTO</strong>
</div>
<div class="interior">
    <form id="frm_captura" action="#" method="POST">
        <div style="text-align: right;">
            Folio propuesto:
            <input type="text" class="" id="folio_propuesto" />           
        </div>
        <div  class="encabezado">
            ACCIDENTE PRELIMINAR
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>            
                <tr>
                    <td>Tipo Evento:</td>
                    <td>Fecha:</td>
                    <td>Hora:</td>
                </tr>     
                <tr>
                    <td>
                        <select class="tipo_evento" name="tipo_evento" id="tipo_evento">
                            <option value=""></option>
                        </select>
                    </td>
                    <td><input type="text" id="fecha" name="fecha" value="<?= date('Y-m-d'); ?>" style="width:80px;"/></td>
                    <td><input type="text"  id="hora" name="hora" value="<?= date('H:i'); ?>" style="width:40px;" /></td>
                </tr>
                <tr>
                    <td>Delegacion:</td>
                    <td>Comandancia:</td>
                    <td></td>
                </tr>
                <tr>
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
                    <td></td>
                </tr>
                <tr>
                    <td>Turno:</td>
                    <td>Tipo accidente:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <select class="turno" name="turno" id="turno">
                            <option value=""> -- Seleccione -- </option>
                        </select>
                    </td>
                    <td>
                        <select class="tipo_accidente" name="tipo_accidente" id="tipo_accidente">
                            <option value=""> -- Seleccione -- </option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Calificacion de Accidente:</td>
                    <td>Grua:</td>
                    <td>Reporta:</td>
                </tr>
                <tr>
                    <td>
                        <select class="clas_accidente" name="clasificacion_de_accidente" id="clas_accidente">
                            <option value=""> -- Seleccione -- </option>
                        </select>
                    </td>
                    <td>
                        <select class="pension" name="grua" id="pension">
                            <option value=""> -- Seleccione -- </option>
                        </select>
                    </td>
                    <td><input type="text" class="" id="reporta" name="reporta"/></td>
                </tr>
            </tbody>
        </table>
        <div  class="encabezado">
            LOCALIZACIÓN EL EVENTO
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>Calle 1:</td>
                    <td>Calle 2:</td>
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
                </tr>
                <tr>
                    <td>Referencia:</td>
                    <td>Colonia:</td>
                </tr>
                <tr>
                    <td><input type="text" class="" id="ref" name="ref"/></td>
                    <td>
                        <select class="colonia" name="colonia" id="colonia">
                            <option value=""></option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <div  class="encabezado">
            RESUMEN
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>No. Veh. Part.</td>
                    <td>No. de Detenidos</td>
                </tr>
                <tr>
                    <td><input type="text" class="numero" id="no_vehiculos_participantes" name="no_vehiculos_participantes" value="0"/></td>
                    <td><input type="text" class="numero" id="no_de_detenidos" name="no_de_detenidos" value="0"/></td>
                </tr>
                <tr>
                    <td>No. de Heridos.</td>
                    <td>No. de Muertros</td>
                </tr>
                <tr>
                    <td><input type="text" class="numero" id="no_de_heridos"  name="no_de_heridos" value="0"/></td>
                    <td><input type="text" class="numero" id="no_de_muertos" name="no_de_muertos" value="0"/></td>
                </tr>
                <tr>
                    <td>Normales:</td>
                    <td>E.I.</td>
                </tr>
                <tr>
                    <td><input type="text" class="numero" id="normales" name="normales" value="0"/></td>
                    <td><input type="text" class="numero" id="ei" name="ei" value="0"/></td>
                </tr>
                <tr>
                    <td>E.C.:</td>
                    <td>Público:</td>
                </tr>
                <tr>
                    <td><input type="text" class="numero" id="ec" name="ec" value="0"/></td>
                    <td><input type="checkbox" id="ckb_servicio" value="ok" name="ckb_servicio"/></td>
                </tr>
            </tbody>
        </table>
        <div  class="encabezado">
            INTERVINO
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>   
                <tr>
                    <td>Folio:</td>
                    <td colspan="3">Nombre:</td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" id="gafete_agente" name="gafete_agente"/>
                        <select class="agente" name="agente" id="agente">
                            <option value=""></option>
                        </select>
                    </td>
                    <td colspan="3"><input type="text" class="input_disablet" id="nombre_agente" name="nombre_agente" disabled/></td>
                </tr>
                <tr>
                    <td>Unidad:</td>
                    <td colspan="3">Sector:</td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" id="unidad" name="unidad"/>
                        <select class="unidades" name="unidades" id="unidades">
                            <option value=""></option>
                        </select>                        
                    </td>
                    <td colspan="3"><input type="text" class="input_disablet" id="sector" name="sector" disabled/></td>
                </tr>    
            </tbody>
        </table>
        <div  class="encabezado">
            DESCRIPCIÓN
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        <textarea style="min-width: 1030px; max-width: 1030px; min-height: 100px;" id="observaciones_evento" name="observaciones_evento" ></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>

                        <input type="submit" value="Guardar" id="guardar"/>
                        <input type="button" value="Cancelar" id="cancelar"/>
                    </td>
                </tr>
            </tbody>
        </table> 
        <input type="hidden" value="2" name="activo"/>
        <input type="hidden" value="PARTICULAR" name="servicio" id="servicio"/>
        <input type="hidden" value="<?= $_SESSION['idusuario']; ?>" name="useradd"/>
        <input type="hidden" value="" id="folio_evento" name="folio_evento"/>
        <input type="hidden" value="" id="feccre" name="feccre"/>
        <input type="hidden" value="<?= isset($_REQUEST['control']) ? $_REQUEST['control'] : 0; ?>" id="control" name="control"/>
        <input type="hidden" value="<?= isset($_REQUEST['folio']) ? $_REQUEST['folio'] : 0; ?>" id="id_acc" name="id_acc"/>
    </form>
</div>
<script src="js/siosp/views/tm_control_eventos.js" type="text/javascript"></script>