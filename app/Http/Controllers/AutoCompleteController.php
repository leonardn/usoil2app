<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;


class AutoCompleteController extends InfyOmBaseController
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    // CORPORATION
    public function getCorporationAutoComplete(Request $request)
    {
    	$term = $request->input('term');
		$results = array();
    	
    	$queries = DB::table('corporations')
					->where('corporation_name', 'LIKE', '%'.$term.'%')
					->take(6)->get();

        foreach($queries as $item)
        {
        	$results[] = ['value' => $item->corporation_name, 'id' => $item->id];
        }

        return Response::json($results);
    }

    // CASINO
    public function getCasinoAutoComplete(Request $request)
    {
    	$term = $request->input('term');
		$results = array();
    	
    	$queries  = DB::table('casinos')
					->where('casino_trade_name', 'LIKE', '%'.$term.'%')
					->take(6)->get();
					
        foreach($queries as $item)
        {
        	$results[] = ['value' => $item->casino_trade_name, 'id' => $item->id];
        }

        return Response::json($results);
    }
    
    // MACHINE
    public function getMachineAutoComplete(Request $request)
    {
    	$term = $request->input('term');
		$results = array();
    	
    	$queries  = DB::table('machines')
					->where('machine_name', 'LIKE', '%'.$term.'%')
					->take(6)->get();
					
        foreach($queries as $item)
        {
        	$results[] = ['value' => $item->machine_name, 'id' => $item->id];
        }

        return Response::json($results);
    }
    
    // RESTAURANT
    public function getRestaurantAutoComplete(Request $request)
    {
    	$term = $request->input('term');
		$results = array();
    	
    	$queries  = DB::table('restaurants')
					->where('restaurant_name', 'LIKE', '%'.$term.'%')
					->take(6)->get();
					
        foreach($queries as $item)
        {
        	$results[] = ['value' => $item->restaurant_name, 'id' => $item->id];
        }

        return Response::json($results);
    }
}
