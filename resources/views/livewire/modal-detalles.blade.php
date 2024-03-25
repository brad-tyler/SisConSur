<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <button wire:click="$set('open', true)" class="bg-blue-400 w-10 h-10 text-white rounded-full">
        {{$prueba->tamizaje->CODIGO}}
    </button>
    <x-dialog-modal wire:model="open" class="w-auto">
        <x-slot name="title">
            Detalles del tamizaje: {{ $prueba->tamizaje->NAME }} ({{ $prueba->tamizaje->CODIGO }})
            <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
        </x-slot>
        <x-slot name="content">
            <div class="m-4">
                <div class="m-4">
                    <label for="paciente">PACIENTE:</label>
                    <label for="paciente"> {{$prueba->pacient->NAME}} </label>
                </div>
                <div class="m-4">
                    <label for="doctor">DOCTOR:</label>
                    <label for="doctor"> {{$prueba->user->name}} </label>
                </div>
                <div class="m-4">
                    <label for="fecha">FECHA DE TAMIZAJE:</label>
                    <label for="fecha"> {{$prueba->created_at}} </label>
                </div>
                <div class="m-4">
                    <label for="estado">ESTADO:</label>
                    <label for="estado"> {{$prueba->ESTADO}} </label>
                </div>
                {{-- prueba para el listado por fecha --}}
                {{-- <div class="m-4">
                    <label for="mes">Mes tamizaje:</label>
                    <label for="mes"> {{$dia}} </label>
                </div> --}}
            </div>
            <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
            <div class="m-1 flex justify-end">
                <button wire:click="$set('open', false)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-4">CERRAR</button>
            </div>
        </x-slot>
        {{-- <x-slot name="footer">
            
        </x-slot> --}}
    </x-dialog-modal>

</div>
