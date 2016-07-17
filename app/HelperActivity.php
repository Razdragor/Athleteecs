<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 07/07/2016
 * Time: 19:51
 */

namespace App;


use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;

class HelperActivity
{
    /**
     * @param $data
     * @return $this
     */
    public static function store(Request $request, $array = array()){
        $data = $request->all();
        $user = Auth::user();
        $validator =  Validator::make($data, [
            'date_start_act' => 'required',
            'sport_act' => 'required',
            'time_h_act' => 'numeric|min:0',
            'time_m_act' => 'numeric|min:0|max:59',
            'time_s_act' => 'numeric|min:0|max:59'
        ]);

        if ($validator->fails()) {
            return array(
                'errors' => $validator
            );
        }

        $data['time_h_act'] = intval($data['time_h_act']);
        $data['time_m_act'] = intval($data['time_m_act']);
        $data['time_s_act'] = intval($data['time_s_act']);
        $time = ($data['time_h_act']*3600) + ($data['time_m_act'] * 60) + $data['time_s_act'];
        $datedate = \DateTime::createFromFormat('d/m/Y G:i',$data['date_start_act']);
        $dateStart = date("Y-m-d H:i:s", $datedate->getTimestamp());

        $act = array(
            'sport_id' => $data['sport_act'],
            'user_id' => $user->id,
            'date_start' => $dateStart,
            'time' => $time,
            'status' => 'Success'
        );

        if(array_key_exists('message', $array)){
            $act['message'] = $array['message'];
        }

        if(array_key_exists('picture', $array)){
            $act['picture'] = $array['picture'];
        }

        return $act;
    }


    public static function update(Request $request, Activity $activity){

        $data = $request->all();
        $data['time_h_act_modal'] = intval($data['time_h_act_modal']);
        $data['time_m_act_modal'] = intval($data['time_m_act_modal']);
        $data['time_s_act_modal'] = intval($data['time_s_act_modal']);
        $user = Auth::user();
        $validator = Validator::make($data, [
            'message_act_modal' => 'required|max:255',
            'picture_act_modal' => 'mimes:jpeg,png,jpg',
            'date_start_act_modal' => 'required',
            'sport_act_modal' => 'required',
            'time_h_act_modal' => 'numeric|min:0',
            'time_m_act_modal' => 'numeric|min:0|max:59',
            'time_s_act_modal' => 'numeric|min:0|max:59'
        ]);

        if ($validator->fails()) {
            return array(
                'errors' => $validator
            );
        }

        $publication = $activity->publication;
        $message = $data['message_act_modal'];
        $urls = HelperYoutube::UrlsYoutube($message);
        $videoID = false;
        foreach($urls as $url){
            if($videoID == false) {
                $videoID = HelperYoutube::KeyYoutube($url);
                if(is_string($videoID)){
                    $message = str_replace($url,"",$message);
                }
            }
        }
        if(is_string($videoID)){
            if(is_null($publication->video)) {
                $video = Video::create(array(
                    'url' => $videoID,
                    'youtube' => true
                ));
                $publication->video_id = $video->id;
            }
            else{
                $video = $publication->video;
                $video->url = $videoID;
                $video->save();
            }
        }
        else{
            $publication->video_id = null;
        }
        $publication->message = $message;
        $publication->save();

        $imageName = null;
        if ($request->hasFile('picture_act_modal') && !is_string($videoID) ) {
            $imageName = $user->id . '_' . date('YmdHis') . '_post.' . $request->file('picture_act_modal')->getClientOriginalExtension();;

            $request->file('picture_act_modal')->move(
                public_path() . '/images/publications', $imageName
            );
            $imageName = '/images/publications/' . $imageName;
            $activity->picture = $imageName;
            Picture::create(array(
                'user_id' => $user->id,
                'link' => $imageName
            ));
        }

        $time = ($data['time_h_act_modal'] * 3600) + ($data['time_m_act_modal'] * 60) + $data['time_s_act_modal'];
        $dateExplode = explode(" ",$data['date_start_act_modal']);
        $dataExplode2 = explode("/", $dateExplode[0]);
        $date = $dataExplode2[2]."-".$dataExplode2[1]."-".$dataExplode2[0]." ".$dateExplode[1].":00";

        $activity->sport_id = intval($data['sport_act_modal']);
        $activity->user_id = $user->id;
        $activity->date_start = $date;

        $activity->time = $time;
        $activity->description = $message;

        return array(
            'success' => true,
            'activity' => $activity,
            'dateAct' => $activity->getDateStartString(),
            'timeAct' => $activity->time,
            'timeSec' => $activity->getTimeSecondes(),
            'sport' => $activity->sport,
            'video' => $videoID
        );
    }

    public static function destroy(Activity $activity){
        try {
            if(!is_null($activity->publication->comments)) {
                foreach($activity->publication->comments as $comment){
                    $comment->delete();
                }
            }
            if(!is_null($activity->publication)) {
                $activity->publication->delete();
            }
            $activity->delete();
        }catch(\Exception $e){
            return false;
        }

        return true;
    }

    public static function signale(Activity $activity){
        $activity->publication->score += 1;
        if($activity->publication->score > 10){
            $activity->publication->status = "Signaled";
        }
        $activity->publication->save();
    }
}