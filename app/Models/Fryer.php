<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Fryer",
 *      required={fryer_name, make, model, serial_number, oil_capacity, benchmark},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fryer_name",
 *          description="fryer_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="make",
 *          description="make",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="model",
 *          description="model",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="serial_number",
 *          description="serial_number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="oil_capacity",
 *          description="oil_capacity",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="benchmark",
 *          description="benchmark",
 *          type="number",
 *          format="float"
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
class Fryer extends Model
{
    use SoftDeletes;

    public $table = 'fryers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fryer_name',
        'make',
        'model',
        'serial_number',
        'oil_capacity',
        'benchmark',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fryer_name' => 'string',
        'make' => 'string',
        'model' => 'string',
        'serial_number' => 'string',
        'oil_capacity' => 'float',
        'benchmark' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fryer_name' => 'required',
        'make' => 'required',
        'model' => 'required',
        'serial_number' => 'required',
        'oil_capacity' => 'required',
        'benchmark' => 'required'
    ];
}
