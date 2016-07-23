<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\CorporationRepository;
use App\Repositories\CasinoRepository;
use App\Repositories\RestaurantRepository;
use App\Repositories\MachineRepository;
use App\Repositories\MachineReadingsRepository;
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
    private $casinoRepository;
    private $restaurantRepository;
    private $machineRepository;
    private $machinereadingsRepository;

    public function __construct(CorporationRepository $corporationRepo, CasinoRepository $casinoRepo, RestaurantRepository $restaurantRepo, MachineRepository $machinesRepo, MachineReadingsRepository $machinereadingsRepo)
    {
    	//$this->middleware('auth');
        $this->corporationRepository = $corporationRepo;
        $this->casinoRepository = $casinoRepo;
        $this->restaurantRepository = $restaurantRepo;
        $this->machineRepository = $machinesRepo;
        $this->machinereadingsRepository = $machinereadingsRepo;
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
        	$excel->sheet('Sheet 1', function($sheet) use($corporations){
        		$sheet->fromModel($corporations);
        	});
		})->export('xls');
    }

    public function getCasinoExport(Request $request) 
    {
    	$this->casinoRepository->pushCriteria(new RequestCriteria($request));
    	$casinos = $this->casinoRepository->all();

    	Excel::create('Casino Data', function($excel) use($casinos){
        	$excel->sheet('Sheet 1', function($sheet) use($casinos){
        		$sheet->fromModel($casinos);
        	});
		})->export('xls');
    }

    public function getRestaurantExport(Request $request)
    {
    	$this->restaurantRepository->pushCriteria(new RequestCriteria($request));
    	$restaurants = $this->restaurantRepository->all();

    	Excel::create('Restaurant Data', function($excel) use($restaurants){
        	$excel->sheet('Sheet 1', function($sheet) use($restaurants){
        		$sheet->fromModel($restaurants);
        	});
		})->export('xls');
    }
    
    public function getMachineExport(Request $request)
    {
    	$this->machineRepository->pushCriteria(new RequestCriteria($request));
    	$machines = $this->machineRepository->all();

    	Excel::create('Machine Data', function($excel) use($machines){
        	$excel->sheet('Sheet 1', function($sheet) use($machines){
        		$sheet->fromModel($machines);
        	});
		})->export('xls');
    }

	public function getMachineReadingExport(Request $request)
    {
    	$this->machinereadingsRepository->pushCriteria(new RequestCriteria($request));
    	$machinereadings = $this->machinereadingsRepository->all();

    	Excel::create('Machine Reading Data', function($excel) use($machinereadings){
        	$excel->sheet('Sheet 1', function($sheet) use($machinereadings){
        		$sheet->fromModel($machinereadings);
        	});
		})->export('xls');
    }
}
