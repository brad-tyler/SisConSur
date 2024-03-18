<!--MODAL PARA VER LOS DETALLES DE LOS TAMIZAJES-->
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title-dark" id="miModalLabel">DETALLES DE TAMIZAJE</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <p id="Paciente"></p>
                        <p id="Doctor"></p>
                        <p id="Fecha"></p>
                        <p id="Tipo"></p>
                        <p id="Estado"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
</div>

<div class="p-6 lg:p-8 bg-white border-b border-gray-200">

<!--BUSCADOR EN TIEMPO REAL Y CONSULTANDO A LA BASE DE DATOS-->

<div class="container">

<div class="row align-items-center">
    <div class="col">
        <button class="btn btn-success">REGISTRAR PACIENTE</button>
    </div>
    <div class="col container">
        <div class="row align-items-center" >
            <div class="col container">
                <form class="row align-items-center" action="{{ route('buscar') }}" method="GET">
                <input class="col-md-8" type="text" name="query" placeholder="Buscar...">
                <button class="col-md-4 btn btn-dark" style="background-color: black; color:white;" type="submit">Buscar</button>
                </form>
            </div>
            <div class="col-md-3" style="display: {{$filtro}};">
                <form action="{{ route('dashboard') }}" method="GET">
                <button class="btn btn-warning filtro" style="background-color: golden; color:black;" type="submit">Quitar Filtro</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>

        <table class="table-auto w-full">
            <thead class="text-xs uppercase border-b bg-gray-700 " style="color:white; font-size:1rem;">
                <tr class="align-center">
                    <th scope="col" class="px-1 py-2">ID</th>
                    <th scope="col" class="px-1 py-2">DNI</th>
                    <th scope="col" class="px-1 py-2">NOMBRES</th>
                    <th scope="col" class="px-1 py-2">TIPO DE PACIENTE</th>
                    <th scope="col" class="px-1 py-2">SEXO</th>
                    <th scope="col" class="px-1 py-2">TAMIZAJES</th>
                    <th scope="col" class="px-1 py-2">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pacientes as $paciente)   
                <tr id="{{ $paciente->id }}" class="border-b  border-gray-700">
                    <td scope="row" class="px-4 text-gray-700">{{ $paciente->id }}</td>
                    <td class="py-2">{{ $paciente->DNI }}</td>
                    <td class="py-2">{{ $paciente->NAME }}</td>
                    <td class="py-2">{{ $paciente->TIPO }}</td>
                    <td class="py-2">{{ $paciente->SEXO }}</td>
                    <td class="py-2">

                    <div class="btn-group">
                        <?php $contador = 0; ?>
                        @foreach($paciente->pruebas as $prueba)

                            <button class="btn btn-info abrir-modal" data-id="{{ $prueba->id }}" data-bs-toggle="modal" data-bs-target="#miModal">{{$prueba->tamizaje->CODIGO}}</button>
                        
                            <?php $contador+=1;?>
                            <!--//YA QUE EN EL FACTORY NO ESTAMOS CONTROLANDO LA CANTIDAD DE TAMIZAJES ASIGNADOS A CADA USUARIO-->
                        
                            @if($contador == 4)
                                <?php $contador+=1;?>
                                @break
                            @endif           
                        
                        @endforeach

                        
                            @while($contador < 4)
                                <a class="btn btn-info" style="pointer-events:none; color: red; background-color: rgb(229, 229, 229) !important;" disabled>X  </a>
                                <?php $contador+=1; ?>
                            @endwhile
                    </div>

                    </td>
                    <td class="py-2">
                        <?php
                        
                        if($paciente->pruebas->count() >= 4)
                        {
                            echo '<button style="pointer-events:none; color: red; background-color: rgb(229, 229, 229) !important;">TAMIZAJES COMPLETOS</button>';
                        }
                        else
                        {
                            echo '<button class="btn btn-primary">APLICAR TAMIZAJE</button>';
                        }
                        ?>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>    
        {{ $pacientes->links() }}
</div>


<script>


    $(document).ready(function() {
        $('.abrir-modal').on('click', function() {

            //console.log("Modal abierto");
            var id = $(this).data('id');
            

            // Ejemplo de solicitud AJAX utilizando jQuery
            $.ajax({
                url: '/detallestamizaje/' + id,
                method: 'GET',
                success: function(response) {
                    //console.log(response);
                    $('#miModal #Paciente').text('Paciente: ' + response.paciente);
                    $('#miModal #Doctor').text('Doctor: ' + response.doctor);
                    $('#miModal #Fecha').text('Fecha de Tamizaje: ' + response.fecha);
                    $('#miModal #Estado').text('Estado: ' + response.estado);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });



    //GPT 4
    document.getElementById('buscador').addEventListener('input', function() {
        var input = this.value.toLowerCase();
        var rows = document.querySelectorAll('tbody tr');

        rows.forEach(function(row) {
            var match = false;
            row.querySelectorAll('td').forEach(function(cell) {
                var content = cell.textContent.toLowerCase();
                if (content.indexOf(input) !== -1) {
                    match = true;
                }
            });
            if (match) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>