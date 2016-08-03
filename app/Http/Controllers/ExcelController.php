<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\CorporationRepository;
use App\Repositories\CasinoRepository;
use App\Repositories\RestaurantRepository;
use App\Repositories\MachineRepository;
use App\Repositories\MachineReadingsRepository;
use App\Repositories\LogOptionRepository;
use App\Repositories\LogRequestsRepository;
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
    private $logoptionRepository;
    private $logrequestsRepository;

    public function __construct(CorporationRepository $corporationRepo, CasinoRepository $casinoRepo, RestaurantRepository $restaurantRepo, MachineRepository $machinesRepo, MachineReadingsRepository $machinereadingsRepo, LogOptionRepository $logoptionsRepo, LogRequestsRepository $logrequestsRepo)
    {
    	//$this->middleware('auth');
        $this->corporationRepository = $corporationRepo;
        $this->casinoRepository = $casinoRepo;
        $this->restaurantRepository = $restaurantRepo;
        $this->machineRepository = $machinesRepo;
        $this->machinereadingsRepository = $machinereadingsRepo;
        $this->logoptionRepository = $logoptionsRepo;
        $this->logrequestsRepository = $logrequestsRepo;
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
    	/*$this->machinereadingsRepository->pushCriteria(new RequestCriteria($request));
    	$machinereadings = $this->machinereadingsRepository->all();

    	Excel::create('Machine Reading Data', function($excel) use($machinereadings){
        	$excel->sheet('Sheet 1', function($sheet) use($machinereadings){
        		$sheet->fromModel($machinereadings);
        	});
		})->export('xls');*/
		
		$this->machinereadingsRepository->pushCriteria(new RequestCriteria($request));
    	$machinereadings = $this->machinereadingsRepository->all();
		Excel::create('Machine Reading Data', function($excel) use($machinereadings){
			$excel->sheet('Sheet 1', function($sheet) use($machinereadings){
                $arr =array();
                foreach($machinereadings as $machinereading) {
					    $data =  array($machinereading->id,  $machinereading->restaurants->restaurant_name, $machinereading->machines->machine_name, $machinereading->temperature_reading, $machinereading->reading_date_time,
                            $machinereading->created_at, $machinereading->updated_at, $machinereading->deleted_at);
                        array_push($arr, $data);
                }
                $sheet->fromArray($arr,null,'A1',false,false)->prependRow(
                array(
                 'ID', 'Restaurant Name', 'Machine Name', 'Temperature Reading', 'Reading DateTime', 'Created At', 'Updated At', 'Deleted At')
                );
            });
        })->export('xls');
    }
    
    public function getLogOptionExport(Request $request)
    {
    	$this->logoptionRepository->pushCriteria(new RequestCriteria($request));
    	$logoptions = $this->logoptionRepository->all();

    	Excel::create('Log Option Data', function($excel) use($logoptions){
        	$excel->sheet('Sheet 1', function($sheet) use($logoptions){
        		$sheet->fromModel($logoptions);
        	});
		})->export('xls');
    }

	public function getLogRequestExport(Request $request)
    {
    	$this->logrequestsRepository->pushCriteria(new RequestCriteria($request));
    	$logrequests = $this->logrequestsRepository->all();
		Excel::create('Log Request Data', function($excel) use($logrequests){
			$excel->sheet('Sheet 1', function($sheet) use($logrequests){
                $arr =array();
                foreach($logrequests as $logrequest) {
					    $data =  array($logrequest->id,  $logrequest->fryers->fryer_name, $logrequest->logoptions->option_title, $logrequest->creation_date,
                            $logrequest->status, $logrequest->created_at, $logrequest->updated_at, $logrequest->deleted_at);
                        array_push($arr, $data);
                }
                $sheet->fromArray($arr,null,'A1',false,false)->prependRow(
                array(
                 'ID', 'Fryer Name', 'Log Option', 'Creation DateTime', 'Status', 'Created At', 'Updated At', 'Deleted At')
                );
            });
        })->export('xls');
    }
}
