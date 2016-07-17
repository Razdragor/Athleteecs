<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addAjax(Request $request)
    {
        if(\Request::ajax()){
            $lastproduct = Product::all()->last()->get();

            $product = new Product();

            $data = $request->all();

            $validator = Validator::make($data, [
                'productname' => 'required',
                'description' => 'required'
            ]);

            if ($validator->fails()) {
                return array(
                    'errors' => $validator
                );
            }

            $product->name = $data['productname'];
            $product->description = $data['description'];
            $product->price= $data['price'];
            $product->url = $data['url'];

            if(!empty($lastproduct))
            {
                $productId = $lastproduct->id+1;
            }
            else
            {
                $productId = 1;
            }


            if ($request->hasFile('picture')) {
                $guid = sha1(time());
                $imageName = $guid . "." . $request->file('picture')->getClientOriginalExtension();;

                $request->file('picture')->move(
                    base_path() . '/public/images/products', $imageName
                );

                $product->picture = $imageName;
            }
            else{
                $product->picture = "/default_picture/default-equipement.jpg";
                $imageName = "default_picture/default-equipement.jpg";
            }

            $product->save();

            return \Response::json(array(
                'success' => true,
                'productname' =>  $data['productname'],
                'description' => $data['description'],
                'price' => $data['price'],
                'url' => $data['url'],
                'productId' => $productId,
                'picture' => $imageName

            ));
        }
    }

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product)
    {

    }
}
