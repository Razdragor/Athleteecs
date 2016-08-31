<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rates';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','product_id','rate_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }

}
