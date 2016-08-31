<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'details';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','updated_at','created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function caracteres()
    {
        return $this->hasMany('App\Caracteristique','detail_id');
    }

}
