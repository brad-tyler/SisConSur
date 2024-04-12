<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PERSONAL DE ATENCIÓN') }}
        </h2>
    </x-slot>

    <div class=" m-12 p-6 bg-white border-b border-gray-200 rounded-lg">
        @role('inactivo|admin')
        @livewire('modal-nuevo-doctor')
        @endrole
        <div class="relative overflow-x-auto bg-white rounded-lg mt-4">
            <table class="table-fixed min-w-full text-sm text-left text-gray-800">
                <thead class="text-s uppercase border-b bg-gray-700 rounded text-white font-bold">
                    <tr class="text-left">
                        <th scope="col" class="px-[1.2rem] py-2">ID</th>
                        <th scope="col" class="px-1 py-2">NOMBRES</th>
                        <th scope="col" class="px-1 py-2">GMAIL</th>
                        <th scope="col" class="px-1 py-2">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctores as $doctor)
                    @if ($doctor->id != Auth::user()->id)
                    <tr id="{{ $doctor->id }}" class="border-b border-gray-700 hover:bg-slate-100 text-left">
                        <td scope="row" class="px-4 text-gray-700">{{ $doctor->id }}</td>
                        <td class="py-2">{{ $doctor->name }}</td>
                        <td class="py-2">{{ $doctor->email }}</td>
                        <td class="py-2">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" id="{{ $doctor->id }}" {{ $doctor->estado ? 'checked' : '' }}>
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>

                                @if ($doctor->estado == true)
                                <span class="ms-3 text-sm font-medium text-gray-500 dark:text-gray-800">Habilitado</span>
                                @else
                                <span class="ms-3 text-sm font-medium text-gray-500 dark:text-gray-300">Desabilitado</span>
                                @endif


                            </label>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            <br>
            {{ $doctores->links() }}

        </div>
    </div>

    <script>
        const toggles = document.querySelectorAll('input[type="checkbox"]');

        toggles.forEach(toggle => {
            toggle.addEventListener('change', function() {
                const id = this.closest('tr').id;
                const estado = this.checked ? 'encendido' : 'apagado';
                const url = `{{ route('cambiar_estado', ['id' => ':id']) }}`.replace(':id', id);

                // Redirige al route que cambia el estado
                window.location.href = `${url}?estado=${estado}`;
            });
        });
    </script>

</x-app-layout>