<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
use App\Bitacora;
use Auth;


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
        $user_id = Auth::user()->id;
        $accion = 'Agrega horario';
                Bitacora::create([
                    'accion' => $accion,
                    'user_id' => $user_id,            
                ]);
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
            $user_id = Auth::user()->id;
            $accion = 'Edita horario  : id = '.$id;
            Bitacora::create([
                'accion' => $accion,
                'user_id' => $user_id,            
            ]);
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
        $user_id = Auth::user()->id;
        $accion = 'Elimina horario : id = '.$id;
            Bitacora::create([
                'accion' => $accion,
                'user_id' => $user_id,            
            ]);

        Horario::destroy($id);
        return redirect()->route('horarios.index')->with('message', 'Horario eliminado exitosamente');     
    }
}
