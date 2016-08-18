<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCorporationRequest;
use App\Http\Requests\UpdateCorporationRequest;
use App\Repositories\CorporationRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Repositories\CasinoRepository;
use App\Repositories\RestaurantRepository;
use App\Models\CorporationCasinoLink;
use App\Models\CorporationRestaurantLink;
class CorporationController extends InfyOmBaseController
{
    /** @var  CorporationRepository */
    private $corporationRepository;
    private $casinoRepository;
    private $restaurantRepository;

    public function __construct(CorporationRepository $corporationRepo, CasinoRepository $casinoRepo, RestaurantRepository $restaurantRepo)
    {
        $this->middleware('auth');
        $this->corporationRepository = $corporationRepo;
        $this->casinoRepository = $casinoRepo;
        $this->restaurantRepository = $restaurantRepo;
    }

    /**
     * Display a listing of the Corporation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
		$this->corporationRepository->pushCriteria(new RequestCriteria($request));
       	$corporations = $this->corporationRepository->paginate(10);
		
        if($request->ajax())
        {
            return view('corporations.table')->with('corporations', $corporations);
        }
        else
        {
            return view('corporations.index')
            ->with('corporations', $corporations);
        }
    }

    /**
     * Show the form for creating a new Corporation.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->casinoRepository->pushCriteria(new RequestCriteria($request));
        $casinos = $this->casinoRepository->with('restaurantLinks')->all();

        $this->restaurantRepository->pushCriteria(new RequestCriteria($request));
        $restaurants = $this->restaurantRepository->all();

        // Assigning index to prevent htmlentities() expects parameter 1 to be string ERROR
        for ($x = 0; $x < count($casinos); $x++) {
            $casinos[$x]['custom_index'] = $x;
        }
        for ($i = 0; $i < count($restaurants); $i++) {
            $restaurants[$i]['custom_index'] = $i;
        }

        return view('corporations.create')
            ->with('casinos', $casinos)
            ->with('restaurants', $restaurants);
    }

    /**
     * Store a newly created Corporation in storage.
     *
     * @param CreateCorporationRequest $request
     *
     * @return Response
     */
    public function store(CreateCorporationRequest $request)
    {
        $input = $request->all();

        $corporation = $this->corporationRepository->create($input);

        if($corporation->id){
            for ($x = 0; $x < count($input['casino']); $x++)
            {
                if(!empty($input['casino'][$x]))
                {
                    $corpCasinoLink = new CorporationCasinoLink;
                    $corpCasinoLink['corporation_id'] = $corporation->id;
                    $corpCasinoLink['casino_id'] = $input['casino'][$x];
                    $corpCasinoLink->save();
                }
            }
            for ($x = 0; $x < count($input['restaurant']); $x++)
            {
                if(!empty($input['restaurant'][$x]))
                {
                    $corpCasinoLink = new CorporationRestaurantLink;
                    $corpCasinoLink['corporation_id'] = $corporation->id;
                    $corpCasinoLink['restaurant_id'] = $input['restaurant'][$x];
                    $corpCasinoLink->save();
                }
            }
        }

        Flash::success('Corporation saved successfully.');

        return redirect(route('corporations.index'));
    }

