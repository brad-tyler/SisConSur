    <div class="col-span-1 lg:col-span-1">
        <div id="circular"></div>
    </div>
    <div class="col-span-1 lg:col-span-1">
        <div id="charts"></div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        Highcharts.chart('circular', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Porcentajes de tamizajes, 202-',
                align: 'center'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: [{
                        enabled: true,
                        distance: 20
                    }, {
                        enabled: true,
                        distance: -40,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '1.2em',
                            textOutline: 'none',
                            opacity: 0.7
                        },
                        filter: {
                            operator: '>',
                            property: 'percentage',
                            value: 10
                        }
                    }]
                }
            },
            series: [{
                name: 'porcentaje',
                colorByPoint: true,
                data: [{
                    name: 'ADULTOS',
                    y: {{ $adultos }},
                }, {
                    name: 'ADOLESCENTES',
                    y: {{ $adolecentes }}
                }, {
                    name: 'GESTANTES',
                    y: {{ $gestantes }}
                }, {
                    name: 'NIÑOS',
                    y: {{ $ninos }}
                }]
            }]
        });
    });

    document.addEventListener("DOMContentLoaded", function() {

        // Create the chart
        Highcharts.chart('charts', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'center',
                text: 'Tamizajes tipos de pacientes, 202-'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Cantidad Total'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        // format: '{point.y:.1f} tam'    
                        format: '{point.y} tam'             //para numero entero arriba para decimal (point.y:.1f) numero con un decimal
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y} tamizajes</b> del total<br/>'
            },

            series: [{
                name: 'TIPO',
                colorByPoint: true,
                data: [{
                    name: 'ADULTOS',
                    y: {{ $adultos }},
                }, {
                    name: 'ADOLESCENTES',
                    y: {{ $adolecentes }}
                }, {
                    name: 'GESTANTES',
                    y: {{ $gestantes }}
                }, {
                    name: 'NIÑOS',
                    y: {{ $ninos }}
                }]
            }],
        });

    });
</script>
