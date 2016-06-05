<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ean','name', 'title', 'description', 'brand_id', 'picture', 'price', 'url', 'buy', 'created_at', 'updated_at', 'brand_id', 'category_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function user()
    {
        return $this->belongsTo('App\Brand');
    }

    public function sport()
    {
        return $this->belongsTo('App\Sport');
    }
}
