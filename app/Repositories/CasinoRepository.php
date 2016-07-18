<?php

namespace App\Repositories;

use App\Models\Casino;
use InfyOm\Generator\Common\BaseRepository;

class CasinoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'casino_trade_name',
        'casino_email',
        'casino_address1',
        'casino_address2',
        'casino_city',
        'casino_state',
        'casino_zipcode',
        'casino_phone',
        'casino_phone_ext',
        'casino_ein',
        'account_payable_name',
        'contact_person_title',
        'contact_person_first_name',
        'contact_person_last_name',
        'contact_person_email',
        'contact_person_phone',
        'contact_person_phone_ext',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Casino::class;
    }
}
