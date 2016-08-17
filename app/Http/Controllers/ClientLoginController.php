<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClientLoginRequest;
use App\Http\Requests\UpdateClientLoginRequest;
use App\Repositories\ClientLoginRepository;
use App\Repositories\CorporationRepository;
use App\Repositories\CasinoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\ClientLoginCorporationLink;
use App\Models\ClientLoginCasinoLink;

class ClientLoginController extends InfyOmBaseController
{
    /** @var  ClientLoginRepository */
    private $clientLoginRepository;
    private $corporationRepository;
    private $casinoRepository;

    public function __construct(ClientLoginRepository $clientLoginRepo, CorporationRepository $corporationRepo, CasinoRepository $casinoRepo)
    {
        $this->middleware('auth');
        $this->clientLoginRepository = $clientLoginRepo;
        $this->corporationRepository = $corporationRepo;
        $this->casinoRepository = $casinoRepo;
    }

    /**
     * Display a listing of the ClientLogin.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientLoginRepository->pushCriteria(new RequestCriteria($request));
        $clientLogins = $this->clientLoginRepository->paginate(10);

        if($request->ajax())
        {
            return view('clientLogins.table')
                ->with('clientLogins', $clientLogins);
        }
        else
        {
            return view('clientLogins.index')
                ->with('clientLogins', $clientLogins);
        }
    }

    /**
     * Show the form for creating a new ClientLogin.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->corporationRepository->pushCriteria(new RequestCriteria($request));
        $corporations = $this->corporationRepository->with('casinoLinks.casino')->all();

        $this->casinoRepository->pushCriteria(new RequestCriteria($request));
        $casinos = $this->casinoRepository->all();

        // $name = "";
        // foreach ($corporations as $value) {
        //     foreach ($value->casinoLinks as $casino) {
        //         $name .= $casino->casino->casino_trade_name.'<br>';
        //     }
        // }
        // return $name;

        // Assigning index to prevent htmlentities() expects parameter 1 to be string ERROR
        for ($x = 0; $x < count($corporations); $x++) {
            $corporations[$x]['custom_index'] = $x;
            $corporations[$x]['id_exists'] = null;
        }
        for ($i=0; $i < count($casinos); $i++) { 
            $casinos[$i]['custom_index'] = $i;
            $casinos[$i]['id_exists'] = null;
        }

        return view('clientLogins.create')->with('corporations', $corporations)->with('casinos', $casinos);
    }

    /**
     * Store a newly created ClientLogin in storage.
     *
     * @param CreateClientLoginRequest $request
     *
     * @return Response
     */
    public function store(CreateClientLoginRequest $request)
    {
        $input = $request->all();
        //return $input;

        $clientLogin = $this->clientLoginRepository->create($input);

        if($clientLogin->id) {
            for ($x = 0; $x < count($input['corporations']); $x++)
            {
                if(!empty($input['corporations'][$x]))
                {
                    $clientLoginCorporationLink = new ClientLoginCorporationLink;
                    $clientLoginCorporationLink['client_login_id'] = $clientLogin->id;
                    $clientLoginCorporationLink['corporation_id'] = $input['corporations'][$x];
                    $clientLoginCorporationLink->save();
                }
            }
            for ($i = 0; $i < count($input['casinos']); $i++)
            {
                if(!empty($input['casinos'][$i]))
                {
                    $clientLoginCasinoLink = new ClientLoginCasinoLink;
                    $clientLoginCasinoLink['client_login_id'] = $clientLogin->id;
                    $clientLoginCasinoLink['casino_id'] = $input['casinos'][$i];
                    $clientLoginCasinoLink->save();
                }
            }
        }

        Flash::success('ClientLogin saved successfully.');

        return redirect(route('clientLogins.index'));
    }

