<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCasinoRequest;
use App\Http\Requests\UpdateCasinoRequest;
use App\Repositories\CasinoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Repositories\RestaurantRepository;
use App\Models\CasinoRestaurantLink;
class CasinoController extends InfyOmBaseController
{
    /** @var  CasinoRepository */
    private $casinoRepository;
    private $restaurantRepository;

    public function __construct(CasinoRepository $casinoRepo, RestaurantRepository $restaurantRepo)
    {
        $this->middleware('auth');
        $this->casinoRepository = $casinoRepo;
        $this->restaurantRepository = $restaurantRepo;
    }

    /**
     * Display a listing of the Casino.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->casinoRepository->pushCriteria(new RequestCriteria($request));
        $casinos = $this->casinoRepository->paginate(10);

        if($request->ajax())
        {
            return view('casinos.table')->with('casinos', $casinos);
        }
        else
        {
            return view('casinos.index')
                ->with('casinos', $casinos);
        }
    }

    /**
     * Show the form for creating a new Casino.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->restaurantRepository->pushCriteria(new RequestCriteria($request));
        $restaurants = $this->restaurantRepository->all();

        // Assigning index to prevent htmlentities() expects parameter 1 to be string ERROR
        for ($x = 0; $x < count($restaurants); $x++) {
            $restaurants[$x]['custom_index'] = $x;
        }
        
        return view('casinos.create')->with('restaurants', $restaurants);
    }

    /**
     * Store a newly created Casino in storage.
     *
     * @param CreateCasinoRequest $request
     *
     * @return Response
     */
    public function store(CreateCasinoRequest $request)
    {
        $input = $request->all();

        $casino = $this->casinoRepository->create($input);

        if($casino->id) {
            for ($x = 0; $x < count($input['restaurant']); $x++)
            {
                if(!empty($input['restaurant'][$x]))
                {
                    $casinoRestaurantLink = new CasinoRestaurantLink;
                    $casinoRestaurantLink['casino_id'] = $casino->id;
                    $casinoRestaurantLink['restaurant_id'] = $input['restaurant'][$x];
                    $casinoRestaurantLink->save();
                }
            }
        }

        Flash::success('Casino saved successfully.');

        return redirect(route('casinos.index'));
    }

    /**
     * Display the specified Casino.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $casino = $this->casinoRepository->findWithoutFail($id);

        if (empty($casino)) {
            Flash::error('Casino not found');

            return redirect(route('casinos.index'));
        }

        return view('casinos.show')->with('casino', $casino);
    }

    /**
     * Show the form for editing the specified Casino.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $casino = $this->casinoRepository->findWithoutFail($id);

        $this->restaurantRepository->pushCriteria(new RequestCriteria($request));
        $restaurants = $this->restaurantRepository->all();

        // Assigning index to prevent htmlentities() expects parameter 1 to be string ERROR
        for ($x = 0; $x < count($restaurants); $x++) {
            $restaurants[$x]['custom_index'] = $x;
        }
        // Assigning id_exists For checke checked boxes
        for ($x = 0; $x < count($restaurants); $x++) {
            foreach ($casino->restaurantLinks as $casinoRestaurantLink) {
                if($restaurants[$x]['id'] == $casinoRestaurantLink->restaurant_id) {
                    $restaurants[$x]['id_exists'] = 1;
                }
            }
        }

        if (empty($casino)) {
            Flash::error('Casino not found');

            return redirect(route('casinos.index'));
        }

        return view('casinos.edit')->with('casino', $casino)->with('restaurants', $restaurants);
    }

    /**
     * Update the specified Casino in storage.
     *
     * @param  int              $id
     * @param UpdateCasinoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCasinoRequest $request)
    {
        $casino = $this->casinoRepository->findWithoutFail($id);

        if (empty($casino)) {
            Flash::error('Casino not found');

            return redirect(route('casinos.index'));
        }

        $casino = $this->casinoRepository->update($request->all(), $id);

        if($casino) {
            foreach($casino->restaurantLinks as $link)
            {
                $casinoRestaurantLink = CasinoRestaurantLink::find($link->id);
                $casinoRestaurantLink->forceDelete();
            }
            for ($x = 0; $x < count($request['restaurant']); $x++)
            {
                if(!empty($request['restaurant'][$x]))
                {
                    $casinoRestaurantLink = new CasinoRestaurantLink;
                    $casinoRestaurantLink['casino_id'] = $casino->id;
                    $casinoRestaurantLink['restaurant_id'] = $request['restaurant'][$x];
                    $casinoRestaurantLink->save();
                }
            }
        }

        Flash::success('Casino updated successfully.');

        return redirect(route('casinos.index'));
    }

    /**
     * Remove the specified Casino from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $casino = $this->casinoRepository->with('restaurantLinks')->findWithoutFail($id);

        if (empty($casino)) {
            Flash::error('Casino not found');

            return redirect(route('casinos.index'));
        }

        if($this->casinoRepository->delete($id)) {
            foreach($casino->restaurantLinks as $link)
            {
                $casinoRestaurantLink = CasinoRestaurantLink::find($link->id);
                $casinoRestaurantLink->forceDelete();
            }
        }

        Flash::success('Casino deleted successfully.');

        return redirect(route('casinos.index'));
    }
}
