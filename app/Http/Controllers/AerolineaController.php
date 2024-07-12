<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoAsiento;
use App\Models\VuelosAsiento;
use App\Models\Vuelo;
class AerolineaController extends Controller
{
    public function inicio(){


        return view('inicio');
    }
    public function tiposAsientos(){
        $tipoAsientos = TipoAsiento::all();
        return view('tiposasientos',compact('tipoAsientos'));
    }

    public function agregarAsiento(){

        return view('agregartipoasiento');
    }
    public function agregarAsientoSalvar(Request $request){
        $tipoAsientos = new TipoAsiento();
        $tipoAsientos->descripcion = $request->descripcion;
        $tipoAsientos->precio = $request->precio;
        $tipoAsientos->estado = $request->estado;
        $tipoAsientos->save();

     return    redirect(route('mostrar.asientos'));
    }

    public function eliminarAsiento($id){

        $tipoAsiento = TipoAsiento::find($id);
        $tipoAsiento->estado = 'I';
        $tipoAsiento->save();

    return redirect(route('mostrar.asientos'));
    }

    public function editarAsiento($id){
        $tipoAsiento = TipoAsiento::find($id);
        return view ('editarAsiento',compact('tipoAsiento'));
    }

    public function mostrarVuelos(){
        $vuelos = Vuelo::all();
        
        return view('vuelos',compact('vuelos'));
    }
    public function nuevoVuelo(){
        return view('nuevoVuelo');
    }
    public function nuevoVueloSalvar(Request $request){
        $vuelo = new Vuelo();
        $vueloValidar = Vuelo::where('fechaDeSalida', $request->fechaDeSalida.'  00:00:00')->where('numeroVuelo',$request->numeroVuelo)->first();
        if($vueloValidar==null){
            $vuelo->numeroVuelo = $request->numeroVuelo;
            $vuelo->fechaDeSalida = $request->fechaDeSalida;
            $vuelo->destino = $request->destino;
            $vuelo->origen = $request->origen;
            $vuelo->numeroAsientos = $request->numeroAsientos;
            $vuelo->save();
           
            return redirect(Route('mostrar.vuelos'));

        }
return 'Vuelo Existente';
   

    }
    public function getVuelo($id){
        $vuelo = Vuelo::find($id);
       
        return view('editarVuelo', compact('vuelo'));
    }
    public function setVuelo(Request $request, $id){
        $vuelo = Vuelo::find($id);
        $vuelo->origen = $request->origen;
        $vuelo->destino = $request->destino;
        $vuelo->save();
        return redirect(route('mostrar.vuelos'));
    }
}
