!function () {
    if (!window.siosp) {
        siosp = {};
    }
    if (!siosp.utils) {
        siosp.utils = {};
    }
    if (!siosp.academia) {
        siosp.academia = {};
    }

    siosp.utils.Rest = function (baseUrl, entity) {
        this.entity = entity;
        this.baseUrl = baseUrl;
    };
    siosp.utils.Rest.prototype = {
        getUrl: function () {
            return this.baseUrl + this.entity;
        },
        save: function (data, idKey) {
            if (data[idKey]) {
                var id = data[idKey];
                if (data.FILES) {
                    return this.doCreate(data, id);
                }
                return this.doUpdate(data, id);
            }
            return this.doCreate(data);
        },
        doCreate: function (data, id) {
            var $def = $.Deferred();
            var url = id ? this.getUrl() + "/" + id + "/" : this.getUrl();
            if (data.FILES) {
                var form = new FormData();
                $.each(data, function (index, value) {
                    if (index === 'FILES') {
                        $.each(value, function (fileName, file) {
                            form.append(fileName, file);
                        });
                    } else {
                        form.append(index, value);
                    }
                });
                $.ajax({
                    processData: false,
                    contentType: false,
                    url: url,
                    cache: false,
                    data: form,
                    type: 'POST'
                }).done(function () {
                    $def.resolve();
                });
            } else {
                $.ajax({
                    data: data,
                    url: url,
                    type: 'POST'
                }).done(function () {
                    $def.resolve();
                }).fail(function () {
                    $def.reject();
                });
            }
            return $def;
        },
        doDelete: function () {
            var $def = $.Deferred();
            return $def;
        },
        doUpdate: function (data, id) {
            var $def = $.Deferred();
            var url = this.getUrl() + "/" + id;
            $.ajax({
                'url': url,
                'method': 'PUT',
                'dataType': 'json',
                'data': data
            }).done(function () {
                $def.resolve();
            }).fail(function () {
                $def.reject();
            });
            return $def;
        },
        doGet: function (data) {
            var url = this.getUrl();
            return $.ajax({
                'url': url,
                'method': 'GET',
                'dataType': 'json',
                'data': data
            }).done(function () {
                console.log("ok");
            }).fail(function () {
                console.log("fail");
            });
        }
    };
}();
