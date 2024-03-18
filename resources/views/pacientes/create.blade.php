<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear nuevo paciente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <form action="{{ route('pacientes.store') }}" method="POST" class="p-6">
                @csrf
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
                <div class="m-4 flex justify-end">
                    <a href="{{ route('dashboard') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-4">CANCELAR</a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">ENVIAR</button>
                    
                </div>
            </form>
                
            </div> 
        </div>
    </div>
</x-app-layout>
