<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <x-button wire:click="$set('open', true)">
        Agregar Paciente
    </x-button>
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
                <div class="m-4">
                    <label for="tipo">TIPO PACIENTE:</label>
                    <select class="w-full mt-2" name="tipo" id="tipo" required>
                        <option value="INFANTE">INFANTE</option>
                        <option value="ADOLESCENTE">ADOLESCENTE</option>
                        <option value="ADULTO">ADULTO</option>
                        <option value="GESTANTE">GESTANTE</option>
                    </select>
                </div>
                <div class="w-full flex flex-row justify-between">
                    <div class="m-4">
                        <label for="dni">DNI:</label>
                        <input type="text" class="w-full mt-2" name="dni" id="dni" required>
                    </div>
                    <div class="m-4">
                        <label for="sexo">SEXO:</label>
                        <select class="w-full mt-2" name="sexo" id="sexo" required>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="m-4">
                        <label for="edad">EDAD:</label>
                        <input type="text" class="w-full mt-2" name="edad" id="edad" required>
                    </div>
                </div>
                <div class="m-1 flex justify-end">
                    <a href="{{ route('dashboard') }}"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-4">CANCELAR</a>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">ENVIAR</button>

                </div>
            </form>
        </x-slot>
        {{-- <x-slot name="footer">
            
        </x-slot> --}}
    </x-dialog-modal>

</div>
