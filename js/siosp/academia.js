if(!siosp){
    siosp={};
}
!function ($){
    var elementoSeleccionado = null;
    siosp.academia = {
        URL_API : 'api/index.php/academia/',
        FILES_SERVICE : 'files',
        //<editor-fold defaultstate="collapsed" desc="setElemetnoSeleccionado">
        getElementoSeleccionado: function () {
            return elementoSeleccionado;
        },
        //</editor-fold>        
        //<editor-fold defaultstate="collapsed" desc="setElementoSeleccionado">
        setElementoSeleccionado: function (elemento) {
            elementoSeleccionado = elemento;
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="getURLFotoFrontalElementoSeleccionado">
        getURLFotoFrontalElementoSeleccionado: function () {
            var elemento = this.getElementoSeleccionado();            
            var url = this.URL_API + this.FILES_SERVICE + "?do=FotoFrontal&key="+ elemento.key;
            return url;
        }
        //</editor-fold>
    };    
    //<editor-fold defaultstate="collapsed" desc="$.fn.loadView">
    $.fn.loadView = function () {
        this.each(function(){
            var $this = $(this);            
            $this.click(function(e){
                e.preventDefault();
                var url = this.dataset.view;
                $("#cargando").show();
                $("#contenido").load(url, function(response, status, xhr) {
                    if (status == "error") {
                        var msg = "Lo sentimos, pero ha habido un error: ";
                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                        $("#cargando").hide();
                    } else {
                        $("#cargando").hide();
                    }
                });
            });
            
        });
        return this;
    };
    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="$.fn.showElementoSeleccionado">
    $.fn.showElementoSeleccionado = function (){
        this.each(function(){
            var $this = $(this);
            var elemento = siosp.academia.getElementoSeleccionado();
            if(!elemento) {                
                return;
            }
            $this.find("span.clave_gral").html(elemento.clave_gral);
            $this.find("span.rfc").html(elemento.rfc);
            $this.find("span.curp").html(elemento.curp);
            $this.find("span.nombre").html(elemento.nombre);
            $this.find("span.email").html(elemento.email);
            $this.find("span.apellido_pa").html(elemento.apellido_pa);
            $this.find("span.apellido_ma").html(elemento.apellido_ma);
            $this.find("span.telefono1").html(elemento.telefono1 !== "null" ? elemento.telefono1 : "");
            $this.find("span.telefono2").html(elemento.telefono2 !== "null" ? elemento.telefono2: "");
            $this.find("span.telefono3").html(elemento.telefono3 !== "null" ? elemento.telefono3 : "");
            $this.find("span.status_tipo").html(elemento.status_tipo);
            $this.find("img.foto-frontal").attr("src", siosp.academia.getURLFotoFrontalElementoSeleccionado());
        });
        return this; 
    };
    //</editor-fold>
}(jQuery);