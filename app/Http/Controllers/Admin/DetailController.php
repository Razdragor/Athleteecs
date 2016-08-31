<?php

namespace App\Http\Controllers\Admin;

use App\Detail;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    public function addAjax(Request $request)
    {
        if(\Request::ajax()){

            $detail = new Detail();

            $data = $request->all();

            $rules = [
                'name' => 'required'
            ];

            $messages = [
                'name.required'    => 'Nom requis',
            ];

            $validator = Validator::make($data,$rules,$messages);

            if ($validator->fails()) {
                return array(
                    'errors' => $validator
                );
            }

            $detail->name = htmlspecialchars($data['name']);

            $detail->save();

            return \Response::json(array(
                'success' => true,
                'name' =>  $data['name'],
                'id' => $detail->id
            ));
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        return view('admin.detail.show', ['detail' => $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        $detail->delete();

        Session::flash('flash_message', 'Détail supprimé !');

        return Redirect::route('admin.category.index');
    }

}
