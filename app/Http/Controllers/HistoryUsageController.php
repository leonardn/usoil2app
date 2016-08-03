<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateHistoryUsageRequest;
use App\Http\Requests\UpdateHistoryUsageRequest;
use App\Repositories\HistoryUsageRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HistoryUsageController extends InfyOmBaseController
{
    /** @var  HistoryUsageRepository */
    private $historyUsageRepository;

    public function __construct(HistoryUsageRepository $historyUsageRepo)
    {
        $this->middleware('auth');
        $this->historyUsageRepository = $historyUsageRepo;
    }

    /**
     * Display a listing of the HistoryUsage.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->historyUsageRepository->pushCriteria(new RequestCriteria($request));
        $historyUsages = $this->historyUsageRepository->paginate(10);

        if($request->ajax())
        {
            return view('historyUsages.table')
                ->with('historyUsages', $historyUsages);
        }
        else
        {
            return view('historyUsages.index')
                ->with('historyUsages', $historyUsages);
        }
    }

    /**
     * Show the form for creating a new HistoryUsage.
     *
     * @return Response
     */
    public function create()
    {
        return view('historyUsages.create');
    }

    /**
     * Store a newly created HistoryUsage in storage.
     *
     * @param CreateHistoryUsageRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoryUsageRequest $request)
    {
        $input = $request->all();

        $historyUsage = $this->historyUsageRepository->create($input);

        Flash::success('HistoryUsage saved successfully.');

        return redirect(route('historyUsages.index'));
    }

    /**
     * Display the specified HistoryUsage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $historyUsage = $this->historyUsageRepository->findWithoutFail($id);

        if (empty($historyUsage)) {
            Flash::error('HistoryUsage not found');

            return redirect(route('historyUsages.index'));
        }

        return view('historyUsages.show')->with('historyUsage', $historyUsage);
    }

    /**
     * Show the form for editing the specified HistoryUsage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $historyUsage = $this->historyUsageRepository->findWithoutFail($id);

        if (empty($historyUsage)) {
            Flash::error('HistoryUsage not found');

            return redirect(route('historyUsages.index'));
        }

        return view('historyUsages.edit')->with('historyUsage', $historyUsage);
    }

    /**
     * Update the specified HistoryUsage in storage.
     *
     * @param  int              $id
     * @param UpdateHistoryUsageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoryUsageRequest $request)
    {
        $historyUsage = $this->historyUsageRepository->findWithoutFail($id);

        if (empty($historyUsage)) {
            Flash::error('HistoryUsage not found');

            return redirect(route('historyUsages.index'));
        }

        $historyUsage = $this->historyUsageRepository->update($request->all(), $id);

        Flash::success('HistoryUsage updated successfully.');

        return redirect(route('historyUsages.index'));
    }

    /**
     * Remove the specified HistoryUsage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $historyUsage = $this->historyUsageRepository->findWithoutFail($id);

        if (empty($historyUsage)) {
            Flash::error('HistoryUsage not found');

            return redirect(route('historyUsages.index'));
        }

        $this->historyUsageRepository->delete($id);

        Flash::success('HistoryUsage deleted successfully.');

        return redirect(route('historyUsages.index'));
    }
}
