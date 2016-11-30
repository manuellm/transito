$(document).ready(function () {
    $('#folio_parte').select2({
        placeholder: "--SELECCIONE--",
        allowClear: false
    }).on("change", function (e) {
        $('#contenido').load('views/tm_captura_eventos.php', {folio: this.value, do: 1});
    });
});
getFolios();
function getFolios() {
    $.ajax({
        url: "api/index.php/transito/Accidentes_cabina?activo=2",
        type: 'GET',
        dataType: 'JSON',
        async: false,
        success: function (data, textStatus, jqXHR) {
            console.log(textStatus);
            for (var i = 0; i < data.length; i++) {
                $('#folio_parte').append('<option value="' + data[i].folio_evento + '">' + data[i].folio_evento + ' - ' + data[i].tipo_evento + '</option>');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}