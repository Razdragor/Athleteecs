<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'equipments';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'product_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
