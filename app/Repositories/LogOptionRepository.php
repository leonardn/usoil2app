<?php

namespace App\Repositories;

use App\Models\LogOption;
use InfyOm\Generator\Common\BaseRepository;

class LogOptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'option_title' => 'like',
        'option_type' => 'like',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LogOption::class;
    }
}
