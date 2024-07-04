<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoAsiento;
use App\Models\VuelosAsiento;
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

        return view('vuelos');
    }
}
