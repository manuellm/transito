!function ($) {
    var fnsSelects = {
        //<editor-fold defaultstate="collapsed" desc="sino">
        sino: function ($select) {
            $select.fillSelect(['SI', 'NO']);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="statusElement">
        statusElemento: function ($select) {
            $select.fillSelect([
                'ASPIRANTE', 'CADETE', 'ELEMENTO ACTIVO', 'BAJA'
            ]);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="medio_com">
        medio_com: function ($select) {
            $select.fillSelect([
                'RADIO',
                'VOLANTEO',
                'ESTADIO',
                'MODULO INF',
                'RECLUTAMIENTO',
                'INTERNET',
                'RECOM. FAMILIAR',
                'CONOCIDOS',
                'PREGUNTANDO A OFICIALES',
                'VISITANDO LA ACADEMIA',
                'OTRO'
            ]);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="tipo_dom">
        tipo_dom: function ($select) {
            $select.fillSelect([
                'PROPIO',
                'RENTADO',
                'FAMILIAR',
                'CONOCIDO',
                'PRESTADO',
                'HEREDADO',
                'HIPOTECADO',
                'OTRO'
            ]);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="lug_nac">
        lug_nac: function ($select) {
            $select.fillSelect([
                'LEÓN',
                'SILAO',
                'IRAPUATO',
                'ROMITA'
            ]);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="genero">
        genero: function ($select) {
            $select.fillSelect([
                'HOMBRE',
                'MUJER'
            ]);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="estado_civil">
        estado_civil: function ($select) {
            $select.fillSelect([
                'CASADO(A)',
                'SOLTERO(A)',
                'DIVORCIADO(A)',
                'VIUDO(A)',
                'UNION LIBRE',
                'SEPARADO(A)'
            ]);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="memoria-psicologico">
        'memoria-psicologico': function ($select) {
            $select.fillSelect([
                'RETRÓGRADA', 'ANTERÓGRADA'
            ]);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="alto-bajo">
        'alto-bajo': function ($select) {
            $select.fillSelect([
                'ALTO', 'BAJO'
            ]);
        }
        //</editor-fold>

    };
    //<editor-fold defaultstate="collapsed" desc="$.fn.siospSelects">
    $.fn.siospSelects = function () {
        this.each(function () {
            var fn = this.dataset.select;
            fnsSelects[fn]($(this).addClass(fn));
        });
        return this;
    };
    //</editor-fold>
}(jQuery);