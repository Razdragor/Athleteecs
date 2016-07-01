<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Publication;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'message_status' => 'required|max:255',
            'picture_status' => 'mimes:jpeg,png,jpg'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator);
        }

        $imageName = null;
        if ($request->hasFile('picture_status')) {
            $imageName = $user->id . '_' . date('YmdHis'). '_post.' . $request->file('picture_status')->getClientOriginalExtension();;

            $request->file('picture_status')->move(
                storage_path() . '\uploads', $imageName
            );
            $imageName = '/uploads/'.$imageName;
        }

        Publication::create(array(
            'message' => $data['message_status'],
            'user_id' => $user->id,
            'picture' => $imageName
        ));

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        if(\Request::ajax() && $publication != null){
            $data = $request->all();
            if(array_key_exists('message_status_modal',$data)){
                $publication->message = $data['message_status_modal'];
            }
            if ($request->hasFile('picture_status_modal')) {
                $imageName = $publication->user->id . '_' . date('YmdHis'). '_post.' . $request->file('picture_status_modal')->getClientOriginalExtension();

                $request->file('picture_status_modal')->move(
                    storage_path() . '\uploads', $imageName
                );
                $imageName = '/uploads/'.$imageName;

                $publication->picture = $imageName;
            }
            $publication->save();
            return \Response::json(array(
                'success' => true,
                'publication' => $publication
            ));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        if(\Request::ajax() && $publication != null) {
            if(!is_null($publication->activity)) {
                $publication->activity->delete();
            }
            if(!is_null($publication->comments)) {
                foreach($publication->comments as $comment){
                    $comment->delete();
                }
            }
            $publication->delete();
            return \Response::json(array(
                'success' => true
            ));
        }
        return \Response::json(array(
            'success' => false
        ));
    }

    public function load(Publication $publication,Request $request){

        if(\Request::ajax()) {
            $data = $request->all();
            $page = intval($data['page']);
            $skip =  $page * 3;
            $result = $publication->comments()->orderBy('created_at', 'asc')->skip($skip)->take(3)->get();
            if($publication->comments->count() > ($skip+3)){
                $page++;
            }
            else{
                $page = false;
            }

            foreach($result as $p){
                $comments[] = array(
                        'user' => array(
                            'picture' => $p->user->picture,
                            'firstname' => $p->user->firstname,
                            'lastname' => $p->user->lastname
                        ),
                        'comment' => array(
                            'created_at' => $p->timeAgo($p->created_at),
                            'message' => $p->message
                        )
                    );
            }

            return \Response::json(array(
                'success' => true,
                'page' => $page,
                'comments' => $comments
            ));
        }
    }

    public function loadAll(Request $request){
        if(\Request::ajax()) {
            $data = $request->all();
            $page = intval($data['page']);
            $skip =  $page * 10;
            $count = Publication::all()->count();
            $result = Publication::orderBy('updated_at', 'DESC')->skip($skip)->take(2)->get();
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

            return \Response::json(array(
                'success' => true,
                'page' => $page,
                'publications' => $publications
            ));
        }
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
                    "<a href='". route('user.show', ['user' => $publication->user->id])."'>".
                    "<img src='". $publication->user->picture."' alt='Image' class='img-responsive' style='width: 50px; margin: 5px;display: inline-block;'>".
                    "</a>".
                    "</div>".
                    "<div style='margin: 10px;float:left;'>".
                    "<span>" . $publication->user->firstname . ' ' . $publication->user->lastname . "</span><br>".
                    "<small><i aria-hidden='true' class='fa fa-clock-o'></i> " .$publication->timeAgo($publication->created_at) ."</small>".
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
            if(!is_null($publication->picture)){
                $string .= "<img src='".$publication->picture."' alt='Image' class='img-responsive'>";
            }
        }
        else{
            if(!is_null($publication->activity->picture)) {
                $string .= "<img src='".$publication->activity->picture."' alt='Image' class='img-responsive'>";
            }
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
            $string .= "<div class='comment'>".
                        "<a class='pull-left' href='". route('user.show', ['user' => $comment->user->id])."'>".
                        "<img width='30' height='30' class='comment-avatar' alt='Julio Marquez' src='".asset($comment->user->picture)."'>".
                        "</a>".
                        "<div class='comment-body'>".
                        "<span class='message'><strong>".$comment->user->firstname.' '.$comment->user->lastname."</strong> ". $comment->message ."</span>".
                        "<span class='time'>".$comment->timeago($comment->created_at)."</span>".
                        "</div>".
                        "</div>";
        }

        if($publication->comments->count() > 3) {
            $string .= "<p class='moreComment' data-url='1'>Plus de commentaires</p>";
        }

        $string .= "<div class='comment'>".
                    "<a class='pull-left' href='". route("user.show", $publication->user->id )."'>".
                    "<img width='30' height='30' class='comment-avatar' alt='Julio Marquez' src='". Auth::user()->picture ."'>".
                    "</a>".
                    "<div class='comment-body'>".
                    "<input type='text' class='form-control' name='".$publication->id."' id='post-comment' placeholder='Ecris un commentaire...'>".
                    "</div></div></div></div></div></li>";

        return $string;
    }

}
