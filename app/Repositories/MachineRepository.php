<?php

namespace App\Repositories;

use App\Models\Machine;
use InfyOm\Generator\Common\BaseRepository;

class MachineRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
<<<<<<< HEAD
        'machine_name' => 'like',
        'machine_type' => 'like',
=======
        'machine_name',
        'machine_type'
>>>>>>> 1f6119bd87453c2dfaede669f7bf0f3935315463
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Machine::class;
    }
}
