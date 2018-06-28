var server = "http://localhost/droplet";
// var server = "http://139.59.81.23/apis/droplet/";
var api = server+"/api/v1";
function updateCurrentStatus(id) {
    $.ajax({
        type: 'get',
        url: api+'/devices/'+id+'/summary',
        dataType: 'json',
        success: function (data) {
            $('#val-usage-today').text(data["usage"]["day"]+" L");
            $('#val-usage-month').text(data["usage"]["month"]+" L");
            $('#val-remaining-level').text(data["level"]["volume"]+" L");
            let percentage = data["level"]["percentage"];
// --------------------------------------------------------------------------
            window.setTimeout(2500);
            var chart = new Chartist.Pie('#chartWaterLevel', {
                series: [percentage, (100-percentage)],
                labels: [percentage, (100-percentage)]
            }, {
                donut: true,
                donutWidth: 60,
                showLabel: true
            });

            chart.on('draw', function(data) {
                if(data.type === 'slice') {
                    // Get the total path length in order to use for dash array animation
                    var pathLength = data.element._node.getTotalLength();

                    // Set a dasharray that matches the path length as prerequisite to animate dashoffset
                    data.element.attr({
                        'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
                    });

                    // Create animation definition while also assigning an ID to the animation for later sync usage
                    var animationDefinition = {
                        'stroke-dashoffset': {
                            id: 'anim' + data.index,
                            dur: 1000,
                            from: -pathLength + 'px',
                            to:  '0px',
                            easing: Chartist.Svg.Easing.easeOutQuint,
                            // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
                            fill: 'freeze'
                        }
                    };

                    // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
                    if(data.index !== 0) {
                        animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
                    }

                    // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
                    data.element.attr({
                        'stroke-dashoffset': -pathLength + 'px'
                    });

                    // We can't use guided mode as the animations need to rely on setting begin manually
                    // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
                    data.element.animate(animationDefinition, false);
                }
            });
            chart.on('created', function() {
                if(window.__anim21278907124) {
                    clearTimeout(window.__anim21278907124);
                    window.__anim21278907124 = null;
                }
                window.__anim21278907124 = setTimeout(chart.update.bind(chart), 6000);
            });

            // --------------------------------------------------------------------------
            updateLastDays(id);
            updateLastMonths(id);
            updateLastYears(id);
        }

    });
}

function updateLastDays(id){
    var date = new Date();
    $.ajax({
        type: 'get',
        url: api + '/devices/' + id + '/usage/limit/days',
        dataType: 'json',
        error: function (xhr) {
            alert(xhr.responseText);
        },
        success: function (data) {
            var days = [];
            var usageData = [];
            for (var i = 0; i < data["days"].length; i++) {
                days.push(data["days"][i]["day"]);
                usageData.push(data["days"][i]["usage"]);
            }
            console.log(usageData);
            var dataSales = {
                labels: days,
                series: [
                    usageData
                ]
            };
            var optionsSales = {
                lineSmooth: false,
                low: 0,
                showArea: true,
                height: "245px",
                axisX: {
                    showGrid: false,
                },
                lineSmooth: Chartist.Interpolation.simple({
                    divisor: 3
                }),
                // showLine: false,
                // showPoint: false,
                plugins: [
                    Chartist.plugins.ctThreshold({
                        threshold: 150
                    })
                ]
            };
            var responsiveSales = [
                ['screen and (max-width: 640px)', {
                    axisX: {
                        labelInterpolationFnc: function (value) {
                            return value[0];
                        }
                    }
                }]
            ];
            Chartist.Line('#chartDays', dataSales, optionsSales, responsiveSales);
        }
    });
}

function updateLastMonths(id){
    var date = new Date();
    $.ajax({
        type: 'get',
        url: api + '/devices/' + id + '/usage/years/months',
        dataType: 'json',
        // error: function (xhr) {
        //     alert(xhr.responseText);
        // },
        success: function (data) {
            var days = [];
            var usageData = [];
            for (var i = 0; i < data["months"].length; i++) {
                days.push(data["months"][i]["month"]);
                usageData.push(data["months"][i]["usage"]);
            }
            console.log(usageData);
            var dataSales = {
                labels: days,
                series: [
                    usageData
                ]
            };
            var optionsSales = {
                lineSmooth: false,
                low: 0,
                showArea: true,
                height: "245px",
                axisX: {
                    showGrid: false,
                },
                lineSmooth: Chartist.Interpolation.simple({
                    divisor: 3
                }),
                // showLine: false,
                // showPoint: false,
                plugins: [
                    Chartist.plugins.ctThreshold({
                        threshold: 150
                    })
                ]
            };
            var responsiveSales = [
                ['screen and (max-width: 640px)', {
                    axisX: {
                        labelInterpolationFnc: function (value) {
                            return value[0];
                        }
                    }
                }]
            ];
            Chartist.Line('#chartMonths', dataSales, optionsSales, responsiveSales);
        }
    });
}

function updateLastYears(id){
    var date = new Date();
    $.ajax({
        type: 'get',
        url: api + '/devices/' + id + '/usage/years',
        dataType: 'json',
        error: function (xhr) {
            alert(xhr.responseText);
        },
        success: function (data) {
            var days = [];
            var usageData = [];
            for (var i = 0; i < data["years"].length; i++) {
                days.push(data["years"][i]["year"]);
                usageData.push(data["years"][i]["usage"]);
            }
            console.log(usageData);
            var dataSales = {
                labels: days,
                series: [
                    usageData
                ]
            };
            var optionsSales = {
                lineSmooth: false,
                low: 0,
                showArea: true,
                height: "245px",
                axisX: {
                    showGrid: false,
                },
                lineSmooth: Chartist.Interpolation.simple({
                    divisor: 3
                }),
                // showLine: false,
                // showPoint: false,
                plugins: [
                    Chartist.plugins.ctThreshold({
                        threshold: 1000
                    })
                ]
            };
            var responsiveSales = [
                ['screen and (max-width: 640px)', {
                    axisX: {
                        labelInterpolationFnc: function (value) {
                            return value[0];
                        }
                    }
                }]
            ];
            Chartist.Line('#chartYears', dataSales, optionsSales, responsiveSales);
        }
    });
}