<?php

namespace App\Repositories;

use App\Models\TrashBin;
use InfyOm\Generator\Common\BaseRepository;

class TrashBinRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'restaurant_id',
        'log_option_id',
        'trash_weight',
        'creation_date' => 'like'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TrashBin::class;
    }
}
