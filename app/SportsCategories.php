<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportsCategories extends Model
{
    protected $table = 'sports_categories';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'sport_id', 'category_id'];

}
