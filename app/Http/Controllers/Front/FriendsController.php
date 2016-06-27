<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getAllFriends()
     {
         $user = Auth::user();
         return view('front.friends', ['user' => $user]);
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($friend)
    {
        $id = Auth::user()->id;
        $idfriend = $friend->id;

        DB::table('users_links')
            ->where('user_id', $id)
            ->where('userL_id', $idfriend)
            ->delete();

        DB::table('users_links')
            ->where('user_id', $idfriend)
            ->where('userL_id', $id)
            ->delete();

        $user = Auth::user();

        return view('front.friends', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($friend)
    {
        $iduser = Auth::user()->id;
        $idfriend = $friend->id;

        if($iduser != $idfriend){
            DB::table('users_links')->insert(
                ['user_id' => $iduser, 'userL_id' => $idfriend, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s") ]
            );
        }

        $user = Auth::user();

        return view('front.friends', ['user' => $user]);
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

}
