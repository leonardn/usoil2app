<?php

namespace App\Repositories;

use App\Models\HistoryUsage;
use InfyOm\Generator\Common\BaseRepository;

class HistoryUsageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'corporation_id',
        'casino_id',
        'restaurant_id',
        'usage',
        'month'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return HistoryUsage::class;
    }
}
