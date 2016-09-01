<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Caracteristique;
use App\Category;
use App\Http\Controllers\Controller;
use App\Notifications;
use App\Product;
use App\Sport;
use App\SportsCategories;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', ['products' => $products ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $brands = Brand::all();
        $categories = Category::all();
        $sports = Sport::all();
        $details = Category::first()->details;

        return view('admin.product.create', ['details'=>$details, 'products' => $products, 'brands' => $brands, 'categories' => $categories,'sports' => $sports]);
    }

    public function ajaxdouble(Request $request)
    {
        $category_id = $request->input('category_id');
        $category = Category::find($category_id);

        $details = $category->details;

        return response()->json(['details' => $details]);
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
            'name' => 'required',
            'description' => 'required',
            'picture' => 'mimes:jpeg,png,jpg'
        ];

        $messages = [
            'name.required'    => 'Nom requis',
            'description.required'    => 'Description requis',
            'picture.mimes'      => 'Le format de l\'image n\'est pas pris en charge (jpeg,png,jpg)'
        ];

        $validator = Validator::make($data,$rules,$messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            $product = new Product();

            $product->name = htmlspecialchars($data['name']);
            $product->description = htmlspecialchars($data['description']);
            $product->price= $data['price'];
            $product->url= $data['url'];


            $product->brand_id = $data['brand'];
            $product->sport_id = $data['sport'];
            $product->category_id = $data['category'];
            $product->active = true;


            $match = ['sport_id' => $data['sport'], 'category_id' => $data['category']];

            if(!SportsCategories::where($match)->first())
            {
                $sportscategories = new SportsCategories();
                $sportscategories->sport_id = $data['sport'];
                $sportscategories->category_id = $data['category'];
                $sportscategories->save();
            }

            if ($request->hasFile('picture')) {
                $guid = sha1(time());
                $imageName = $guid . "." . $request->file('picture')->getClientOriginalExtension();;

                $request->file('picture')->move(
                    public_path() . '/images/products', $imageName
                );

                $imageName .= '/images/products/'.$imageName;

                $product->picture = $imageName;
            }
            else
            {
                $product->picture = "images/default_picture/default-equipement.jpg";
            }

            $product->save();


            if($request->input('caracteristiques'))
            {
                $caracteristiques = $request->input('caracteristiques');

                foreach($caracteristiques as $caracteristique_id => $caracteristique)
                {
                    $clean_caracteristique = trim($caracteristique);
                    $caracteristique_new = new Caracteristique();
                    $caracteristique_new->value = $clean_caracteristique;
                    $caracteristique_new->product_id = $product->id;
                    $caracteristique_new->detail_id = $caracteristique_id;
                    $caracteristique_new->save();

                }
            }


            Session::flash('flash_message', 'Produit Ajouté !');

            $products = Product::all();

            return view('admin.product.index', ['products' => $products]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if($product->active)
        {
            return view('admin.product.show', ['product' => $product]);
        }
        else
        {
            return view('admin.product.activation', ['product' => $product]);
        }

    }


    public function validation(Request $request)
    {
        $product_id = $request->input('product');

        $prod = Product::find($product_id);
        $prod->active = 1;

        $user = Auth::user();

        if(!is_null($user)){
            Notifications::firstOrCreate([
                'user_id' => $prod->userdemand->id,
                'userL_id' => 1, //OSEF du nom de la colonne, on récupère les bonnes info grace à la colone notification.
                'libelle' => $user->firstname." ".$user->lastname,
                'action_id' => $prod->id,
                'accepter'=> 1,
                'action_name' => $prod->name,
                'notification' => 'produitsajout',
                'afficher' => true]);
        }


        $prod->save();

        Session::flash('flash_message', 'Produit validé !');

        $products = Product::all();

        return view('admin.product.index', ['products' => $products]);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $sports = Sport::all();
        return view('admin.product.edit', ['product' => $product, 'brands' => $brands, 'categories' => $categories,'sports' => $sports]);
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
        $data = $request->all();

        $rules = [
            'name' => 'required',
            'description' => 'required',
            'picture' => 'mimes:jpeg,png,jpg'
        ];

        $messages = [
            'name.required'    => 'Nom requis',
            'description.required'    => 'Description requis',
            'picture.mimes'      => 'Le format de l\'image n\'est pas pris en charge (jpeg,png,jpg)'
        ];

        $validator = Validator::make($data,$rules,$messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            $product->name = htmlspecialchars($data['name']);
            $product->description = htmlspecialchars($data['description']);
            $product->price= $data['price'];

            $product->brand_id= $data['brand'];
            $product->sport_id= $data['sport'];
            $product->category_id= $data['category'];

            $product->active= $data['active'];

            if ($request->hasFile('picture')) {
                $guid = sha1(time());
                $imageName = $guid . "." . $request->file('picture')->getClientOriginalExtension();;

                $request->file('picture')->move(
                    public_path() . '/images/products', $imageName
                );

                $imageName .= '/images/products/'.$imageName;

                $product->picture = $imageName;
            }

            if($caracteristiques = $request->input('caracteristiques'))
            {
                $caracteristiques = $request->input('caracteristiques');

                foreach($caracteristiques as $caracteristique_id => $caracteristique)
                {
                    $clean_caracteristique = trim($caracteristique);
                    $match = ['product_id' => $product->id, 'detail_id' => $caracteristique_id];

                    if(Caracteristique::where($match)->first())
                    {
                        $caracteristique_present = Caracteristique::where($match)->first();
                        $caracteristique_present->value = $clean_caracteristique;
                        $caracteristique_present->save();
                    }
                    else
                    {
                        $caracteristique_new = new Caracteristique();
                        $caracteristique_new->value = $clean_caracteristique;
                        $caracteristique_new->product_id = $product->id;
                        $caracteristique_new->detail_id = $caracteristique_id;
                        $caracteristique_new->save();
                    }
                }
            }


            $product->save();

            Session::flash('flash_message', 'Produit modifié !');

            $products = Product::all();
            return view('admin.product.index', ['products' => $products]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->details())
        {
            $productdetails = $product->details();

            foreach($productdetails as $detail)
            {
                $match = ['product_id' => $product->id, 'detail_id' => $detail];
                $productdetails = Caracteristique::where($match)->delete();
            }
        }

        Session::flash('flash_message', "Produit supprimé!");

        $product->delete();

        return Redirect::route('admin.product.index');
    }



}
