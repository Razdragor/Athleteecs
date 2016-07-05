<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation_message extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conversation_messages';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conversation_id','message','user_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public function conversation()
    {
        return $this->belongsTo('App\Conversation');
    }
}
