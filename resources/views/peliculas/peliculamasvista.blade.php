@extends('layouts.appadministrador')

@section('content')
<div class="container">
    <h4>Pelicula mas cara:</h4>
    <table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Titulo</th>
        <th scope="col">Precio</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>{{$peliculamasvista["titulo"]}}</td>
        <td>{{$peliculamasvista["precio"]}}</td>
        </tr>
    </tbody>
    </table>
    <!-- {{$peliculamasvista}} -->
</div>
@endsection
