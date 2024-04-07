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
                <x-listadopacientes :pacientes="$pacientes" :filtro="$filtro"/>
                @endrole
                
                @role('inactivo')
                <div class="bg-red-100">
                    TU CUENTA FUE Desabilitado
                </div>
                @endrole
            </div> 
        </div>
    </div>
</x-app-layout>
