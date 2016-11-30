$(document).ready(function () {
    var $form = $('#frm_captura');
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
    });
    $('#btn_guardar').click(function (e) {
        e.preventDefault();
        $('#cargando').show();
        var form = $('#frm_captura').serialize();
        $.ajax({
            url: "views/tm_selector.php",
            type: 'POST',
            data: form,
            async: false,
            dataType: 'TEXT',
            success: function (data, textStatus, jqXHR) {
                console.log(textStatus);
                window.scrollTo(0, 0);
                $("#contenido").empty();
                alertify.alert('SIOSP - TRANSITO', '<center><strong>BLOCK GUARDADO CORRECTAMENTE</strong></center>');
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
    $('#btn_cancelar').click(function (e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $("#contenido").empty();

    });
});