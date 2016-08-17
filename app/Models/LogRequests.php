<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="LogRequests",
 *      required={fryer_id, log_option_id, creation_date},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fryer_id",
 *          description="fryer_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="log_option_id",
 *          description="log_option_id",
 *          type="integer"
 *      ),
 *      @SWG\Property(
 *          property="creation_date",
 *          description="creation_date",
 *          type="dateTime"
 *      ),
 * )
 */
class LogRequests extends Model
{
    use SoftDeletes;

    public $table = 'log_requests';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fryer_id',
        'log_option_id',
        'creation_date',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fryer_id' => 'integer',
        'log_option_id' => 'integer',
        'creation_date' => 'dateTime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fryer_id' => 'required',
        'log_option_id' => 'required',
        'creation_date' => 'required'
    ];
    
    public function fryers()
	{
        return $this->BelongsTo(Fryer::class, 'fryer_id');
    }
	
	public function logoptions()
	{
        return $this->BelongsTo(LogOption::class, 'log_option_id');
    }
}
