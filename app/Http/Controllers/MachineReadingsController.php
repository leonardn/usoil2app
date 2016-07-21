<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMachineReadingsRequest;
use App\Http\Requests\UpdateMachineReadingsRequest;
use App\Repositories\MachineReadingsRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MachineReadingsController extends InfyOmBaseController
{
    /** @var  MachineReadingsRepository */
    private $machinereadingsRepository;

    public function __construct(MachineReadingsRepository $machinereadingsRepo)
    {
        $this->middleware('auth');
        $this->machinereadingsRepository = $machinereadingsRepo;
    }

    /**
     * Display a listing of the MachineReadings.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->machinereadingsRepository->pushCriteria(new RequestCriteria($request));
        $machinereadings = $this->machinereadingsRepository->paginate(10);
				
		if($request->ajax())
        {
            return view('machinereadings.table')->with('machinereadings', $machinereadings);
        }
        else
        {
            return view('machinereadings.index')
            ->with('machinereadings', $machinereadings);
        }
    }

    /**
     * Show the form for creating a new MachineReadings.
     *
     * @return Response
     */
    public function create()
    {
        return view('machinereadings.create');
    }

    /**
     * Store a newly created MachineReadings in storage.
     *
     * @param CreateMachineReadingRequest $request
     *
     * @return Response
     */
    public function store(CreateMachineReadingsRequest $request)
    {
        $input = $request->all();

        $machinereadings = $this->machinereadingsRepository->create($input);

        Flash::success('Machine Reading saved successfully.');

        return redirect(route('machinereadings.index'));
    }

    /**
     * Display the specified Machine Readings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $machinereadings = $this->machinereadingsRepository->findWithoutFail($id);

        if (empty($machinereadings)) {
            Flash::error('Machine Reading not found');

            return redirect(route('machinereadings.index'));
        }

        return view('machinereadings.show')->with('machinereadings', $machinereadings);
    }

    /**
     * Show the form for editing the specified Machine Readings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $machinereadings = $this->machinereadingsRepository->findWithoutFail($id);

        if (empty($machinereadings)) {
            Flash::error('Machine Reading not found');

            return redirect(route('machinereadings.index'));
        }

        return view('machinereadings.edit')->with('machinereadings', $machinereadings);
    }

    /**
     * Update the specified Machine Reading in storage.
     *
     * @param  int              $id
     * @param UpdateMachineRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMachineReadingsRequest $request)
    {
        $machinereadings = $this->machinereadingsRepository->findWithoutFail($id);

        if (empty($machinereadings)) {
            Flash::error('Machine Reading not found');

            return redirect(route('machinereadings.index'));
        }

        $machinereadings = $this->machinereadingsRepository->update($request->all(), $id);

        Flash::success('Machine Reading updated successfully.');

        return redirect(route('machinereadings.index'));
    }

    /**
     * Remove the specified Machine Reading from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $machinereadings = $this->machinereadingsRepository->findWithoutFail($id);

        if (empty($machinereadings)) {
            Flash::error('Machine Reading not found');

            return redirect(route('machinereadings.index'));
        }

        $this->machinereadingsRepository->delete($id);

        Flash::success('Machine Reading deleted successfully.');

        return redirect(route('machinereadings.index'));
    }
}
