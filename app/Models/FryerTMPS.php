<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="FryerTMPS",
 *      required={fryer_id, measured_tpm, oil_temp, quantity_added, creation_date},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
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
 *          property="measured_tpm",
 *          description="measured_tpm",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="oil_temp",
 *          description="oil_temp",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="quantity_added",
 *          description="quantity_added",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="amount_moved",
 *          description="amount_moved",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="moved_to_fryer_id",
 *          description="moved_to_fryer_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="creation_date",
 *          description="creation_date",
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
class FryerTMPS extends Model
{
    use SoftDeletes;

    public $table = 'fryer_t_m_p_ss';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fryer_id',
        'measured_tpm',
        'oil_temp',
        'changed_oil',
        'quantity_added',
        'oil_moved',
        'amount_moved',
        'moved_to_fryer_id',
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
        'measured_tpm' => 'float',
        'oil_temp' => 'float',
        'quantity_added' => 'integer',
        'amount_moved' => 'float',
        'moved_to_fryer_id' => 'integer',
        'creation_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fryer_id' => 'required',
        'measured_tpm' => 'required',
        'oil_temp' => 'required',
        'quantity_added' => 'required',
        'creation_date' => 'required'
    ];
}
