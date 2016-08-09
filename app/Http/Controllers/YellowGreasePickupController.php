<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateYellowGreasePickupRequest;
use App\Http\Requests\UpdateYellowGreasePickupRequest;
use App\Repositories\YellowGreasePickupRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class YellowGreasePickupController extends InfyOmBaseController
{
    /** @var  YellowGreasePickupRepository */
    private $yellowGreasePickupRepository;

    public function __construct(YellowGreasePickupRepository $yellowGreasePickupRepo)
    {
        $this->middleware('auth');
        $this->yellowGreasePickupRepository = $yellowGreasePickupRepo;
    }

    /**
     * Display a listing of the YellowGreasePickup.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->yellowGreasePickupRepository->pushCriteria(new RequestCriteria($request));
        $yellowGreasePickups = $this->yellowGreasePickupRepository->paginate(10);

        if($request->ajax())
        {
           return view('yellowGreasePickups.table')
            ->with('yellowGreasePickups', $yellowGreasePickups);
        }
        else
        {
            return view('yellowGreasePickups.index')
                ->with('yellowGreasePickups', $yellowGreasePickups);
        }
    }

    /**
     * Show the form for creating a new YellowGreasePickup.
     *
     * @return Response
     */
    public function create()
    {
        return view('yellowGreasePickups.create');
    }

    /**
     * Store a newly created YellowGreasePickup in storage.
     *
     * @param CreateYellowGreasePickupRequest $request
     *
     * @return Response
     */
    public function store(CreateYellowGreasePickupRequest $request)
    {
        $input = $request->all();

        $yellowGreasePickup = $this->yellowGreasePickupRepository->create($input);

        Flash::success('YellowGreasePickup saved successfully.');

        return redirect(route('yellowGreasePickups.index'));
    }

    /**
     * Display the specified YellowGreasePickup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $yellowGreasePickup = $this->yellowGreasePickupRepository->findWithoutFail($id);

        if (empty($yellowGreasePickup)) {
            Flash::error('YellowGreasePickup not found');

            return redirect(route('yellowGreasePickups.index'));
        }

        return view('yellowGreasePickups.show')->with('yellowGreasePickup', $yellowGreasePickup);
    }

    /**
     * Show the form for editing the specified YellowGreasePickup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $yellowGreasePickup = $this->yellowGreasePickupRepository->findWithoutFail($id);

        if (empty($yellowGreasePickup)) {
            Flash::error('YellowGreasePickup not found');

            return redirect(route('yellowGreasePickups.index'));
        }
        // $strDate = date('d/m/Y', strtotime($yellowGreasePickup['pickup_date']));
        // $yellowGreasePickup['pickup_date_edit'] = $strDate;
        //return $yellowGreasePickup['pickup_date_edit'];
        //return $yellowGreasePickup->corporation;

        return view('yellowGreasePickups.edit')->with('yellowGreasePickup', $yellowGreasePickup);
    }

    /**
     * Update the specified YellowGreasePickup in storage.
     *
     * @param  int              $id
     * @param UpdateYellowGreasePickupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateYellowGreasePickupRequest $request)
    {
        $yellowGreasePickup = $this->yellowGreasePickupRepository->findWithoutFail($id);

        if (empty($yellowGreasePickup)) {
            Flash::error('YellowGreasePickup not found');

            return redirect(route('yellowGreasePickups.index'));
        }

        $yellowGreasePickup = $this->yellowGreasePickupRepository->update($request->all(), $id);

        Flash::success('YellowGreasePickup updated successfully.');

        return redirect(route('yellowGreasePickups.index'));
    }

    /**
     * Remove the specified YellowGreasePickup from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $yellowGreasePickup = $this->yellowGreasePickupRepository->findWithoutFail($id);

        if (empty($yellowGreasePickup)) {
            Flash::error('YellowGreasePickup not found');

            return redirect(route('yellowGreasePickups.index'));
        }

        $this->yellowGreasePickupRepository->delete($id);

        Flash::success('YellowGreasePickup deleted successfully.');

        return redirect(route('yellowGreasePickups.index'));
    }
}
