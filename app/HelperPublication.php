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

class HelperPublication
{
    /**
     * @param $data
     * @return $this
     */
    public static function store(Request $request){
        $data = $request->all();
        $user = Auth::user();
        $validator = Validator::make($data, [
            'message_status' => 'required',
            'picture_status' => 'mimes:jpeg,png,jpg'
        ]);;

        if ($validator->fails()) {
            return array(
                'errors' => $validator
            );
        }

        $message = htmlspecialchars($data['message_status']);
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

        $Nvideo = null;
        if(is_string($videoID)){
            $video = Video::create(array(
                'url' => $videoID,
                'youtube' => true
            ));
            $Nvideo = $video->id;
        }

        $imageName = null;
        if ($request->hasFile('picture_status') && !is_string($videoID)) {
            $imageName = $user->id . '_' . date('YmdHis'). '_post.' . $request->file('picture_status')->getClientOriginalExtension();;

            $request->file('picture_status')->move(
                public_path().'/images/publications', $imageName
            );
            $imageName = '/images/publications/'.$imageName;

            Picture::create(array(
                'user_id' => $user->id,
                'link' => $imageName
            ));
        }

        return array(
            'message' => $message,
            'user_id' => $user->id,
            'picture' => $imageName,
            'video_id' => $Nvideo,
            'status' => 'Success'
        );
    }


    public static function update(Request $request, Publication $publication){
        $data = $request->all();
        $validator = Validator::make($data, [
            'message_status_modal' => 'required',
            'picture_status_modal' => 'mimes:jpeg,png,jpg'
        ]);;

        if ($validator->fails()) {
            return array(
                'errors' => $validator
            );
        }
        $videoID = false;
        $message = htmlspecialchars($data['message_status_modal']);
        $urls = HelperYoutube::UrlsYoutube($message);

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

        if ($request->hasFile('picture_status_modal') && is_null($publication->video)) {
            $imageName = $publication->user->id . '_' . date('YmdHis'). '_post.' . $request->file('picture_status_modal')->getClientOriginalExtension();

            $request->file('picture_status_modal')->move(
                public_path().'/images/publications', $imageName
            );
            $imageName = '/images/publications/'.$imageName;
            $publication->picture = $imageName;
            Picture::create(array(
                'user_id' => $publication->user->id,
                'link' => $imageName
            ));
        }
        return array(
            'publication' => $publication,
            'video' => $videoID
        );
    }

    public static function destroy(Publication $publication){

        try {
            if (!is_null($publication->activity)) {
                $publication->activity->delete();
            }
            if (!is_null($publication->comments)) {
                foreach ($publication->comments as $comment) {
                    $comment->delete();
                }
            }
            $publication->delete();
        }catch(\Exception $e){
            return false;
        }

        return true;
    }

    public function loadComments(Publication $publication, Request $request){

        $data = $request->all();
        $comments = [];
        $page = intval($data['page']);
        $skip =  $page * 3;
        $result = $publication->comments()->orderBy('created_at', 'asc')->skip($skip)->take(3)->get();
        if($publication->comments->count() > ($skip+3)){
            $page++;
        }
        else{
            $page = false;
        }
        foreach($result as $p) {
            $comments[] = $this->constructComment($p, $p->user);
        }

        return array(
            'success' => true,
            'page' => $page,
            'comments' => $comments
        );
    }

    public function loadAll(Request $request){

        $data = $request->all();
        $page = intval($data['page']);
        $skip =  $page * 10;
        $posts = $this->publicationAll();
        $count = $posts->count();
        $result = $this->publicationAll($skip,10);
        if($count > ($skip+3)){
            $page++;
        }
        else{
            $page = false;
        }
        $publications = array();
        $class = $data['css'];
        foreach($result as $p){
            $publications[] = $this->constructPublication($p, $class);
            if($class == 'timeline-inverted'){
                $class = "";
            }
            else{
                $class = "timeline-inverted";
            }
        }
        return array(
            'success' => true,
            'page' => $page,
            'publications' => $publications
        );
    }

