$(document).ready(function () {
    $('.numero').numeric();
    $('select').select2({
        placeholder: "--SELECCIONE--",
        allowClear: false
    });
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
    $('#btn_buscar').click(function (e) {
        e.preventDefault();
        $('#cargando').show();
        var form = $('#frm_busqueda').serialize();
        $.ajax({
            url: "views/tm_busqueda_infracciones_list_" + $('#ck_busqueda').val() + ".php",
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
});
function toggle(elemento) {    
    $('#ck_busqueda').val(elemento.value);
    $('#resultado').empty();
    if (elemento.value == "a") {
        document.getElementById("uno").style.display = "block";
        document.getElementById("dos").style.display = "none";
        document.getElementById("tres").style.display = "none";
    } else if (elemento.value == "b") {
        document.getElementById("uno").style.display = "none";
        document.getElementById("dos").style.display = "block";
        document.getElementById("tres").style.display = "none";
    } else if (elemento.value == "c") {
        document.getElementById("uno").style.display = "none";
        document.getElementById("dos").style.display = "none";
        document.getElementById("tres").style.display = "block";
    }
}