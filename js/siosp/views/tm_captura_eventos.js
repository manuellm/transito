$(document).ready(function () {

    //<editor-fold defaultstate="collapsed" desc="declaracion">  
    var Mapa = true;
    var $form = $('#frm_captura');
    var urlApi = 'api/index.php/transito/';
    var apiDelegacion = new siosp.utils.Rest(urlApi, 'Cat_delegacion');
    var apiTurno = new siosp.utils.Rest(urlApi, 'Cat_turno');
    var apiTipoAccidente = new siosp.utils.Rest(urlApi, 'Cat_tipoaccidente');
    var apiClasAccidente = new siosp.utils.Rest(urlApi, 'Cat_clasaccidente');
    var apitCalle = new siosp.utils.Rest(urlApi, 'Cat_calle');
    var apiColonia = new siosp.utils.Rest(urlApi, 'Cat_colonia');
    var apiEstado = new siosp.utils.Rest(urlApi, 'Cat_estado');
    var apiMunicipio = new siosp.utils.Rest(urlApi, 'Cat_municipio');
    var apiAgente = new siosp.utils.Rest(urlApi, 'Cat_agente');
    var apiUnidad = new siosp.utils.Rest(urlApi, 'Cat_unidad');
    var apiVisibilidad = new siosp.utils.Rest(urlApi, 'Cat_visibilidad');
    var apiDianoche = new siosp.utils.Rest(urlApi, 'Cat_dianoche');
    var apiTipocalle = new siosp.utils.Rest(urlApi, 'Cat_tipocalle');
    var apiNocarriles = new siosp.utils.Rest(urlApi, 'Cat_nocarriles');
    var apiSentido = new siosp.utils.Rest(urlApi, 'Cat_sentido');
    var apiAlicamino = new siosp.utils.Rest(urlApi, 'Cat_alicamino');
    var apiEdopavimento = new siosp.utils.Rest(urlApi, 'Cat_edopavimento');
    var apiClima = new siosp.utils.Rest(urlApi, 'Cat_clima');
    var apiRegulacioncrucero = new siosp.utils.Rest(urlApi, 'Cat_regulacioncrucero');
    var apiDano = new siosp.utils.Rest(urlApi, 'Cat_dano');
    var apiDescveh = new siosp.utils.Rest(urlApi, 'Cat_descveh');
    var apiMarca = new siosp.utils.Rest(urlApi, 'Cat_marca');
    var apiVehiculotipo = new siosp.utils.Rest(urlApi, 'Cat_vehiculotipo');
    var apiColor = new siosp.utils.Rest(urlApi, 'Cat_color');
    var apiCapveh = new siosp.utils.Rest(urlApi, 'Cat_capveh');
    var apiPension = new siosp.utils.Rest(urlApi, 'Cat_pension');






    var apiEdoconductor = new siosp.utils.Rest(urlApi, 'Cat_edoconductor');
    var apiEncustodia = new siosp.utils.Rest(urlApi, 'Cat_encustodia');
    var apiEdofisico = new siosp.utils.Rest(urlApi, 'Cat_edofisico');
    var apiTtpolicencia = new siosp.utils.Rest(urlApi, 'Cat_tipolicencia');
    var apiRestriccioneslicencia = new siosp.utils.Rest(urlApi, 'Cat_restriccioneslicencia');






    var $fillDelegacion = $.Deferred();
    //</editor-fold> 
    //<editor-fold defaultstate="collapsed" desc="click comandancia">    
    $('#delegacion').change(function () {
        getComandancia();
    });
    //</editor-fold> 
    //<editor-fold defaultstate="collapsed" desc="click mapa"> 
    $('#btn_mapa').click(function (e) {
        $('#map').show();
        if (Mapa) {
            initMap();
        }
        Mapa = false;

    });

    //</editor-fold> 
    //<editor-fold defaultstate="collapsed" desc="click cancelar">       
    $('#btn_cancelar').click(function (e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $("#contenido").empty();
    });
    //</editor-fold>

    $("#frm_captura").validate({
        rules: {
            clasificacion: "required",
            tipo_choque: "required"
        },
        messages: {
            clasificacion: "Requerido",
            tipo_choque: "Requerido"
        },
        submitHandler: function () {
            $('#cargando').show();

            $('input').attr('disabled', false);
            var form = $('#frm_captura').serialize();
            $.ajax({
                url: "views/tm_selector.php",
                type: 'POST',
                dataType: 'TEXT',
                data: form,
                async: false,
                success: function (data, textStatus, jqXHR) {
                    window.scrollTo(0, 0);
                    $("#contenido").empty();
                    alertify.alert('SIOSP - TRANSITO', '<center><strong>Accidente </strong></center>');
                    console.log(textStatus);
                    $('#cargando').hide();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                    $('#cargando').hide();
                }
            });
        }
    });

    $('#btn_cancelar').click(function (e) {
        e.preventDefault();
    });

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
        //<editor-fold defaultstate="collapsed" desc="estado">       
        $form.find('select.estado').fillSelect({
            'api': apiEstado,
            'text': 'estado',
            'value': 'estado'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="municipio">       
        $form.find('select.municipio').fillSelect({
            'api': apiMunicipio,
            'text': 'municipio',
            'value': 'municipio'
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
        //<editor-fold defaultstate="collapsed" desc="visibilidad">       
        $form.find('select.visibilidad').fillSelect({
            'api': apiVisibilidad,
            'text': 'Descripcion',
            'value': 'Descripcion'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="dianoche">       
        $form.find('select.dianoche').fillSelect({
            'api': apiDianoche,
            'text': 'Descripcion',
            'value': 'Descripcion'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="tipocalle">       
        $form.find('select.tipocalle').fillSelect({
            'api': apiTipocalle,
            'text': 'descripcion_tipo',
            'value': 'descripcion_tipo'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="nocarriles">       
        $form.find('select.nocarriles').fillSelect({
            'api': apiNocarriles,
            'text': 'carriles',
            'value': 'carriles'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="sentido">       
        $form.find('select.sentido').fillSelect({
            'api': apiSentido,
            'text': 'sentido',
            'value': 'sentido'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold>       
        //<editor-fold defaultstate="collapsed" desc="alicamino">       
        $form.find('select.alicamino').fillSelect({
            'api': apiAlicamino,
            'text': 'AliCamino',
            'value': 'AliCamino'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="edopavimento">       
        $form.find('select.edopavimento').fillSelect({
            'api': apiEdopavimento,
            'text': 'Estado',
            'value': 'Estado'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="clima">       
        $form.find('select.clima').fillSelect({
            'api': apiClima,
            'text': 'clima',
            'value': 'clima'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="regulacioncrucero">       
        $form.find('select.regulacioncrucero').fillSelect({
            'api': apiRegulacioncrucero,
            'text': 'Descripcion',
            'value': 'Descripcion'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="dano">       
        $form.find('select.dano').fillSelect({
            'api': apiDano,
            'text': 'Descripcion',
            'value': 'Descripcion'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="descveh">       
        $form.find('select.descveh').fillSelect({
            'api': apiDescveh,
            'text': 'descripcion',
            'value': 'descripcion'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="marca">       
        $form.find('select.marca').fillSelect({
            'api': apiMarca,
            'text': 'MARCA',
            'value': 'MARCA'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="vehiculotipo">       
        $form.find('select.vehiculotipo').fillSelect({
            'api': apiVehiculotipo,
            'text': 'Tipo',
            'value': 'Tipo'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="color">       
        $form.find('select.color').fillSelect({
            'api': apiColor,
            'text': 'Color',
            'value': 'Color'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="capveh">       
        $form.find('select.capveh').fillSelect({
            'api': apiCapveh,
            'text': 'descripcion',
            'value': 'descripcion'
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
        //<editor-fold defaultstate="collapsed" desc="edoconductor">       
        $form.find('select.edoconductor').fillSelect({
            'api': apiEdoconductor,
            'text': 'descripcion',
            'value': 'descripcion'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="encustodia">       
        $form.find('select.encustodia').fillSelect({
            'api': apiEncustodia,
            'text': 'custodia',
            'value': 'custodia'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="edofisico">       
        $form.find('select.edofisico').fillSelect({
            'api': apiEdofisico,
            'text': 'estado',
            'value': 'estado'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="tipolicencia">       
        $form.find('select.tipolicencia').fillSelect({
            'api': apiTtpolicencia,
            'text': 'tipo_licencia',
            'value': 'tipo_licencia'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 
        //<editor-fold defaultstate="collapsed" desc="restriccioneslicencia">       
        $form.find('select.restriccioneslicencia').fillSelect({
            'api': apiRestriccioneslicencia,
            'text': 'descripcion',
            'value': 'descripcion'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold> 

        //<editor-fold defaultstate="collapsed" desc="selects ajax">  
        $.ajax({
            url: "/transito/api/index.php/transito/Cat_levantadopor",
            type: 'GET',
            dataType: 'JSON',
            async: true,
            data: {edoconductor: 'Lesionado'},
            success: function (data, textStatus, jqXHR) {
                $('#levantado_por_ss').empty().append('<option value=""> -- Seleccione -- </option>');
                var detenido = eval(data);
                var str = "";
                for (var i = 0; i < detenido.length; i++) {
                    str += '<option value="' + detenido[i]['Descripcion'] + '">' + detenido[i]['Descripcion'] + '</option>';
                }
                $('#levantado_por_ss').append(str);
            }
        });
        $.ajax({
            url: "/transito/api/index.php/transito/Cat_trasladadoa",
            type: 'GET',
            dataType: 'JSON',
            async: true,
            data: {edoconductor: 'Lesionado'},
            success: function (data, textStatus, jqXHR) {
                $('#trasladado_a_ss').empty().append('<option value=""> -- Seleccione -- </option>');
                var detenido = eval(data);
                var str = "";
                for (var i = 0; i < detenido.length; i++) {
                    str += '<option value="' + detenido[i]['Descripcion'] + '">' + detenido[i]['Descripcion'] + '</option>';
                }
                $('#trasladado_a_ss').append(str);
            }
        });
        $.ajax({
            url: "/transito/api/index.php/transito/Cat_detenido",
            type: 'GET',
            dataType: 'JSON',
            async: true,
            data: {competencia_judicial: 1},
            success: function (data, textStatus, jqXHR) {
                $('#detenido_en_cj').empty().append('<option value=""> -- Seleccione -- </option>');
                var detenido = eval(data);
                var str = "";
                for (var i = 0; i < detenido.length; i++) {
                    str += '<option value="' + detenido[i]['Descripcion'] + '">' + detenido[i]['Descripcion'] + '</option>';
                }
                $('#detenido_en_cj').append(str);
            }
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



        $('#agente_superviso').select2({
            placeholder: "--SELECCIONE--",
            allowClear: false
        }).on("change", function (e) {
            $('#gafete_agente_superviso').val($('#agente_superviso option:selected').text());
            $('#nombre_agente_superviso').val($('#agente_superviso').val());
        });
        $('#unidades_superviso').select2({
            placeholder: "--SELECCIONE--",
            allowClear: false
        }).on("change", function (e) {
            $('#unidad_superviso').val($('#unidades_superviso option:selected').text());
            $.ajax({
                url: "api/index.php/transito/Cat_unidad/?unidad=" + $('#unidades_superviso option:selected').val(),
                type: 'GET',
                dataType: 'JSON',
                async: false,
                success: function (data, textStatus, jqXHR) {
                    $('#sector_superviso').val(data[0]['Sector']);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        });
        $("#tabs").tabs();
        $('#marca').select2({
            placeholder: "--SELECCIONE--",
            allowClear: false
        }).on("change", function (e) {
            $('#submarca').val(null).trigger("change");
            $.ajax({
                url: "/transito/api/index.php/transito/Cat_marca",
                type: 'GET',
                dataType: 'JSON',
                async: false,
                data: {marca: this.value},
                success: function (data, textStatus, jqXHR) {
                    $('#submarca').empty().append('<option value=""> -- Seleccione -- </option>');
                    var marca = eval(data);
                    var str = "";
                    for (var i = 0; i < marca.length; i++) {
                        str += '<option value="' + marca[i]['SUBMARCA'] + '">' + marca[i]['SUBMARCA'] + '</option>';
                    }
                    $('#submarca').append(str);
                }
            });
        });
        $('#edoconductor').select2({
            placeholder: "--SELECCIONE--",
            allowClear: false
        }).on("change", function (e) {
            $('#detenido_en').val(null).trigger("change");
            $.ajax({
                url: "/transito/api/index.php/transito/Cat_detenido",
                type: 'GET',
                dataType: 'JSON',
                async: false,
                data: {edoconductor: this.value},
                success: function (data, textStatus, jqXHR) {
                    $('#detenido_en').empty().append('<option value=""> -- Seleccione -- </option>');
                    var detenido = eval(data);
                    var str = "";
                    for (var i = 0; i < detenido.length; i++) {
                        str += '<option value="' + detenido[i]['Descripcion'] + '">' + detenido[i]['Descripcion'] + '</option>';
                    }
                    $('#detenido_en').append(str);
                }
            });
            $.ajax({
                url: "/transito/api/index.php/transito/Cat_levantadopor",
                type: 'GET',
                dataType: 'JSON',
                async: false,
                data: {edoconductor: this.value},
                success: function (data, textStatus, jqXHR) {
                    $('#levantado_por').empty().append('<option value=""> -- Seleccione -- </option>');
                    var detenido = eval(data);
                    var str = "";
                    for (var i = 0; i < detenido.length; i++) {
                        str += '<option value="' + detenido[i]['Descripcion'] + '">' + detenido[i]['Descripcion'] + '</option>';
                    }
                    $('#levantado_por').append(str);
                }
            });
            $.ajax({
                url: "/transito/api/index.php/transito/Cat_trasladadoa",
                type: 'GET',
                dataType: 'JSON',
                async: false,
                data: {edoconductor: this.value},
                success: function (data, textStatus, jqXHR) {
                    $('#trasladado_a').empty().append('<option value=""> -- Seleccione -- </option>');
                    var detenido = eval(data);
                    var str = "";
                    for (var i = 0; i < detenido.length; i++) {
                        str += '<option value="' + detenido[i]['Descripcion'] + '">' + detenido[i]['Descripcion'] + '</option>';
                    }
                    $('#trasladado_a').append(str);
                }
            });
        });








        //</editor-fold> 

        if ($('#do').val() == '1') {
            //<editor-fold defaultstate="collapsed" desc="do 1">  
            $('#folio_accidente').attr('disabled', false);
            $.ajax({
                url: "api/index.php/transito/Accidentes_cabina",
                type: 'GET',
                dataType: 'JSON',
                data: {folio: $('#folio_accidente').val()},
                async: false,
                success: function (data, textStatus, jqXHR) {
                    console.log(textStatus);
                    $('#delegacion').val(data[0].delegacion).trigger("change");
                    $('#comandancia').val(data[0].comandancia).trigger("change");
                    $('#turno').val(data[0].turno).trigger("change");
                    $('#tipo_accidente').val(data[0].tipo_accidente).trigger("change");
                    $('#clas_accidente').val(data[0].clasificacion_de_accidente).trigger("change");
                    $('#calle1').val(data[0].calle1).trigger("change");
                    $('#calle2').val(data[0].calle2).trigger("change");
                    $('#colonia').val(data[0].colonia).trigger("change");
                    $('#fecha').val(data[0].fecha).trigger("change");
                    $('#hora').val(data[0].hora).trigger("change");
                    $('#estado').val('GUANAJUATO').trigger("change");
                    $('#municipio').val('LEÓN').trigger("change");
                    $('#agente').val(data[0].nombre_agente).trigger("change");
                    $('#unidades').val(data[0].unidad).trigger("change");
                    $('#cabina_id').val(data[0].id).trigger("change");


                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
            $('#folio_accidente').attr('disabled', true);
            //</editor-fold> 
        }
        $('#cargando').hide();
    });

    $("#agregar_vehiculos").on("click", function () {
        $('#vehiculos').toggle(function () {
            $(".block").animate("slow");
        });
        if (document.getElementById("agregar_vehiculos").value == "Agregar") {
            document.getElementById("agregar_vehiculos").value = "Cancelar";
        } else if (document.getElementById("agregar_vehiculos").value == "Cancelar") {
            document.getElementById("agregar_vehiculos").value = "Agregar";
        }
    });
    $("#agregar_saldo").on("click", function () {
        $('#saldo').toggle(function () {
            $(".block").animate("slow");
        });
        if (document.getElementById("agregar_saldo").value == "Agregar") {
            document.getElementById("agregar_saldo").value = "Cancelar";
        } else if (document.getElementById("agregar_saldo").value == "Cancelar") {
            document.getElementById("agregar_saldo").value = "Agregar";
        }
    });
    $("#agregar_judicial").on("click", function () {
        $('#judicial').toggle(function () {
            $(".block").animate("slow");
        });
        if (document.getElementById("agregar_judicial").value == "Agregar") {
            document.getElementById("agregar_judicial").value = "Cancelar";
        } else if (document.getElementById("agregar_judicial").value == "Cancelar") {
            document.getElementById("agregar_judicial").value = "Agregar";
        }
    });

    $("#agregar_valuo").on("click", function () {
        $('#peritos').toggle(function () {
            $(".block").animate("slow");
        });
        if (document.getElementById("agregar_valuo").value == "Agregar") {
            document.getElementById("agregar_valuo").value = "Cancelar";
        } else if (document.getElementById("agregar_valuo").value == "Cancelar") {
            document.getElementById("agregar_valuo").value = "Agregar";
        }
    });

});
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


function initMap() {
    var ciudad = {lat: 21.121897, lng: -101.682680};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: ciudad
    });


    google.maps.event.addListener(map, 'click', function (e) {
        deleteMarkers();
        placeMarker(e.latLng, map);
        document.getElementById("lat").value = e.latLng.lat();
        document.getElementById("lon").value = e.latLng.lng();
//        $('#map').hide('slow');
    });
//
//        var geocoder = new google.maps.Geocoder;
//        var infowindow = new google.maps.InfoWindow;

//        document.getElementById('submit').addEventListener('click', function () {
//            geocodeLatLng(geocoder, map, infowindow);
//        });

}





var markers = [];
function placeMarker(position, map) {
    var marker = new google.maps.Marker({
        position: position,
        animation: google.maps.Animation.DROP,
        map: map
    });
    markers.push(marker);
    /*<< Centra el mapa en el click >>
     map.setCenter(marker.getPosition());
     */
}

function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

function clearMarkers() {
    setMapOnAll(null);
}

function deleteMarkers() {
    clearMarkers();
    markers = [];
}

function geocodeLatLng(geocoder, map, infowindow) {
    var input = document.getElementById('latlng').value;
    var latlngStr = input.split(',', 2);
    var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
    geocoder.geocode({'location': latlng}, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                map.setZoom(11);
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map
                });
                infowindow.setContent(results[1].formatted_address);
                infowindow.open(map, marker);
            } else {
                window.alert('No results found');
            }
        } else {
            window.alert('Geocoder failed due to: ' + status);
        }
    });
}