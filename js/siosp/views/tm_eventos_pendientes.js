function edit_folio(folio) {
    $('#contenido').load('views/tm_control_eventos.php', {folio: folio, control: 1});
}
function view_folio(folio) {
    $('#contenido').load('views/tm_control_eventos.php', {folio: folio, control: 2});
}
!function () {
    var pendientes;
    //<editor-fold defaultstate="collapsed" desc="demo">       
    //</editor-fold> 
    //<editor-fold defaultstate="collapsed" desc="api folios pendientes">       
    $.ajax({
        url: "api/index.php/transito/Accidentes_cabina?activo=2",
        type: 'GET',
        async: false,
        dataType: 'JSON',
        success: function (data, textStatus, jqXHR) {
            console.log(textStatus);
            pendientes = data;
        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
    //</editor-fold>     
    //<editor-fold defaultstate="collapsed" desc="view accordion">     
    var heder =
            '<table width="100%" border="1" cellpadding="0" cellspacing="0">' +
            '<tr style="background-color: #006a91;color: #fff;">' +
            '<th>Opcion</th>' +
            '<th>Reporta</th>' +
            '<th>Int.</th>' +
            '<th>Tipo</th>' +
            '<th>Resultado</th>' +
            '<th>Grua</th>' +
            '<th>Part</th>' +
            '</tr>';
    var body = '';
    var footer = '</table>';
    for (var i = 0; i < pendientes.length; i++) {
        body =
                '<tr>' +
                '<td style="text-align: LEFT; padding:10px;">' +
                '<a href="#" onclick="edit_folio(' + pendientes[i]['id'] + ')" title="EDITAR EVENTO"><img src="img/editar.png"></a>' +
                '<a href="#" onclick="view_folio(' + pendientes[i]['id'] + ')" title="VER EVENTO"><img src="img/ver.png"></a>' +
                '</td>' +
                '<td style="text-align: center;">' + pendientes[i]['reporta'] + '</td>' +
                '<td style="text-align: center;">' + pendientes[i]['unidad'] + ' / ' + pendientes[i]['gafete_agente'] + '</td>' +
                '<td style="text-align: center;">' + pendientes[i]['tipo_accidente'] + '</td>' +
                '<td style="text-align: center;">' + pendientes[i]['tipo_evento'] + '</td>' +
                '<td style="text-align: center;">' + pendientes[i]['grua'] + '</td>' +
                '<td style="text-align: center;">' + pendientes[i]['servicio'] + '</td>' +
                '</tr>';
        var accodion =
                '<h3>Folio: ' + pendientes[i]['folio_evento']
                + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha: ' + pendientes[i]['fecha']
                + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hora: ' + pendientes[i]['hora']
                + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;57: ' + pendientes[i]['no_de_heridos']
                + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;58: ' + pendientes[i]['no_de_muertos']
                + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N: ' + pendientes[i]['normales']
                + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EI: ' + pendientes[i]['ei']
                + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EC: ' + pendientes[i]['ec']
                + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETENIDOS: ' + pendientes[i]['no_de_detenidos']
                + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VEHÍCULOS INVOLUCRADOS: ' + pendientes[i]['no_vehiculos_participantes']
                + '<br/>Lugar: ' + pendientes[i]['calle1']
                + '</h3>' +
                '<div><br/>' +
                heder + body + footer +
                '<br/><br/></div>';
        $('#eventos_pendientes').append(accodion);
    }
    $("#eventos_pendientes").accordion({
        collapsible: true,
        active: false
    });
    //</editor-fold> 

}();


