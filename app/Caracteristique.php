<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristique extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'caracteristiques';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','detail_id','product_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function detail()
    {
        return $this->belongsTo('App\Detail','detail_id');
    }
}
