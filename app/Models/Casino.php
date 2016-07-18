<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Casino",
 *      required={casino_trade_name, casino_email, casino_address1, casino_city, casino_state, casino_zipcode, casino_phone, casino_ein, account_payable_name, contact_person_title, contact_person_first_name, contact_person_last_name},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="casino_trade_name",
 *          description="casino_trade_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="casino_email",
 *          description="casino_email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="casino_address1",
 *          description="casino_address1",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="casino_address2",
 *          description="casino_address2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="casino_city",
 *          description="casino_city",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="casino_state",
 *          description="casino_state",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="casino_zipcode",
 *          description="casino_zipcode",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="casino_phone",
 *          description="casino_phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="casino_phone_ext",
 *          description="casino_phone_ext",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="casino_ein",
 *          description="casino_ein",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="account_payable_name",
 *          description="account_payable_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person_title",
 *          description="contact_person_title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person_first_name",
 *          description="contact_person_first_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person_last_name",
 *          description="contact_person_last_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person_email",
 *          description="contact_person_email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person_phone",
 *          description="contact_person_phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contact_person_phone_ext",
 *          description="contact_person_phone_ext",
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
class Casino extends Model
{
    use SoftDeletes;

    public $table = 'casinos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'casino_trade_name',
        'casino_email',
        'casino_address1',
        'casino_address2',
        'casino_city',
        'casino_state',
        'casino_zipcode',
        'casino_phone',
        'casino_phone_ext',
        'casino_ein',
        'account_payable_name',
        'contact_person_title',
        'contact_person_first_name',
        'contact_person_last_name',
        'contact_person_email',
        'contact_person_phone',
        'contact_person_phone_ext',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'casino_trade_name' => 'string',
        'casino_email' => 'string',
        'casino_address1' => 'string',
        'casino_address2' => 'string',
        'casino_city' => 'string',
        'casino_state' => 'string',
        'casino_zipcode' => 'string',
        'casino_phone' => 'string',
        'casino_phone_ext' => 'string',
        'casino_ein' => 'string',
        'account_payable_name' => 'string',
        'contact_person_title' => 'string',
        'contact_person_first_name' => 'string',
        'contact_person_last_name' => 'string',
        'contact_person_email' => 'string',
        'contact_person_phone' => 'string',
        'contact_person_phone_ext' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'casino_trade_name' => 'required',
        'casino_email' => 'required',
        'casino_address1' => 'required',
        'casino_city' => 'required',
        'casino_state' => 'required',
        'casino_zipcode' => 'required',
        'casino_phone' => 'required',
        'casino_ein' => 'required',
        'account_payable_name' => 'required',
        'contact_person_title' => 'required',
        'contact_person_first_name' => 'required',
        'contact_person_last_name' => 'required'
    ];
}
