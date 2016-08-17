<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CasinoRestaurantLink extends Model
{
    use SoftDeletes;

    public $table = 'casino_restaurant_links';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'casino_id',
        'restaurant_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'casino_id' => 'integer',
        'restaurant_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'casino_id' => 'required',
        'restaurant_id' => 'required'
    ];

    public function casino()
    {
        return $this->belongsTo(Casino::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
