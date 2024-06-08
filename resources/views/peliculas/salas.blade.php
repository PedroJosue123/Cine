@extends('layouts.appadministrador')

@section('content')
<div>
    <div class="container">
        <form action="{{ route('subirSala') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <h5>Subir Pelicula</h5>
            <label>Numero de sala:</label>
            <input class="form-control" type="number" name="numero_sala" placeholder="Agrege el numero de sala">
            <label>N° asientos</label>
            <input class="form-control" type="number" name="n°_asientos" placeholder="Agrege n° asientos">
            <label>Tipo de sala</label>
            <input class="form-control" type="text" name="tipo_sala" placeholder="Agrege el tipo sala">
            <label>Estado</label>
                <select class="form-control" name="estado">
                    <option value="Disponible">Disponible</option>
                    <option value="No disponible">No Disponible</option>
                </select>
            <button type="submit" class="btn btn-primary">Subir</button>
        </form>
    </div>
    <br>
    <div class="container">
        <div class="row mb-2">
            @foreach($salas as $sala)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-body d-flex flex-column align-items-start">
                    <h3 class="mb-0">
                        <div class="text-dark" href="#">Sala {{$sala->numero_sala}}:</div>
                    </h3>
                    <div class="mb-1 text-muted">Sala: {{$sala->n°_asientos}}</div>
                    <div class="mb-1 text-muted">Duración: {{$sala->tipo_sala}}</div>
                    <div class="mb-1 text-muted">Restricción: {{$sala->estado}}</div>
                    <form method="POST" action="{{ route('eliminarSala') }}">
                            @csrf
                            <div class="button">
                                <input type="hidden" name="id_sala" value="{{$sala->id}}">
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Eliminar</button>
                            </div>
                    </form>
                    </div>
                </div>  
        </div>
        @endforeach
    </div>
</div>
@endsection