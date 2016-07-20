<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersNewsletters extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_newsletters';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','email', 'active','created_at','updated_at'
    ];

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

}
