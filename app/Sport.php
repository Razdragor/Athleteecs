<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sports';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name',"icon","created_at","updated_at"];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /*public function users()
    {
        return $this->belongsToMany('App\User', 'users_sports', 'user_id', 'sport_id');
    }*/

    public function userSport(){
        return $this->hasMany('App\UsersSports', 'sport_id');
    }
}
