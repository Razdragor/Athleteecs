<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersSports extends Model
{
    protected $table = 'users_sports';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'user_id', 'sport_id', 'date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sport()
    {
        return $this->belongsTo('App\Sport');
    }
}
