<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="RestaurantFryerLink",
 *      required={restaurant_id, fryer_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
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
 *          property="fryer_id",
 *          description="fryer_id",
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
class RestaurantFryerLink extends Model
{
    use SoftDeletes;

    public $table = 'restaurant_fryer_links';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'restaurant_id',
        'fryer_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'restaurant_id' => 'integer',
        'fryer_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'restaurant_id' => 'required',
        'fryer_id' => 'required'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function fryer()
    {
        return $this->belongsTo(Fryer::class);
    }
}
