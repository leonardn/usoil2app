<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="YellowGreasePickup",
 *      required={corporation_id, casino_id, grease, pickup_date},
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
 *          property="grease",
 *          description="grease",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="pickup_date",
 *          description="pickup_date",
 *          type="string",
 *          format="date"
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
class YellowGreasePickup extends Model
{
    use SoftDeletes;

    public $table = 'yellow_grease_pickups';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'corporation_id',
        'casino_id',
        'grease',
        'pickup_date',
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
        'grease' => 'float',
        'pickup_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'corporation_id' => 'required',
        'casino_id' => 'required',
        'grease' => 'required',
        'pickup_date' => 'required'
    ];

    public function corporation() 
    {
        return $this->belongsTo(Corporation::class);
    }

    public function casino()
    {
        return $this->belongsTo(Casino::class);
    }
}
