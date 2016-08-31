<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','ean','name','active', 'description','picture', 'price', 'url', 'created_at', 'updated_at', 'brand_id', 'category_id','sport_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
//
    public function users()
    {
        return $this->belongsToMany('App\User', 'users_equips_sports', 'user_id', 'product_id');
//        return $this->hasMany('App\User','user_id');
    }
//    public function user()
//    {
//        return $this->belongsTo('App\User', 'users_equips_sports', 'user_id', 'product_id');
//    }
//



    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function sport()
    {
        return $this->belongsTo('App\Sport', 'sport_id');
    }

    public function caracteristiques()
    {
        return $this->hasMany('App\Caracteristique','product_id');
    }
    public function details()
    {
        return $this->hasMany('App\Detail', 'App\Caracteristique');
    }
    public function rates()
    {
        return $this->hasMany('App\Rate', 'product_id');
    }

    public function ratesvalue()
    {
        return $this->hasMany('App\Rate', 'product_id')->avg('value');
    }

    public function ratescount()
    {
        return $this->rates->count();
    }


}
