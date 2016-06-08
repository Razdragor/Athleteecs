<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conversations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public function conversation_users()
    {
        return $this->hasMany('App\Conversation_user');
    }
    
    public function conversation_messages()
    {
        return $this->hasMany('App\Conversation_message');
    }

}
