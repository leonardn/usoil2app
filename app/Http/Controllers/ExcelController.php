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
use App\Repositories\FryerRepository;
use App\Repositories\YellowGreasePickupRepository;
use App\Repositories\FryerTMPSRepository;
use App\Repositories\TrashBinRepository;
use App\Repositories\HistoryUsageRepository;
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
    private $fryerRepository;
    private $yellowGreasePickupRepository;
    private $fryerTMPSRepository;
    private $trashBinRepository;
    private $historyUsageRepository;

    public function __construct(CorporationRepository $corporationRepo, CasinoRepository $casinoRepo, RestaurantRepository $restaurantRepo, MachineRepository $machinesRepo, MachineReadingsRepository $machinereadingsRepo, LogOptionRepository $logoptionsRepo, FryerRepository $fryerRepo, YellowGreasePickupRepository $yellowGreasePickupRepo, FryerTMPSRepository $fryerTMPSRepo, TrashBinRepository $trashBinRepo, HistoryUsageRepository $historyUsageRepo)
    {
    	//$this->middleware('auth');
        $this->corporationRepository = $corporationRepo;
        $this->casinoRepository = $casinoRepo;
        $this->restaurantRepository = $restaurantRepo;
        $this->machineRepository = $machinesRepo;
        $this->machinereadingsRepository = $machinereadingsRepo;
        $this->logoptionRepository = $logoptionsRepo;
        $this->logrequestsRepository = $logrequestsRepo;
        $this->fryerRepository = $fryerRepo;
        $this->yellowGreasePickupRepository = $yellowGreasePickupRepo;
        $this->fryerTMPSRepository = $fryerTMPSRepo;
        $this->trashBinRepository = $trashBinRepo;
        $this->historyUsageRepository = $historyUsageRepo;
    }

    public function getCorporationExport(Request $request) 
    {
    	$this->corporationRepository->pushCriteria(new RequestCriteria($request));
        $corporations = $this->corporationRepository->all();

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

    public function getFryerExport(Request $request)
    {
        $this->fryerRepository->pushCriteria(new RequestCriteria($request));
        $fryers = $this->fryerRepository->all();
        
        Excel::create('Fryer Data', function($excel) use($fryers){
            $excel->sheet('Sheet 1', function($sheet) use($fryers){
                $sheet->fromModel($fryers);
            });
        })->export('xls');
    }

    public function getYellowGreasePickupExport(Request $request)
    {
        $this->yellowGreasePickupRepository->pushCriteria(new RequestCriteria($request));
        $yellowGreasePickups = $this->yellowGreasePickupRepository->all();
        Excel::create('Yellow Grease Pickup Data', function($excel) use($yellowGreasePickups){
            $excel->sheet('Sheet 1', function($sheet) use($yellowGreasePickups){
                $arr =array();
                foreach($yellowGreasePickups as $yellowGreasePickup) {
                        $data =  array($yellowGreasePickup->id, $yellowGreasePickup->corporation->corporation_name, $yellowGreasePickup->casino->casino_trade_name, $yellowGreasePickup->grease, $yellowGreasePickup->pickup_date, $yellowGreasePickup->status, $yellowGreasePickup->created_at, $yellowGreasePickup->updated_at);
                        array_push($arr, $data);
                }
                $sheet->fromArray($arr,null,'A1',false,false)->prependRow(
                    array('ID', 'Corporation Name', 'Casino Name', 'Grease', 'Pickup Date', 'Status', 'Created At', 'Updated At')
                );
            });
        })->export('xls');
    }

    public function getFryerTMPS(Request $request)
    {
        $this->fryerTMPSRepository->pushCriteria(new RequestCriteria($request));
        $fryerTMPSs = $this->fryerTMPSRepository->all();
        Excel::create('Fryer TMPS Pickup Data', function($excel) use($fryerTMPSs){
            $excel->sheet('Sheet 1', function($sheet) use($fryerTMPSs){
                $arr =array();
                foreach($fryerTMPSs as $tmps) {
                        $moveToFryer = isset($tmps->moveToFryer->fryer_name) ? $tmps->moveToFryer->fryer_name : '';
                        $data =  array($tmps->id, $tmps->fryer->fryer_name, $tmps->measured_tpm, $tmps->oil_temp, $tmps->changed_oil, $tmps->quantity_added, $tmps->oil_moved, $tmps->amount_moved, $moveToFryer, $tmps->creation_date, $tmps->status, $tmps->created_at, $tmps->updated_at);
                        array_push($arr, $data);
                }
                $sheet->fromArray($arr,null,'A1',false,false)->prependRow(
                    array('ID', 'Fryer Name', 'Measured Tpm', 'Oil Temp', 'Changed Oil', 'Quantity Added', 'Oil Moved', 'Amount Moved', 'Moved To Fryer Name', 'Creation Date', 'Status', 'Created At', 'Updated At')
                );
            });
        })->export('xls');
    }

    public function getTrashBin(Request $request)
    {
        $this->trashBinRepository->pushCriteria(new RequestCriteria($request));
        $trashBins = $this->trashBinRepository->all();
        Excel::create('Trash Bins Data', function($excel) use($trashBins){
            $excel->sheet('Sheet 1', function($sheet) use($trashBins){
                $arr =array();
                foreach($trashBins as $tb) {
                    $data = array($tb->id, $tb->restaurant->restaurant_name, $tb->logoption->option_title, $tb->trash_weight, $tb->creation_date, $tb->status, $tb->created_at, $tb->updated_at);
                        array_push($arr, $data);
                }
                $sheet->fromArray($arr,null,'A1',false,false)->prependRow(
                    array('ID', 'Restaurant Name', 'Log Option', 'Trash Weight', 'Creation Date', 'Status', 'Created At', 'Updated At')
                );
            });
        })->export('xls');
    }

    public function getHistoryUsage(Request $request)
    {
        $this->historyUsageRepository->pushCriteria(new RequestCriteria($request));
        $historyUsages = $this->historyUsageRepository->all();
        Excel::create('History Usage Data', function($excel) use($historyUsages){
            $excel->sheet('Sheet 1', function($sheet) use($historyUsages){
                $arr =array();
                foreach($historyUsages as $hu) {
                    $data = array($hu->id, $hu->corporation->corporation_name, $hu->casino->casino_trade_name, $hu->restaurant->restaurant_name, $hu->usage, $hu->month, $hu->status, $hu->created_at, $hu->updated_at);
                        array_push($arr, $data);
                }
                $sheet->fromArray($arr,null,'A1',false,false)->prependRow(
                    array('ID', 'Corporation Name', 'Casino Name', 'Restaurant Name', 'Usage', 'Month', 'Status', 'Created At', 'Updated At')
                );
            });
        })->export('xls');
    }
    
}