    private function constructPublication($publication, $class){

        $id = "publication-".$publication->id;
        if(!is_null($publication->activity)){
            $id = "activite-".$publication->activity->id;

        }
        $edit = "editpost(".$publication->id.")";
        if(!is_null($publication->activity)){
            $edit = "editact(".$publication->activity->id.")";
        }
        $string =   "<li id=".$id." class='". $class ." publicationJS'><div class='timeline-badge primary'>" .
            "<a href='#'><i rel='tooltip' title=". $publication->date_start . "class='glyphicon glyphicon-record invert'></i></a></div>".
            "<div class='timeline-panel'>".
            "<div class='timeline-heading row' style='margin: 0;'>".
            "<div style='margin:0 10px 0 0;float:left;'>".
            "<a href='". route('user.show', ['user' => $publication->user->id])."'>";

            $string .=  "<img src='".$publication->user->picture."' alt='Image' class='img-responsive' style='width: 50px;height:50px; margin: 5px;display: inline-block;'>";

        $string .=    "</a>".
            "</div>".
            "<div style='margin: 10px;float:left;'>";
        if($publication->user->star == true) {
            $string .= "<img src ='".asset('images/medal-1.png')."'' alt='medal'>";
        }
        if(!is_null($publication->association)){
            $string .= "<span>" . $publication->user->firstname . " " . $publication->user->lastname . " - <a href='" . route('association.show', ['association' => $publication->association->id]) . "'>" . $publication->association->name . "</a></span><br>";
        }
        elseif(!is_null($publication->event)){
            $string .= "<span>" . $publication->user->firstname . " " . $publication->user->lastname . " - <a href='" . route('event.show', ['event' => $publication->event->id]) . "'>" . $publication->event->name . "</a></span><br>";
        }
        else{
            $string .= "<span>" . $publication->user->firstname . ' ' . $publication->user->lastname . "</span><br>";
        }
        $string .= "<small><i aria-hidden='true' class='fa fa-clock-o'></i> " .$publication->timeAgo($publication->created_at) ."</small>".
            "<div class='btn-group dropdown-post'>".
            "<button class='btn dropdown-toggle' data-toggle='dropdown' aria-expanded='false' style='font-size: 8px;'><i class='fa fa-chevron-down'></i>".
            "</button><ul class='dropdown-menu pull-right'><li><a href='#' onclick=".$edit.">".
            "<span class='fa fa-pencil'></span> Modifier</a></li><li><a href='#' id='deletepost'>".
            "<span class='fa fa-trash-o'></span> Supprimer</a></li><li>".
            "<a href='#'><span class='fa fa-exclamation-triangle'></span> Signaler</a></li></ul></div>".
            "</div>".
            "</div>".
            "<div class='timeline-body'>";

        if(is_null($publication->activity)){
            $string .= "<div class='post_activity_msg'>". $publication->message ."</div>";
            $string .= "<div class='post_picture_video'>";
            if(!is_null($publication->video)){
                $string .= "<div class='video-container'><iframe src='https://www.youtube.com/embed/".$publication->video->url."' frameborder='0' allowfullscreen></iframe></div>";
            }
            elseif(!is_null($publication->picture)){
                $string .= "<img src='".asset($publication->picture)."' alt='Image' class='img-responsive'>";
            }
            $string .= "</div>";
        }
        else{
            $string .= "<div class='post_picture_video'>";
            if(!is_null($publication->video)){
                $string .= "<div class='video-container'><iframe src='https://www.youtube.com/embed/".$publication->video->url."' frameborder='0' allowfullscreen></iframe></div>";
            }
            elseif(!is_null($publication->activity->picture)) {
                $string .= "<img src='".$publication->activity->picture."' alt='Image' class='img-responsive'>";
            }
            $string .= "</div>";
            $string .=  "<div class='post_activity'>".
                "<div class='post_activity_img'>".
                "<img src='../images/icons/".$publication->activity->sport->icon."' alt=".$publication->activity->sport->name." class='img-responsive'>".
                "</div>".
                "<div class='post_activity_stats'>".
                "<span data-text=".$publication->activity->date_start."><i aria-hidden='true' class='fa fa-calendar'></i>".$publication->activity->getDateStartString()."</span>".
                "<span data-text=".$publication->activity->getTimeSecondes().">Durée :".$publication->activity->time."</span>".
                "</div>".
                "</div>".
                "<div class='post_activity_msg'>". $publication->message ."</div>";
        }

        $string .= "</div>".
            "<div class='timeline-footer'>".
            "<div class='comments' id='comments-". $publication->id ."'>";

        foreach($publication->commentspost as $comment){
            $string .= "<div class='comment' id='comment-".$comment->id."'>".
                "<a class='pull-left' href='". route('user.show', ['user' => $comment->user->id])."'>".
                "<img width='30' height='30' class='comment-avatar' alt='".$comment->user->firstname." ".$comment->user->lastname."' src='".$comment->user->picture."'>".
                "</a>".
                "<div class='comment-body'>".
                "<span class='message'><strong>".$comment->user->firstname.' '.$comment->user->lastname."</strong> ". $comment->message ."</span>".
                "<span class='time'>".$comment->timeago($comment->created_at)."</span>".
                "</div>".
                "<span class='action'>".
                "<i class='fa fa-warning' id='signalComment'></i>";

                if(Auth::user()->id == $comment->user->id)
                {
                    $string .= "<i class='fa fa-close' id='deleteComment'></i>";
                }

                $string .= "</span></div>";
        }

        if($publication->comments->count() > 3) {
            $string .= "<p class='moreComment' data-url='1'>Plus de commentaires</p>";
        }

        $string .= "<div class='comment'>".
            "<a class='pull-left' href='". route("user.show", $publication->user->id )."'>".
            "<img width='30' height='30' class='comment-avatar' alt='".Auth::user()->firstname." ".Auth::user()->lastname."' src='".Auth::user()->picture."'>".
            "</a>".
            "<div class='comment-body'>".
            "<input type='text' class='form-control' name='".$publication->id."' id='post-comment' placeholder='Ecris un commentaire...'>".
            "</div></div></div></div></div></li>";

        return $string;
    }

