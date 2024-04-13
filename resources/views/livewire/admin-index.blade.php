<div>

    {{-- <x-listado-user :usuarios="$usuarios" /> --}}
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <div class="flex justify-between border-b-4 border-gray-500 mx-8 my-5">
            <h1 class="text-2xl ">LISTADO DE PRUEBAS </h1>
            {{-- <a href=" {{ route('export' )}} " class="bg-blue-500 px-2 py-1 rounded mb-2 text-white mr-10">Exportar</a> --}}
            <form action="{{ route('export') }}" method="GET">
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio">
                <label for="fecha_fin">Fecha de fin:</label>
                <input type="date" name="fecha_fin" id="fecha_fin">
                <button type="submit" class="bg-blue-500 px-2 py-1 rounded mb-2 text-white mr-10">Exportar</button>
            </form>
        </div>
        
        <div class="mx-8">
            <x-listado :pruebas="$pruebas" class="mx-8" />
        </div>
        <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);">
        </div>
        <h1 class="text-2xl border-b-4 border-gray-500 m-8">REPORTE CANTIDAD DE TAMIZAJE POR GRUPOS</h1>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mx-8">

            <div class="col-span-1 lg:col-span-1">

                <div class="small-box bg-info px-4 rounded-lg shadow-lg bg-blue-500 py-4">
                    <div class="text-center">
                        <p class="text-white">GESTANTES</p>
                        <h3 class="text-white text-2xl font-bold">{{ $gestantes }}</h3>
                    </div>
                    <div class="icon flex justify-center items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 2a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m8 16l-2-5.44c-.35-.99-.66-1.85-2-2.56c-1.38-.7-2.38-1-4-1c-1.63 0-2.62.3-4 1c-1.34.71-1.65 1.57-2 2.56L4 18c-.32 1.35 2.36 2.44 4.11 3.19V19c0-.95.86-1.62 2.58-2.03c.16-.04.31-.06.43-.08c-.54-.82-.76-1.55-.78-1.61l1.77-.6c.01.02.52 1.59 1.73 2.38c.21.07.42.15.62.24c.77.34 1.23.78 1.38 1.31c-1.34.53-2.62.8-3.84.8l-1-.1v2.63l1 .06c1.37 0 2.67-.28 3.89-.81c1.75-.75 4.36-2.06 4.11-3.19m-4.5-1a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5" />
                        </svg>
                    </div>

                </div>
            </div>

            <div class="col-span-1 lg:col-span-1">

                <div class="small-box bg-info px-4 rounded-lg shadow-lg bg-green-600 py-4">
                    <div class="text-center">
                        <p class="text-white">ADULTOS</p>
                        <h3 class="text-white text-2xl font-bold">{{ $adultos }}</h3>
                    </div>
                    <div class="icon flex justify-center items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1200 1200">
                            <path fill="currentColor" d="M605.096 480c-135.542-2.098-239.082-111.058-239.999-240C367.336 105.667 477.133.942 605.096 0c135.662 5.13 239.036 108.97 240.001 240c-2.668 134.439-111.907 239.09-240.001 240m194.043 49.788c170.592 1.991 257.094 151.63 257.881 301.269V1200H889.784l.001-324.254c-4.072-22.416-19.255-30.018-33.164-27.82c-13.022 2.059-24.929 12.701-25.56 27.82V1200h-464.67V875.746c-3.557-21.334-17.128-29.537-30.331-28.709c-14.138.889-27.853 12.135-28.393 28.709V1200h-164.68V831.057c-.98-159.475 99.901-300.087 259.137-301.269z" />
                        </svg>
                    </div>

                </div>
            </div>

            <div class="col-span-1 lg:col-span-1">

                <div class="small-box bg-info px-4 rounded-lg shadow-lg bg-yellow-400 py-4">
                    <div class="text-center">
                        <p class="text-white">ADOLESCENTES</p>
                        <h3 class="text-white text-2xl font-bold">{{ $adolecentes }}</h3>
                    </div>
                    <div class="icon flex justify-center items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32">
                            <path fill="currentColor" fill-rule="evenodd" d="M17.96 4.02v-.63c0-.77-.62-1.39-1.39-1.39h-1.18C14.62 2 14 2.62 14 3.39v.63h-2.93a7.75 7.75 0 0 0-7.75 7.75v5.93a3.954 3.954 0 0 0 2.682 3.742c.041.018.185.075.456.124c.262.055.534.084.812.084h17.492a3.927 3.927 0 0 0 1.158-.189a3.954 3.954 0 0 0 2.74-3.761v-5.93a7.75 7.75 0 0 0-7.75-7.75h-1.9zm-1.95 17.63v-1H7.516a5.99 5.99 0 0 1-.527-.021V10.93a5.905 5.905 0 0 1 5.91-5.91h6.11a5.905 5.905 0 0 1 5.91 5.91v9.714a1.989 1.989 0 0 1-.158.006h-8.75zm8.7 1H7.27a4.951 4.951 0 0 1-4.393-2.668L2.06 24.92c-.44 2.65 1.6 5.07 4.29 5.07h19.28c2.7 0 4.75-2.44 4.28-5.1l-.802-4.918a4.952 4.952 0 0 1-4.398 2.678" clip-rule="evenodd" />
                        </svg>
                    </div>

                </div>
            </div>

            <div class="col-span-1 lg:col-span-1">

                <div class="small-box bg-info px-4 rounded-lg shadow-lg bg-red-600 py-4">
                    <div class="text-center">
                        <p class="text-white">NIÑOS</p>
                        <h3 class="text-white text-2xl font-bold">{{ $ninos }}</h3>
                    </div>
                    <div class="icon flex justify-center items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1em" viewBox="0 0 640 512">
                            <path fill="currentColor" d="M160 0a64 64 0 1 1 0 128a64 64 0 1 1 0-128M88 480v-80H70.2c-10.9 0-18.6-10.7-15.2-21.1l31.1-93.4l-28.6 37.8c-10.7 14.1-30.8 16.8-44.8 6.2s-16.8-30.7-6.2-44.8L65.4 207c22.4-29.6 57.5-47 94.6-47s72.2 17.4 94.6 47l58.9 77.7c10.7 14.1 7.9 34.2-6.2 44.8s-34.2 7.9-44.8-6.2l-28.6-37.8l31.1 93.4c3.5 10.4-4.3 21.1-15.2 21.1H232v80c0 17.7-14.3 32-32 32s-32-14.3-32-32v-80h-16v80c0 17.7-14.3 32-32 32s-32-14.3-32-32M480 0a64 64 0 1 1 0 128a64 64 0 1 1 0-128m-8 384v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V300.5L395.1 321c-9.4 15-29.2 19.4-44.1 10s-19.4-29.2-10-44.1l51.7-82.1c17.6-27.9 48.3-44.9 81.2-44.9h12.3c33 0 63.7 16.9 81.2 44.9l51.7 82.2c9.4 15 4.9 34.7-10 44.1s-34.7 4.9-44.1-10l-13-20.6V480c0 17.7-14.3 32-32 32s-32-14.3-32-32v-96z" />
                        </svg>
                    </div>

                </div>
            </div>
        </div>

        <h1 class="text-2xl border-b-4 border-gray-500 m-8">REPORTE PORCENTAJE DE TAMIZAJE POR GRUPOS</h1>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 m-2">
            <x-datos-circular-columns :adultos="$adultos" :adolecentes="$adolecentes" :gestantes="$gestantes" :ninos="$ninos" :tamizajeLabels="$tamizajeLabels" :estado1Counts="$estado1Counts" :estado2Counts="$estado2Counts" />
        </div>
    </div>
</div>