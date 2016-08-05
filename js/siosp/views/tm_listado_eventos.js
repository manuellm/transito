$(document).ready(function () {
    $('#btn_buscar').click(function (e) {
        e.preventDefault();
        $('#cargando').show();
        var form = $('#frm_busqueda').serialize();
        $.ajax({
            url: "views/tm_listado_eventos_list.php",
            type: 'POST',
            dataType: 'TEXT',
            async: false,
            data: form,
            success: function (data, textStatus, jqXHR) {
                console.log(textStatus);
                $('#resultado').html(data);
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
    $('.numero').numeric();
    $('#f1').datetimepicker({
        formatDate: 'Y-m-d',
        format: 'Y-m-d',
        timepicker: false

    });
    $('#f2').datetimepicker({
        formatDate: 'Y-m-d',
        format: 'Y-m-d',
        timepicker: false
    });
    $('select').select2({
        placeholder: "--SELECCIONE--",
        allowClear: false
    });
});