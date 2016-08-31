<?php

namespace App\Http\Controllers\Admin;

use App\CategoriesDetails;
use App\Category;
use App\Detail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Detail::all();
        $categories = Category::all();
        return view('admin.category.index', ['categories' => $categories, 'details' => $details]);
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
        $category = new Category();

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

        $category->name = htmlspecialchars($data['name']);

        $category->save();

        return view('admin.category.test', ['category' => $category]);
    }
    public function addAjax(Request $request)
    {
        if(\Request::ajax()){

            $category = new Category();

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

            $category->name = htmlspecialchars($data['name']);

            $category->save();

            return \Response::json(array(
                'success' => true,
                'name' =>  $data['name'],
                'id' => $category->id
            ));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categoriedetail = $category->details;
        $arrayUser = [];

        foreach($categoriedetail as $us){
            $arrayUser[] = $us->id;
        }

        $details = DB::table('details')
            ->whereNotIn('id', $arrayUser)
            ->get();

//        $details = Detail::all();

        return view('admin.category.edit', ['category' => $category, 'details' => $details]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $input = $request->all();

        $rules = [
            'name' => 'required'
        ];

        $messages = [
            'name.required'=> 'Nom requis'
        ];

        $validator = Validator::make($input,$rules,$messages);


        if($validator->fails())
        {
            $request->flash();
            return Redirect::back()->withErrors($validator);
        }

        $category->name = $input['name'];

        if(!empty($input['detailadd']))
        {
            $details = $request->input('detailadd');

            foreach($details  as $detail)
            {

                $categoriedetails = new CategoriesDetails();
                $categoriedetails->category_id = $category->id;
                $categoriedetails->detail_id= $detail;
                $categoriedetails->save();
            }
        }

        if(!empty($input['detailsuppr']))
        {
            $detailsuppr = $request->input('detailsuppr');

            foreach($detailsuppr as $detail)
            {
                $match = ['category_id' => $category->id, 'detail_id' => $detail];
                $categoriedetails = CategoriesDetails::where($match)->delete();
            }
        }

        $category->save();

        Session::flash('flash_message', 'Catégorie modifié !');
        return view('admin.category.show', ['category' => $category]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->details())
        {
            $categorydetails = $category->details();

            foreach($categorydetails as $detail)
            {
                $match = ['category_id' => $category->id, 'detail_id' => $detail];
                $categoriedetails = CategoriesDetails::where($match)->delete();
            }
        }

        Session::flash('flash_message', "Catégorie supprimée!");

        $category->delete();
        return Redirect::route('admin.category.index');
    }

}
