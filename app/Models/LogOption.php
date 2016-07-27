<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="LogOption",
 *      required={option_title, option_type},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="option_title",
 *          description="option_title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="option_type",
 *          description="option_type",
 *          type="string"
 *      )
 * )
 */
class LogOption extends Model
{
    use SoftDeletes;

    public $table = 'log_options';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'option_title',
        'option_type',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'option_title' => 'string',
        'option_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'option_title' => 'required',
        'option_type' => 'required'
    ];
}
