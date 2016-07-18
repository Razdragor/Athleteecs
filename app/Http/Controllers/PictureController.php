<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addAjax(Request $request)
    {
        if(\Request::ajax()){

            $picture = new Picture();

            $data = $request->all();

            $rules = [
                'userpicture' => 'required'
            ];

            $messages = [
                'userpicture.required'    => 'Prenom requis'
            ];

            $validator = Validator::make($data,$rules,$messages);

            if ($validator->fails()) {
                return array(
                    'errors' => $validator
                );
            }

            if($request->hasFile('userpicture')) {
                $guid = sha1(time());
                $imageName = $guid . "." . $request->file('userpicture')->getClientOriginalExtension();;

                $request->file('userpicture')->move(
                    base_path() . '/public/images/users', $imageName
                );

                $picture->link = $imageName;
            }

            $picture->user_id = Auth::user()->id;

            $picture->save();

            return \Response::json(array(
                'success' => true,
                'picture' =>  $picture->link
            ));
        }
    }

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
