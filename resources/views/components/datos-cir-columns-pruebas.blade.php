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
                text: '',
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
                    name: 'Tipo 1',
                    y: {{ $tipo1 }},
                }, {
                    name: 'Tipo 2',
                    y: {{ $tipo2 }}
                }, {
                    name: 'Tipo 3',
                    y: {{ $tipo3 }}
                }, {
                    name: 'Tipo 4',
                    y: {{ $tipo4 }}
                }, {
                    name: 'Tipo 6',
                    y: {{ $tipo5 }}
                }, {
                    name: 'Tipo 7',
                    y: {{ $tipo6 }}
                }, {
                    name: 'Tipo 8',
                    y: {{ $tipo7 }}
                }, {
                    name: 'Tipo 9',
                    y: {{ $tipo8 }}
                }]
            }]
        });
    });
</script>
