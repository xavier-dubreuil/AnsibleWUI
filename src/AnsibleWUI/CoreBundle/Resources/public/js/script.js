(function (window) {
    window.AnsibuiWUI = {
        'addPrototype': function (event, elem, params) {

            var parent = $(params[0]);

            $('[data-prototype]', parent).each(
                function () {
                    var prototype = $(this).attr('data-prototype');
                    var index = $(this).attr('data-index');

                    var newForm = prototype.replace(/__name__/g, index);

                    $(this).attr('data-index', index + 1);

                    $(this).append(newForm);
                }
            );
        },
        'datePicker': function (event, elem) {
            $(elem).datepicker(
                {
                    format : 'dd/mm/yyyy',
                    weekStart: 1,
                    calendarWeeks: true,
                    autoclose: true
                }
            );
        },
        'dateTimePicker': function (event, elem) {
            $(elem).daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY h:mm A'
                }
            });
        },
        'deleteOverlay': function (event, elem) {
            $(elem).bind('DOMSubtreeModified', function () {
                $(elem).siblings('.overlay').remove();
                $('.overlay', elem).remove();
            });
        },
    };
})(window);





