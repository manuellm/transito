$(document).ready(function () {

    $('#btn_buscar').click(function (e) {
        $('#cargando').show();
        e.preventDefault();
        var form = $('#frm_busqueda').serialize();
        $.ajax({
            url: "views/tm_busqueda_eventos_list.php",
            type: 'POST',
            dataType: 'TEXT',
            async: false,
            data: form,
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

    $('.numero').numeric();
    $('#f1').datetimepicker({
        //mask: '9999-19-39',
        formatDate: 'Y-m-d',
        format: 'Y-m-d',
        timepicker: false

    });
    $('#f2').datetimepicker({
        // mask: '9999-19-39',
        formatDate: 'Y-m-d',
        format: 'Y-m-d',
        timepicker: false
    });

});