<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Response;

class SearchController extends Controller
{
    public function searchUser(){
        $terme = Input::get('terme');
    	$results = array();
    	// On va chercher sur les noms, prénom en like et un mail strict
    	$queries = DB::table('users')
    		->where('firstname', 'LIKE', $terme.'%')
    		->orWhere('lastname', 'LIKE', $terme.'%')
			->orWhere(DB::raw("CONCAT(`firstname`, ' ', `lastname`)"), 'LIKE', $terme.'%')
            ->orWhere('email', $terme)
    		->get();

        foreach ($queries as $query){
    	    $results[] = [ 'id' => $query->id, 'firstname' => $query->firstname, 'lastname' => $query->lastname, 'picture' => $query->picture ];
    	}
        dd($results);
        return view('front.friends', [ 'results' => $results]);
        //return $results;
    }
}
