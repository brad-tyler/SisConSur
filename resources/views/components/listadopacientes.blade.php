<div class="p-6 lg:p-8 bg-white border-b border-gray-200">

    <!--BUSCADOR EN TIEMPO REAL Y CONSULTANDO A LA BASE DE DATOS-->

    <div class="flex justify-between mb-4">
        @livewire('modal-crear')
        {{-- <div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i>➕</i><a href="{{ route('pacientes.create') }}"> Agregar paciente</a>
        </button>
    </div> --}}
    <div class="flex">
        <form class="flex" action="{{ route('buscar') }}" method="GET">
            <input type="text" placeholder="Ingresar dato" class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-gray-500  focus:border-gray-500" name="query">
            <button type="submit" class="bg-gray-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1 hover:bg-gray-600" type="submit">Buscar</button>
        </form>
        <div class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-1" style="display: {{ $filtro }}">
            <form action="{{ route('dashboard') }}" method="GET">
                <button class="button text-gray-500" type="submit">
                    ❌
                </button>
            </form>
        </div>
    </div>

</div>

<table class="table-auto w-full rounded">
    <thead class="text-s uppercase border-b bg-gray-700 rounded text-white font-bold">
        <tr class="text-left">
            <th scope="col" class="px-[1.2rem] py-2">ID</th>
            <th scope="col" class="px-1 py-2">DNI</th>
            <th scope="col" class="px-1 py-2">NOMBRES</th>
            <th scope="col" class="px-1 py-2">TIPO DE PACIENTE</th>
            <th scope="col" class="px-1 py-2">SEXO</th>
            <th scope="col" class="px-[1.2rem] py-2 text-center">TAMIZAJES</th>
            <th scope="col" class="px-[1.2rem] py-2 text-center">ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pacientes as $paciente)
        <tr id="{{ $paciente->id }}" class="border-b border-gray-700 hover:bg-slate-100 text-left">
            <td scope="row" class="px-4 text-gray-700">{{ $paciente->id }}</td>
            <td class="py-2">{{ $paciente->DNI }}</td>
            <td class="py-2">{{ $paciente->NAME }}</td>
            <td class="py-2">{{ $paciente->TIPO }}</td>
            <td class="py-2">{{ $paciente->SEXO }}</td>
            <td class="py-2">
                <div class="flex items-center justify-center space-x-0 ">
                    @php $contador = 0; @endphp
                    @foreach($paciente->pruebas as $prueba)
                    @livewire('modal-detalles', ['prueba' => $prueba], key($prueba->id))
                    @php $contador++; @endphp
                    @if ($contador >= 4)
                    @break
                    @endif
                    @endforeach

                    @while ($contador < 4) @if ($contador < count($paciente->pruebas))
                        <!-- Mostrar componente Livewire si hay pruebas disponibles -->
                        @livewire('modal-detalles', ['prueba' => null])
                        @else
                        <button class="bg-gray-300 text-red-500 rounded-full w-10 h-10 cursor-not-allowed" disabled>X</button>
                        @endif
                        @php $contador++; @endphp
                        @endwhile
                </div>
            </td>
            <td class="h-[50px] justify-center text-center">
                <?php

                if ($paciente->pruebas->count() >= 4) {
                    // echo '<button style="pointer-events:none; color: red; background-color: rgb(229, 229, 229) !important;">TAMIZAJES COMPLETOS</button>';
                    echo '<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded mx-4">TAMIZAJES COMPLETOS</button>';
                } else {
                    // echo '<button class="btn btn-primary">APLICAR TAMIZAJE</button>';
                    echo '<button class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-1 px-4 rounded mx-4">APLICAR TAMIZAJE</button>';
                }
                ?>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $pacientes->links() }}
</div>


{{-- <script>
    $(document).ready(function() {
        $('.abrir-modal').on('click', function() {

            //console.log("Modal abierto");
            var id = $(this).data('id');


            // Ejemplo de solicitud AJAX utilizando jQuery
            $.ajax({
                url: '/detallestamizaje/' + id,
                method: 'GET',
                success: function(response) {
                    //console.log(response);
                    $('#miModal #Paciente').text('Paciente: ' + response.paciente);
                    $('#miModal #Doctor').text('Doctor: ' + response.doctor);
                    $('#miModal #Fecha').text('Fecha de Tamizaje: ' + response.fecha);
                    $('#miModal #Estado').text('Estado: ' + response.estado);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    }); --}}


{{-- 
    //GPT 4
    document.getElementById('buscador').addEventListener('input', function() {
        var input = this.value.toLowerCase();
        var rows = document.querySelectorAll('tbody tr');

        rows.forEach(function(row) {
            var match = false;
            row.querySelectorAll('td').forEach(function(cell) {
                var content = cell.textContent.toLowerCase();
                if (content.indexOf(input) !== -1) {
                    match = true;
                }
            });
            if (match) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
--}}