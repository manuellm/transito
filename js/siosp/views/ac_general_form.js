!function () {
    var $form = $('.form-general');
    var urlApi = 'api/index.php/academia/';    
    var apiEstado = new siosp.utils.Rest(urlApi, 'estados');        
    var apiGeneral = new siosp.utils.Rest(urlApi, 'general');
    var initSelects = function () {
        var $def = $.Deferred();
        var $fillEstados = $.Deferred();
        $.when($fillEstados).done(function () {            
            $def.resolve();
        });
        $form.find('select.siosp-select').siospSelects();                
        //<editor-fold defaultstate="collapsed" desc="estado">        
        $form.find('select.estado').fillSelect({
            'api': apiEstado,
            'text': 'nombre',
            'value': 'nombre'
        }).done(function () {            
            $fillEstados.resolve();
        });
        //</editor-fold> 
        return $def;
    };    
    $.when(initSelects()).done(function () {           
        var showHuellas = function () {
            $form.find('._huella').addClass("huella");
        };
        var hideHuellas = function () {
            $form.find('._huella').removeClass("huella");
        };
        $form.on('click', '.huella', function () {
            var input = this.dataset.input;
            $form.find("input."+input).click();
        }).on('click','._huella', function(e){
            e.preventDefault();
        });
        
        $form.simpleForm(apiGeneral,{
            onAfterFill : function (data){
                siosp.academia.setElementoSeleccionado(data);                
                var frontalUrl = urlApi + "files?do=FotoFrontal&key=" + data.key;
                var perfilUrl = urlApi + "files?do=FotoPerfil&key=" + data.key;
                var yemas = urlApi + "files?do=get&name=huellas-yemas.jpg&key=" + data.key;
                var palmaDerecha = urlApi + "files?do=get&name=huellas-palmaDerecha.jpg&key=" + data.key;
                var palmaIzquierda = urlApi + "files?do=get&name=huellas-palmaIzquierda.jpg&key=" + data.key;
                $form.find('img.img-foto-perfil').attr('src', perfilUrl);
                $form.find('img.img-foto-frontal').attr('src', frontalUrl);                               
                $form.find('img.yemas').attr('src', yemas);                               
                $form.find('img.palma-derecha').attr('src', palmaDerecha);                               
                $form.find('img.palma-izquierda').attr('src', palmaIzquierda);                               
                $form.find('.menu_fotos input, input.img-uploader').each(function(){
                    var $input = $(this);
                    $input.replaceWith($input.clone(true));
                });
                $form.find('.huella').addClass("_huella");
                hideHuellas();
            },
            prepareQuery : function (query) {
                console.log(query);
                return query;
            },
            afterSave : function () {                
                $form.find('.menu_fotos').hide();
            },
            prepare : function (data) {
                var fotoPerfil = $form.find('input.foto-perfil').prop('files')[0];
                var fotoFrontal = $form.find('input.foto-frontal').prop('files')[0];
                var fotoYemas = $form.find('input.yemas').prop('files')[0];
                var fotoPalmaDerecha = $form.find('input.palma-derecha').prop('files')[0];
                var fotoPalmaIzquierda = $form.find('input.palma-izquierda').prop('files')[0];
                data.FILES = {
                    fotoFrontal : fotoFrontal,
                    fotoPerfil : fotoPerfil,
                    fotoYemas : fotoYemas,
                    fotoPalmaDerecha : fotoPalmaDerecha,
                    fotoPalmaIzquierda : fotoPalmaIzquierda
                };                
                return data;
            },
            onBeginEdit : function () {
                $form.find('.menu_fotos').show();
                showHuellas();
            },
            onCancelEdit : function () {
                $form.find('.menu_fotos').hide();
                hideHuellas();
            },
            onBeginNew : function () {
                $form.find('.menu_fotos').show();
                var url = urlApi + "files?do=FotoFrontal&key=";
                $form.find('img.img-upload').attr('src',url);
                showHuellas();
            },
            onCancelNew : function () {
                $form.find('.menu_fotos').hide();
            }
        });
    });
}();