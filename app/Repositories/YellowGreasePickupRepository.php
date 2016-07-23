<?php

namespace App\Repositories;

use App\Models\YellowGreasePickup;
use InfyOm\Generator\Common\BaseRepository;

class YellowGreasePickupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'corporation_id',
        'casino_id',
        'grease',
        'pickup_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return YellowGreasePickup::class;
    }
}
