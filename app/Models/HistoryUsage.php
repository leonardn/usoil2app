<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="HistoryUsage",
 *      required={corporation_id, casino_id, restaurant_id, usage, month},
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
 *          property="casino_id",
 *          description="casino_id",
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
 *          property="usage",
 *          description="usage",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="month",
 *          description="month",
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
class HistoryUsage extends Model
{
    use SoftDeletes;

    public $table = 'history_usages';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'corporation_id',
        'casino_id',
        'restaurant_id',
        'usage',
        'month',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'corporation_id' => 'integer',
        'casino_id' => 'integer',
        'restaurant_id' => 'integer',
        'usage' => 'float',
        'month' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'corporation_id' => 'required',
        'casino_id' => 'required',
        'restaurant_id' => 'required',
        'usage' => 'required',
        'month' => 'required'
    ];

    public function corporation()
    {
        return $this->belongsTo(Corporation::class);
    }

    public function casino()
    {
        return $this->belongsTo(Casino::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

}
