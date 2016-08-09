<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ClientLoginCasinoLink",
 *      required={client_login_id, casino_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="client_login_id",
 *          description="client_login_id",
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
class ClientLoginCasinoLink extends Model
{
    use SoftDeletes;

    public $table = 'client_login_casino_links';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'client_login_id',
        'casino_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'client_login_id' => 'integer',
        'casino_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_login_id' => 'required',
        'casino_id' => 'required'
    ];

    public function clientLogin()
    {
        return $this->belongsTo(ClientLogin::class);
    }

    public function casino()
    {
        return $this->belongsTo(Casino::class);
    }
}
