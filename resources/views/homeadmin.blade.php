@extends('layouts.appadministrador')

@section('content')
    <div class="container">

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">

          <a class="btn btn-lg" href="https://www.facebook.com/?locale=es_LA" target="_blank">
            <i class="bi bi-facebook text-primary"></i> 
              Facebook
          </a>
          <a class="btn btn-lg" href="https://twitter.com/?lang=es" target="_blank">
            <i class="bi bi-twitter-x text-primary"></i> 
            Twiter
          </a>
          <a class="btn btn-lg" type="button" href="https://www.instagram.com/" target="_blank">
            <i class="bi bi-instagram text-primary"></i> 
            Instagram
          </a>
          <a class="btn btn-lg" type="button" href="https://www.youtube.com/" target="_blank">
            <i class="bi bi-youtube text-primary"></i> 
            Youtube
          </a>
        </nav>
      </div>

      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://static.cinepolis.com/img/front/11/202312782712236-prin.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://static.cinepolis.com/img/front/11/20231213113046762-prin.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://static.cinepolis.com/img/front/11/202311229728308-prin.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>
      <br>
      <div class=""><h1>Cartelera Semanal</h1></div>
      <br>
 
      <div class="row mb-2">
        @foreach($peliculas as $pelicula)

        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark" href="/peliculas/{{$pelicula->id}}">{{$pelicula->titulo}}</a>
              </h3>
              <div class="mb-1 text-muted">Género: {{$pelicula->genero}}</div>
              <div class="mb-1 text-muted">Duración: {{$pelicula->duracion}}</div>
              <div class="mb-1 text-muted">Restricción: {{$pelicula->restriccion}}</div>
              <p class="card-text mb-auto">Sinopsis: {{$pelicula->sinopsis}}</p>
              <a class="btn btn-outline-dark btn-sm" href="/peliculas/{{$pelicula->id}}">Ver Horarios</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" src="/pelicula/{{$pelicula->ruta}}" height="300" alt="Card image cap" loading="lazy">
          </div>
        </div>
        @endforeach
      </div>

      <div class="text-end">
        <h4>Ver datos:</h4>
        <a href="{{ route('peliculaTaquillera') }}" class="btn btn-outline-success btn-lg">Pelicula mas taquillera</a>
        <a href="{{ route('enviarAPI') }}" class="btn btn-outline-success btn-lg">Pelicula con mayor precio</a>
      </div>

    </div>
@endsection
