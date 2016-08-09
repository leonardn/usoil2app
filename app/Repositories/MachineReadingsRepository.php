<?php

namespace App\Repositories;

use App\Models\MachineReadings;
use InfyOm\Generator\Common\BaseRepository;

class MachineReadingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
		'restaurant_id',
        'machine_id',
        'temperature_reading' => 'like',
        'reading_date_time' => 'like',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MachineReadings::class;
    }
}
