<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Aula;
use App\Bitacora;
use Auth;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $aulas = Aula::orderBy('ID', 'DESC')->paginate();
        return view('aula.index', compact('aulas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aula.create');
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
        $accion = 'Agrega aula';
                Bitacora::create([
                    'accion' => $accion,
                    'user_id' => $user_id,            
                ]);
                Aula::create([
                    'nombre' => $data['nombre'],
                    'capacidad' => $data['capacidad'],                
                    'descripcion' => $data['descripcion']                    
                ]);
        return redirect()->route('aulas.index')->with('message', 'Salón agregado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aula = Aula::find($id);
        return view('aula.edit', compact('aula'));
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
        $aula = Aula::find($id);               

        if($aula)
        {
            $user_id = Auth::user()->id;
            $accion = 'Edita aula  : id = '.$id;
            Bitacora::create([
                'accion' => $accion,
                'user_id' => $user_id,            
            ]);
            $aula->nombre = $request->nombre;
            $aula->capacidad = $request->capacidad;
            $aula->descripcion = $request->descripcion;            
            $aula->save();         
        }

        return redirect()->route('aulas.index')->with('message', 'Salón actualizado exitosamente');  
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
        $accion = 'Elimina aula : id = '.$id;
            Bitacora::create([
                'accion' => $accion,
                'user_id' => $user_id,            
            ]);

        try 
        {
            Aula::destroy($id);
        } 
        catch(QueryException $e) 
        {            
            return redirect()->route('aulas.index')->with('error', 'Aula asociada a Materia, no puede eliminarse');
        } 
        return redirect()->route('aulas.index')->with('message', 'Salón eliminado exitosamente');  
    }
}
