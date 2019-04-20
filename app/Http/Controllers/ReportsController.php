<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodo;
use App\Nota;
use App\User;
use App\Materia;
use App\Horario;
use App\Bitacora;
use Auth;
use PDF;
use DB;

class ReportsController extends Controller
{ 
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notasIndex()
    {
        $prof_id = Auth::user()->id;
        $materias = DB::table('materias')
                        ->select('oferta_id')
                        ->distinct()->get();
                        

        //Materia::where('prof_id', $prof_id)->groupBy('oferta_id')->get();
        //dd($materias);
        $periodos = Periodo::orderBy('ID', 'DESC')->paginate();

        return view('reports.notas', compact('periodos', 'materias'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notasReport(Request $request)
    {
    	$data = $request;
        $prof_id = Auth::user()->id;

        $periodo = Periodo::find($data['periodo']);
        if(Auth::user()->tipo == 1)
        {
            $notas = Nota::where('periodo_id', $periodo->id)->get();  
            $materias = Materia::orderBy('ID', 'DESC')->paginate();              
        }
        else
        {
            $notas = Nota::where('periodo_id', $periodo->id)->where('prof_id', $prof_id)->get();
            $materias = Materia::where('prof_id', $prof_id)->get();              
        }
        
        $users = User::orderBy('ID','DESC')->paginate();        
        
        
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

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bitacorasIndex(Request $request)
    {
        $users = User::orderBy('ID', 'DESC')->paginate();  
        $bitacoraDesde = DB::table('bitacoras')
                        ->select('created_at')
                        ->distinct()->get();
        $bitacoraHasta = Bitacora::orderBy('ID', 'DESC')->paginate();
        return view('reports.bitacoras', compact('users', 'bitacoraDesde', 'bitacoraHasta'));    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bitacorasReport(Request $request)
    {
        $data = $request;        
       
        $user = User::find($data['user_id']);
        $bitacoras = Bitacora::where('created_at', '>=', $data['desde'])->where('created_at', '<=', $data['hasta'])->get();

        $datos = ['bitacoras' => $bitacoras,
                  'user' => $user];
        $pdf = PDF::loadView('reports.bitacorasPdf', $datos);
        return $pdf->stream('contenidos.pdf');        
    }

}
