<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Sala;
use App\Models\Horario;
use App\Models\Entrada;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Http;

class PeliculaController extends Controller
{
    public function index(){
        $id = auth()->user()->id;
        $peliculas = Pelicula::all();
        return view('peliculas.peliculas',compact('peliculas'));
    }
    
    public function index2(){
        $id = auth()->user()->id;
        $salas = Sala::all();
        return view('peliculas.salas',compact('salas'));  
    }
    public function index3(){
        $id = auth()->user()->id;
        $salas = Sala::all(); // Obtén las salas
        $horarios = Horario::all(); // Obtén los horarios
        $peliculas = Pelicula::all(); // Obtén los peliculas
        return view('peliculas.horarios', compact('salas', 'horarios','peliculas'));
    }
    public function index4(){
        $id = auth()->user()->id;
        $entradas = Entrada::all();
        return view('peliculas.entradas',compact('entradas'));
    }

    public function subirPelicula(Request $request){
        if($request->hasFile('pelicula')){
            #$id = auth()->user()->id;
            $image = $request->file('pelicula');
            $fileName = time().".".$image->getClientOriginalExtension();
            Storage::disk('local')->put('/'.$fileName,file_get_contents($image));

            $pelicula = New Pelicula;
            $pelicula->titulo = request('titulo');
            $pelicula->genero = request('genero');
            $pelicula->duracion = request('duracion');
            $pelicula->restriccion = request('restriccion');
            $pelicula->sinopsis = request('sinopsis');
            $pelicula->precio = request('precio');
            $pelicula->ruta = $fileName;
            $pelicula->save();

            return redirect('peliculas');
        }      
    }
    public function subirSala(Request $request){
        $sala = new Sala;
        $sala->numero_sala = $request->input('numero_sala');
        $sala->n°_asientos = $request->input('n°_asientos');
        $sala->tipo_sala = $request->input('tipo_sala');
        $sala->estado = $request->input('estado');
        $sala->save();
    
        return redirect('salas');
    }
    public function subirHorario(Request $request){
        $horario = new Horario;
        $horario->fecha = $request->input('fecha');
        $horario->hora = $request->input('hora');
        $horario->sala_id = $request->input('sala_id');
        $horario->pelicula_id = $request->input('pelicula_id');
        $horario->save();
    
        return redirect('horarios');
    }

    public function mostrarPelicula(string $ruta){
        $file = Storage::disk('local')->get($ruta);
        return image::make($file)->response();
    }

    public function eliminarPelicula(Request $request){
        if($request->id_pelicula){
            $pelicula = Pelicula::find($request->id_pelicula);
            $pelicula->delete();

            Storage::disk('local')->delete($pelicula->ruta);
            return redirect('/peliculas');
        }
    }
    public function eliminarSala(Request $request){
        $sala = Sala::find($request->id_sala);
        $sala->delete();

        return redirect('/salas');
    }
    public function eliminarHorario(Request $request){
        $horario = Horario::find($request->id_horario);
        $horario->delete();

        return redirect('/horarios');
    }
    public function pagina(string $id){
        $pelicula = Pelicula::find($id);
        $peliculas = Pelicula::all();
        $horario = Horario::all(); // Obtén los horarios
        return view('peliculas.pelicula',compact('pelicula', 'horario', 'peliculas'));
    }
    public function enviarAPI(){
        $peliculas = Pelicula::select('id','titulo','precio')->get();
        $url = "http://localhost:8000/enviarAPI";
        $response = Http::post($url,['datos'=>$peliculas]);
        return view('peliculas.peliculamasvista')->with("peliculamasvista",$response);
    }
    public function peliculaTaquillera(){
        $titulosPeliculas = Entrada::with('horario.pelicula:id,titulo')->get()->pluck('horario.pelicula.titulo')->map(function ($titulo) {
            return ['titulo' => $titulo];
        })->values();
        $url = "http://localhost:8000/peliculaTaquillera";
        $response = Http::post($url,['datos'=>$titulosPeliculas]);
        #return $response;
        return view('peliculas.peliculamastaquillera')->with("peliculamastaquillera",$response);
    }
}   
