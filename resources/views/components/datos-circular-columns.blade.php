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

        Highcharts.chart('charts', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Cantidad de tamizajes por tipo, 202-',
                align: 'center'
            },
            xAxis: {
                categories: @json($tamizajeLabels),
                crosshair: true,
                accessibility: {
                    description: 'tamizajes'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de tamizajes'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            // tooltip: {
            //     headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            //     pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            // },
            series: [{
                    name: 'Positivos',
                    data: @json($estado1Counts)
                },
                {
                    name: 'Negativos',
                    data: @json($estado2Counts)
                }
            ]
        });
    </script>
