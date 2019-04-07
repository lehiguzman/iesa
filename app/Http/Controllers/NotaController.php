<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;
use App\Materia;
use App\Periodo;
use App\Inscription;
use App\User;
use Auth;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoUser = Auth::user()->tipo;
        $idUser = Auth::user()->id;
        if($tipoUser == 1)
        {
            $materias = Materia::orderBy('ID', 'DESC')->paginate();    
        }
        elseif($tipoUser == 2)
        {
            $materias = Materia::where('prof_id', $idUser)->get();       
        }
        return view('nota.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $materia = Materia::find($id);
        $periodo = Periodo::where('oferta_id', $materia->oferta_id)->first();
        $inscriptions = Inscription::where('periodo_id', $periodo->id)->get();
        $users = User::orderBy('id', 'DESC')->paginate();
        $notas = Nota::where('periodo_id', $periodo->id)->where('materia_id', $materia->id)->get();
        return view('nota.edit', compact('materia', 'inscriptions', 'users', 'periodo', 'notas'));
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
        $data = $request;       
        //dd(count($data['user_id']));
        for ($i=0; $i < count($data['user_id']); $i++) 
        { 
           Nota::updateOrCreate([
                    'user_id' => $data['user_id'][$i],
                    'materia_id' => $data['materia_id'],
                    'periodo_id' => $data['periodo_id'],
                    'prof_id' => $data['prof_id']],
                    ['nota' => $data['nota'][$i],
                ]);
        }       

        return redirect()->route('notas.index')->with('message', 'Notas actualizadas exitosamente');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
