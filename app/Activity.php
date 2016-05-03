<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activities';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'sport_id', 'date_start', 'date_end', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sport()
    {
        return $this->belongsTo('App\Sport');
    }
}
