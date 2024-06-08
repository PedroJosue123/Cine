<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Sala;
use App\Models\Horario;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    //public function __construct()
    //{
    //   $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $peliculas = Pelicula::all();
        $salas = Sala::all();
        $horarios = Horario::all();
        return view('home',compact('peliculas', 'salas', 'horarios'));
    }

    public function indexadmin()
    {
        $peliculas = Pelicula::all();
        $salas = Sala::all();
        $horarios = Horario::all();
        return view('homeadmin',compact('peliculas', 'salas', 'horarios'));
    }
}
