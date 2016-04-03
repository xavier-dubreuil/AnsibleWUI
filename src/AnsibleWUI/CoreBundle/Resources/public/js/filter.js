jQuery.extend(jQuery.expr[':'], {
    'filter': function (el) {
        return $(el).attr('data-filter') !== undefined;
    }
});

(function (window) {
    window.Filter = {
        'initialize': function () {
            $('*:filter', document).each(function () {
                $(this).on('change', function () {
                    Filter.filter(this);
                });
                Filter.filter(this);
            });
        },
        'inArray': function (needle, haystack) {
            var length = haystack.length;
            for (var i = 0; i < length; i++) {
                if (haystack[i] == needle) {
                    return true;
                }
            }
            return false;
        },
        'contains': function (element, haystack) {
            for (var i = 0; i < haystack.length; i++) {
                if ($(element).text().toLowerCase().indexOf(haystack[i].toLowerCase()) > -1) {
                    return true;
                }
            }
            return false;
        },
        'filter': function (select) {
            var datatable = $($(select).attr('data-filter'));

            var filter = [];
            $('option:selected', select).each(
                function () {
                    var filterName = $(this).attr('name') === undefined ? '__search' : $(this).attr('name');
                    if (filter[filterName] === undefined) {
                        filter[filterName] = [];
                    }
                    filter[filterName].push($(this).val());
                }
            );
            $('tbody tr', datatable).each(
                function () {
                    var row = this;
                    $(row).show();
                    for (var key in filter) {
                        if (filter.hasOwnProperty(key)) {
                            if (key == '__search') {
                                if (!Filter.contains(this, filter[key])) {
                                    $(this).hide();
                                }
                            } else if (!Filter.inArray($(this).attr('data-' + key), filter[key])) {
                                $(this).hide();
                            }
                        }
                    }
                }
            );

        }
    };
})(window);

$(document).ready(function () {
    Filter.initialize();
});