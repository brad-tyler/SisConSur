<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @php $color = 'variablexd'; @endphp
    @if ($prueba->tamizaje->CODIGO == 1)
    @php $color = 'blue-500'; @endphp
    @endif
    @if ($prueba->tamizaje->CODIGO == 2)
    @php $color = 'blue-900'; @endphp
    @endif
    @if ($prueba->tamizaje->CODIGO == 3)
    @php $color = 'green-500'; @endphp
    @endif
    @if ($prueba->tamizaje->CODIGO == 4)
    @php $color = 'orange-500'; @endphp
    @endif
    @if ($prueba->tamizaje->CODIGO == 6)
    @php $color = 'sky-800'; @endphp
    @endif
    @if ($prueba->tamizaje->CODIGO == 7)
    @php $color = 'purple-400'; @endphp
    @endif
    @if ($prueba->tamizaje->CODIGO == 8)
    @php $color = 'green-300'; @endphp
    @endif
    @if ($prueba->tamizaje->CODIGO == 9)
    @php $color = 'red-500'; @endphp
    @endif

    <button wire:click="$set('open', true)" class="bg-{{$color}} w-10 h-10 text-white rounded-full">
        {{$prueba->tamizaje->CODIGO}}
    </button>

    <x-dialog-modal wire:model="open" class="w-auto">
        <x-slot name="title">
            TAMIZAJE DE {{ $prueba->tamizaje->NAME }}

            @if($prueba->ESTADO == '0')
            <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);">
                <center style="background-color:#1da3cb; color:black;">LA PRUEBA SALIO NEGATIVA</center>
            </div>
            @else
            <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%); background-color:red;">
                <center style="background-color:#dd293d; color:black;">LA PRUEBA SALIO POSITIVA</center>
            </div>
            @endif


            <br>
        </x-slot>

        <x-slot name="content">
            <div class="m-4">
                <div class="m-4">
                    <p for="paciente">PACIENTE: {{$prueba->pacient->NAME}}</p>
                </div>
                <div class="m-4">
                    <p for="doctor">DOCTOR: {{$prueba->user->name}}</p>
                </div>
                <div class="m-4">
                    <p for="lugar">LUGAR DE LA PRUEBA: {{$prueba->LUGAR}}</p>
                </div>
                <div class="m-4">
                    <p for="fecha">FECHA DE TAMIZAJE: {{$prueba->created_at}}</p>
                </div>
                <div class="m-4">
                    <p for="estado">ESTADO: {{$prueba->ESTADO}}</p>
                </div>
            </div>
            <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
            <div class="m-1 flex justify-end">
                @role('admin')
                @livewire('modal-editar', ['prueba' => $prueba], key($prueba->id))
                @endrole
                {{-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-4">IMPRIMIR</button> --}}
                <button wire:click="$set('open', false)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-4">CERRAR</button>
            </div>
        </x-slot>
        {{-- <x-slot name="footer">
            
        </x-slot> --}}
    </x-dialog-modal>

</div>