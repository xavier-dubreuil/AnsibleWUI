jQuery.extend(jQuery.expr[':'], {
    'sortable': function (el) {
        return $(el).attr('data-sortable') !== undefined;
    },
    'order': function (el) {
        return $(el).attr('data-order') !== undefined;
    }
});

(function (window) {
    window.Sortable = {
        'initialize': function () {
            $('*:sortable', document).each(function () {
                var container = this;
                var parameters = $(container).attr('data-sortable');
                $(container).sortable(window.Sortable.options(parameters));
                $(container).bind('DOMNodeInserted', function () {
                    Sortable.reorder(container);
                });
                $(this).on('DOMNodeRemoved', function () {
                    setTimeout(function () {
                        Sortable.reorder(container);
                    }, 10);
                });
            });
        },
        'options': function (arguments) {
            var options = {};
            var parameters = arguments.split(',');
            for (var i = 0; i < parameters.length; i++) {
                var parameter = parameters[i].split('=');
                if (parameter.length != 2) {
                    continue;
                }
                options[parameter[0]] = parameter[1];
            }
            return options;
        },
        'reorder': function (element) {
            var count = 1;
            $('*:order', element).each(function () {
                $(this).val(count++);
            });
        }
    };
})(window);

$(document).ready(function () {
    Sortable.initialize();
});