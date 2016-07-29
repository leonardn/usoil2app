<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TrashBin",
 *      required={restaurant_id, log_option_id, trash_weight, creation_date},
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
 *          property="log_option_id",
 *          description="log_option_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="trash_weight",
 *          description="trash_weight",
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
class TrashBin extends Model
{
    use SoftDeletes;

    public $table = 'trash_bins';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'restaurant_id',
        'log_option_id',
        'trash_weight',
        'creation_date',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'restaurant_id' => 'integer',
        'log_option_id' => 'integer',
        'trash_weight' => 'float',
        'creation_date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'restaurant_id' => 'required',
        'log_option_id' => 'required',
        'trash_weight' => 'required',
        'creation_date' => 'required'
    ];
}
