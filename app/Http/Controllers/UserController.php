<?php

namespace App\Http\Controllers;

use App\Picture;
use App\Product;
use App\User;
use App\UsersEquipsSports;
use App\UsersNewsletters;
use App\UsersSports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Validator;
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

        $userEquipement = $user->products;
        $arrayUser = [];

        foreach($userEquipement as $us){
            $arrayUser[] = $us->id;
        }

        $equipements = DB::table('products')
            ->whereNotIn('id', $arrayUser)
            ->get();


        return view('front.user.edit',['user' => $user, 'sports' => $sports,'equipements' => $equipements]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(User $user, Request $request)
    {
        $avaiblesexe = ["Homme","Femme","Autre"];
        if($user){
            $input = $request->all();
            if(in_array($input["sexe"],$avaiblesexe))
            {
                $rules = [
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'picture' => 'mimes:jpeg,png,jpg'
                ];

                $messages = [
                    'firstname.required'    => 'Prenom requis',
                    'lastname.required'    => 'Nom requis',
                    'picture.mimes'      => 'Le format de l\'image n\'est pas pris en charge (jpeg,png,jpg)'
                ];

                $validator = Validator::make($input,$rules,$messages);

                if($validator->fails())
                {
                    $request->flash();
                    return Redirect::back()->withErrors($validator);
                }

                if ($request->hasFile('picture')) {
                    $guid = sha1(time());
                    $imageName = $guid . $user->id . "." . $request->file('picture')->getClientOriginalExtension();;

                    $request->file('picture')->move(
                        base_path() . '/public/images/', $imageName
                    );

                    $user->picture = '/public/images/'.$imageName;
                }


                $user->firstname = $input['firstname'];
                $user->lastname= $input['lastname'];
                $user->job = $input['job'];
                $user->firm = $input['firm'];
                $user->school = $input['school'];
                $user->address= $input['address'];
                $user->sexe= $input['sexe'];

                $us = UsersNewsletters::whereEmail($user->email)->first();
                if(array_key_exists('newsletter', $input)){
                    if(is_null($us)){
                        $us = UsersNewsletters::create(array(
                            'email' => $user->email,
                            'active' => true
                        ));

                    }
                    $us->active = true;
                    $us->save();
                    $user->newsletter = true;
                }
                else{
                    if(!is_null($us)){
                        $us->active = false;
                        $us->save();
                    }
                    $user->newsletter = false;
                }

                $user->save();

                if(!empty($input['sport']))
                {
                    $sports = $request->input('sport');

                    foreach($sports as $sport)
                    {
                        $userSport = new UsersSports();
                        $userSport->user_id = $user->id;
                        $userSport->sport_id= $sport;
                        $userSport->save();
                    }
                }

                if(!empty($input['sportsuppr']))
                {
                    $sportsuppr = $request->input('sportsuppr');

                    foreach($sportsuppr as $sport)
                    {
                        $match = ['user_id' => $user->id, 'sport_id' => $sport];
                        $userSport = UsersSports::where($match)->delete();
                    }
                }

                if(!empty($input['equipement']))
                {
                    $products = $request->input('equipement');

                    foreach($products as $product)
                    {
                        $prod = Product::find($product);
                        $sportid = $prod->sport()->first();
                       // dd($sportid);
                        $sportid = 1;

                        $userEquipsSports = new UsersEquipsSports();
                        $userEquipsSports->user_id = $user->id;
                        $userEquipsSports->product_id= $product;
                        $userEquipsSports->sport_id= $sportid;

                        $userEquipsSports->save();
                    }
                }

                if(!empty($input['equipementsuppr']))
                {
                    $productsuppr = $request->input('equipementsuppr');

                    foreach($productsuppr as $prod)
                    {
                        $match = ['user_id' => $user->id, 'product_id' => $prod];
                        $userEquipsSports = UsersEquipsSports::where($match)->delete();
                    }
                }


                return Redirect::route('user.show', ['user' => $user])->with('message', 'Modification effectué avec succès');
            }

        }
        return Redirect::back()->withErrors("Vous n'êtes pas autorisé");

//
//        $usersport = new UsersSports();
//        $usersport->user_id = $user->id;
//        $usersport->sport_id = $request->input('sports');
//        $usersport->save();
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
