$(document).ready(function () {

    var $form = $('#frm_busqueda');
    var urlApi = 'api/index.php/transito/';
    var apiPension = new siosp.utils.Rest(urlApi, 'Cat_pension');

    var $fillDelegacion = $.Deferred();

    var initSelects = function () {
        //<editor-fold defaultstate="collapsed" desc="pension">       
        $form.find('select.pension').fillSelect({
            'api': apiPension,
            'text': 'nombre_pension',
            'value': 'id'
        }).done(function () {
            x = $fillDelegacion.resolve();
        });
        //</editor-fold>
    };

    $.when(initSelects()).done(function () {
        $('.numero').numeric();
        $('select').select2({
            placeholder: "--SELECCIONE--",
            allowClear: false
        });
        $('#fecha').datetimepicker({
            //mask: '9999-19-39',
            formatDate: 'Y-m-d',
            format: 'Y-m-d',
            timepicker: false
        });

    });

    $('#btn_buscar').click(function (e) {
        e.preventDefault();
        $('#cargando').show();
        var form = $('#frm_busqueda').serialize();
        $.ajax({
            url: "views/tm_list_control_folios_devolucion.php",
            type: 'POST',
            data: form,
            async: false,
            dataType: 'TEXT',
            success: function (data, textStatus, jqXHR) {
                $('#resultado').html(data);
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
    });

    $('#btn_nuevo').click(function (e) {
        e.preventDefault();
        $('#contenido').load('views/tm_captura_folios_devolucion.php', {});
    });

});