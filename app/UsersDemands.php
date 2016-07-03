<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersDemands extends Model
{
    protected $table = 'users_demands';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'userL_id', 'demands', 'created_at', 'updated_at'
    ];

}
