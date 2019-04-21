<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Oferta;
use App\User;
use App\Materia;
use App\Bitacora;
use App\Aula;
use Auth;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofertas = Oferta::orderBy('ID', 'DESC')->paginate();        
        return view('materia.index', compact('ofertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materia.create');
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
        $materias = Materia::orderBy('ID', 'DESC')->paginate();
        $users = User::where('tipo', 2)->get();
        $aulas = Aula::orderBy('ID', 'DESC')->paginate();

        return view('materia.edit', compact('oferta', 'materias', 'users', 'aulas'));   
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
            $user_id = Auth::user()->id;
            $accion = 'Crea materia';
            Bitacora::create([
                'accion' => $accion,
                'user_id' => $user_id,            
            ]);
                Materia::create([                    
                    'nombre' => $data['nombre'],
                    'descripcion' => $data['descripcion'],                
                    'observacion' => $data['observacion'],                    
                    'prof_id' => $data['user_id'],                    
                    'aula_id' => $data['aula_id'],                    
                ]);
        return redirect()->route('materias.index')->with('message', 'Oferta actualizada exitosamente');
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
            $accion = 'Elimina materia : id = '.$id;           

        $oferta = Materia::find($id);       

        try 
        {            
            Materia::destroy($id); 
            Bitacora::create([
                'accion' => $accion,
                'user_id' => $user_id,            
            ]);
        } 
        catch(QueryException $e) 
        {            
            return redirect()->route('materias.edit', $oferta->oferta_id)->with('error', 'Materia asociada a Notas, no puede eliminarse');
        } 
        
        return redirect()->route('materias.edit', $oferta->oferta_id)->with('message', 'Oferta eliminada exitosamente');            
    }

     /**
     * update the specified code with request ajax.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
    public function ajaxMaterias(Request $request)
    { 
        $data = $request;       
        $user_id = Auth::user()->id;
        $accion = 'Crea materia';

            Bitacora::create([
                'accion' => $accion,
                'user_id' => $user_id,            
            ]);
            Materia::create([
                    'nombre' => $data['nombre'],
                    'descripcion' => $data['descripcion'],                
                    'observacion' => $data['observacion'], 
                    'oferta_id' => $data['oferta_id'],
                    'prof_id' => $data['user_id'],
                    'aula_id' => $data['aula_id']
                ]);           

        $materias = Materia::orderBy('ID', 'DESC')->paginate();
        $aulas = Aula::orderBy('ID', 'DESC')->paginate();        
        $users = User::orderBy('ID', 'DESC')->paginate();        
        $oferta = Oferta::find($data['oferta_id']);

        return view('materia.ajax.divSelMaterias', compact('materias', 'oferta', 'aulas', 'users'));
    }
}
