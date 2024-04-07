<div class="col-span-1 lg:col-span-2">
<div class="p-6 lg:p-8 bg-white border-b border-gray-200">    
        <table class="table-auto w-full ">
            <thead class="text-xs uppercase border-b bg-gray-700 text-white">
                <tr class="text-left">
                    <th scope="col" class="px-1 pl-5">ID</th>
                    <th scope="col" class="px-1 py-2">Nombre_Usuario</th>
                    <th scope="col" class="px-1 py-2">Correo Electronico</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios  as $usuario )   
                <tr id="usuarios_ids{{ $usuario->id }}" class="border-b  border-gray-700">
                    <td scope="row" class="px-4 text-gray-700">{{ $usuario->id }}</td>
                    <td class="py-2">{{ $usuario->name }}</td>
                    <td class="py-2">{{ $usuario->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>    
        {{ $usuarios->links() }}
</div>
</div>