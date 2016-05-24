<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'associations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'picture', 'address', 'city', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
