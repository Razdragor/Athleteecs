<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Caracteristique;
use App\Notifications;
use App\Product;
use App\Publication;
use App\Rate;
use App\Sport;
use App\Category;
use App\SportsCategories;
use App\UsersEquipsSports;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
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

            $product = new Product();

            $data = $request->all();

            $rules = [
                'productname' => 'required',
                'description' => 'required',
                'productpicture' => 'mimes:jpeg,png,jpg'
            ];

            $messages = [
                'productname.required'    => 'Prenom requis',
                'description.required'    => 'Nom requis',
                'productpicture.mimes'      => 'Le format de l\'image n\'est pas pris en charge (jpeg,png,jpg)'
            ];

            $validator = Validator::make($data,$rules,$messages);

             if ($validator->fails()) {
                return array(
                    'errors' => $validator
                );
            }

            $product->name = htmlspecialchars($data['productname']);
            $product->description = htmlspecialchars($data['description']);
            $product->price= $data['price'];
            $product->url = htmlspecialchars($data['url']);


            if ($request->hasFile('productpicture')) {
                $guid = sha1(time());
                $imageName = $guid . "." . $request->file('productpicture')->getClientOriginalExtension();;

                $request->file('productpicture')->move(
                    public_path() . '/images/products', $imageName
                );

                $imageName .= '/images/products/'.$imageName;

                $product->picture = $imageName;
            }
            else{
                $product->picture = "images/default_picture/default-equipement.jpg";
                $imageName = "images/default_picture/default-equipement.jpg";
            }

            $product->save();

            return \Response::json(array(
                'success' => true,
                'productname' =>  $data['productname'],
                'description' => $data['description'],
                'price' => $data['price'],
                'url' => $data['url'],
                'productId' => $product->id,
                'picture' => $imageName
            ));
        }
    }

    public function rateproduct(Request $request)
    {
        $user = Auth::user();

        if(\Request::ajax()) {

            $product_id = $request->input('product_id');
            $ratevalue = $request->input('rate');

            $product = Product::find($product_id);

            $match = ['product_id' => $product_id, 'user_id' => $user->id];

            if(Rate::where($match)->first())
            {
                return \Response::json(array(
                    'success' => false
                ));

            }
            else{
                $rate = new Rate();
                $rate->user_id = $user->id;
                $rate->value = $ratevalue;
                $rate->product_id = $product->id;

                $rate->save();
            }

            return \Response::json(array(
                'success' => true,
                'value' =>  $ratevalue,
                'product_id' => $product->id
            ));
        }

    }

    public function index()
    {
        $products = Product::where('active',true)->paginate(20);
        $sports = Sport::all();
        $categories = Category::all();
        $user = Auth::user();

        return view('front.product.index', ['user'=> $user,'products' => $products, 'sports' => $sports, 'categories' => $categories,'old_sport_id' => "", 'old_sport_name' =>'',
            'old_category_id' => '', 'old_category_name'=>'']);
    }

    public function addequipement(Product $product)
    {
        $prod = Product::find($product->id);

        $user_prod = new UsersEquipsSports();
        $user = Auth::user();

        $user_prod->user_id = $user->id;
        $user_prod->product_id = $prod->id;
        $user_prod->sport_id = $prod->sport->id;

        $user_prod->save();

        if(!is_null($user)){
            Notifications::firstOrCreate([
                'user_id' => $user->id,
                'userL_id' => 1, //OSEF du nom de la colonne, on récupère les bonnes info grace à la colone notification.
                'libelle' => $user->firstname." ".$user->lastname,
                'action_id' => $prod->id,
                'action_name' => $prod->name,
                'notification' => 'produitsajoutstar',
                'afficher' => true]);
        }


        Session::flash('flash_message', 'Equipement ajouté a votre profil !');

        return view('front.product.show', ['user'=> $user,'product' => $prod]);
    }

    public function removeequipement(Product $product)
    {
        $prod = Product::find($product->id);

        $user = Auth::user();
        $user_prod = UsersEquipsSports::where('user_id', $user->id)->where('product_id',$prod->id)->delete();

        Session::flash('flash_message', 'Equipement supprimé !');

        return view('front.user.show',['user' => $user]);

    }

    public function search(Request $request)
    {
        $sports = Sport::all();
        $categories = Category::all();

        $sport_id = $request->input('sport');
        $category_id = $request->input('category');
        $oldcategory = "";
        $oldsport = "";

        if($sport_id != 0 && $category_id == 0)
        {
            $products = Product::where('sport_id', $sport_id )->where('active',true)->paginate(20);
            $sport = Sport::find($sport_id);
            $oldsport = $sport->name;
            $categories = $sport->categories;
        }
        elseif($sport_id == 0 && $category_id != 0)
        {
            $products = Product::where('category_id', $category_id)->where('active',true)->paginate(20);
            $category = Category::find($category_id);
            $oldcategory = $category->name;

        }
        elseif($sport_id != 0 && $category_id != 0)
        {
            $products = Product::where('sport_id', $sport_id )->where('category_id',$category_id)->where('active',true)->paginate(20);
            $sport = Sport::find($sport_id);
            $oldsport = $sport->name;

            $categories = $sport->categories;
            $category = Category::find($category_id);
            $oldcategory = $category->name;
        }
        else
        {
            $products = Product::where('active',true)->paginate(20);
            $oldsport = "";
        }

        $user = Auth::user();

        return view('front.product.index', ['user'=> $user,'products' => $products, 'sports' => $sports, 'categories' => $categories, 'old_sport_id' => $sport_id, 'old_sport_name' => $oldsport,
        'old_category_id' => $category_id, 'old_category_name' => $oldcategory]);

    }
    public function searchAjax(Request $request)
    {
        $sport_id = $request->input('sport_id');

        if($sport_id != 0)
        {
            $sport = Sport::find($sport_id);
            $categories = $sport->categories;
        }
        else
        {
            $categories = Category::all();
        }
        return response()->json(['categories' => $categories]);
    }

    public function compare(Request $request)
    {
        $input = $request->all();

        if(!empty($input['productcompare']))
        {
            $producsToCompareID = $request->input('productcompare');

            $products = Product::whereIn('id', $producsToCompareID)->get();
            $product = Product::whereIn('id', $producsToCompareID)->first();
            $category = $product->category;
        }


        return view('front.product.compare', ['products' => $products,'category'=>$category]);

    }

    public function ajaxproduct(Request $request)
    {
        $category_id = $request->input('category_id');
        $category = Category::find($category_id);

        $details = $category->details;

        return response()->json(['details' => $details]);
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

        return view('front.product.create', ['details'=>$details, 'products' => $products, 'brands' => $brands, 'categories' => $categories,'sports' => $sports]);

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

            $product->brand_id = $data['brand'];
            $product->sport_id = $data['sport'];
            $product->category_id = $data['category'];
            $product->url= $data['url'];

            $product->id_demande= Auth::user()->id;


            $product->active = false;


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

                $finalimageName = '/images/products/'.$imageName;

                $product->picture = $finalimageName;
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


            Session::flash('flash_message', 'Demande de produit envoyé !');

            $products = Product::where('active',true)->paginate(20);
            $sports = Sport::all();
            $categories = Category::all();

            return view('front.product.index', ['products' => $products, 'sports' => $sports, 'categories' => $categories,'old_sport_id' => "", 'old_sport_name' =>'',
                'old_category_id' => '', 'old_category_name'=>'']);
        }
    }

    public function postproduct(Product $product)
    {
        $user = Auth::user();
        $publication = new Publication();
        $publication->product_id = $product->id;
        $publication->user_id = $user->id;
        $publication->status = "Success";
        $publication->created_at = Carbon::now();
        $publication->updated_at = Carbon::now();
        $publication->save();

        Session::flash('flash_message', 'Produit partagé !');
        $user = Auth::user();
        return view('front.product.show', ['product' => $product,'user' => $user]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $user = Auth::user();
        return view('front.product.show', ['product' => $product,'user' => $user]);
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
