<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersAssociations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_associations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'association_id', 'is_admin', 'created_at', 'updated_at'
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