    /**
     * Display the specified ClientLogin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientLogin = $this->clientLoginRepository->findWithoutFail($id);

        if (empty($clientLogin)) {
            Flash::error('ClientLogin not found');

            return redirect(route('clientLogins.index'));
        }

        return view('clientLogins.show')->with('clientLogin', $clientLogin);
    }

    /**
     * Show the form for editing the specified ClientLogin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $clientLogin = $this->clientLoginRepository->with('corporationLinks')->with('casinoLinks')->findWithoutFail($id);
        //return $clientLogin;

        //CORP LISTS
        $this->corporationRepository->pushCriteria(new RequestCriteria($request));
        $corporations = $this->corporationRepository->all();

        //CASINO LISTS
        $this->casinoRepository->pushCriteria(new RequestCriteria($request));
        $casinos = $this->casinoRepository->all();

        // Assigning index to prevent htmlentities() expects parameter 1 to be string ERROR
        for ($x = 0; $x < count($corporations); $x++) {
            $corporations[$x]['custom_index'] = $x;
            foreach ($clientLogin->corporationLinks as $value) {
                if($corporations[$x]['id'] == $value->corporation_id) {
                    $corporations[$x]['id_exists'] = 1;
                }
            }
        }
        for ($i=0; $i < count($casinos); $i++) { 
            $casinos[$i]['custom_index'] = $i;
            foreach ($clientLogin->casinoLinks as $value) {
                if($casinos[$i]['id'] == $value->casino_id) {
                    $casinos[$i]['id_exists'] = 1;
                }
            }
        }

        if (empty($clientLogin)) {
            Flash::error('ClientLogin not found');

            return redirect(route('clientLogins.index'));
        }

        return view('clientLogins.edit')->with('clientLogin', $clientLogin)->with('corporations', $corporations)->with('casinos', $casinos);
    }

    /**
     * Update the specified ClientLogin in storage.
     *
     * @param  int              $id
     * @param UpdateClientLoginRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientLoginRequest $request)
    {
        $clientLogin = $this->clientLoginRepository->findWithoutFail($id);

        if (empty($clientLogin)) {
            Flash::error('ClientLogin not found');

            return redirect(route('clientLogins.index'));
        }

        $clientLogin = $this->clientLoginRepository->update($request->all(), $id);
        
        if($clientLogin)
        {
            foreach($clientLogin->corporationLinks as $link)
            {
                $clientCorpLink = ClientLoginCorporationLink::find($link->id);
                $clientCorpLink->forceDelete();
            }
            foreach($clientLogin->casinoLinks as $link)
            {
                $clientCasinoLink = ClientLoginCasinoLink::find($link->id);
                $clientCasinoLink->forceDelete();
            }

            for ($x = 0; $x < count($request['corporations']); $x++)
            {
                if(!empty($request['corporations'][$x]))
                {
                    $clientLoginCorporationLink = new ClientLoginCorporationLink;
                    $clientLoginCorporationLink['client_login_id'] = $clientLogin->id;
                    $clientLoginCorporationLink['corporation_id'] = $request['corporations'][$x];
                    $clientLoginCorporationLink->save();
                }
            }
            for ($i = 0; $i < count($request['casinos']); $i++)
            {
                if(!empty($request['casinos'][$i]))
                {
                    $clientLoginCasinoLink = new ClientLoginCasinoLink;
                    $clientLoginCasinoLink['client_login_id'] = $clientLogin->id;
                    $clientLoginCasinoLink['casino_id'] = $request['casinos'][$i];
                    $clientLoginCasinoLink->save();
                }
            }
        }

        Flash::success('ClientLogin updated successfully.');

        return redirect(route('clientLogins.index'));
    }

    /**
     * Remove the specified ClientLogin from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientLogin = $this->clientLoginRepository->with('corporationLinks')->with('casinoLinks')->findWithoutFail($id);

        if (empty($clientLogin)) {
            Flash::error('ClientLogin not found');

            return redirect(route('clientLogins.index'));
        }

        if($this->clientLoginRepository->delete($id))
        {
            foreach($clientLogin->corporationLinks as $link)
            {
                $clientCorpLink = ClientLoginCorporationLink::find($link->id);
                $clientCorpLink->forceDelete();
            }
            foreach($clientLogin->casinoLinks as $link)
            {
                $clientCasinoLink = ClientLoginCasinoLink::find($link->id);
                $clientCasinoLink->forceDelete();
            }
        }

        Flash::success('ClientLogin deleted successfully.');

        return redirect(route('clientLogins.index'));
    }
}
