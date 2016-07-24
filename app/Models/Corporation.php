<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Corporation",
 *      required={corporation_name, corporation_address1, corporation_city, corporation_state, corporation_zipcode, corporation_phone, contact_person_title, contact_person_first_name, contact_person_last_name},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="corporation_name",
 *          description="corporation_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="corporation_address1",
 *          description="corporation_address1",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="corporation_address2",
 *          description="corporation_address2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="corporation_city",
 *          description="corporation_city",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="corporation_state",
 *          description="corporation_state",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="corporation_zipcode",
 *          description="corporation_zipcode",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="corporation_phone",
 *          description="corporation_phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="corporation_phone_ext",
 *          description="corporation_phone_ext",
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
class Corporation extends Model
{
    use SoftDeletes;

    public $table = 'corporations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'corporation_name',
        'corporation_address1',
        'corporation_address2',
        'corporation_city',
        'corporation_state',
        'corporation_zipcode',
        'corporation_phone',
        'corporation_phone_ext',
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
        'corporation_name' => 'string',
        'corporation_address1' => 'string',
        'corporation_address2' => 'string',
        'corporation_city' => 'string',
        'corporation_state' => 'string',
        'corporation_zipcode' => 'string',
        'corporation_phone' => 'string',
        'corporation_phone_ext' => 'string',
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
        'corporation_name' => 'required',
        'corporation_address1' => 'required',
        'corporation_city' => 'required',
        'corporation_state' => 'required',
        'corporation_zipcode' => 'required',
        'corporation_phone' => 'required',
        'contact_person_title' => 'required',
        'contact_person_first_name' => 'required',
        'contact_person_last_name' => 'required'
    ];

    public function casinoLinks() 
    {
        return $this->hasMany(CorporationCasinoLink::class);
    }

    public function forceCasinoLinksDelete(CorporationCasinoLink $casinoLinks)
    {
        return $this->casinoLinks->forceDelete();
    }

    public function yellowGreasePickup()
    {
        return $this->hasOne(YellowGreasePickup::class);   
    }
}
