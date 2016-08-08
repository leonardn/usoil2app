<?php

namespace App\Repositories;

use App\Models\ClientLogin;
use InfyOm\Generator\Common\BaseRepository;

class ClientLoginRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email' => 'like',
        'password' => 'like'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ClientLogin::class;
    }
}
