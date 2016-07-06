!function ($) {
    'use strict';
    //<editor-fold defaultstate="collapsed" desc="constructor simpleForm">
    var simpleForm = function (apiRest, $form, args) {
        this.apiRest = apiRest;
        this.$form = $form;
        this.total = null;
        this.tableDescription = null;
        this.currentRecord = 0;
        this.sourceQuery = [];
        this.args = args;
        this.onAfterFill = args.onAfterFill ? args.onAfterFill : $.noop;
        this.onBeginEdit = args.onBeginEdit ? args.onBeginEdit : $.noop;
        this.onBeginNew = args.onBeginNew ? args.onBeginNew : $.noop;
        this.onCancelNew = args.onCancelNew ? args.onCancelNew : $.noop;
        this.onCancelEdit = args.onCancelEdit ? args.onCancelEdit : $.noop;
        this.prepare = args.prepare ? args.prepare : this.defaultPrepare;
        this.afterSave = args.afterSave ? args.afterSave : this.afterSave;
        this.prepareQuery = args.prepareQuery ? args.prepareQuery : function (d) {
            return d;
        };
        this.onNoResult = args.onNoResult ? args.onNoResult : $.noop;
        this.init();
    };
    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="prototype simpleForm">
    simpleForm.prototype = {
        //<editor-fold defaultstate="collapsed" desc="setCurrentRecord">
        setCurrentRecord: function (record) {
            this.$form.find('.current_p').html(record + 1);
            this.currentRecord = record;
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="getCurrentRecord">
        getCurrentRecord: function () {
            return this.currentRecord;
        },
        //</editor-fold>        
        //<editor-fold defaultstate="collapsed" desc="setSourceQuery">
        setSourceQuery: function (arr) {
            if (arr.length) {
                this.$form.find('.btn-clean-search').show();
            } else {
                this.$form.find('.btn-clean-search').hide();
            }
            this.sourceQuery = arr;
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="getSourceQuery">
        getSourceQuery: function () {
            var source = this.sourceQuery;
            return this.prepareQuery(source);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="getQuery">
        getQuery: function () {
            var query = {};
            $.each(this.getSourceQuery(), function () {
                query[this.field] = sprintf(this.opc, this.value).replace(/\|/g, "%");
            });
            return query;
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="getData">
        getData: function () {
            var self = this;
            var query = this.getQuery();
            return  this.apiRest.doGet({
                'init': this.getCurrentRecord(),
                'query': query,
                'limit': 1
            }).done(function (data) {
                self.data = data[0];
                if (data[0]) {
                    self.fillForm();
                } else {
                    self.emptyResult.apply(self, [data]);
                }

            });
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="hideNavBtns">
        hideNavBtns: function () {
            if (this.getCurrentRecord() === this.total - 1) {
                this.$form.find('.btn-last, .btn-next').prop('disabled', true).css('opacity', 0.2);
                this.$form.find('.btn-first, .btn-prev').prop('disabled', false).css('opacity', 1);
            } else if (this.getCurrentRecord() === 0) {
                this.$form.find('.btn-first, .btn-prev').prop('disabled', true).css('opacity', 0.2);
                this.$form.find('.btn-last, .btn-next').prop('disabled', false).css('opacity', 1);
            } else {
                this.$form.find('.btn-last, .btn-next, .btn-first, .btn-prev').prop('disabled', false).css('opacity', 1);
            }
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="initForm">
        initForm: function () {
            var self = this;
            $.each(this.tableDescription, function () {
                var field = this;
                var $input = self.$form.find('.' + field);
                var $span = $('<span class="' + field + ' _or">[$' + field + ']</span>');
                $input.addClass("_input").hide();
                if ($input.is("textarea")) {
                    if ($input.is('.to-pre')) {
                        $span = $('<pre class="' + field + ' _or">[$' + field + ']</pre>');
                    }
                    $span.addClass("input-textarea");
                }
                if ($input.is(".input-date")) {
                    $span.addClass('input-date');
                    $input.datepicker({
                        'language': 'es',
                        'format': 'dd/mm/yyyy'
                    });
                }
                if ($input.is("input[type='checkbox']")) {
                    $span.addClass("span-checkbox");
                }
                $input.after($span);
            });
            self.$form.find('.btn-cancel').hide();
            self.$form.find('.btn-save').hide();
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="cancelEdit">
        cancelEdit: function () {
            var self = this;
            self.$form.find('._input').hide();
            self.$form.find('._or').show();
            this.fillForm();
            this.onCancelEdit.apply(this);
        },
        setNavMode: function () {
            var self = this;
            this.$form.find('.btn-cancel, .btn-save, ._input').hide();
            this.$form.find('.btn-edit, .btn-new, ._or').show();
            this.status = "nav";
            this.getData().done(function () {
                self.fillForm();
            });

            this.hideNavBtns();
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="cancelNew">
        cancelNew: function () {
            this.setNavMode();
            this.onCancelNew.apply(this);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="fillForm">
        fillForm: function () {
            var data = this.data;
            var $form = this.$form;
            $.each(data, function (key, value) {
                var $input = $form.find("." + key);
                $input.each(function () {
                    var $this = $(this);
                    switch (this.tagName) {
                        case 'PRE':
                            $this.html(value);
                            break;
                        case 'SPAN':
                            if ($this.is('._or.span-checkbox')) {
                                if (value === 1 || value === "1") {
                                    $this.removeClass('unchecked');

                                } else {
                                    $this.addClass('unchecked');
                                }
                            }
                            if ($this.is('.input-date')) {
                                break;
                            }
                            $this.html($this.is('.input-textarea') ? (value ? value.replace(/\n/g, "<br>") : "") : value);
                            break;
                        case 'TEXTAREA':
                            $(this).html(value);
                            break;
                            break;
                        case 'INPUT':
                            if ($this.is('.input-date')) {
                                if (value) {
                                    var date = new Date(Date.parse(value.replace('-', '/', 'g')));
                                    date.setHours(0);
                                    date.setMinutes(0);
                                    date.setSeconds(0);
                                    $this.datepicker('setDate', date);
                                    var $input = $form.find('span.' + key).html($this.val());
                                }
                                break;
                            }
                            switch (this.type) {
                                case 'checkbox':
                                    this.checked = (value === "1" || value === 1);
                                    break;
                                case 'text':
                                default:
                                    this.value = value;
                            }
                            break;
                        case 'SELECT' :
                            var selector = "option[value='" + value + "']";
                            $(this).find(selector).prop("selected", true);
                            break;
                    }
                });
            });
            this.onAfterFill.apply(this, [data]);
            $form.find(".result").fadeIn("slow");
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="emptyResult">
        emptyResult: function (data) {
            this.$form.find('.no-result').show();
            this.$form.find('.searching, .btn-edit, .result').hide();

            this.onNoResult(data);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="onClickFirstBtn">
        onClickFirstBtn: function () {
            this.setCurrentRecord(0);
            this.getData();
            this.hideNavBtns();
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="blockNav">
        blockNav: function () {
            this.$form.find('.btn-next, .btn-prev, .btn-first, .btn-last').prop('disabled', true).css('opacity', 0.2);
        },
        //</editor-fold>        
        //<editor-fold defaultstate="collapsed" desc="onClickEditBtn">
        onClickEditBtn: function () {
            this.status = "editing";
            this.$form.find('._or').hide();
            this.$form.find('._input').show();
            this.$form.find('.btn-edit, .btn-new, .btn-search').hide();//.prop('disabled', true);
            this.$form.find('.btn-cancel, .btn-save').show();
            this.blockNav();
            this.onBeginEdit.apply(this);
            $(window).scrollTop(0);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="onClickCancelBtn">
        onClickCancelBtn: function () {
            switch (this.status) {
                case "editing":
                    this.cancelEdit();
                    break;
                case "creating":
                    this.cancelNew();
                    break;
            }
            ;
            this.$form.find('.btn-edit, .btn-new').show();
            this.$form.find('.btn-cancel, .btn-save').hide();
            this.hideNavBtns();
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="onClickNewBtn">
        onClickNewBtn: function () {
            this.blockNav();
            $(window).scrollTop(0);
            this.status = "creating";
            this.$form.find('._or').hide();
            this.$form.find('.btn-edit, .btn-new').hide();
            this.$form.find('.btn-cancel, .btn-save').show();
            this.$form.find('._input').show().each(function () {
                var input = this;
                switch (input.tagName) {
                    case 'INPUT':
                        switch (input.type) {
                            case 'checkbox':
                                input.checked = false;
                                break;
                            default:
                                input.value = "";
                        }
                        break;
                    case 'SELECT':
                        input.selectedIndex = 0;
                        break;
                    case 'TEXTAREA':
                        input.innerHTML = "";
                        break;
                }
            });
            this.onBeginNew.apply(this);
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="onClickBtnSave">
        onClickBtnSave: function () {
            this.save();
        },
        afterSave: $.noop,
        getIdKey: function () {
            return this.tableDescription[this.tableDescription.length - 1];
        },
        getFormData: function () {
            var data = {};
            var self = this;
            $.each(this.tableDescription, function (i, field) {
                var $input = self.$form.find('._input.' + field);
                if ($input.is('.input-date')) {
                    var date = $input.datepicker('getDate');
                    if (date && (date.getTime() === date.getTime())) {
                        var strDate = sprintf("%d-%02d-%02d 00:00:00",
                                date.getFullYear(),
                                date.getMonth() + 1,
                                date.getDate());
                        data[field] = strDate;
                    }
                    return;
                }
                if ($input[0]) {
                    switch ($input.prop('tagName')) {
                        case 'TEXTAREA':
                        case 'SELECT':
                        case 'INPUT':
                            switch ($input.prop('type')) {
                                case 'checkbox':
                                    data[field] = $input.prop("checked") ? 1 : 0;
                                    break;
                                default:
                                    data[field] = $input.val();
                            }
                            break;
                    }
                }
            });
            if (this.status === "editing") {
                var id = this.getIdKey();
                data[id] = this.data[id];
            }
            return data;
        },
        defaultPrepare: function (data) {
            return this.data;
        },
        save: function () {
            var self = this;
            var data = this.prepare(this.getFormData());
            this.apiRest.save(data, this.getIdKey()).done(function (res) {
                self.setNavMode();
                self.afterSave(data, res);
            });
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="onChangeImgInput">
        onChangeImgInput: function (input, event) {
            var src = URL.createObjectURL(event.target.files[0]);
            console.log("img." + input.dataset.preview);

            $("img." + input.dataset.preview).each(function () {
                this.src = src;
            });
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="onClickBtnCleanSearch">
        onClickBtnCleanSearch: function () {
            var self = this;
            this.setCurrentRecord(0);
            this.setSourceQuery([]);
            this.getTotal().done(function () {
                self.getData();
            });
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="onClickSearchBtn">
        onClickSearchBtn: function () {
            var self = this;
            var $div = $("<div>Cargando...</div>");
            $div.on('click', '.input-clean', function () {
                var field = this.dataset.field;
                $div.find('.value_' + field).val("");
                $div.find('.opc_' + field).prop('selectedIndex', 0);
            });
            var $defLoadForm = $.Deferred();
            var $defShowDialog = $.Deferred();
            var dialog = BootstrapDialog.show({
                'title': 'Busqueda',
                'message': $div,
                size: BootstrapDialog.SIZE_WIDE,
                onshown: function () {
                    $defShowDialog.resolve();
                },
                buttons: [{
                        label: "Buscar",
                        action: function (d) {
                            var querys = [];
                            $div.find('.field').each(function () {
                                var field = this.dataset.field;
                                var opc = $div.find('.opc_' + field).val();
                                var value = $div.find(".value_" + field).val();
                                if (value) {
                                    querys.push({
                                        field: field,
                                        opc: opc,
                                        value: value
                                    });
                                }
                            });
                            var objQueryBk = self.getSourceQuery();
                            self.setSourceQuery(querys);
                            self.getTotal().done(function (total) {
                                if (total) {
                                    self.setCurrentRecord(0);
                                    self.getData();
                                    d.close();
                                } else {
                                    BootstrapDialog.alert("No se encontraron registros");
                                    self.setSourceQuery(objQueryBk);
                                }
                            });
                        }}, {
                        label: 'Cancelar',
                        action: function (d) {
                            d.close();
                        }
                    }
                ]
            });
            $.when($defLoadForm, $defShowDialog).then(function () {
                dialog.$modalFooter.slideDown("slow");
            });
            $.get("views/index.php/dialogs.busqueda-general", function (form) {
                $div.fadeOut(100, function () {
                    $div.empty().append(form).show();
                    var arrQuery = self.getSourceQuery();
                    console.log(arrQuery);
                    $.each(arrQuery, function () {
                        $div.find('option[value="' + this.opc + '"]').prop('selected', true);
                        $div.find('.value_' + this.field).val(this.value);
                    });
                    $defLoadForm.resolve();
                });
            });
            dialog.$modalFooter.hide();
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="initEvents">        
        initEvents: function () {
            var $form = this.$form;
            var self = this;
            //<editor-fold defaultstate="collapsed" desc="click btn-next">
            $form.on('click', '.btn-next', function (e) {
                e.preventDefault();
                self.getTotal().done(function () {
                    if (self.getCurrentRecord() < self.total - 1) {
                        self.setCurrentRecord(self.getCurrentRecord() + 1);
                        self.getData();
                    }
                    self.hideNavBtns();
                });
            });
            //</editor-fold>
            //<editor-fold defaultstate="collapsed" desc="click btn-prev">
            $form.on('click', '.btn-prev', function (e) {
                e.preventDefault();
                if (self.getCurrentRecord() >= 1) {
                    self.setCurrentRecord(self.getCurrentRecord() - 1);
                    self.getData();
                }
                self.hideNavBtns();
            });
            //</editor-fold>
            //<editor-fold defaultstate="collapsed" desc="click btn-first">
            $form.on('click', '.btn-first', function (e) {
                e.preventDefault();
                self.onClickFirstBtn();
            });
            //</editor-fold>
            //<editor-fold defaultstate="collapsed" desc="click btn-last">
            $form.on('click', '.btn-last', function (e) {
                e.preventDefault();
                self.getTotal().done(function (total) {
                    self.setCurrentRecord(total - 1);
                    self.getData();
                    self.hideNavBtns();
                });
            });
            //</editor-fold>
            //<editor-fold defaultstate="collapsed" desc="click btn-new">
            $form.on('click', '.btn-new', function (e) {
                e.preventDefault();
                self.onClickNewBtn();
            });
            //</editor-fold>
            //<editor-fold defaultstate="collapsed" desc="click btn-save">
            $form.on('click', '.btn-save', function (e) {
                e.preventDefault();
                self.onClickBtnSave();
            });
            $form.find('input.img-uploader').change(function (e) {
                self.onChangeImgInput(this, e);
                e.preventDefault();
            });
            //</editor-fold>
            //<editor-fold defaultstate="collapsed" desc="click btn-cancel">
            $form.on('click', '.btn-cancel', function (e) {
                self.onClickCancelBtn();
                e.preventDefault();
            });
            //</editor-fold>
            //<editor-fold defaultstate="collapsed" desc="click btn-edit">
            $form.on('click', '.btn-edit', function (e) {
                self.onClickEditBtn();
                e.preventDefault();
            });
            //</editor-fold>
            //<editor-fold defaultstate="collapsed" desc="click btn-search">
            $form.on('click', '.btn-search', function (e) {
                e.preventDefault();
                self.onClickSearchBtn();
            });
            //</editor-fold>
            //<editor-fold defaultstate="collapsed" desc="click btn-clean-search">
            $form.on('click', '.btn-clean-search', function (e) {
                e.preventDefault();
                self.onClickBtnCleanSearch();
            });
            //</editor-fold>
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="getTotal">
        getTotal: function () {
            var self = this;
            return this.apiRest.doGet({
                'count-rows': true,
                'query': self.getQuery()
            }).done(function (total) {
                self.total = total;
                self.$form.find('.p_total').html(total);
            });
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="getDescription">
        getDescription: function () {
            return this.apiRest.doGet({
                'getDescription': true
            });
        },
        //</editor-fold>
        //<editor-fold defaultstate="collapsed" desc="init">
        init: function () {
            var $getTotal = this.getTotal();
            var $getDescription = this.getDescription();
            var self = this;
            this.$form.find('.btn-clean-search').hide();
            $.when($getTotal, $getDescription).done(function (total, description) {
                self.tableDescription = description[0];
                self.initForm();
                self.initEvents();
                self.onClickFirstBtn();
            });
        }
        //</editor-fold>
    };
    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="init jQuery plugin simpleForm">
    $.fn.simpleForm = function (apiRest, args) {
        this.each(function () {
            var $form = $(this);
            new simpleForm(apiRest, $form, args);
        });
        return this;
    };
    //</editor-fold>
}(jQuery);