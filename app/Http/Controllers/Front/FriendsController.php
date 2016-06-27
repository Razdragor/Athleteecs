<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\UsersDemands;
use App\UsersLinks;
use Illuminate\Support\Facades\Input;
use DB;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('front.friends', ['user' => $user]);
    }

    public function searchfriends(){
        $terme = Input::get('terme');
        $results = array();
        // On va chercher sur les noms, prénom en like et un mail strict
        $queries = DB::table('users')
            ->where('firstname', 'LIKE', $terme.'%')
            ->orWhere('lastname', 'LIKE', $terme.'%')
            ->orWhere(DB::raw("CONCAT(`firstname`, ' ', `lastname`)"), 'LIKE', $terme.'%')
            ->orWhere(DB::raw("CONCAT(`lastname`, ' ', `firstname`)"), 'LIKE', $terme.'%')
            ->orWhere('email', $terme)
            ->get();

        /*
         * searchfriend amélioré mais probleme avec 2 orWhere que j'ai commenté
         *
            $queries = User::where('firstname', 'LIKE', $terme.'%')
                ->orWhere('lastname', 'LIKE', $terme.'%')
                //->orWhere(User::where("CONCAT(`firstname`, ' ', `lastname`)"), 'LIKE', $terme.'%')
                //->orWhere(User::where("CONCAT(`lastname`, ' ', `firstname`)"), 'LIKE', $terme.'%')
                ->orWhere('email', $terme)
                ->get();
         */

        foreach ($queries as $query) {
            $results[] = ['id' => $query->id, 'firstname' => $query->firstname, 'lastname' => $query->lastname, 'picture' => $query->picture];
        }
        $user = Auth::user();
        return view('front.friends', [ 'results' => $results, 'user' => $user]);
        //return $results;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($friend)
    {
        $user = Auth::user();
        $id = Auth::user()->id;
        $idfriend = $friend->id;

        UsersLinks::where('user_id', $id)
            ->where('userL_id', $idfriend)
            ->delete();

        UsersLinks::where('user_id', $idfriend)
            ->where('userL_id', $id)
            ->delete();

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
        $user = Auth::user();

        if($iduser !== $idfriend){
             UsersDemands::firstOrCreate([
                    'user_id' => $iduser,
                    'userL_id' => $idfriend,
                    'demands' => false
                ]);
        }
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
