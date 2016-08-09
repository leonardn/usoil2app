<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLogRequestsRequest;
use App\Http\Requests\UpdateLogRequestsRequest;
use App\Repositories\LogRequestsRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use App\LogRequests;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LogRequestsController extends InfyOmBaseController
{
    /** @var  LogRequestsRepository */
    private $logrequestsRepository;

    public function __construct(LogRequestsRepository $logrequestsRepo)
    {
        $this->middleware('auth');
        $this->logrequestsRepository = $logrequestsRepo;
    }

    /**
     * Display a listing of the LogRequests.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->logrequestsRepository->pushCriteria(new RequestCriteria($request));
        $logrequests = $this->logrequestsRepository->paginate(10);
		
		if($request->ajax())
        {
            return view('logrequests.table')->with('logrequests', $logrequests);
        }
        else
        {
            return view('logrequests.index')
            ->with('logrequests', $logrequests);
        }
    }

    /**
     * Show the form for creating a new LogRequests.
     *
     * @return Response
     */
    public function create()
    {
        return view('logrequests.create');
    }

    /**
     * Store a newly created LogRequests in storage.
     *
     * @param CreateLogRequestsRequest $request
     *
     * @return Response
     */
    public function store(CreateLogRequestsRequest $request)
    {
        $input = $request->all();

        $logrequests = $this->logrequestsRepository->create($input);

        Flash::success('Log Request saved successfully.');

        return redirect(route('logrequests.index'));
    }

    /**
     * Display the specified LogRequests.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logrequests = $this->logrequestsRepository->findWithoutFail($id);

        if (empty($logrequests)) {
            Flash::error('Log Request not found');

            return redirect(route('logrequests.index'));
        }

        return view('logrequests.show')->with('logrequests', $logrequests);
    }

    /**
     * Show the form for editing the specified LogRequests.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
		
        $logrequests2 = $this->logrequestsRepository->findWithoutFail($id);

        if (empty($logrequests2)) {
            Flash::error('Log Request not found');

            return redirect(route('logrequests.index'));
        }

        return view('logrequests.edit')->with('logrequests2', $logrequests2);
    }

    /**
     * Update the specified LogRequest in storage.
     *
     * @param  int              $id
     * @param UpdateLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogRequestsRequest $request)
    {
        $logrequests = $this->logrequestsRepository->findWithoutFail($id);

        if (empty($logrequests)) {
            Flash::error('Log Request not found');

            return redirect(route('logrequests.index'));
        }

        $logrequests = $this->logrequestsRepository->update($request->all(), $id);

        Flash::success('Log Request updated successfully.');

        return redirect(route('logrequests.index'));
    }

    /**
     * Remove the specified LogRequest from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logrequests = $this->logrequestsRepository->findWithoutFail($id);

        if (empty($logrequests)) {
            Flash::error('Log Request not found');

            return redirect(route('logrequests.index'));
        }

        $this->logrequestsRepository->delete($id);

        Flash::success('Log Request deleted successfully.');

        return redirect(route('logrequests.index'));
    }
}
