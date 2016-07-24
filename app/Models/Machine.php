<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Machine",
 *      required={machine_name, machine_type},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="machine_name",
 *          description="machine_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="machine_type",
 *          description="machine_type",
 *          type="string"
 *      )
 * )
 */
class Machine extends Model
{
    use SoftDeletes;

    public $table = 'machines';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'machine_name',
        'machine_type',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'machine_name' => 'string',
        'machine_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'machine_name' => 'required',
        'machine_type' => 'required'
    ];
}
