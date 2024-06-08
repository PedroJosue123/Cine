@extends('layouts.appadministrador')

@section('content')
<div>
    <div class="container">
        <form action="{{ route('subirHorario') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <h5>Subir Horarios</h5>
            <label>Fecha de la funcion:</label>
            <input class="form-control" type="date" name="fecha" placeholder="Agrege fecha de la funcion">
            <label>Hora de la funcion:</label>
            <input class="form-control" type="time" name="hora" placeholder="Agrege hora de la funcion">
           
            <label>Seleccionar Sala:</label>
                <select class="form-control" name="sala_id">
                    @foreach($salas as $sala)
                        <option value="{{ $sala->id }}">Sala {{ $sala->numero_sala }}</option>
                    @endforeach
                </select>

                <label>Seleccionar Película:</label>
                <select class="form-control" name="pelicula_id">
                    @foreach($peliculas as $pelicula)
                        <option value="{{ $pelicula->id }}">{{ $pelicula->titulo }}</option>
                    @endforeach
                </select>

            <button type="submit" class="btn btn-primary">Subir</button>
        </form>
    </div>
    <br>
    <div class="container">
        <div class="row mb-2">
        <h1>Horarios:</h1>
        @foreach($horarios as $horario)
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <div class="card-body d-flex flex-column align-items-start">
                <div class="mb-1 text-muted">Fecha: {{$horario->fecha}}</div>
                <div class="mb-1 text-muted">Horario: {{$horario->hora}}</div>
                <div class="mb-1 text-muted">Sala: Sala n° {{ $horario->sala->numero_sala }}</div>
                <div class="mb-1 text-muted">Pelicula: {{ $horario->pelicula->titulo }}</div>
                <form method="POST" action="{{ route('eliminarHorario') }}">
                        @csrf
                        <div class="button">
                            <input type="hidden" name="id_horario" value="{{$horario->id}}">
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