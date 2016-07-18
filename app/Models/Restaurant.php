<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Restaurant",
 *      required={restaurant_name, restaurant_location_code, restaurant_location, contact_person_title, contact_person_first_name, contact_person_last_name, activation_date},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="restaurant_name",
 *          description="restaurant_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="restaurant_location_code",
 *          description="restaurant_location_code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="restaurant_location",
 *          description="restaurant_location",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="restaurant_location_lati",
 *          description="restaurant_location_lati",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="restaurant_location_long",
 *          description="restaurant_location_long",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person_title",
 *          description="contact_person_title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person_first_name",
 *          description="contact_person_first_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person_last_name",
 *          description="contact_person_last_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person_email",
 *          description="contact_person_email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person_phone",
 *          description="contact_person_phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person_phone_ext",
 *          description="contact_person_phone_ext",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Restaurant extends Model
{
    use SoftDeletes;

    public $table = 'restaurants';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'restaurant_name',
        'restaurant_location_code',
        'restaurant_location',
        'restaurant_location_lati',
        'restaurant_location_long',
        'contact_person_title',
        'contact_person_first_name',
        'contact_person_last_name',
        'contact_person_email',
        'contact_person_phone',
        'contact_person_phone_ext',
        'activation_date',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'restaurant_name' => 'string',
        'restaurant_location_code' => 'string',
        'restaurant_location' => 'string',
        'restaurant_location_lati' => 'string',
        'restaurant_location_long' => 'string',
        'contact_person_title' => 'string',
        'contact_person_first_name' => 'string',
        'contact_person_last_name' => 'string',
        'contact_person_email' => 'string',
        'contact_person_phone' => 'string',
        'contact_person_phone_ext' => 'string',
        'activation_date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'restaurant_name' => 'required',
        'restaurant_location_code' => 'required',
        'restaurant_location' => 'required',
        'contact_person_title' => 'required',
        'contact_person_first_name' => 'required',
        'contact_person_last_name' => 'required',
        'activation_date' => 'required'
    ];
}
