<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodo;
use App\Nota;
use App\User;
use App\Materia;
use App\Horario;
use PDF;

class ReportsController extends Controller
{ 
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notasIndex()
    {
        $periodos = Periodo::orderBy('ID', 'DESC')->paginate();        
        return view('reports.notas', compact('periodos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notasReport(Request $request)
    {
    	$data = $request;

        $periodo = Periodo::find($data['periodo']);
        $notas = Nota::where('periodo_id', $periodo->id)->get();
        $users = User::orderBy('ID','DESC')->paginate();        
        $materias = Materia::orderBy('ID', 'DESC')->paginate();            
        
        $datos = ['nombre' => $periodo->titulo,
                  'notas' => $notas,
                  'users' => $users,
                  'materias' => $materias];
        $pdf = PDF::loadView('reports.notasPdf', $datos);
		return $pdf->stream('notas.pdf');        
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ofertasIndex(Request $request)
    {
        $periodos = Periodo::orderBy('ID', 'DESC')->paginate();        
        return view('reports.ofertas', compact('periodos'));    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ofertasReport(Request $request)
    {
        $data = $request;

        $periodo = Periodo::find($data['periodo']);
        $materias = Materia::where('oferta_id', $periodo->oferta_id)->get();    
        $horario = Horario::find($periodo->horario_id);

        $datos = ['nombre' => $periodo->titulo,
                  'descripcion' => $periodo->descripcion,                  
                  'materias' => $materias,
                  'horario' => $horario];
        $pdf = PDF::loadView('reports.ofertasPdf', $datos);
        return $pdf->stream('contenidos.pdf');        
    }

}
