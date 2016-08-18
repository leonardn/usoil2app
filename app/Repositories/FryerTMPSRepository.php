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
        'measured_tpm' => 'like',
        'oil_temp' => 'like',
        'changed_oil' => 'like',
        'quantity_added' => 'like',
        'oil_moved' => 'like',
        'amount_moved' => 'like',
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
