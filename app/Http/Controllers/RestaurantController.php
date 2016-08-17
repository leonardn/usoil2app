<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Repositories\RestaurantRepository;
use App\Repositories\FryerRepository;
use App\Repositories\MachineRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\RestaurantFryerLink;
use App\Models\RestaurantMachineLink;

class RestaurantController extends InfyOmBaseController
{
    /** @var  RestaurantRepository */
    private $restaurantRepository;
    private $fryerRepository;
    private $machineRepository;

    public function __construct(RestaurantRepository $restaurantRepo, FryerRepository $fryerRepo, MachineRepository $machineRepo)
    {
        $this->middleware('auth');
        $this->restaurantRepository = $restaurantRepo;
        $this->fryerRepository = $fryerRepo;
        $this->machineRepository = $machineRepo;
    }

    /**
     * Display a listing of the Restaurant.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->restaurantRepository->pushCriteria(new RequestCriteria($request));
        $restaurants = $this->restaurantRepository->paginate(10);

        if($request->ajax())
        {
            return view('restaurants.table')
                ->with('restaurants', $restaurants);
        }
        else 
        {
            return view('restaurants.index')
                ->with('restaurants', $restaurants);
        }
    }

    /**
     * Show the form for creating a new Restaurant.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->fryerRepository->pushCriteria(new RequestCriteria($request));
        $fryers = $this->fryerRepository->all();

        $this->machineRepository->pushCriteria(new RequestCriteria($request));
        $machines = $this->machineRepository->all();

        // Assigning index to prevent htmlentities() expects parameter 1 to be string ERROR
        for ($x = 0; $x < count($fryers); $x++) {
            $fryers[$x]['custom_index'] = $x;
        }
        for ($x = 0; $x < count($machines); $x++) {
            $machines[$x]['custom_index'] = $x;
        }

        return view('restaurants.create')->with('fryers', $fryers)->with('machines', $machines);
    }

    /**
     * Store a newly created Restaurant in storage.
     *
     * @param CreateRestaurantRequest $request
     *
     * @return Response
     */
    public function store(CreateRestaurantRequest $request)
    {
        $input = $request->all();
        //return $input;

        $restaurant = $this->restaurantRepository->create($input);

        if($restaurant) {
            for ($x = 0; $x < count($input['fryer']); $x++)
            {
                if(!empty($input['fryer'][$x]))
                {
                    $resFryerLink = new RestaurantFryerLink;
                    $resFryerLink['restaurant_id'] = $restaurant->id;
                    $resFryerLink['fryer_id'] = $input['fryer'][$x];
                    $resFryerLink->save();
                }
            }
            for ($x = 0; $x < count($input['machine']); $x++)
            {
                if(!empty($input['machine'][$x]))
                {
                    $resMachineLink = new RestaurantMachineLink;
                    $resMachineLink['restaurant_id'] = $restaurant->id;
                    $resMachineLink['machine_id'] = $input['machine'][$x];
                    $resMachineLink->save();
                }
            }
        }

        Flash::success('Restaurant saved successfully.');

        return redirect(route('restaurants.index'));
    }

    /**
     * Display the specified Restaurant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $restaurant = $this->restaurantRepository->findWithoutFail($id);

        if (empty($restaurant)) {
            Flash::error('Restaurant not found');

            return redirect(route('restaurants.index'));
        }

        return view('restaurants.show')->with('restaurant', $restaurant);
    }

    /**
     * Show the form for editing the specified Restaurant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $restaurant = $this->restaurantRepository->with('fryerLinks')->with('machineLinks')->findWithoutFail($id);

        $this->fryerRepository->pushCriteria(new RequestCriteria($request));
        $fryers = $this->fryerRepository->all();

        $this->machineRepository->pushCriteria(new RequestCriteria($request));
        $machines = $this->machineRepository->all();

        // Assigning index to prevent htmlentities() expects parameter 1 to be string ERROR
        for ($x = 0; $x < count($fryers); $x++) {
            $fryers[$x]['custom_index'] = $x;
            foreach ($restaurant->fryerLinks as $resFreyerLink) {
                if($fryers[$x]['id'] == $resFreyerLink->fryer_id) {
                    $fryers[$x]['id_exists'] = 1;
                }
            }
        }
        for ($x = 0; $x < count($machines); $x++) {
            $machines[$x]['custom_index'] = $x;
            foreach ($restaurant->machineLinks as $resMachineLink) {
                if($machines[$x]['id'] == $resMachineLink->machine_id) {
                    $machines[$x]['id_exists'] = 1;
                }
            }
        }

        if (empty($restaurant)) {
            Flash::error('Restaurant not found');

            return redirect(route('restaurants.index'));
        }

        return view('restaurants.edit')->with('restaurant', $restaurant)->with('fryers', $fryers)->with('machines', $machines);
    }

    /**
     * Update the specified Restaurant in storage.
     *
     * @param  int              $id
     * @param UpdateRestaurantRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRestaurantRequest $request)
    {
        $restaurant = $this->restaurantRepository->with('fryerLinks')->with('machineLinks')->findWithoutFail($id);

        if($restaurant) {
            foreach($restaurant->fryerLinks as $link)
            {
                $RestaurantLink = RestaurantFryerLink::find($link->id);
                $RestaurantLink->forceDelete();
            }
            foreach($restaurant->machineLinks as $link)
            {
                $RestaurantLink = RestaurantMachineLink::find($link->id);
                $RestaurantLink->forceDelete();
            }

            for ($x = 0; $x < count($request['fryer']); $x++)
            {
                if(!empty($request['fryer'][$x]))
                {
                    $resFryerLink = new RestaurantFryerLink;
                    $resFryerLink['restaurant_id'] = $restaurant->id;
                    $resFryerLink['fryer_id'] = $request['fryer'][$x];
                    $resFryerLink->save();
                }
            }
            for ($x = 0; $x < count($request['machine']); $x++)
            {
                if(!empty($request['machine'][$x]))
                {
                    $resMachineLink = new RestaurantMachineLink;
                    $resMachineLink['restaurant_id'] = $restaurant->id;
                    $resMachineLink['machine_id'] = $request['machine'][$x];
                    $resMachineLink->save();
                }
            }
        }

        if (empty($restaurant)) {
            Flash::error('Restaurant not found');

            return redirect(route('restaurants.index'));
        }

        $restaurant = $this->restaurantRepository->update($request->all(), $id);

        Flash::success('Restaurant updated successfully.');

        return redirect(route('restaurants.index'));
    }

    /**
     * Remove the specified Restaurant from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $restaurant = $this->restaurantRepository->findWithoutFail($id);

        if (empty($restaurant)) {
            Flash::error('Restaurant not found');

            return redirect(route('restaurants.index'));
        }

        $this->restaurantRepository->delete($id);

        Flash::success('Restaurant deleted successfully.');

        return redirect(route('restaurants.index'));
    }
}
