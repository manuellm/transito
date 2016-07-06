!function ($) {
    $.fn.fillSelect = function (arr) {
        var $this = this;
        if ($.isPlainObject(arr)) {
            if (arr.api) {
                var $def = $.Deferred();
                arr.api.doGet().done(function (datos) {
                    var $frag = $(document.createDocumentFragment());
                    $.each(datos, function (i, dato) {
                        $frag.append('<option value="' + dato[arr.value ? arr.value : arr.text] + '">' + dato[arr.text] + '</option>');
                    });
                    $this.each(function () {
                        $frag.clone().appendTo(this);
                    });
                    $def.resolve();
                });

                return $def;
            }
        }

        if ($.isArray(arr)) {
            var $frag = $(document.createDocumentFragment());
            $.each(arr, function (i, o) {
                var text, value;
                switch ($.type(o)) {
                    case 'string':
                        text = o;
                        value = o;
                        break;
                    case 'array':
                        text = o[0];
                        value = o[1] ? o[1] : o[0];
                        break;
                    default:
                        throw new Error("fillSelect => Formato no valido");
                }
                $frag.append('<option value="' + value + '">' + text + '</option>');
            });
            this.each(function () {
                $frag.clone().appendTo(this);
            });
        }

        return this;
    };
}(jQuery);
