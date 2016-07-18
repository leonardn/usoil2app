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
        'corporation_name',
        'corporation_address1',
        'corporation_address2',
        'corporation_city',
        'corporation_state',
        'corporation_zipcode',
        'corporation_phone',
        'corporation_phone_ext',
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
        return Corporation::class;
    }
}
