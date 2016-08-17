<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CorporationRestaurantLink",
 *      required={corporation_id, restaurant_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="corporation_id",
 *          description="corporation_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="restaurant_id",
 *          description="restaurant_id",
 *          type="integer",
 *          format="int32"
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
class CorporationRestaurantLink extends Model
{
    use SoftDeletes;

    public $table = 'corporation_restaurant_links';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'corporation_id',
        'restaurant_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'corporation_id' => 'integer',
        'restaurant_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'corporation_id' => 'required',
        'restaurant_id' => 'required'
    ];
}
