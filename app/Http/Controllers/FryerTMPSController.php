<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFryerTMPSRequest;
use App\Http\Requests\UpdateFryerTMPSRequest;
use App\Repositories\FryerTMPSRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FryerTMPSController extends InfyOmBaseController
{
    /** @var  FryerTMPSRepository */
    private $fryerTMPSRepository;

    public function __construct(FryerTMPSRepository $fryerTMPSRepo)
    {
        $this->middleware('auth');
        $this->fryerTMPSRepository = $fryerTMPSRepo;
    }

    /**
     * Display a listing of the FryerTMPS.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fryerTMPSRepository->pushCriteria(new RequestCriteria($request));
		$fryerTMPSs = $this->fryerTMPSRepository->paginate(10);

        if($request->ajax())
        {
            return view('fryerTMPSs.table')
                ->with('fryerTMPSs', $fryerTMPSs);
        }
        else
        {
            return view('fryerTMPSs.index')
                ->with('fryerTMPSs', $fryerTMPSs);
        }
    }

    /**
     * Show the form for creating a new FryerTMPS.
     *
     * @return Response
     */
    public function create()
    {
        return view('fryerTMPSs.create');
    }

    /**
     * Store a newly created FryerTMPS in storage.
     *
     * @param CreateFryerTMPSRequest $request
     *
     * @return Response
     */
    public function store(CreateFryerTMPSRequest $request)
    {
        $input = $request->all();

        $fryerTMPS = $this->fryerTMPSRepository->create($input);

        Flash::success('FryerTPMS saved successfully.');

        return redirect(route('fryerTMPSs.index'));
    }

    /**
     * Display the specified FryerTMPS.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fryerTMPS = $this->fryerTMPSRepository->findWithoutFail($id);

        if (empty($fryerTMPS)) {
            Flash::error('FryerTPMS not found');

            return redirect(route('fryerTMPSs.index'));
        }

        return view('fryerTMPSs.show')->with('fryerTMPS', $fryerTMPS);
    }

    /**
     * Show the form for editing the specified FryerTMPS.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fryerTMPS = $this->fryerTMPSRepository->findWithoutFail($id);

        if (empty($fryerTMPS)) {
            Flash::error('FryerTPMS not found');

            return redirect(route('fryerTMPSs.index'));
        }

        return view('fryerTMPSs.edit')->with('fryerTMPS', $fryerTMPS);
    }

    /**
     * Update the specified FryerTMPS in storage.
     *
     * @param  int              $id
     * @param UpdateFryerTMPSRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFryerTMPSRequest $request)
    {
        $fryerTMPS = $this->fryerTMPSRepository->findWithoutFail($id);

        if (empty($fryerTMPS)) {
            Flash::error('FryerTPMS not found');

            return redirect(route('fryerTMPSs.index'));
        }

        $fryerTMPS = $this->fryerTMPSRepository->update($request->all(), $id);

        Flash::success('FryerTPMS updated successfully.');

        return redirect(route('fryerTMPSs.index'));
    }

    /**
     * Remove the specified FryerTMPS from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fryerTMPS = $this->fryerTMPSRepository->findWithoutFail($id);

        if (empty($fryerTMPS)) {
            Flash::error('FryerTPMS not found');

            return redirect(route('fryerTMPSs.index'));
        }

        $this->fryerTMPSRepository->delete($id);

        Flash::success('FryerTPMS deleted successfully.');

        return redirect(route('fryerTMPSs.index'));
    }
}
