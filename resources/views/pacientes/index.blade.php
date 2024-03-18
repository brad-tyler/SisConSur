<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de pacientes') }}
        </h2>
    </x-slot>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex w-full justify-between px-6 pt-4 mt-5">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <i>➕</i>
                        <a href="{{ route('pacientes.create') }}">Agregar paciente</a>
                    </button>
                    <div>
                        <i>🔎</i>
                        <input type="text" class="">
                    </div>
                    
                </div>
            
                {{-- LISTADO DE PACIENTES --}}
                <x-listado-pacientes :pacientes="$pacientes" :num="$num" />
            </div> 
        </div>
    </div>
</x-app-layout>