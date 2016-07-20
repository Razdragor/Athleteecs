<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersEvents extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_events';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','user_id', 'event_id', 'is_admin', 'created_at', 'updated_at'
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

    public function event(){
        return $this->belongsTo('App\Event','event_id', 'id');
    }
}
