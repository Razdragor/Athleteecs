<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesDetails extends Model
{
    protected $table = 'categories_details';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'category_id', 'detail_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function detail()
    {
        return $this->belongsTo('App\Detail');
    }
}
