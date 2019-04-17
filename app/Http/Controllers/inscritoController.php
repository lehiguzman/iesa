<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lava;

class inscritoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$finances = Lava::DataTable();

		$finances->addDateColumn('Año')
         ->addNumberColumn('Mujeres')
         ->addNumberColumn('Hombres')
         ->setDateTimeFormat('Y-m-d')         
         ->addRow(['2018-09-01', 4, 6])
         ->addRow(['2018-10-01', 12, 15])
         ->addRow(['2018-11-01', 13, 7])
         ->addRow(['2018-12-01', 14, 12])		         
         ->addRow(['2019-01-01', 18, 4])		        
         ->addRow(['2019-02-01', 4, 12])		         
         ->addRow(['2019-03-01', 8, 18]);			         

		$lava = Lava::ColumnChart('Finances', $finances, [
		    'title' => 'Estudiantes inscritos',
    		'titleTextStyle' => [
        		'color'    => '#eb6b2c',
        		'fontSize' => 14
    		],
    		'HorizontalAxis' => [
    			'title' => 'asdasdasd'	
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
        $reasons = Lava::DataTable();
        
        $reasons->addStringColumn('Oferta')
                ->addNumberColumn('Porcentaje')
                ->addRow(['Maestria en Gerencia', 30])
                ->addRow(['Maestria en Mercadeo', 25])
                ->addRow(['Maestria en Finanzas', 35])
                ->addRow(['Maestria en Gerencia Pública', 10]);

        $lava = Lava::DonutChart('IMDB', $reasons, [
            'title' => 'inscritos por Oferta'
            ]);

        return view('charts.inscritoXOferta', compact('lava'));
    }
}
