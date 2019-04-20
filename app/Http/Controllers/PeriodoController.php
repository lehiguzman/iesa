<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodo;
use App\Oferta;
use App\Horario;
use App\Bitacora;
use Auth;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodo::orderBy('ID', 'DESC')->paginate();
        $horarios = Horario::orderBy('ID', 'DESC')->paginate();
        $ofertas = Oferta::orderBy('ID', 'DESC')->paginate();
        return view('periodo.index', compact('periodos', 'horarios', 'ofertas'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodo.create');
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
        $accion = 'Crea periodo de oferta académica';
                Bitacora::create([
                    'accion' => $accion,
                    'user_id' => $user_id,            
                ]);
                Periodo::create([
                    'titulo' => $data['titulo'],
                    'cantidad' => $data['cantidad'],  
                    'descripcion' => $data['descripcion'],
                    'observacion' => $data['observacion'],
                    'oferta_id' => $data['oferta_id'],
                    'horario_id' => $data['horario_id'],
                ]);
        return redirect()->route('periodos.index')->with('message', 'Oferta abierta exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodo = Periodo::find($id);
        //$horarios = Horario::orderBy('ID', 'DESC')->paginate();
        $horarios = Horario::where('id', '=' , $periodo->horario_id)->get();       
        $ofertas = Oferta::where('id', '=' , $periodo->oferta_id)->get();  
        return view('periodo.edit', compact('periodo', 'horarios', 'ofertas')); 
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
        $periodo = Periodo::find($id);  

        if($periodo)
        {
            $user_id = Auth::user()->id;
            $accion = 'Edita periodo de oferta académica: id = '.$id;
                Bitacora::create([
                    'accion' => $accion,
                    'user_id' => $user_id,            
                ]);
            $periodo->titulo = $request->titulo;
            $periodo->cantidad = $request->cantidad;
            $periodo->descripcion = $request->descripcion;
            $periodo->observacion = $request->observacion;
            $periodo->oferta_id = $request->oferta_id;
            $periodo->horario_id = $request->horario_id;
            $periodo->save();         
        }

        return redirect()->route('periodos.index')->with('message', 'Oferta actualizada exitosamente');        
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
        $accion = 'Elimina oferta : id = '.$id;
                Bitacora::create([
                    'accion' => $accion,
                    'user_id' => $user_id,            
                ]);
        Periodo::destroy($id);
        return redirect()->route('periodos.index')->with('message', 'Oferta eliminada exitosamente');  
    }

    /**
     * update the specified code with request ajax.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
    public function ajaxOfertas(Request $request)
    {
        $data = $request;                
        $ofertas = Oferta::where('tipo', '=' , $data['tipo'])->get();       
        return view('periodo.ajax.divSelOfertas', compact('ofertas')); 
    }

        /**
     * update the specified code with request ajax.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
    public function ajaxHorarios(Request $request)
    {
        $data = $request;                
        $horarios = Horario::where('tipo', '=' , $data['tipo'])->get();       
        return view('periodo.ajax.divSelHorarios', compact('horarios')); 
    }
}
