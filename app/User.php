<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'firstname', 'lastname', 'email', 'password', 'birthday', 'sexe', 'status','token_email','score', 'picture', 'newsletter', 'created_at', 'updated_at', 'activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function sports()
    {
        return $this->belongsToMany('App\Sport', 'users_sports', 'user_id', 'sport_id');
    }

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'users_groups', 'user_id', 'group_id');
    }
}
