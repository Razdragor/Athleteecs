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
        'id','user_id', 'sport_id', 'date_start', 'time', 'description','score','status','picture','created_at', 'updated_at'
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

    public function getDateStartString(){
        setlocale (LC_ALL, 'fr_FR.utf8','fra');
        $date = date_create($this->attributes['date_start'])->format('d/m/Y à H:i:s');
        return $date;
    }

    public function getTimeSecondes(){
        return $this->attributes['time'];
    }

    public function getTimeAttribute(){
        $exp = $this->attributes['time'];
        $time = array();
        $temp = $exp % 3600;
        $time[0] = ( $exp - $temp ) / 3600 ;
        $time[2] = $temp % 60 ;
        $time[1] = ( $temp - $time[2] ) / 60;

        $string = "";

        if($time[0] > 0){
            $string .= $time[0]."h ";
        }
        if($time[1] > 0){
            $string .= $time[1]."min ";
        }
        if($time[2] > 0){
            $string .= $time[2]."sec";
        }
        return $string;
    }

    public function setDateStartAttribute($value){
        $this->attributes['date_start'] = $value;
    }
}
