@extends('layouts.appadministrador')

@section('content')
<div class="container">
    <h4>Pelicula mas taquillera:</h4>
    <table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Titulo</th>
        <th scope="col">Entradas Vendidas:</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>{{$peliculamastaquillera[0]}}</td>
        <td>{{$peliculamastaquillera[1]}}</td>
        </tr>
    </tbody>
    </table>
    <!-- {{$peliculamastaquillera}} -->
</div>
@endsection
