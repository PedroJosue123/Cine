@extends('layouts.appadministrador')

@section('content')

<div class="container">
    <h2>Entradas:</h2>
    <table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Cliente:</th>
        <th scope="col">Pelicula:</th>
        <th scope="col">n_asiento:</th>
        <th scope="col">Horario:</th>
        <th scope="col">Entrada creada:</th>
        </tr>
    </thead>
    <tbody>
        @foreach($entradas as $entrada)
            <tr>
                <td>{{ $entrada->cliente->nombre }} {{ $entrada->cliente->apellido }}</td>
                <td>{{ $entrada->horario->pelicula->titulo }}</td>
                <td>{{ $entrada->n°_asiento }}</td>
                <td>{{ $entrada->horario->hora }}</td>
                <td>{{ $entrada->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection