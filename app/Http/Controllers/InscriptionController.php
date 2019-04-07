<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscription;
use App\Periodo;
use App\Oferta;
use Auth;

class InscriptionController extends Controller
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
            $inscriptions = Inscription::orderBy('ID', 'DESC')->paginate();    
        }
        elseif($tipoUser == 3)
        {
            $inscriptions = Inscription::where('user_id', $idUser)->get();       
        }        

        $periodos = Periodo::orderBy('ID', 'DESC')->paginate();        
        return view('inscription.index', compact('inscriptions', 'periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inscription.create');
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
                Inscription::updateOrCreate([
                    'user_id' => $data['user_id'], 'periodo_id' => $data['periodo_id']],
                    ['observacion' => $data['observacion'],                    
                ]);
        return redirect()->route('inscriptions.index')->with('message', 'Inscripción agregada exitosamente');
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
        $inscription = Inscription::find($id);        
        $periodo = Periodo::find($inscription->periodo_id);
        $periodos = Periodo::orderBy('ID', 'DESC')->paginate();
        $oferta = Oferta::find($periodo->oferta_id);
        $ofertas = Oferta::where('tipo', '=', $oferta->tipo)->get(); 
        return view('inscription.edit', compact('inscription', 'oferta', 'ofertas', 'periodos'));
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
        $inscription = Inscription::find($id);               

        if($inscription)
        {
            $inscription->user_id = $request->user_id;
            $inscription->periodo_id = $request->periodo_id;
            $inscription->observacion = $request->observacion;
            $inscription->save();         
        }

        return redirect()->route('inscriptions.index')->with('message', 'Inscripción actualizada exitosamente');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inscription::destroy($id);
        return redirect()->route('inscriptions.index')->with('message', 'Inscripción eliminada exitosamente');          
    }

     /**
     * update the specified code with request ajax.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
    public function ajaxInsPeriodo(Request $request)
    { 
        $data = $request;        

        $ofertas = Oferta::where('tipo', '=', $data['tipoPer'])->get(); 
        $periodos = Periodo::orderBy('ID', 'DESC')->paginate();
           
        return view('inscription.ajax.divSelInsPeriodo', compact('ofertas', 'periodos'));
    }
}
