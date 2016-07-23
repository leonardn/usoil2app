<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFryerRequest;
use App\Http\Requests\UpdateFryerRequest;
use App\Repositories\FryerRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FryerController extends InfyOmBaseController
{
    /** @var  FryerRepository */
    private $fryerRepository;

    public function __construct(FryerRepository $fryerRepo)
    {
        $this->middleware('auth');
        $this->fryerRepository = $fryerRepo;
    }

    /**
     * Display a listing of the Fryer.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fryerRepository->pushCriteria(new RequestCriteria($request));
        $fryers = $this->fryerRepository->paginate(10);

        if($request->ajax())
        {
            return view('fryers.table')
                ->with('fryers', $fryers);
        }
        else
        {
            return view('fryers.index')
                ->with('fryers', $fryers);
        }
    }

    /**
     * Show the form for creating a new Fryer.
     *
     * @return Response
     */
    public function create()
    {
        return view('fryers.create');
    }

    /**
     * Store a newly created Fryer in storage.
     *
     * @param CreateFryerRequest $request
     *
     * @return Response
     */
    public function store(CreateFryerRequest $request)
    {
        $input = $request->all();

        $fryer = $this->fryerRepository->create($input);

        Flash::success('Fryer saved successfully.');

        return redirect(route('fryers.index'));
    }

    /**
     * Display the specified Fryer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fryer = $this->fryerRepository->findWithoutFail($id);

        if (empty($fryer)) {
            Flash::error('Fryer not found');

            return redirect(route('fryers.index'));
        }

        return view('fryers.show')->with('fryer', $fryer);
    }

    /**
     * Show the form for editing the specified Fryer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fryer = $this->fryerRepository->findWithoutFail($id);

        if (empty($fryer)) {
            Flash::error('Fryer not found');

            return redirect(route('fryers.index'));
        }

        return view('fryers.edit')->with('fryer', $fryer);
    }

    /**
     * Update the specified Fryer in storage.
     *
     * @param  int              $id
     * @param UpdateFryerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFryerRequest $request)
    {
        $fryer = $this->fryerRepository->findWithoutFail($id);

        if (empty($fryer)) {
            Flash::error('Fryer not found');

            return redirect(route('fryers.index'));
        }

        $fryer = $this->fryerRepository->update($request->all(), $id);

        Flash::success('Fryer updated successfully.');

        return redirect(route('fryers.index'));
    }

    /**
     * Remove the specified Fryer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fryer = $this->fryerRepository->findWithoutFail($id);

        if (empty($fryer)) {
            Flash::error('Fryer not found');

            return redirect(route('fryers.index'));
        }

        $this->fryerRepository->delete($id);

        Flash::success('Fryer deleted successfully.');

        return redirect(route('fryers.index'));
    }
}
