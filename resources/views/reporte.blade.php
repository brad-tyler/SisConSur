<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reporte de registros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}

                <h1 class="text-2xl border-b-4 border-gray-500 m-4">REPORTE TAMIZAJES</h1>
                <x-reportesimple :adultos="$adultos" :adolecentes="$adolecentes" :gestantes="$gestantes" :ninos="$ninos" />

                <h1 class="text-2xl border-b-4 border-gray-500 m-4">REPORTE TIPO DE TAMIZAJE</h1>
                <div class="mb-5 flex flex-col xl:flex-row">
                    <x-datos-cir-columns-pruebas                :tipo1="$tipo1" :tipo1NAME="$tipo1NAME" 
                                                                :tipo2="$tipo2" :tipo2NAME="$tipo2NAME"
                                                                :tipo3="$tipo3" :tipo3NAME="$tipo3NAME"
                                                                :tipo4="$tipo4" :tipo4NAME="$tipo4NAME"
                                                                :tipo5="$tipo5" :tipo5NAME="$tipo5NAME"
                                                                :tipo6="$tipo6" :tipo6NAME="$tipo6NAME"
                                                                :tipo7="$tipo7" :tipo7NAME="$tipo7NAME"
                                                                :tipo8="$tipo8" :tipo8NAME="$tipo8NAME" />

                    <div class="flex flex-col items-center justify-center mx-4">
                        <h1 class="font-bold text-2xl my-2 border-b-4 border-gray-700">LEYENDA</h1>
                        <ol class="list-decimal list-inside mt-1 text-lg">
                            <div class="flex">
                                <p class="bg-blue-500 font-semibold w-4 items-center justify-center flex text-gray-50">1</p>
                                <p class="text-blue-500 font-semibold ml-1">TAMIZAJE DE {{$tipo1NAME}}</p>
                            </div>
                            <div class="flex">
                                <p class="bg-blue-900 font-semibold w-4 items-center justify-center flex text-gray-50">2</p>
                                <p class="text-blue-900 font-semibold ml-1">TAMIZAJE DE {{$tipo2NAME}}</p>
                            </div>
                            <div class="flex">
                                <p class="bg-green-500 font-semibold w-4 items-center justify-center flex text-gray-50">3</p>
                                <p class="text-green-500 font-semibold ml-1">TAMIZAJE DE {{$tipo3NAME}} </p>
                            </div>
                            <div class="flex">
                                <p class="bg-orange-500 font-semibold w-4 items-center justify-center flex text-gray-50">4</p>
                                <p class="text-orange-500 font-semibold ml-1">TAMIZAJE DE {{$tipo4NAME}}</p>
                            </div>
                            <div class="flex">
                                <p class="bg-sky-800 font-semibold w-[21px] items-center justify-center flex text-gray-50">6</p>
                                <p class="text-sky-800 font-semibold ml-1"> TAMIZAJE DE {{$tipo5NAME}}</p>
                            </div>
                            <div class="flex">
                                <p class="bg-purple-400 font-semibold w-[30px] items-center justify-center flex text-gray-50">7</p>
                                <p class="text-purple-400 font-semibold ml-1">TAMIZAJE DE {{$tipo6NAME}}</p>
                            </div>
                            <div class="flex">
                                <p class="bg-green-300 font-semibold w-4 items-center justify-center flex text-gray-50">8</p>
                                <p class="text-green-300 font-semibold ml-1">TAMIZAJE DE {{$tipo7NAME}}</p>
                            </div>
                            <div class="flex">
                                <p class="bg-red-500 font-semibold w-4 items-center justify-center flex text-gray-50">9</p>
                                <p class="text-red-500 font-semibold ml-1">TAMIZAJE DE {{$tipo8NAME}}</p>
                            </div>
                        </ol>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</x-app-layout>