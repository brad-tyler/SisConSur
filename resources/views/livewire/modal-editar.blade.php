<div>
    <button wire:click="$set('open', true)" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-4">
        EDITAR
    </button>
    <x-dialog-modal wire:model="open" class="w-auto">
        <x-slot name="title">
            Editar prueba de {{ $prueba->tamizaje->NAME }} para {{$prueba->pacient->NAME}}
            {{-- <p style="background-color:#ddcc2e;">{{$name}}</p> --}}
        </x-slot>
        <x-slot name="content">
            <form action="{{ route('actualizarprueba', ['id' => $prueba->id]) }}" method="POST" class="px-6">
            @csrf
            @method('PUT')
            <div class="m-4">
                <label for="tipo">TIPO DE TAMIZAJE:</label>
                <select class="w-full mt-2" name="tamizaje_id" id="tamizaje_id" required>
                    <option value="" disabled selected>Seleccione tamizaje</option>
                    @foreach($tamizajes as $t)
                        <option value="{{$t->id}}" @if($t->id == $prueba->tamizaje_id) selected @endif>{{$t->NAME}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full flex flex-row justify-between">
                <div class="m-4">
                    <label for="lugar">LUGAR:</label>
                    <input type="text" class="w-full mt-2" name="lugar" id="lugar" value="{{ $prueba->LUGAR }}" required>
                </div>
                <div class="m-4">
                    <label for="estado">ESTADO DE PRUEBA:</label>
                    <select class="w-full mt-2" name="estado" id="estado" required>
                        <option value="" disabled>Seleccione el estado</option>
                        <option value="1" @if($prueba->ESTADO == 1) selected @endif>POSITIVO</option>
                        <option value="0" @if($prueba->ESTADO == 0) selected @endif>NEGATIVO</option>
                    </select>
                </div>               
            </div>
            <div class="m-1 flex justify-end">
                <button wire:click="$set('open', false)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-4">CANCELAR</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">ACTUALIZAR</button>
            </div>
            </form>
        </x-slot>
        {{-- <x-slot name="footer">
            
        </x-slot> --}}
    </x-dialog-modal>
</div>
