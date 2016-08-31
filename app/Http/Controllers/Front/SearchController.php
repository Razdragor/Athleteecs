<?php

namespace App\Http\Controllers\Front;

use App\Association;
use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\UsersDemands;
use App\UsersLinks;
use Illuminate\Support\Facades\Input;
use DB;
use App\User;
use App\Notifications;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(){
        $terme = Input::get('terme');
        $results = array();
        $resultsAssociation = array();
        $resultsEvent = array();
        $user = Auth::user();
        // On va chercher sur les noms, prénom en like et un mail strict
        if(!empty($terme)){
             //searchfriend amélioré mais probleme avec 2 orWhere(DB:raw  ...) | je sais pas comment régler ça, remplacer par User plutot que DB, mais ça ne marche pas
            $queries = User::where('firstname', 'LIKE', $terme.'%')
                ->orWhere('lastname', 'LIKE', $terme.'%')
                ->orWhere(DB::raw("CONCAT(`firstname`, ' ', `lastname`)"), 'LIKE', $terme.'%')
                ->orWhere(DB::raw("CONCAT(`lastname`, ' ', `firstname`)"), 'LIKE', $terme.'%')
                ->orWhere('email', $terme)
                ->get();

            foreach ($queries as $query) {
                    $results[] = ['id' => $query->id, 'firstname' => $query->firstname, 'lastname' => $query->lastname, 'picture' => $query->picture];
            }

            //search association
            $queryassociation = Association::where('name', 'LIKE', '%'.$terme.'%')->get();

            foreach ($queryassociation as $query) {
                $resultsAssociation[] = ['id' => $query->id, 'name' => $query->name, 'picture' => $query->picture];
            }

            //search association
            $queryEvent = Event::where('name', 'LIKE', $terme.'%')
                ->where('private', '=', '0')
                ->get();


            $queryEvent2 = Event::join('users_demands_events', 'users_demands_events.event_id', '=', 'events.id')
                ->where('name', 'LIKE', $terme.'%')
                ->where('private', '=', '1')
                ->where('users_demands_events.user_id', '=', $user->id)
                ->where('is_authorised', '=', 1)
                ->select('events.id', 'events.name', 'events.picture')
                ->get();

            $queryEvent3 = Event::where('name', 'LIKE', $terme.'%')
                ->get();




            foreach ($queryEvent as $query) {
                if(!$query->private || ($user->isAuthorisedEvent($query) || $user->isAdminEvent($query->id)))
                {
                    $resultsEvent[] = ['id' => $query->id, 'name' => $query->name, 'picture' => $query->picture];
                }
            }
            foreach ($queryEvent2 as $query) {
                $resultsEvent[] = ['id' => $query->id, 'name' => $query->name, 'picture' => $query->picture];
            }
            foreach ($queryEvent3 as $query) {
                $resultsEvent[] = ['id' => $query->id, 'name' => $query->name, 'picture' => $query->picture];
            }

        } else {
            $results = [];
        }

        return view('front.search', [ 'results' => $results,'resultsEvent' => $resultsEvent , 'resultsAssociation' => $resultsAssociation, 'user' => $user]);
    }

}
