<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;
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
        $ofertas = Oferta::orderBy('ID', 'DESC')->paginate();        
        return view('reports.notas', compact('ofertas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notasReport(Request $request)
    {
    	$data = $request;

        $oferta = Oferta::find($data['oferta']);
        $datos = ['nombre' => $oferta->nombre];
        $pdf = PDF::loadView('reports.notasPdf', $datos);
		return $pdf->download('notas.pdf');        
    }
}
