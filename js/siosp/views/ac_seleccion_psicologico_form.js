!function ($) {
    $('select.siosp-select').siospSelects();
    $('.form_ex_piscologico').showElementoSeleccionado();
    var $form = $('.form_ex_piscologico');
    var urlApi = 'api/index.php/academia/';
    var apiSicologico = new siosp.utils.Rest(urlApi, 'sicolo');
    var getClaveGral = function () {
        var elemento = siosp.academia.getElementoSeleccionado();
        return elemento.clave_gral;
    };
    $form.on('click', '.chk-date', function(){        
        if(this.checked){
            $(this).closest('td').find('input[type="text"]').show();
        } else {
            $(this).closest('td').find('input[type="text"]').hide();
        }
    });
//    $form.on('click', '.', function () {
//        
//    });
    $form.simpleForm(apiSicologico, {
        //<editor-fold defaultstate="collapsed" desc="onNoResult">
        onNoResult: function () {            
            $form.find('.clave_gral:eq(1)').html(getClaveGral());
            $form.find('.tr-id-psicologico, .tr-id-prueba-date').hide(); 
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="onBeginNew">
        onBeginNew : function () {            
            $form.find('.result').show();
            $form.find('.no-result, .searching').hide();
            $form.find('.tr-id-prueba-date').show();
            $form.find('input.input-date').hide();
            $form.find('textarea').width("740").height("200px");  
            $form.find('.fecha.input-date').show();
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="onAfterFill">
        onAfterFill: function () {
            $form.find('.chk-date').each(function(){
                if(!this.checked){
                    $(this).closest("td").find('span.input-date').hide();
                }else {
                    $(this).closest("td").find('span.input-date').show();
                }
            });
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="prepareQuery">
        prepareQuery: function (query) {
            var elemento = siosp.academia.getElementoSeleccionado();
            query.push({
                field: "clave_gral",
                opc: "%s",
                value: elemento.clave_gral
            });
            return query;
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="prepere">
        prepare: function(data){           
            data.clave_gral = getClaveGral();
            return data;
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="onBeginEdit">
        onBeginEdit: function () {
            $form.find('.chk-date').each(function(){
                if(!this.checked){
                    $(this).closest("td").find('input.input-date').hide();
                }else {
                    $(this).closest("td").find('input.input-date').show();
                }
            });
        },
        //</editor-fold>
        afterSave: $.noop,        
        onCancelEdit: $.noop,
        onCancelNew: $.noop
    });
}(jQuery);