<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Paciente</th>
            <th>DNI</th>
            <th>Genero</th>
            <th>Tamizaje</th>
            <th>Doctor</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Lugar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pruebas as $prueba)
            <tr>
                <td> {{ $prueba->id }} </td>
                <td> {{ $prueba->pacient->NAME }} </td>
                <td> {{ $prueba->pacient->DNI }} </td>
                <td> {{ $prueba->pacient->SEXO }}</td>
                <td> {{ $prueba->tamizaje->NAME }} </td>
                <td> {{ $prueba->user->name }} </td>
                <td> {{ $prueba->ESTADO }} </td>
                <td> {{ $prueba->created_at }} </td>
                <td> {{ $prueba->LUGAR }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
