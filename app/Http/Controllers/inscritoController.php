<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscription;
use App\Periodo;
use App\User;
use Lava;
use DB;

class inscritoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		      $eneMas = 0;
          $febMas = 0;
          $marMas = 0;
          $abrMas = 0;
          $mayMas = 0;
          $junMas = 0;
          $julMas = 0;
          $agoMas = 0;
          $sepMas = 0;
          $octMas = 0;
          $novMas = 0;
          $dicMas = 0;

          $eneFem = 0;
          $febFem = 0;
          $marFem = 0;
          $abrFem = 0;
          $mayFem = 0;
          $junFem = 0;
          $julFem = 0;
          $agoFem = 0;
          $sepFem = 0;
          $octFem = 0;
          $novFem = 0;
          $dicFem = 0;
          
        $masculinos = User::where('sexo', 'M')->get();
        $femeninos = User::where('sexo', 'F')->get();
             
        foreach ($masculinos as $masculino) 
        {
            $inscriptions = Inscription::where('user_id', $masculino->id)->get();
            foreach ($inscriptions as $inscription)
            {
               $mes = date('m', strtotime($inscription->created_at));
               if($mes == '01') { $eneMas++; } 
               if($mes == '02') { $febMas++; }
               if($mes == '03') { $marMas++; } 
               if($mes == '04') { $abrMas++; }
               if($mes == '05') { $mayMas++; } 
               if($mes == '06') { $junMas++; }
               if($mes == '07') { $julMas++; } 
               if($mes == '08') { $agoMas++; }
               if($mes == '09') { $sepMas++; } 
               if($mes == '10') { $octMas++; }
               if($mes == '11') { $novMas++; } 
               if($mes == '12') { $dicMas++; }               
            }             
        }

        foreach ($femeninos as $femenino) 
        {
            $inscriptions = Inscription::where('user_id', $femenino->id)->get();
            foreach ($inscriptions as $inscription)
            {
               $mes = date('m', strtotime($inscription->created_at));
               if($mes == '01') { $eneFem++; } 
               if($mes == '02') { $febFem++; }               
               if($mes == '03') { $marFem++; } 
               if($mes == '04') { $abrFem++; }
               if($mes == '05') { $mayFem++; } 
               if($mes == '06') { $junFem++; }
               if($mes == '07') { $julFem++; } 
               if($mes == '08') { $agoFem++; }
               if($mes == '09') { $sepFem++; } 
               if($mes == '10') { $octFem++; }
               if($mes == '11') { $novFem++; } 
               if($mes == '12') { $dicFem++; }               
            }             
        }        

        $inscritos = Lava::DataTable();

		$inscritos->addStringColumn('Año')
         ->addNumberColumn('Mujeres')
         ->addNumberColumn('Hombres')
         ->setDateTimeFormat('Y-m-d')        
         ->addRow(['Enero '.date('Y'), $eneFem, $eneMas])		         
         ->addRow(['Febrero '.date('Y'), $febFem, $febMas])                   
         ->addRow(['Marzo '.date('Y'), $marFem, $marMas])                  
         ->addRow(['Abril '.date('Y'), $abrFem, $abrMas])                   
         ->addRow(['Mayo '.date('Y'), $mayFem, $mayMas])
         ->addRow(['Junio '.date('Y'), $junFem, $junMas])
         ->addRow(['Julio '.date('Y'), $julFem, $julMas])                   
         ->addRow(['Agosto '.date('Y'), $agoFem, $agoMas])                   
         ->addRow(['Septiembre '.date('Y'), $sepFem, $sepMas])
         ->addRow(['Octubre '.date('Y'), $octFem, $octMas])                 
         ->addRow(['Noviembre '.date('Y'), $novFem, $novMas])
         ->addRow(['Diciembre '.date('Y'), $dicFem, $dicMas]);                   

		$lava = Lava::ColumnChart('Inscritos', $inscritos, [
		    'title' => 'Estudiantes inscritos mensual por genero',
    		'titleTextStyle' => [
        		'color'    => '#eb6b2c',
        		'fontSize' => 14
    		]        
      ]);


		return view('charts.inscritos', compact('lava'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inscritoXOferta()
    {
        $inscritosXoferta = Lava::DataTable();
        
        $periodos = Periodo::orderBy('ID', 'DESC')->paginate();


        $inscritosXoferta->addStringColumn('Oferta')
                         ->addNumberColumn('Porcentaje');
        foreach ($periodos as $periodo) 
        {            
            $inscritos = Inscription::where('periodo_id', $periodo->id)->count();
            $inscritosXoferta->addRow([$periodo->titulo, $inscritos]);
        }
          
        
               

        $lava = Lava::DonutChart('InscritosXoferta', $inscritosXoferta, [
            'title' => 'Estudiantes inscritos por Oferta',
            'titleTextStyle' => [
            'color'    => '#eb6b2c',
            'fontSize' => 14
              ]    
            ]);

        return view('charts.inscritoXOferta', compact('lava'));
    }
}
