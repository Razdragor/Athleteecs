<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'id', 'name', 'picture', 'address', 'city', 'created_at', 'updated_at', 'city_code','lattitude','longitude','number_street','region','country','user_id', 'sport_id', 'facebook','google','twitter'
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
        return $this->belongsTo('App\User','user_id');
    }

    public function sport()
    {
        return $this->belongsTo('App\Sport','sport_id');
    }

    public function event()
    {
        return $this->hasMany('App\Event','event_id');
    }

    public function members()
    {
        return $this->hasMany('App\UsersAssociations', 'association_id');
    }

    public function publications(){
        return $this->hasMany('App\Publication')->where("status","!=","Blocked");
    }

    public function videos(){
        $video = DB::table('publications')
            ->join('videos', 'publications.video_id', '=', 'videos.id')
            ->where('publications.association_id', '=', $this->id)
            ->select('videos.*')
            ->get();

        return $video;
    }
}
