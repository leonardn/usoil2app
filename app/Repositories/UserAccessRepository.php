<?php

namespace App\Repositories;

use App\Models\UserAccess;
use InfyOm\Generator\Common\BaseRepository;

class UserAccessRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserAccess::class;

    }
}
