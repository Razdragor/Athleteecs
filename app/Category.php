<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function sports()
    {
        return $this->belongsToMany('App\Sport', 'sports_categories', 'sport_id', 'category_id');
    }
    public function details()
    {
        return $this->belongsToMany('App\Detail', 'categories_details', 'category_id', 'detail_id');
    }

}
