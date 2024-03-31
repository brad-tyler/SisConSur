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
                <div class="flex mb-5">
                    <x-datos-cir-columns-pruebas                :tipo1="$tipo1" :tipo1NAME="$tipo1NAME" 
                                                                :tipo2="$tipo2" :tipo2NAME="$tipo2NAME"
                                                                :tipo3="$tipo3" :tipo3NAME="$tipo3NAME"
                                                                :tipo4="$tipo4" :tipo4NAME="$tipo4NAME"
                                                                :tipo5="$tipo5" :tipo5NAME="$tipo5NAME"
                                                                :tipo6="$tipo6" :tipo6NAME="$tipo6NAME"
                                                                :tipo7="$tipo7" :tipo7NAME="$tipo7NAME" />

                    <div class="flex flex-col items-center justify-center mx-4">
                        <h1 class="font-bold text-2xl my-2 border-b-4 border-gray-700">LEYENDA</h1>
                        <ol class="list-decimal list-inside mt-1 text-lg">
                            <div class="flex">
                                <p class="bg-blue-500 font-semibold w-4 items-center justify-center flex text-gray-50">1</p>
                                <p class="text-blue-500 font-semibold ml-1">Tamizaje de violencia</p>
                            </div>
                            <div class="flex">
                                <p class="bg-purple-500 font-semibold w-4 items-center justify-center flex text-gray-50">2</p>
                                <p class="text-purple-500 font-semibold ml-1">Tamizaje de alcohol y drogas</p>
                            </div>
                            <div class="flex">
                                <p class="bg-green-500 font-semibold w-4 items-center justify-center flex text-gray-50">3</p>
                                <p class="text-green-500 font-semibold ml-1">Tamizaje de trastornos depresivos</p>
                            </div>
                            <div class="flex">
                                <p class="bg-orange-500 font-semibold w-4 items-center justify-center flex text-gray-50">4</p>
                                <p class="text-orange-500 font-semibold ml-1">Tamizaje de psicosis</p>
                            </div>
                            <div class="flex">
                                <p class="bg-gray-700 font-semibold w-[24px] items-center justify-center flex text-gray-50">5</p>
                                <p class="text-gray-500 font-semibold ml-1">Tamizaje especializado para detectar deterioro cognitivo-demencia en personas de 60 años y mas</p>
                            </div>
                            <div class="flex">
                                <p class="bg-pink-500 font-semibold w-[26px] items-center justify-center flex text-gray-50">6</p>
                                <p class="text-pink-500 font-semibold ml-1">Tamizaje para detectar trastornos mentales y del comportamiento de niños, niñas y adolescentes de 3 a 17 años</p>
                            </div>
                            <div class="flex">
                                <p class="bg-green-300 font-semibold w-4 items-center justify-center flex text-gray-50">7</p>
                                <p class="text-green-300 font-semibold ml-1">Tamizaje de prevención de riesgos en salud mental</p>
                            </div>

                        </ol>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</x-app-layout>