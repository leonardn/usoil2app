<?php

namespace App\Repositories;

use App\Models\LogRequests;
use InfyOm\Generator\Common\BaseRepository;

class LogRequestsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
		'fryer_id',
        'log_option_id',
        'creation_date' => 'like',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LogRequests::class;
    }
}
