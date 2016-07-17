<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersEquipsSports extends Model
{
    protected $table = 'users_equips_sports';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'user_id', 'product_id', 'sport_id'];

    public function sport()
    {
        return $this->belongsTo('App\Sport');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }


}
