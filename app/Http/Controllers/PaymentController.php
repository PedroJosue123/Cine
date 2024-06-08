<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Cliente;
use App\Models\Entrada;
use App\Models\Horario;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PaymentController extends Controller
{

    public function irCLientes(string $id){
         $pelicula = Pelicula::find($id);
         return view('payments.clientes',compact('pelicula'));
    }

    public function irPagar(string $id){
        $pelicula = Pelicula::find($id);
        $horario = Horario::all(); // Obtén los horarios
        return view('payments.payment',compact('pelicula', 'horario'));
    }
    public function mostrarPagoCliente(string $id, $cliente_id){
        $pelicula = Pelicula::find($id);
        $cliente = Cliente::find($cliente_id);
        $horario = Horario::all(); // Obtén los horarios
        return view('payments.payment',compact('pelicula', 'cliente','horario'));
    }
    public function subirCliente(Request $request, $id){
        $cliente = new Cliente;
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->dni = $request->input('dni');
        $cliente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $cliente->email = $request->input('email');
        $cliente->celular = $request->input('celular');
        $cliente->save();

        return redirect('payments/'.$id.'/'.$cliente->id);
    }
    
    public function subirEntrada(Request $request, $id, $id_cliente){
        // $entrada = New Entrada;
        // $entrada->n°_asiento = request('n°_asiento');
        // $entrada->horario_id = request('horario_id');
        // $entrada->cliente_id = request('cliente_id');

        $entrada = new Entrada();
        $entrada->n°_asiento = $request->input('n°_asiento');
        $entrada->horario_id = $request->input('horario_id');
        $entrada->cliente_id = $request->input('cliente_id');
        $entrada->save();
        
        return back();
    }
}
