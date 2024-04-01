<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reporte de registros prueba') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}
                <x-reporte-tipo-tamizaje    :tipo1="$tipo1" :tipo1NAME="$tipo1NAME" 
                                            :tipo2="$tipo2" :tipo2NAME="$tipo2NAME"
                                            :tipo3="$tipo3" :tipo3NAME="$tipo3NAME"
                                            :tipo4="$tipo4" :tipo4NAME="$tipo4NAME"
                                            :tipo5="$tipo5" :tipo5NAME="$tipo5NAME"
                                            :tipo6="$tipo6" :tipo6NAME="$tipo6NAME"
                                            :tipo7="$tipo7" :tipo7NAME="$tipo7NAME"
                                            /> 
            </div> 
        </div>
    </div>
</x-app-layout>
