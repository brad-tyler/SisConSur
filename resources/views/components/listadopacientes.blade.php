<div class="p-6 lg:p-8 bg-white border-b border-gray-200">

    <!--BUSCADOR EN TIEMPO REAL Y CONSULTANDO A LA BASE DE DATOS-->

    <div class="flex justify-between mb-4">
        @livewire('modal-crear')

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
    <div class="relative overflow-x-auto bg-white rounded-lg">
    <table class="table-fixed min-w-full text-sm text-left text-gray-800">
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
                    <div class="flex items-center justify-center space-x-0">
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
                    @php
                        $ultimaPrueba = $paciente->pruebas->last();
                        $diferenciaDias = $ultimaPrueba ? now()->diffInDays($ultimaPrueba->created_at) : null;
                    @endphp
                
                    @if ($paciente->pruebas->count() < 4 && $ultimaPrueba && $diferenciaDias < 15)
                        <span class="text-red-500 font-bold mx-4">Debe esperar {{ 15 - $diferenciaDias }} días para el próximo tamizaje.</span>
                    @else
                        @if ($paciente->pruebas->count() >= 4)
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded mx-4">TAMIZAJES COMPLETOS</button>
                        @else
                            @livewire('modal-prueba', ['paciente' => $paciente->id, 'name' => $paciente->NAME])
                        @endif
                    @endif
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $pacientes->links() }}
    </div>
</div>