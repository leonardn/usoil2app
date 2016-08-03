<?php

namespace App\Repositories;

use App\Models\wp_users;
use InfyOm\Generator\Common\BaseRepository;

class wp_usersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'wp_user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return wp_users::class;
    }
}
