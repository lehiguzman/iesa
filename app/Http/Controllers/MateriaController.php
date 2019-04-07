<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;
use App\User;
use App\Materia;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('materia.edit', compact('oferta', 'materias', 'users'));   
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
                Materia::create([                    
                    'nombre' => $data['nombre'],
                    'descripcion' => $data['descripcion'],                
                    'observacion' => $data['observacion'],                    
                    'prof_id' => $data['user_id'],                    
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
        $oferta = Materia::find($id);        
        Materia::destroy($id); 
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
            
            Materia::create([
                    'nombre' => $data['nombre'],
                    'descripcion' => $data['descripcion'],                
                    'observacion' => $data['observacion'], 
                    'oferta_id' => $data['oferta_id'],
                    'prof_id' => $data['user_id'],
                ]);           

        $materias = Materia::orderBy('ID', 'DESC')->paginate();
        $oferta = Oferta::find($data['oferta_id']);
        return view('materia.ajax.divSelMaterias', compact('materias', 'oferta'));
    }
}
