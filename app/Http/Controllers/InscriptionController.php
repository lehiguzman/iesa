<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscription;
use App\Periodo;
use App\Oferta;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscriptions = Inscription::orderBy('ID', 'DESC')->paginate();   
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
                Inscription::create([
                    'user_id' => $data['user_id'],
                    'periodo_id' => $data['periodo_id'],
                    'observacion' => $data['observacion'],                    
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
        //
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
        //
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
