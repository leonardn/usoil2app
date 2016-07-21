<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\CorporationRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Excel;

class ExcelController extends InfyOmBaseController
{
    //
    private $corporationRepository;
    public function __construct(CorporationRepository $corporationRepo)
    {
    	//$this->middleware('auth');
        $this->corporationRepository = $corporationRepo;
    }

    public function getCorporationExport(Request $request) 
    {
    	$this->corporationRepository->pushCriteria(new RequestCriteria($request));
        $corporations = $this->corporationRepository->all();

        // Excel::create('Corporations Data', function($excel){
        // 	$excel->sheet('Sheet 1', function($excel){
        // 		$sheet->fromModel($corporations);
        // 	});
        // })->export('xlsx');
        Excel::create('Corporation Data', function($excel) use($corporations){
        	$excel->sheet('Fuck Sheet 1', function($sheet) use($corporations){
        		$sheet->fromModel($corporations);
        	});
		})->export('xls');
    }

}
