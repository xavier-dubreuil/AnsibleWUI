jQuery.extend(jQuery.expr[':'], {
    'tags': function (el) {
        return $(el).attr('data-tags') !== undefined;
    }
});

(function (window) {
    window.Tags = {
        'initialize': function () {
            $('*:tags', document).each(function () {
                var options;
                try {
                    options = $.parseJSON($(this).attr('data-tags'));
                } catch (e) {
                    options = {'height': '40px'}
                }
                options.height = '40px';
                $(this).select2(options);
            });
        }
    };
})(window);

$(document).ready(function () {
    Tags.initialize();
});