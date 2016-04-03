jQuery.extend(jQuery.expr[':'], {
    'bind': function (el) {
        return $(el).attr('data-bind') !== undefined;
    }
});

(function (window) {
    window.Bind = {
        'matchEvent': function (event) {

            var regexps = {
                'a': /^([^[]+)\[([^\]]+)]$/,
                'c': /^([^[]+)\{([^}]+)}$/
            };

            var type = null;
            for (var key in regexps) {
                if (regexps.hasOwnProperty(key)) {
                    if (regexps[key].test(event)) {
                        type = key;
                    }
                }
            }
            if (type == null) {
                return null;
            }

            var matches = event.match(regexps[type]);

            return {
                'event': matches[1].replace(/^@/, ''),
                'return': matches[1].charAt(0) == '@',
                'type': type,
                'actions': matches[2]
            };
        },
        'execActions': function (event, elem, actionsString) {
            var regexp = /^(([^.]*)\.)?([^(]+)\(([^)]*)\)$/;

            var actions = actionsString.split(';');

            for (var i = 0; i < actions.length; i++) {
                if (regexp.test(actions[i])) {
                    var matches = actions[i].match(regexp);
                    var func = undefined;
                    if (matches[2] === undefined) {
                        func = window[matches[3]];
                    } else {
                        func = window[matches[2]][matches[3]];
                    }
                    if (func !== undefined) {
                        var params = matches[4].split(',');
                        params = params.filter(function (n) {
                            return n != ""
                        });
                        func(event, elem, params);
                    }
                }
            }
        },
        'bindElement': function (elem, bindString) {
            var bind = Bind.matchEvent(bindString);

            if (bind == null) {
                return;
            }

            if (bind['event'] == 'ready') {
                Bind.execActions(null, elem, bind['actions']);
                return bind['return'];
            }
            $(elem).bind(bind['event'], function (event) {
                if (bind['type'] == 'a' && event.target != this) {
                    return false;
                } else if (bind['type'] == 'c' && (event.target != this && $(this).has(event.target).length == 0)) {
                    return false;
                }
                Bind.execActions(event, elem, bind['actions']);
                return bind['return'];
            });
        },
        'bindElements': function () {
            $('*:bind', document).each(function () {
                if ($(this).attr('data-bind') != undefined) {
                    if ($(this).attr('data-bind').length > 0) {
                        var events = $(this).attr('data-bind').split('|');
                        $(this).removeData('bind');
                        $(this).removeAttr('data-bind');
                        for (var i = 0; i < events.length; i++) {
                            Bind.bindElement(this, events[i]);
                        }
                    }
                }
            });

        },
        'initialize': function () {
            Bind.bindElements();

            $(document).bind('DOMSubtreeModified', function () {
                Bind.bindElements();
            });
        }
    };
})(window);

$(document).ready(function () {
    Bind.initialize();

});
