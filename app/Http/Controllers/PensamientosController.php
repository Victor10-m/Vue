<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pensamiento;

class PensamientosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
// debolvera el listado de pensamientos 
    public function index()
    {
        return Pensamiento::where('usuario_id', auth()->id())->get();
    }
// registra un nuevo Pensamiento
    public function store(Request $request)
    {
        $pensamiento = new Pensamiento();
        $pensamiento->descripcion = $request->Descripcion;
        $pensamiento->usuario_id = auth()->id();
        $pensamiento->save();

        return $pensamiento;
    }
// debera de editar
    public function update(Request $request, $id)
    {
        $pensamiento = Pensamiento::find($id);
        $pensamiento->descripcion = $request->Descripcion;
        $pensamiento->save();

        return $pensamiento;
    }
// para eliminar 
    public function destroy($id)
    {
        $pensamiento = Pensamiento::find($id);
        $pensamiento->delete();  
      }
}
