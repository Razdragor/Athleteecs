<?php

namespace App\Http\Controllers\Front;


use App\Association;
use App\HelperPublication;
use App\Notifications;
use App\Sport;
use App\UsersAssociations;
use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Http\Controllers\Controller;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $associations = $user->associations;
        $userSports = $user->sports;
        $arraySport = [];

        foreach($userSports as $us){
            $arraySport[] = $us->id;
        }

        $sports = DB::table('sports')
            ->whereNotIn('id', $arraySport)
            ->get();

        return view('front.association.index', ["associations" => $associations, "sports" => $sports, "userSports" => $userSports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sports = Sport::all();
        return view('front.association.create', ['sports' => $sports]);
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
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'picture' => 'required|mimes:jpeg,png,jpg',
            'lattitude' => 'required',
            'sport' => 'required'
        ];
        $messages = [
            'name.required'    => 'Le nom de l\'association est requis',
            'description.required'    => 'Description requise',
            'picture.required' => 'Image requise',
            'picture.mimes'      => 'Le format de l\'image n\'est pas pris en charge (jpeg,png,jpg)',
            'lattitude.required'      => 'Indiquer une adresse',
            'sport.required' => 'Choisir un sport'
        ];
        $validator = Validator::make($data,$rules,$messages);

        if($validator->fails())
        {
            $request->flash();
            return Redirect::back()->withErrors($validator);
        }

        $imageName = null;
        if ($request->hasFile('picture')) {
            $guid = com_create_guid();
            $imageName = $guid.'_assos.' . $request->file('picture')->getClientOriginalExtension();;

            $request->file('picture')->move(
                storage_path() . '\uploads', $imageName
            );
            $imageName = '/uploads/'.$imageName;
        }

        $association = Association::create(array(
            'name' => $data['name'],
            'picture' => $imageName,
            'address' => $data['route'],
            'city' => $data['locality'],
            'city_code' => $data['postal_code'],
            'lattitude' => $data['lattitude'],
            'longitude' => $data['longitude'],
            'number_street' => $data['street_number'],
            'region' => $data['region'],
            'country' => $data['country'],
            'user_id' => $user->id,
            'sport_id' => $data['sport']
        ));

        $association->description = $data['description'];
        $association->save();

        UsersAssociations::create(array(
            'user_id' => $user->id,
            'association_id' => $association->id,
            'is_admin' => true
        ));

        return redirect(route("association.show", ["association" => $association->id]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $sports = Sport::all();
        $ismember = DB::table('users_associations')
                    ->where('association_id' ,'=', $id->id)
                    ->where('user_id' ,'=', $user->id)
                    ->get();

        return view('front.association.show', ["association" => $id, "sports" =>$sports, "isMember" => $ismember, "user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Association $association)
    {
        $user = Auth::user();
        if($user->isAdminAssociation($association->id)){
            $sports = Sport::all();
            return view('front.association.edit', ['association' => $association, 'sports' => $sports]);
        }

        return Redirect::back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $association)
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
    } /**
     * Join the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function join(Association $association)
    {
        $userC = Auth::user();
        $members = $association->members;
        foreach($members as $member){
            $user = $member->user;
            if(!is_null($user)){
                Notifications::firstOrCreate([
                    'user_id' => $user->id,
                    'userL_id' => $association->id, //OSEF du nom de la colonne, on récupère les bonnes info grace à la colone notification.
                    'libelle' => $userC->firstname." ".$userC->lastname." a rejoint l'association ".$association->name,
                    'notification' => 'associations',
                    'afficher' => true]);
            }
        }
    }

    public function quit(Association $association){
        $userC = Auth::user();
        $userAssocation = DB::table('users_associations')
            ->where('user_id', '=', $userC->id)
            ->where('association_id', '=', $association->id)
            ->get();
        dd($userAssocation);
    }

    //Publication

    public function storepost(Request $request, Association $association){
        $publication = HelperPublication::store($request);
        if(is_array($publication) && array_key_exists('errors',$publication)){
            return Redirect::back()->withErrors($publication['errors']);
        }

        $publication['association_id'] = $association->id;
        Publication::create($publication);

        return Redirect::back();

    }

    public function storeact(Request $request, Association $association){
        $publicationArray = HelperPublication::store($request);
        if(is_array($publicationArray) && array_key_exists('errors',$publicationArray)){
            return Redirect::back()->withErrors($publicationArray['errors']);
        }
        $activityArray = HelperActivity::store($request,$publicationArray);

        $activity = Activity::create($activityArray);

        $publicationArray['activity_id'] = $activity->id;
        $publication['association_id'] = $association->id;
        Publication::create($publicationArray);

        return Redirect::back();

    }

    public function search(Request $request){
        $data = $request->all();
        if(array_key_exists('sports', $data)){
            $associations = Association::whereIn('sport_id', $data['sports'])->get();

            return \Response::json(array(
                'success' => true,
                'associations' => $associations
            ));
        }

        return \Response::json(array(
            'success' => false
        ));
    }
}
