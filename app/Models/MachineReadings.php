<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="MachineReadings",
 *      required={restaurant_id, machine_id, temperature_reading, reading_date_time},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="restaurant_id",
 *          description="restaurant_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="machine_id",
 *          description="machine_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="temperature_reading",
 *          description="temperature_reading",
 *          type="float"
 *      ),
  *     @SWG\Property(
 *          property="reading_date_time",
 *          description="reading_date_time",
 *          type="dateTime"
 *      ),
 * )
 */
class MachineReadings extends Model
{
    use SoftDeletes;

    public $table = 'machine_readings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'restaurant_id',
        'machine_id',
        'temperature_reading',
        'reading_date_time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'restaurant_id' => 'integer',
        'machine_id' => 'integer',
        'temperature_reading' => 'float',
        'reading_date_time' => 'dateTime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'restaurant_id' => 'required',
        'machine_id' => 'required',
        'temperature_reading' => 'required',
        'reading_date_time' => 'required'
    ];
    
    public function machines() 
    {
        return $this->hasMany(Machine::class);
    }
}
