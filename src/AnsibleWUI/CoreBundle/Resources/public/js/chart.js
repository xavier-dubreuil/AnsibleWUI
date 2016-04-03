jQuery.extend(jQuery.expr[':'], {
    'graph': function (el) {
        return $(el).attr('data-graph') !== undefined;
    }
});

(function (window) {
    window.Chart = {
        'drawCharts': function () {
            $('*:graph', document).each(function () {
                var graph = this;
                if (!Chart.drawIfVisible(graph)) {
                    var GraphObserver = new MutationObserver(function (mutations) {
                        mutations.forEach(function (mutation) {
                            if ($(mutation.target).is(":visible")) {
                                Chart.drawIfVisible(graph);
                            }
                        });
                    });
                    var observerConfig = {
                        childList: false,
                        attributes: true,
                        characterData: false,
                        subtree: false,
                        attributeOldValue:false,
                        characterDataOldValue: false,
                        attributeFilter: []
                    };
                    $(graph).parents(':hidden').each(function () {
                        GraphObserver.observe(this, observerConfig);
                    });
                }
            });
        },
        'drawIfVisible': function (graph) {
            //if ($(graph).is(":visible")) {
                Chart.draw(graph);
                return true;
            //}
            //return false;
        },
        'draw': function (element) {
            if ($(element).attr('data-loaded') == 'true') {
                return false;
            }

            $.ajax(
                {
                    url : $(element).attr('data-graph'),
                    type : "GET",
                    success : function (data) {
                        $(element).highcharts(data);
                    },
                    error: function () {
                        console.log('error loading chart');
                    }
                }
            );
        }
    };
})(window);

$(document).ready(function () {
    Chart.drawCharts();
});
