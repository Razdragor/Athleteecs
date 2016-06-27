<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersLinks extends Model
{
    protected $table = 'users_links';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'userL_id', 'created_at', 'updated_at'
    ];
}
