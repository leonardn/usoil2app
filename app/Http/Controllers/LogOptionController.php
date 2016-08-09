<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLogOptionRequest;
use App\Http\Requests\UpdateLogOptionRequest;
use App\Repositories\LogOptionRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LogOptionController extends InfyOmBaseController
{
    /** @var  LogOptionRepository */
    private $logoptionRepository;

    public function __construct(LogOptionRepository $logoptionRepo)
    {
        $this->middleware('auth');
        $this->logoptionRepository = $logoptionRepo;
    }

    /**
     * Display a listing of the Log Option.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->logoptionRepository->pushCriteria(new RequestCriteria($request));
        $logoptions = $this->logoptionRepository->paginate(10);
				
		if($request->ajax())
        {
            return view('logoptions.table')->with('logoptions', $logoptions);
        }
        else
        {
            return view('logoptions.index')
            ->with('logoptions', $logoptions);
        }
    }

    /**
     * Show the form for creating a new Log Option.
     *
     * @return Response
     */
    public function create()
    {
        return view('logoptions.create');
    }

    /**
     * Store a newly created Log Option in storage.
     *
     * @param CreateLogOptionRequest $request
     *
     * @return Response
     */
    public function store(CreateLogOptionRequest $request)
    {
        $input = $request->all();

        $logoption = $this->logoptionRepository->create($input);

        Flash::success('Log Option saved successfully.');

        return redirect(route('logoptions.index'));
    }

    /**
     * Display the specified Log Option.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logoption = $this->logoptionRepository->findWithoutFail($id);

        if (empty($logoption)) {
            Flash::error('Log Option not found');

            return redirect(route('logoptions.index'));
        }

        return view('logoptions.show')->with('logoption', $logoption);
    }

    /**
     * Show the form for editing the specified Log Option.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logoption = $this->logoptionRepository->findWithoutFail($id);

        if (empty($logoption)) {
            Flash::error('Log Option not found');

            return redirect(route('logoptions.index'));
        }

        return view('logoptions.edit')->with('logoption', $logoption);
    }

    /**
     * Update the specified Log Option in storage.
     *
     * @param  int              $id
     * @param UpdateLogOptionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogOptionRequest $request)
    {
        $logoption = $this->logoptionRepository->findWithoutFail($id);

        if (empty($logoption)) {
            Flash::error('Log Option not found');

            return redirect(route('logoptions.index'));
        }

        $logoption = $this->logoptionRepository->update($request->all(), $id);

        Flash::success('Log Option updated successfully.');

        return redirect(route('logoptions.index'));
    }

    /**
     * Remove the specified Log Option from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logoption = $this->logoptionRepository->findWithoutFail($id);

        if (empty($logoption)) {
            Flash::error('Log Option not found');

            return redirect(route('logoptions.index'));
        }

        $this->logoptionRepository->delete($id);

        Flash::success('Log Option deleted successfully.');

        return redirect(route('logoptions.index'));
    }
}
