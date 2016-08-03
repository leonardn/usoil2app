<?php

namespace App\Http\Controllers;

use DB;

use App\Http\Requests;
use App\Http\Requests\CreateUserAccessRequest;
use App\Http\Requests\UpdateUserAccessRequest;
use App\Repositories\UserAccessRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserAccessController extends InfyOmBaseController
{
    /** @var  UserAccessRepository */
    private $userAccessRepository;

    public function __construct(UserAccessRepository $userAccessRepo)
    {
        $this->userAccessRepository = $userAccessRepo;
    }

    function getWPUsers()
    {
        $db_ext = \DB::connection('mysql_wp');
        $userinfo = array();

        $wpusers = DB::table('wp_users')->select('user_id','wp_user_id')->get();
        foreach ($wpusers as $wpuser) {

            $qry_users = $db_ext->table('wp_users')
                                ->leftJoin('wp_usermeta as umeta1', 'wp_users.ID', '=', 'umeta1.user_id')
                                ->join('wp_usermeta as umeta2', 'umeta1.user_id', '=', 'umeta2.user_id')
                                ->select('ID', 'user_login', 'user_email', 'umeta1.meta_value as last_name', 'umeta2.meta_value as first_name')
                                ->where('ID', '=', $wpuser->wp_user_id)
                                ->where('umeta1.user_id', '=', $wpuser->wp_user_id)
                                ->where('umeta1.meta_key', '=', 'last_name')
                                ->where('umeta2.user_id', '=', $wpuser->wp_user_id)
                                ->where('umeta2.meta_key', '=', 'first_name')
                                ->get();

            foreach ($qry_users as $user) {
                $userinfos[] = array('user_id' => $wpuser->user_id,
                                    'wp_user_id' => $user->ID,
                                    'user_name' => $user->user_login,
                                    'user_email' => $user->user_email,
                                    'last_name' => $user->last_name,
                                    'first_name' => $user->first_name,);
                }
        }
        return $userinfos;

    }

    function getWPUser($id)
        {
            $db_ext = \DB::connection('mysql_wp');
            $userinfo = array();

            $appuser = DB::table('wp_users')->select('user_id')
                                            ->where('wp_user_id', '=', $id)
                                            ->get();

            $qry_users = $db_ext->table('wp_users')
                                ->leftJoin('wp_usermeta as umeta1', 'wp_users.ID', '=', 'umeta1.user_id')
                                ->join('wp_usermeta as umeta2', 'umeta1.user_id', '=', 'umeta2.user_id')
                                ->select('ID', 'user_login', 'user_email', 'umeta1.meta_value as last_name', 'umeta2.meta_value as first_name')
                                ->where('ID', '=', $id)
                                ->where('umeta1.user_id', '=', $id)
                                ->where('umeta1.meta_key', '=', 'last_name')
                                ->where('umeta2.user_id', '=', $id)
                                ->where('umeta2.meta_key', '=', 'first_name')
                                ->get();

            foreach ($qry_users as $user) {
                $userinfos[] = array('user_id' => $appuser[0]->user_id,
                                    'wp_user_id' => $user->ID,
                                    'user_name' => $user->user_login,
                                    'user_email' => $user->user_email,
                                    'last_name' => $user->last_name,
                                    'first_name' => $user->first_name,);
                }
            return $userinfos;

    }

    /**
     * Display a listing of the UserAccess.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        
        $this->userAccessRepository->pushCriteria(new RequestCriteria($request));
        $userAccesses = $this->userAccessRepository->all();

        $userinfos = self::getWPUsers();

        return view('userAccesses.index')
            ->with('userAccesses', $userAccesses)
            ->with('wpusers', $userinfos);
    }

    /**
     * Show the form for creating a new UserAccess.
     *
     * @return Response
     */
    public function create($user_id)
    {

        $restaurants = DB::table('restaurants')->select('id', 'restaurant_name')->get();
        $casinos = DB::table('casinos')->select('id', 'casino_trade_name')->get();
        $corps = DB::table('corporations')->select('id', 'corporation_name')->get();

        $module_access = array('fryers' => 'Fryers', 
                                'trash_bins' => 'Trash Bins',
                                'tpms' => 'TPMs',
                                'machines' => 'Machines',
                                'history_usage' => 'History Usage');

        $mobile_menu_access = array('log_tpms' => 'Log TPMs', 
                                'log_temp' => 'Log Temperature',
                                'reports' => 'Reports',
                                'yellow_grease_pickup' => 'Yellow Grease Pickup',
                                'track_pickup' => 'Track Pickup');
        
        $userinfos = self::getWPUser($user_id);

        return view('userAccesses.create')
            ->with('restaurant_list', $restaurants)
            ->with('casino_list', $casinos)
            ->with('corps_list', $corps)
            ->with('module_access', $module_access)
            ->with('mobile_menu_access', $mobile_menu_access)
            ->with('userinfos', $userinfos);
    }

    /**
     * Store a newly created UserAccess in storage.
     *
     * @param CreateUserAccessRequest $request
     *
     * @return Response
     */
    public function store(CreateUserAccessRequest $request)
    {
        $input = $request->all();

        $userAccess = $this->userAccessRepository->create($input);

        Flash::success('User Access saved successfully.');

        return redirect(route('userAccesses.index'));
    }

    /**
     * Display the specified UserAccess.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userAccess = $this->userAccessRepository->findWithoutFail($id);

        if (empty($userAccess)) {
            Flash::error('UserAccess not found');

            return redirect(route('userAccesses.index'));
        }

        return view('userAccesses.show')->with('userAccess', $userAccess);
    }

    /**
     * Show the form for editing the specified UserAccess.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userAccess = $this->userAccessRepository->findWithoutFail($id);

        if (empty($userAccess)) {
            Flash::error('UserAccess not found');

            return redirect(route('userAccesses.index'));
        }

        return view('userAccesses.edit')->with('userAccess', $userAccess);
    }

    /**
     * Update the specified UserAccess in storage.
     *
     * @param  int              $id
     * @param UpdateUserAccessRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserAccessRequest $request)
    {
        $userAccess = $this->userAccessRepository->findWithoutFail($id);

        if (empty($userAccess)) {
            Flash::error('UserAccess not found');

            return redirect(route('userAccesses.index'));
        }

        $userAccess = $this->userAccessRepository->update($request->all(), $id);

        Flash::success('UserAccess updated successfully.');

        return redirect(route('userAccesses.index'));
    }

    /**
     * Remove the specified UserAccess from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userAccess = $this->userAccessRepository->findWithoutFail($id);

        if (empty($userAccess)) {
            Flash::error('UserAccess not found');

            return redirect(route('userAccesses.index'));
        }

        $this->userAccessRepository->delete($id);

        Flash::success('UserAccess deleted successfully.');

        return redirect(route('userAccesses.index'));
    }
}


