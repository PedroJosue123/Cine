@extends('layouts.appadministrador')

@section('content')
<div>
    <div class="container">
        <form action="{{ route('subirPelicula') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <h5>Subir Pelicula</h5>
            <label>Título</label>
            <input class="form-control" type="text" name="titulo" placeholder="Título de la Película">
            <label>Género</label>
            <input class="form-control" type="text" name="genero" placeholder="Género de la Película">
            <label>Duración</label>
            <input class="form-control" type="number" name="duracion" placeholder="Duración de la Pelicula">
            <label>Restricción</label>
            <input class="form-control" type="text" name="restriccion" placeholder="Restricción de la Película">
            <label>Sinopsis</label>
            <input class="form-control" type="text" name="sinopsis" placeholder="Sinopsis de la Película">
            <input class="form-control" type="file" name="pelicula"> 
            <label>Precio:</label>
            <input class="form-control" type="number" name="precio" step="0.01" placeholder="Precio de la Película">
            <button type="submit" class="btn btn-primary">Subir</button>
        </form>
    </div>

    <br>
    <div class="container">
    <div class="row mb-2">
        @foreach($peliculas as $pelicula)

        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark" href="#">{{$pelicula->titulo}}</a>
              </h3>
              <div class="mb-1 text-muted">Género: {{$pelicula->genero}}</div>
              <div class="mb-1 text-muted">Duración: {{$pelicula->duracion}}</div>
              <div class="mb-1 text-muted">Restricción: {{$pelicula->restriccion}}</div>
              <div class="mb-1 text-muted">Precio: {{$pelicula->precio}}</div>
              <p class="card-text mb-auto">Sinopsis: {{$pelicula->sinopsis}}</p>
              <div>
                        <small class="text-muted">{{$pelicula->created_at}}</small>
              </div>
              <form method="POST" action="{{ route('eliminarPelicula') }}">
                        @csrf
                        <div class="button">
                            <input type="hidden" name="id_pelicula" value="{{$pelicula->id}}">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Eliminar</button>
                        </div>
              </form>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" src="/pelicula/{{$pelicula->ruta}}" height="300" alt="Card image cap" loading="lazy">
          </div>
        </div>
        @endforeach
      </div>
      </div>
</div>
@endsection