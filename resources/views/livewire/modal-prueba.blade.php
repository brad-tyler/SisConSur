<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <button wire:click="$set('open', true)" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-1 px-4 rounded mx-4">
        NUEVO TAMIZAJE
    </button>

    <x-dialog-modal wire:model="open" class="w-auto">
        <x-slot name="title">
            REGISTRAR TAMIZAJE PARA <p style="background-color:#ddcc2e;">{{$name}}</p>
        </x-slot>
        <x-slot name="content">
            <form action="{{ route('registrarprueba', ['id' => $paciente])}}" method="POST" class="px-6">
                @csrf
                @if ($errors->any())
                <ul class="list-none p-4 mb-4 bg-red-100 text-red-500">
                    @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
                @endif

                <div class="m-4">
                    <label for="tipo">TIPO DE TAMIZAJE:</label>
                    <select class="w-full mt-2" name="tamizaje" id="tipo" required>
                        <option value="" disabled selected>Seleccione tamizaje</option>
                        @foreach($tamizajes as $t)
                                    <option value="{{$t->id}}">{{$t->NAME}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full flex flex-row justify-between">
                    <div class="m-4">
                        <label for="lugar">LUGAR:</label>
                        <input type="text" class="w-full mt-2" name="lugar" id="lugar" required>
                    </div>
                    <div class="m-4">
                        <label for="estado">ESTADO DE PRUEBA:</label>
                        <select class="w-full mt-2" name="estado" id="estado" required>
                            <option value="" disabled selected>Seleccione el estado</option>
                            <option value="1">POSITIVO</option>
                            <option value="0">NEGATIVO</option>
                        </select>
                    </div>
                   
                </div>
                <div class="m-4">
                    <label for="tipo">TIPO PACIENTE:</label>
                    <select class="w-full mt-2" name="tipo" id="tipo" required>
                        <option value="" disabled selected>Tipo de paciente</option>
                        <option value="INFANTE">INFANTE</option>
                        <option value="ADOLECENTE">ADOLECENTE</option>
                        <option value="ADULTO">ADULTO</option>
                        <option value="GESTANTE">GESTANTE</option>
                    </select>
                </div>
                <div class="m-4">
                        <label for="edad">EDAD:</label>
                        <input type="text" class="w-full mt-2" name="edad" id="edad" pattern="[0-9]+" title="Solo se permiten números" required>
                    </div>

                <div class="m-1 flex justify-end">
                    <button wire:click="$set('open', false)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-4">Cancelar</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">ENVIAR</button>
                </div>
            </form>
        </x-slot>
        {{-- <x-slot name="footer">
            
        </x-slot> --}}
    </x-dialog-modal>

</div>
