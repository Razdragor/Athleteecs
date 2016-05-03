<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'publications';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'activity_id', 'group_id', 'date_start', 'message'
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

    public function activity()
    {
        return $this->belongsTo('App\Activity');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
