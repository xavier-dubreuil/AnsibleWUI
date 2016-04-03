jQuery.extend(jQuery.expr[':'], {
    'table': function (el) {
        return $(el).attr('data-table') !== undefined;
    }
});

(function (window) {
    window.Tables = {
        'initialize': function () {
            $('*:table', document).each(function () {
                var standard = {
                    'searching' : false,
                    'paging' : false,
                    'lengthChange' : false,
                    'info' : false,
                    'pageLength' : 10
                };
                var parameters;
                try {
                    parameters = $.parseJSON($(this).attr('data-table'));
                } catch (e) {
                    parameters = {}
                }
                var options = $.extend(standard, parameters);

                options.columnDefs = [];
                options.order = [];

                $('thead th', this).each(function() {

                    options.columnDefs.push({
                        'targets': $(this).index(),
                        'orderable': $(this).attr('data-sort') == 'true'
                    });
                    if ($(this).attr('data-order') !== undefined) {
                        options.order.push(
                            [$(this).index(), $(this).attr('data-order')]
                        );
                    }
                });

                $(this).DataTable(options);
            });
        }
    };
})(window);

$(document).ready(function () {
    Tables.initialize();
});