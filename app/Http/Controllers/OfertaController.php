<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;
use App\Bitacora;
use Auth;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofertas = Oferta::orderBy('ID', 'DESC')->paginate();
        return view('oferta.index', compact('ofertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('oferta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request;

        $user_id = Auth::user()->id;
        $accion = 'Crea oferta';
                Bitacora::create([
                    'accion' => $accion,
                    'user_id' => $user_id,            
                ]);
                Oferta::create([
                    'tipo' => $data['tipo'],
                    'nombre' => $data['nombre'],                
                    'descripcion' => $data['descripcion'],
                    'observacion' => $data['observacion'],                    
                ]);
        return redirect()->route('ofertas.index')->with('message', 'Oferta agregada exitosamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oferta = Oferta::find($id);
        return view('oferta.edit', compact('oferta'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oferta = Oferta::find($id);               

        $user_id = Auth::user()->id;
        $accion = 'Edita oferta : id = '.$id;
                Bitacora::create([
                    'accion' => $accion,
                    'user_id' => $user_id,            
                ]);
        if($oferta)
        {
            $oferta->tipo = $request->tipo;
            $oferta->nombre = $request->nombre;
            $oferta->descripcion = $request->descripcion;
            $oferta->observacion = $request->observacion;
            $oferta->save();         
        }

        return redirect()->route('ofertas.index')->with('message', 'Oferta actualizada exitosamente');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = Auth::user()->id;
        $accion = 'Elimina oferta : id = '.$id;
                Bitacora::create([
                    'accion' => $accion,
                    'user_id' => $user_id,            
                ]);

        Oferta::destroy($id);
        return redirect()->route('ofertas.index')->with('message', 'Oferta eliminada exitosamente');     
    }
}