    private function constructComment(Comment $comment, User $user){
        $string = "<div id='comment-". $comment->id ."' class='comment'>".
        "<a class='pull-left' href='#'>".
        "<img width='30' height='30' class='comment-avatar' alt='". $user->firstname . " " . $user->lastname. "' src='" . $user->picture . "'>".
        "</a>".
        "<div class='comment-body'>".
        "<span class='message'><strong>". $user->firstname . " " . $user->lastname . "</strong> " . $comment->message ."</span>".
        "<span class='time'>" . $comment->timeAgo($comment->created_at) . "</span>".
        "</div><span class='action'>".
        "<i class='fa fa-warning' id='signalComment'></i>";
        if($comment->user->id == Auth::user()->id){
            $string .= "<i class='fa fa-close' id='deleteComment'></i>";
        }
        $string .="</span></div>";

        return $string;
    }

    public static function signale(Publication $publication){
        $publication->score += 1;
        if($publication->score > 10){
            $publication->status = "Signaled";
        }
        $publication->save();
    }

    private function publicationAll($skip = null,$take = null){
        $user = Auth::user();
        $arrayFriends = array();
        $arrayFriends[] = $user->id;
        foreach($user->friends as $friend){
            $arrayFriends[] = $friend->id;
        }

        $posts = Publication::whereIn('user_id', $arrayFriends)
            ->where('status', '!=', 'Blocked')
            ->orderBy('updated_at', 'DESC');

        if(!is_null($skip)){
            $posts = $posts->skip($skip);
        }

        if(!is_null($take)){
            $posts = $posts->take($take);
        }

        return $posts->get();
    }
}