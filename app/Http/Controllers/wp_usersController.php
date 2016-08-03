<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createwp_usersRequest;
use App\Http\Requests\Updatewp_usersRequest;
use App\Repositories\wp_usersRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class wp_usersController extends InfyOmBaseController
{
    /** @var  wp_usersRepository */
    private $wpUsersRepository;

    public function __construct(wp_usersRepository $wpUsersRepo)
    {
        $this->wpUsersRepository = $wpUsersRepo;
    }



    /**
     * Display a listing of the wp_users.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->wpUsersRepository->pushCriteria(new RequestCriteria($request));
        $wpUsers = $this->wpUsersRepository->all();

        return view('wpUsers.index')
            ->with('wpUsers', $wpUsers);
    }

    /**
     * Show the form for creating a new wp_users.
     *
     * @return Response
     */
    public function create()
    {
        return view('wpUsers.create');
    }

    /**
     * Store a newly created wp_users in storage.
     *
     * @param Createwp_usersRequest $request
     *
     * @return Response
     */
    public function store(Createwp_usersRequest $request)
    {
        $input = $request->all();

        $wpUsers = $this->wpUsersRepository->create($input);

        Flash::success('wp_users saved successfully.');

        return redirect(route('wpUsers.index'));
    }

    /**
     * Display the specified wp_users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wpUsers = $this->wpUsersRepository->findWithoutFail($id);

        if (empty($wpUsers)) {
            Flash::error('wp_users not found');

            return redirect(route('wpUsers.index'));
        }

        return view('wpUsers.show')->with('wpUsers', $wpUsers);
    }

    /**
     * Show the form for editing the specified wp_users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wpUsers = $this->wpUsersRepository->findWithoutFail($id);

        if (empty($wpUsers)) {
            Flash::error('wp_users not found');

            return redirect(route('wpUsers.index'));
        }

        return view('wpUsers.edit')->with('wpUsers', $wpUsers);
    }

    /**
     * Update the specified wp_users in storage.
     *
     * @param  int              $id
     * @param Updatewp_usersRequest $request
     *
     * @return Response
     */
    public function update($id, Updatewp_usersRequest $request)
    {
        $wpUsers = $this->wpUsersRepository->findWithoutFail($id);

        if (empty($wpUsers)) {
            Flash::error('wp_users not found');

            return redirect(route('wpUsers.index'));
        }

        $wpUsers = $this->wpUsersRepository->update($request->all(), $id);

        Flash::success('wp_users updated successfully.');

        return redirect(route('wpUsers.index'));
    }

    /**
     * Remove the specified wp_users from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wpUsers = $this->wpUsersRepository->findWithoutFail($id);

        if (empty($wpUsers)) {
            Flash::error('wp_users not found');

            return redirect(route('wpUsers.index'));
        }

        $this->wpUsersRepository->delete($id);

        Flash::success('wp_users deleted successfully.');

        return redirect(route('wpUsers.index'));
    }
}