    /**
     * Display the specified Corporation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $corporation = $this->corporationRepository->findWithoutFail($id);

        if (empty($corporation)) {
            Flash::error('Corporation not found');

            return redirect(route('corporations.index'));
        }

        return view('corporations.show')->with('corporation', $corporation);
    }

    /**
     * Show the form for editing the specified Corporation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $corporation = $this->corporationRepository->with('casinoLinks')->with('restaurantLinks')->findWithoutFail($id);

        $this->casinoRepository->pushCriteria(new RequestCriteria($request));
        $casinos = $this->casinoRepository->with('restaurantLinks')->all(); //Casino::with('restaurantLinks')->get();
        // foreach($casinos as $casino){
        //     //echo var_dump($casino);
        //     foreach($casino->restaurantLinks as $links) {
        //         echo $links->restaurant->restaurant_name;
        //     }
        // }
        // exit();
        // return $casinos;
        $this->restaurantRepository->pushCriteria(new RequestCriteria($request));
        $restaurants = $this->restaurantRepository->all();
        
        // Assigning index to prevent htmlentities() expects parameter 1 to be string ERROR
        for ($x = 0; $x < count($casinos); $x++) {
            $casinos[$x]['custom_index'] = $x;
            foreach ($corporation->casinoLinks as $corpCasinoLink) {
                if($casinos[$x]['id'] == $corpCasinoLink->casino_id) {
                    $casinos[$x]['id_exists'] = 1;
                }
            }
        }
        for ($x = 0; $x < count($restaurants); $x++) {
            $restaurants[$x]['custom_index'] = $x;
            foreach ($corporation->restaurantLinks as $restaurantLinks) {
                if($restaurants[$x]['id'] == $restaurantLinks->restaurant_id) {
                    $restaurants[$x]['id_exists'] = 1;
                }
            }
        }

        if (empty($corporation)) {
            Flash::error('Corporation not found');

            return redirect(route('corporations.index'));
        }

        return view('corporations.edit')->with('corporation', $corporation)->with('casinos', $casinos)->with('restaurants', $restaurants);
    }

    /**
     * Update the specified Corporation in storage.
     *
     * @param  int              $id
     * @param UpdateCorporationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCorporationRequest $request)
    {
        $corporation = $this->corporationRepository->with('casinoLinks')->with('restaurantLinks')->findWithoutFail($id);

        if (empty($corporation)) {
            Flash::error('Corporation not found');

            return redirect(route('corporations.index'));
        }

        $corporation = $this->corporationRepository->update($request->all(), $id);
        //return $request['casino'];
        // DeleteAll Link
        if($corporation){
            foreach($corporation->casinoLinks as $link)
            {
                $corpLink = CorporationCasinoLink::find($link->id);
                $corpLink->forceDelete();
            }
            foreach($corporation->restaurantLinks as $link)
            {
                $resLink = CorporationRestaurantLink::find($link->id);
                $resLink->forceDelete();
            }
            for ($x = 0; $x <= count($request['casino']); $x++)
            {
                if(!empty($request['casino'][$x]))
                {
                    $corpCasinoLink = new CorporationCasinoLink;
                    $corpCasinoLink['corporation_id'] = $corporation->id;
                    $corpCasinoLink['casino_id'] = $request['casino'][$x];
                    $corpCasinoLink->save();
                }
            }
            for ($x = 0; $x < count($request['restaurant']); $x++)
            {
                if(!empty($request['restaurant'][$x]))
                {
                    $corpCasinoLink = new CorporationRestaurantLink;
                    $corpCasinoLink['corporation_id'] = $corporation->id;
                    $corpCasinoLink['restaurant_id'] = $request['restaurant'][$x];
                    $corpCasinoLink->save();
                }
            }
        }

        Flash::success('Corporation updated successfully.');

        return redirect(route('corporations.index'));
    }

    /**
     * Remove the specified Corporation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $corporation = $this->corporationRepository->with('casinoLinks')->with('restaurantLinks')->findWithoutFail($id);

        if (empty($corporation)) {
            Flash::error('Corporation not found');

            return redirect(route('corporations.index'));
        }

        if($this->corporationRepository->delete($id)) {
            foreach($corporation->casinoLinks as $link)
            {
                $corpLink = CorporationCasinoLink::find($link->id);
                $corpLink->forceDelete();
            }
            foreach($corporation->restaurantLinks as $link)
            {
                $resLink = CorporationRestaurantLink::find($link->id);
                $resLink->forceDelete();
            }
        }

        Flash::success('Corporation deleted successfully.');

        return redirect(route('corporations.index'));
    }

    // public function getCorporation(Request $request) {
    //     $corporations = $this->corporationRepository->has('Corp');

    //     return $corporations;
    //     if($request->ajax()) {
    //         $corporations = $this->corporationRepository->all();

    //         return view('corporations.table')->with('corporations', $corporations);
    //     }
    //     return "Err";
    // }
}
