function getComandancia() {
    $('#comandancia').select2('destroy');
    var Comandancia;
    $.ajax({
        url: "/transito/api/index.php/transito/Cat_comandancia",
        type: 'GET',
        dataType: 'JSON',
        async: false,
        data: {delegacion: $('#delegacion').val()},
        success: function (data, textStatus, jqXHR) {
            Comandancia = eval(data);
        }
    });
    $('#comandancia').empty();
    $('#comandancia').html('<option value=""></option>');
    for (var i = 0; i < Comandancia.length; i++) {
        $('#comandancia').append('<option value"' + Comandancia[i].comandancia + '">' + Comandancia[i].comandancia + '</option>');
    }
    $('#comandancia').select2({
        placeholder: "--SELECCIONE--",
        allowClear: false
    });
}
!function () {
    var $form = $('#frm_captura');
    var urlApi = 'api/index.php/transito/';
    var apiDelegacion = new siosp.utils.Rest(urlApi, 'Cat_delegacion');
    var apiTurno = new siosp.utils.Rest(urlApi, 'Cat_turno');
    var apiTipoAccidente = new siosp.utils.Rest(urlApi, 'Cat_tipoaccidente');
    var apiClasAccidente = new siosp.utils.Rest(urlApi, 'Cat_clasaccidente');
    var apiPension = new siosp.utils.Rest(urlApi, 'Cat_pension');
    var apitCalle = new siosp.utils.Rest(urlApi, 'Cat_calle');
    var apiColonia = new siosp.utils.Rest(urlApi, 'Cat_colonia');
    var apiTipoEvento = new siosp.utils.Rest(urlApi, 'Cat_tipoevento');
    var apiAgente = new siosp.utils.Rest(urlApi, 'Cat_agente');
    var apiUnidad = new siosp.utils.Rest(urlApi, 'Cat_unidad');
    var $fillDelegacion = $.Deferred();

    //<editor-fold defaultstate="collapsed" desc="click comandancia">    
    $('#delegacion').change(function () {
        getComandancia();
    });
    //</editor-fold> 
    //<editor-fold defaultstate="collapsed" desc="click cancelar">       
    $('#cancelar').click(function (e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $("#contenido").empty();
    });
    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="click check box servicio">       
    $('#ckb_servicio').click(function (e) {
        if ($('#ckb_servicio').is(':checked')) {
            $('#servicio').val('PUBLICO');
        } else {
            $('#servicio').val('PARTICULAR');
        }
    });
    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="subbmit guardar"> 
    $("#frm_captura").validate({
        rules: {
            tipo_evento: "required",
            fecha: "required",
            hora: "required",
            delegacion: "required",
            comandancia: "required",
            turno: "required",
            tipo_accidente: "required",
            clasificacion_de_accidente: "required",
            grua: "required",
            calle1: "required",
            calle2: "required",
            colonia: "required",
            agente: "required",
            unidades: "required"
        },
        messages: {
            tipo_evento: "Requerido",
            fecha: "Requerido",
            hora: "Requerido",
            delegacion: "Requerido",
            comandancia: "Requerido",
            turno: "Requerido",
            tipo_accidente: "Requerido",
            clasificacion_de_accidente: "Requerido",
            grua: "Requerido",
            calle1: "Requerido",
            calle2: "Requerido",
            colonia: "Requerido",
            agente: "Requerido",
            unidades: "Requerido"
        },
        submitHandler: function () {
            $('.input_disablet').attr('disabled', false);
            var control = $('#control').val();
            if (control !== '0') {
                var folio = $('#folio_evento').val();
                $('#useradd').attr('disabled', true);
                $('#usermod').attr('disabled', false);
                $('#folio_evento').attr('disabled', true);
                $('#feccre').attr('disabled', true);
                $('#fecmod').attr('disabled', false);
                $.ajax({
                    url: "/transito/views/tm_selector.php",
                    type: 'POST',
                    dataType: 'TEXT',
                    data: {opc: 3},
                    async: false,
                    success: function (data, textStatus, jqXHR) {
                        $('#fecmod').val(data);
                    }
                });

                var form = $('#frm_captura').serialize();
                $.ajax({
                    url: "/transito/api/index.php/transito/Accidentes_cabina/" + $('#id_acc').val(),
                    type: 'PUT',
                    data: form,
                    async: false
                });
                window.scrollTo(0, 0);
                $("#contenido").empty();
                alertify.alert('SIOSP - TRANSITO', '<center><strong>Accidente Modificado</strong></center>');
                $('#contenido').load('views/tm_eventos_pendientes.php');
            } else {
                $.ajax({
                    url: "/transito/views/tm_selector.php",
                    type: 'POST',
                    data: {opc: 1},
                    dataType: 'JSON',
                    async: false,
                    success: function (data, textStatus, jqXHR) {
                        console.log(textStatus);
                        $('#folio_evento').val(data.folio_evento);
                        $('#feccre').val(data.feccre);
                        var form = $('#frm_captura').serialize();
                        $.ajax({
                            url: "/transito/api/index.php/transito/Accidentes_cabina",
                            type: 'POST',
                            data: form,
                            dataType: 'JSON',
                            async: false,
                            success: function (data1, textStatus, jqXHR) {
                                console.log(textStatus);
                                window.scrollTo(0, 0);
                                $("#contenido").empty();
                                alertify.alert('SIOSP - TRANSITO', '<center>Accidente Guardado: <strong>' + data.folio_evento + '</strong></center>');
                            }
                        });
                    }
                });
            }
        }
    });
    //</editor-fold>

    var initSelects = function () {
        //<editor-fold defaultstate="collapsed" desc="delegacion">       
        $form.find('select.delegacion').fillSelect({
            'api': apiDelegacion,
            'text': 'delegacion',
            'value': 'delegacion'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="turno">       
        $form.find('select.turno').fillSelect({
            'api': apiTurno,
            'text': 'turno',
            'value': 'turno'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="tipo accidente">       
        $form.find('select.tipo_accidente').fillSelect({
            'api': apiTipoAccidente,
            'text': 'Tipo',
            'value': 'Tipo'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="clas accidente">       
        $form.find('select.clas_accidente').fillSelect({
            'api': apiClasAccidente,
            'text': 'clas',
            'value': 'clas'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="pension">       
        $form.find('select.pension').fillSelect({
            'api': apiPension,
            'text': 'nombre_pension',
            'value': 'nombre_pension'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="calle1">       
        $form.find('select.calle1').fillSelect({
            'api': apitCalle,
            'text': 'calle',
            'value': 'calle'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="calle2">       
        $form.find('select.calle2').fillSelect({
            'api': apitCalle,
            'text': 'calle',
            'value': 'calle'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="colonia">       
        $form.find('select.colonia').fillSelect({
            'api': apiColonia,
            'text': 'NOMBRE',
            'value': 'NOMBRE'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="Tipo Evento">       
        $form.find('select.tipo_evento').fillSelect({
            'api': apiTipoEvento,
            'text': 'tipo_evento',
            'value': 'tipo_evento'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="Agentes">       
        $form.find('select.agente').fillSelect({
            'api': apiAgente,
            'text': 'num_cobro',
            'value': 'nombre'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="Unidades">       
        $form.find('select.unidades').fillSelect({
            'api': apiUnidad,
            'text': 'No_Unidad',
            'value': 'No_Unidad'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
    };

    $.when(initSelects()).done(function () {
        $('#cargando').show();
        //<editor-fold defaultstate="collapsed" desc="plug-in jquery">       
        $('select').select2({
            placeholder: "--SELECCIONE--",
            allowClear: false
        });
        $('#agente').select2({
            placeholder: "--SELECCIONE--",
            allowClear: false
        }).on("change", function (e) {
            $('#gafete_agente').val($('#agente option:selected').text());
            $('#nombre_agente').val($('#agente').val());
        });
        $('#unidades').select2({
            placeholder: "--SELECCIONE--",
            allowClear: false
        }).on("change", function (e) {
            $('#unidad').val($('#unidades option:selected').text());
            $.ajax({
                url: "api/index.php/transito/Cat_unidad/?unidad=" + $('#unidades option:selected').val(),
                type: 'GET',
                dataType: 'JSON',
                async: false,
                success: function (data, textStatus, jqXHR) {
                    $('#sector').val(data[0]['Sector']);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        });
        $('#fecha').datetimepicker({
            mask: '9999-19-39',
            formatDate: 'Y-m-d',
            format: 'Y-m-d',
            timepicker: false
        });
        $('#hora').datetimepicker({
            mask: '29:59',
            formatTime: 'H:i',
            format: 'H:i',
            datepicker: false
        });
        $('.numero').numeric();
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="Editar y ver">       
        var control = $('#control').val();
        var id_acc = $('#id_acc').val();
        if (control != '0') {
            $.ajax({
                url: "api/index.php/transito/Accidentes_cabina/" + id_acc,
                type: 'GET',
                dataType: 'JSON',
                async: false,
                success: function (data, textStatus, jqXHR) {
                    console.log(textStatus);
                    $('#delegacion').val(data[0].delegacion).trigger("change");
                    $('#comandancia').val(data[0].comandancia).trigger("change");
                    $('#tipo_evento').val(data[0].tipo_evento).trigger("change");
                    $('#turno').val(data[0].turno).trigger("change");
                    $('#tipo_accidente').val(data[0].tipo_accidente).trigger("change");
                    $('#clas_accidente').val(data[0].clasificacion_de_accidente).trigger("change");
                    $('#pension').val(data[0].grua).trigger("change");
                    $('#calle1').val(data[0].calle1).trigger("change");
                    $('#calle2').val(data[0].calle2).trigger("change");
                    $('#colonia').val(data[0].colonia).trigger("change");
                    $('#agente').val(data[0].nombre_agente).trigger("change");
                    $('#unidades').val(data[0].unidad).trigger("change");
                    $('#fecha').val(data[0].fecha).trigger("change");
                    $('#hora').val(data[0].hora).trigger("change");
                    $('#reporta').val(data[0].reporta).trigger("change");
                    $('#ref').val(data[0].ref).trigger("change");
                    $('#no_vehiculos_participantes').val(data[0].no_vehiculos_participantes).trigger("change");
                    $('#no_de_detenidos').val(data[0].no_de_detenidos).trigger("change");
                    $('#no_de_heridos').val(data[0].no_de_heridos).trigger("change");
                    $('#no_de_muertos').val(data[0].no_de_muertos).trigger("change");
                    $('#normales').val(data[0].normales).trigger("change");
                    $('#ei').val(data[0].ei).trigger("change");
                    $('#ec').val(data[0].ec).trigger("change");
                    $('#observaciones_evento').html(data[0].observaciones_evento).trigger("change");
                    $('#servicio').val(data[0].servicio).trigger("change");
                    if (data[0].servicio === "PUBLICO") {
                        $('#ckb_servicio').attr('checked', true);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });

            if (control == '2') {
                console.log('si');
                $('#frm_captura').find('input, textarea, button, select').attr('disabled', true);
                $('#guardar').hide();
                $('#cancelar').hide();
            }
        }
        //</editor-fold> 

        $('#cargando').hide();
    });






    //<editor-fold defaultstate="collapsed" desc="demo">       

    //</editor-fold> 


}();