<div class="p-6 lg:p-8 bg-white border-b border-gray-200">

    <!--BUSCADOR EN TIEMPO REAL Y CONSULTANDO A LA BASE DE DATOS-->

    <div class="flex justify-between mb-4">
        @livewire('modal-crear')

        <div class="flex">
            <form class="flex" action="{{ route('buscar') }}" method="GET">
                <input type="text" placeholder="Ingresar dato"
                    class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-gray-500  focus:border-gray-500"
                    name="query">
                <button type="submit"
                    class="bg-gray-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1 hover:bg-gray-600"
                    type="submit">Buscar</button>
            </form>
            <div class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-1"
                style="display: {{ $filtro }}">
                <form action="{{ route('dashboard') }}" method="GET">
                    <button class="button text-gray-500" type="submit">
                        ❌
                    </button>
                </form>
            </div>
        </div>

    </div>

    <table class="table-auto w-full rounded">
        <thead class="text-s border-b bg-gray-700 rounded text-white font-bold">
            <tr class="text-left">
                <th scope="col" class="px-[1.2rem] py-2">ID</th>
                <th scope="col" class="px-1 py-2">DNI</th>
                <th scope="col" class="px-1 py-2">NOMBRES</th>
                <th scope="col" class="px-1 py-2">TIPO DE PACIENTE</th>
                <th scope="col" class="px-1 py-2">SEXO</th>
                <th scope="col" class="px-[1.2rem] py-2 text-center">TAMIZAJES</th>
                <th scope="col" class="px-[1.2rem] py-2 text-center">ACCIONES</th>
                <th scope="col" class="px-[1.2rem] py-2 text-center">ELIMINAR-ADMIN</th>
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
                            @foreach ($paciente->pruebas as $prueba)
                                @livewire('modal-detalles', ['prueba' => $prueba], key($prueba->id))
                                @php $contador++; @endphp
                                @if ($contador >= 4)
                                @break
                            @endif
                            @endforeach

                            @while ($contador < 4)
                                @if ($contador < count($paciente->pruebas))
                                    <!-- Mostrar componente Livewire si hay pruebas disponibles -->
                                    @livewire('modal-detalles', ['prueba' => null])
                                @else
                                    <button class="bg-gray-300 text-red-500 rounded-full w-10 h-10 cursor-not-allowed"
                                        disabled>X</button>
                                @endif
                                @php $contador++; @endphp
                            @endwhile
                        </div>
                    </td>
                    <td class="h-[50px] justify-center text-center">
                        @if ($paciente->pruebas->count() >= 4)
                            <button
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded mx-4">TAMIZAJES
                                COMPLETOS</button>
                        @else
                            @livewire('modal-prueba', ['paciente' => $paciente->id, 'name' => $paciente->NAME])
                        @endif
                    </td>
                    <td class="md:flex items-center justify-center py-2">
                        <form action="#" method="POST">
                            <!-- onsubmit=" return confirm('{{ trans('Estas seguro que desea eliminar? ') }}') "> -->
                            @csrf
                            @method('DELETE')
                            <!-- <input type="submit" class="bg-red-500 text-white rounded px-2 py-1 mx-1 my-3 md:mt-3" value="Eliminar"> -->
                            <button type="submit" class="bg-red-500 text-gray-50 p-1 rounded mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill="#ffffff" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
{{ $pacientes->links() }}
</div>