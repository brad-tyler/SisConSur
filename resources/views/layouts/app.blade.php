<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SisConSur') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.2/css/buttons.dataTables.min.css">


    <!--PREUBAS CON BOOTSTRAP-->
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}


    <!-- DATATABLES -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>

    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print"></script>



    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <script>
        $(document).ready(function() {
            var table = $('#excel').DataTable({
                dom: "<'flex items-center justify-between'lBf>rtip",
                buttons: {
                    buttons: ['excel', 'pdf', 'print'],
                    dom: {
                        button: {
                            className: 'p-2 text-xl text-white bg-blue-500 hover:bg-blue-700 my-2'
                        }
                    }
                },
                language: {
                    paginate: {
                        // first: '<button class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-700">«</button>',
                        // last: '<button class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-700">»</button>',
                        dom: {
                            paginate: {
                                className: 'p-2 text-xl text-white bg-blue-500 hover:bg-blue-700 my-2'
                            }
                        },
                        first: '«',
                        last: '»',
                        next: '›',
                        previous: '‹'
                    },
                    info: '<div class="flex justify-start items-center pt-1 border-t-2 border-black ">Mostrando _START_ al _END_ de _TOTAL_</div>',
                    infoEmpty: '<div class="pt-1">No hay datos disponibles</div>',
                },
            });

            $('#filtrar').on('click', function() {
                // Obtener las fechas de inicio y fin
                var fechaInicio = new Date($('#fecha_inicio').val());
                var fechaFin = new Date($('#fecha_fin').val());

                // Aplicar el filtrado por rango de fechas al DataTable
                table.column(6).search(function(data) {
                    // Convertir la fecha en la columna a un objeto Date
                    var fecha = new Date(data);

                    // Verificar si la fecha está dentro del rango especificado
                    return fecha >= fechaInicio && fecha <= fechaFin;
                }).draw();
            });


            new $.fn.dataTable.Buttons(table, {
                buttons: [{
                    extend: 'pdfHtml5',
                    text: 'Exportar a PDF',
                    title: 'Tabla de Pruebas',
                    exportOptions: {
                        columns: ':visible'
                    }
                }]
            });
            table.buttons().container()
                .appendTo('#excel_wrapper .col-md-6:eq(0)');

            // dt-paging
            var elementos = document.querySelectorAll('.dt-paging');
            elementos.forEach(function(elemento) {
                elemento.classList.add('text-black', 'text-sm', 'p-2', 'flex', 'flex-row', 'justify-end', 'space-x-2', '[&>button]:border-2', '[&>button]:p-1');
            });
        });
    </script>

</body>

</html>