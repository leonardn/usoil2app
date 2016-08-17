<?php

namespace App\Repositories;

use App\Models\Restaurant;
use InfyOm\Generator\Common\BaseRepository;

class RestaurantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'restaurant_name' => 'like',
        'restaurant_location_code' => 'like',
        'restaurant_location' => 'like',
        // 'restaurant_location_lati',
        // 'restaurant_location_long',
        // 'contact_person_title',
        'contact_person_first_name' => 'like',
        'contact_person_last_name' => 'like',
        'contact_person_email' => 'like',
        'contact_person_phone' => 'like',
        // 'contact_person_phone_ext',
        'activation_date',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Restaurant::class;
    }
}
