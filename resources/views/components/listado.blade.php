<div class="relative overflow-x-auto bg-white rounded-lg">
    {{-- <x-application-logo class="block h-12 w-auto" /> --}}
    {{-- <h2>lo puse en la misma raiz veamos q pasa :v </h2> --}}

    <input type="text" id="fecha_inicio" placeholder="Fecha de inicio">
    <input type="text" id="fecha_fin" placeholder="Fecha de fin">
    <button id="filtrar" class="text-white bg-green-500 hover:bg-green-700 p-2">Filtrar</button>



    <table id="excel" class="table-fixed min-w-full text-sm text-left text-gray-800">
        <thead class="text-s uppercase border-b bg-gray-700 rounded text-white font-bold">
            <tr class="align-center">
                <!-- <th scope="col" class="px-1 py-2">Id prueba</th> -->
                <th scope="col" class="px-1 py-2">Paciente</th>
                <th scope="col" class="px-1 py-2">DNI</th>
                <th scope="col" class="px-1 py-2">Edad</th>
                <th scope="col" class="px-1 py-2">Genero</th>
                <th scope="col" class="px-1 py-2">Tamizaje</th>
                <th scope="col" class="px-1 py-2">Doctor</th>
                <th scope="col" class="px-1 py-2">Fecha</th>

            </tr>
        </thead>
        <tbody>
            @foreach($pruebas as $prueba)
            <tr id="registro_ids{{ $prueba->id }}" class="border-b  border-gray-700">
                <!-- <td scope="row" class="px-4 text-gray-700">{{ $prueba->id }}</td> -->
                <td class="py-2">{{ $prueba->pacient->NAME }}</td>
                <td class="py-2">{{ $prueba->pacient->DNI }}</td>
                <td class="py-2">{{ $prueba->pacient->EDAD }}</td>
                <td class="py-2">{{ $prueba->pacient->SEXO }}</td>
                <td class="py-2">{{ $prueba->tamizaje->NAME }}</td>
                <td class="py-2">{{ $prueba->user->name }}</td>
                <!-- Mostrando solo fecha de creacion, sin hora -->
                @php $fecha_sin_hora = date("Y-m-d", strtotime($prueba->created_at)); @endphp
                <td class="py-2">{{ $fecha_sin_hora }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <div id="paginationContainer" class="flex items-center justify-between bg-red-100">
        <!-- Contenido de la paginación aquí -->
    </div>
    <!-- {{ $pruebas->links() }} -->

</div>