<?php

namespace App\Repositories;

use App\Models\Corporation;
use InfyOm\Generator\Common\BaseRepository;

class CorporationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'corporation_name' => 'like',
        'corporation_address1' => 'like',
        // 'corporation_address2',
        'corporation_city' => 'like',
        'corporation_state' => 'like',
        'corporation_zipcode' => 'like',
        'corporation_phone' => 'like',
        // 'corporation_phone_ext',
        // 'contact_person_title',
        'contact_person_first_name' => 'like',
        'contact_person_last_name' => 'like',
        'contact_person_email' => 'like',
        'contact_person_phone' => 'like',
        // 'contact_person_phone_ext' => 'like',
        // 'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Corporation::class;
    }
}
