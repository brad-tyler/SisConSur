<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    {{-- <x-application-logo class="block h-12 w-auto" /> --}}
    {{-- <h2>lo puse en la misma raiz veamos q pasa :v </h2> --}}
    
        <table class="table-auto w-full ">
            <thead class="text-xs uppercase border-b bg-gray-700 ">
                <tr class="align-center">
                    <th scope="col" class="px-1 py-2">Id prueba</th>
                    <th scope="col" class="px-1 py-2">Nombre_P</th>
                    <th scope="col" class="px-1 py-2">DNI_P</th>
                    <th scope="col" class="px-1 py-2">Edad_P</th>
                    <th scope="col" class="px-1 py-2">Genero_P</th>
                    <th scope="col" class="px-1 py-2">Tamizaje</th>
                    <th scope="col" class="px-1 py-2">Personal_A</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pruebas as $prueba)   
                <tr id="registro_ids{{ $prueba->id }}" class="border-b  border-gray-700">
                    <td scope="row" class="px-4 text-gray-700">{{ $prueba->id }}</td>
                    <td class="py-2">{{ $prueba->pacient->NAME }}</td>
                    <td class="py-2">{{ $prueba->pacient->DNI }}</td>
                    <td class="py-2">{{ $prueba->pacient->EDAD }}</td>
                    <td class="py-2">{{ $prueba->pacient->SEXO }}</td>
                    <td class="py-2">{{ $prueba->tamizaje->NAME }}</td>
                    <td class="py-2">{{ $prueba->user->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>    
        {{ $pruebas->links() }}

</div>

