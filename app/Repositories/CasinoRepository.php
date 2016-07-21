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
        'casino_trade_name' => 'like',
        // 'casino_email',
        'casino_address1' => 'like',
        // 'casino_address2',
        'casino_city' => 'like',
        'casino_state' => 'like',
        'casino_zipcode' => 'like',
        // 'casino_phone',
        // 'casino_phone_ext',
        'casino_ein' => 'like',
        // 'account_payable_name',
        // 'contact_person_title',
        'contact_person_first_name' => 'like',
        // 'contact_person_last_name',
        'contact_person_email' => 'like',
        // 'contact_person_phone',
        // 'contact_person_phone_ext',
        // 'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Casino::class;
    }
}
