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
    public function destroy($id)
    {
        //
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
}
