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
            let dataPreferences = {
                labels: [percentage+'%', (100-percentage)+'%'],
                series: [percentage, (100-percentage)]
            };
            let optionsPreferences = {
                donut: true,
                donutWidth: 40,
                startAngle: 0,
                total: 100,
                showLabel: false,
                axisX: {
                    showGrid: false
                }
            };
            Chartist.Pie('#chartWaterLevel', dataPreferences);
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
                showLine: false,
                showPoint: false,
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
        error: function (xhr) {
            alert(xhr.responseText);
        },
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
                showLine: false,
                showPoint: false,
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
                showLine: false,
                showPoint: false,
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