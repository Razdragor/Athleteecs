<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersDemandsStars extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_demands_stars';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','user_id', 'response', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id', 'id');
    }
}
