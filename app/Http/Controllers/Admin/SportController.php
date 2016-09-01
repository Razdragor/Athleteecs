<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\HelperPublication;
use App\Http\Controllers\Controller;
use App\Publication;
use App\Sport;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sport::all();
        return view('admin.sport.index', ['sports' => $sports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $dir = "./images/icons";
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if( $file != '.' && $file != '..' && preg_match('#\.(jpe?g|png)$#i', $file)) {
                        $data[] = $file;
                    }
                }
                closedir($dh);
            }
        }
        return view('admin.sport.create' , [ 'data' => $data]);
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
        $rules = [
            'name' => 'required|unique:sports',
            'picture' => 'mimes:jpeg,png,jpg',
        ];
        $messages = [
            'name.required'    => 'Le nom est requis',
            'name.unique' => 'Le nom doit être unique',
            'picture.mimes'      => 'Le format de l\'image n\'est pas pris en charge (jpeg,png,jpg)',
        ];
        $validator = Validator::make($data,$rules,$messages);
        if (!$request->hasFile('picture') && $data['existicon'] == "") {
            return Redirect::back()->withErrors('Un des champs icones est obligatoire.');
        }

        if($validator->fails())
        {
            $request->flash();
            return Redirect::back()->withErrors($validator);
        }

        $imageName = null;
        if ($request->hasFile('picture')) {
            $guid = com_create_guid();
            $imageName = $guid.'.'.$request->file('picture')->getClientOriginalExtension();;

            $request->file('picture')->move(
                public_path()."/images/icons/", $imageName
            );
        }

        if(is_null($imageName) && $data['existicon'] != ""){
            $imageName = $data['existicon'];
        }

        Sport::create(array(
            'name' => Input::get('name'),
            'icon' => $imageName
        ));

        return Redirect::route('admin.sport.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        return view('admin.sport.show' , [ 'sport' => $sport]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sport $sport)
    {
        return view('admin.sport.edit' , [ 'sport' => $sport]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport)
    {
        $data = $request->all();

        $sport_final = Sport::find($sport->id);

        $sport_final->name = $data['name'];
        $sport_final->save();

        return view('admin.sport.show', ['sport'=>$sport]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        $usersSports = $sport->userSport;
        foreach ($usersSports as $us){
            $us->delete();
        }
        $sport->delete();

        return Redirect::route('admin.sport.index');
    }



}
