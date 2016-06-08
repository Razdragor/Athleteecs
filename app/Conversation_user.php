<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation_user extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conversation_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conversation_id','user_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    
    public function conversations()
    {
        return $this->belongsTo('App\Conversation');
    }
}
