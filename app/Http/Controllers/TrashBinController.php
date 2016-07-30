<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTrashBinRequest;
use App\Http\Requests\UpdateTrashBinRequest;
use App\Repositories\TrashBinRepository;
use App\Repositories\LogOptionRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TrashBinController extends InfyOmBaseController
{
    /** @var  TrashBinRepository */
    private $trashBinRepository;
    private $logoptionRepository;

    public function __construct(TrashBinRepository $trashBinRepo, LogOptionRepository $logoptionRepo)
    {
        $this->middleware('auth');
        $this->trashBinRepository = $trashBinRepo;
        $this->logoptionRepository = $logoptionRepo;
    }

    /**
     * Display a listing of the TrashBin.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->trashBinRepository->pushCriteria(new RequestCriteria($request));
        $trashBins = $this->trashBinRepository->paginate(10);

        $this->logoptionRepository->pushCriteria(new RequestCriteria($request));
        $logoptions = $this->logoptionRepository->all();

        $options = array('' => 'Select Log Options');
        foreach ($logoptions as $value) {
            $options[$value->id] = $value->option_title;
        }


        if($request->ajax())
        {
            return view('trashBins.table')
                ->with('trashBins', $trashBins);
        }
        else 
        {
            return view('trashBins.index')
                ->with('trashBins', $trashBins)->with('logoptions', $options);
        }
    }

    /**
     * Show the form for creating a new TrashBin.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->logoptionRepository->pushCriteria(new RequestCriteria($request));
        $logoptions = $this->logoptionRepository->all();

        $options = array('' => 'Select Log Options');
        foreach ($logoptions as $value) {
            $options[$value->id] = $value->option_title;
        }

        return view('trashBins.create')->with('logoptions', $options);
    }

    /**
     * Store a newly created TrashBin in storage.
     *
     * @param CreateTrashBinRequest $request
     *
     * @return Response
     */
    public function store(CreateTrashBinRequest $request)
    {
        $input = $request->all();

        $trashBin = $this->trashBinRepository->create($input);

        Flash::success('TrashBin saved successfully.');

        return redirect(route('trashBins.index'));
    }

    /**
     * Display the specified TrashBin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trashBin = $this->trashBinRepository->findWithoutFail($id);

        if (empty($trashBin)) {
            Flash::error('TrashBin not found');

            return redirect(route('trashBins.index'));
        }

        return view('trashBins.show')->with('trashBin', $trashBin);
    }

    /**
     * Show the form for editing the specified TrashBin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $trashBin = $this->trashBinRepository->findWithoutFail($id);

        if (empty($trashBin)) {
            Flash::error('TrashBin not found');

            return redirect(route('trashBins.index'));
        }

        $this->logoptionRepository->pushCriteria(new RequestCriteria($request));
        $logoptions = $this->logoptionRepository->all();

        $options = array('' => 'Select Log Options');
        foreach ($logoptions as $value) {
            $options[$value->id] = $value->option_title;
        }

        return view('trashBins.edit')->with('trashBin', $trashBin)->with('logoptions', $options);
    }

    /**
     * Update the specified TrashBin in storage.
     *
     * @param  int              $id
     * @param UpdateTrashBinRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrashBinRequest $request)
    {
        $trashBin = $this->trashBinRepository->findWithoutFail($id);

        if (empty($trashBin)) {
            Flash::error('TrashBin not found');

            return redirect(route('trashBins.index'));
        }

        $trashBin = $this->trashBinRepository->update($request->all(), $id);

        Flash::success('TrashBin updated successfully.');

        return redirect(route('trashBins.index'));
    }

    /**
     * Remove the specified TrashBin from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trashBin = $this->trashBinRepository->findWithoutFail($id);

        if (empty($trashBin)) {
            Flash::error('TrashBin not found');

            return redirect(route('trashBins.index'));
        }

        $this->trashBinRepository->delete($id);

        Flash::success('TrashBin deleted successfully.');

        return redirect(route('trashBins.index'));
    }
}
