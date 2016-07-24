<?php

namespace App\Repositories;

use App\Models\FryerTMPS;
use InfyOm\Generator\Common\BaseRepository;

class FryerTMPSRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fryer_id',
        'measured_tpm',
        'oil_temp',
        'changed_oil',
        'quantity_added',
        'oil_moved',
        'amount_moved',
        'moved_to_fryer_id',
        'creation_date',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FryerTMPS::class;
    }
}
