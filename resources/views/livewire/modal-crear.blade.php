<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <button wire:click="$set('open', true)" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
        Agregar Paciente
    </button>
    <x-dialog-modal wire:model="open" class="w-auto">
        <x-slot name="title">
            Agregar
        </x-slot>
        <x-slot name="content">
            <form action="{{ route('pacientes.store') }}" method="POST" class="px-6">
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
                    <label for="surname">APELLIDOS:</label>
                    <input type="text" class="w-full mt-2 " name="surname" id="surname" required>
                </div>
                <div class="m-4">
                    <label for="name">NOMBRES:</label>
                    <input type="text" class="w-full mt-2" name="name" id="name" required>
                </div>
                
                <div class="w-full flex flex-row justify-between">
                    <div class="m-4">
                        <label for="dni">DNI:</label>
                        <input type="text" class="w-full mt-2" name="dni" id="dni" pattern="[0-9]{8}" title="Solo se permiten números de 8 dígitos" required>
                    </div>
                    <div class="m-4">
                        <label for="sexo">SEXO:</label>
                        <select class="w-full mt-2" name="sexo" id="sexo" required>
                            <option value="" disabled selected>Sexo</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    
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