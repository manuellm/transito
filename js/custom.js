
function goToByScroll(id) {
    $('html,body').animate({scrollTop: $("#" + id).offset().top}, 'slow');
}


var loadcontent = function (p, num_total, bus) {

    $("#more-items").remove();
    num = ((p - 1) * 10) + 1;
    pag = p + 1;
    num_ini = num;
    $.ajax({
        type: "POST",
        url: 'ajax_content.php?p=' + p + '&bus=' + bus,
        async: false,
        success: function (datos) {
            var dataJson = eval(datos);

            if (dataJson == null) {
                  $("html, body").animate({scrollTop: 580}, 600);
//                $("#list-items").append('SIN MAS RESULTADOS');
            } else {
                for (var i in dataJson) {
                    $("#list-items").append('<li id="item-' + num + '"><h2>' + num + '</h2>' +
                            '<span class="autor">' + '<a  class="" href="?cvn='+dataJson[i].comentario_id_noticias+'" id="not_' + dataJson[i].comentario_id_noticias + '">' +
                            dataJson[i].comentario_titulo_ntc + '</a>' + '</span>' +
                            '<span class="contenido"><br/>'
                            + dataJson[i].comentario_fecha_noticia + '<br/>' + dataJson[i].comentario_intro_ntc + '</span></li>');
                    num++;
                }
                if (num < num_total) {
                    $("#list-items").append('<li id="more-items">' +
                            '<a href="javascript:void(0);" onclick="loadcontent(' + pag + ',' + num_total + ',' + bus + ')">Cargar mas ...</a>' +
                            '</li>');

                }
                goToByScroll("item-" + num_ini);
            }

        }
    });
    return false;
};

