<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de registros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}
                @role('admin|usuario')
                <x-listadopacientes :pacientes="$pacientes" :filtro="$filtro" />
                @endrole

                @role('inactivo')
                <button class="text-red hover:before:bg-redborder-red-500 relative w-full h-[10rem] overflow-hidden border border-red-500 bg-white px-3 text-red-500 shadow-2xl transition-all before:absolute before:bottom-0 before:left-0 before:top-0 before:z-0 before:h-full before:w-0 before:bg-red-500 before:transition-all before:duration-500 hover:text-white hover:shadow-red-500 hover:before:left-0 hover:before:w-full rounded-lg">
                    <span class="relative z-10 text-2xl">SU CUENTA FUE DESABILITADA, POR FAVOR COMUNÍQUESE CON EL ADMINISTRADOR
                    </span>
                </button>

                @endrole
            </div>
        </div>
    </div>
</x-app-layout>