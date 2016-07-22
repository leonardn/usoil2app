<?php

namespace App\Repositories;

use App\Models\Fryer;
use InfyOm\Generator\Common\BaseRepository;

class FryerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fryer_name' => 'like',
        'make' => 'like',
        'model' => 'like',
        'serial_number' => 'like',
        'oil_capacity' => 'like',
        'benchmark' => 'like',
        // 'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Fryer::class;
    }
}
