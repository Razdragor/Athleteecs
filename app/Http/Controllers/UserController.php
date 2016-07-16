<?php

namespace App\Http\Controllers;

use App\User;
use App\UsersSports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.user.index');
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
    public function show(User $user)
    {
        return view('front.user.show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userSports = $user->sports;
        $arraySport = [];

        foreach($userSports as $us){
            $arraySport[] = $us->id;
        }

        $sports = DB::table('sports')
            ->whereNotIn('id', $arraySport)
            ->get();

        return view('front.user.edit',['user' => $user, 'sports' => $sports]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        $input = $request->all();

        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
        ];

        $messages = [
            'firstname.required'    => 'Prenom requis',
            'lastname.required'    => 'Nom requis',
        ];

        $validator = Validator::make($input,$rules,$messages);

        if($validator->fails())
        {
            $request->flash();
            return Redirect::back()->withErrors($validator);
        }
//
//        $usersport = new UsersSports();
//        $usersport->user_id = $user->id;
//        $usersport->sport_id = $request->input('sports');
//        $usersport->save();

        $user->firstname = $input['firstname'];
        $user->lastname= $input['lastname'];
        $user->job = $input['job'];
        $user->firm = $input['firm'];
        $user->school = $input['school'];
        $user->address= $input['address'];

        $user->save();

        return redirect()->back();
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
