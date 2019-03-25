<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horario::orderBy('ID', 'DESC')->paginate();
        return view('horario.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horario.create');
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
                Horario::create([
                    'tipo' => $data['tipo'],
                    'lapso' => $data['lapso'],                
                    'descripcion' => $data['descripcion'],
                    'observacion' => $data['observacion'],                    
                ]);
        return redirect()->route('horarios.index')->with('message', 'Horario agregado exitosamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horario = Horario::find($id);
        return view('horario.edit', compact('horario'));  
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
        $horario = Horario::find($id);               

        if($horario)
        {
            $horario->tipo = $request->tipo;
            $horario->lapso = $request->lapso;
            $horario->descripcion = $request->descripcion;
            $horario->observacion = $request->observacion;
            $horario->save();         
        }

        return redirect()->route('horarios.index')->with('message', 'Horario actualizado exitosamente');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Horario::destroy($id);
        return redirect()->route('horarios.index')->with('message', 'Horario eliminado exitosamente');     
    }
}
