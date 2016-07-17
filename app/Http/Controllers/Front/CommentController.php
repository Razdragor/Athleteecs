<?php

namespace App\Http\Controllers\Front;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;

class CommentController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            'publication' => 'required|numeric',
            'value' => 'required'
        ]);
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
        $data["publication"] = intval($data["publication"]);
        $validator = $this->validator($data);

        if ($validator->fails()) {
            return \Response::json(array(
                'success' => false,
                'error' => $validator
            ));
        }
        $user = $user = Auth::user();
        $comment = Comment::create(array(
            'user_id' => $user->id,
            'publication_id' => $data["publication"],
            'message' => $data["value"]
        ));

        return \Response::json(array(
            'success' => true,
            'user' => array(
                'picture' => $user->picture,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'created_at' => $comment->timeAgo($comment->created_at)
            )
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if(\Request::ajax() && !is_null($comment)) {
            if(Auth::user()->id == $comment->user_id){
                $comment->status = "Blocked";
                $comment->save();

                return \Response::json(array(
                    'success' => true
                ));
            }
        }
        return \Response::json(array(
            'success' => false
        ));
    }

    public function signal(Comment $comment)
    {
        if(\Request::ajax() && !is_null($comment)) {
            $comment->score += 1;
            if($comment->score > 10){
                $comment->status = "Signaled";
            }
            $comment->save();

            return \Response::json(array(
                'success' => true
            ));
        }

        return \Response::json(array(
            'success' => false
        ));


    }
}
