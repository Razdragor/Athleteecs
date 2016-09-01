@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/layouts/timeline-facebook.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/timeline-2-cols.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/user-profile.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/user-cards.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/js/plugins/isotope/isotope.css') }}" rel="stylesheet">

    <link href="{{ asset('asset/css/plugins/selectizejs/selectize-default.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/friends.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/productshow.css') }}" rel="stylesheet">

@endsection

@section('content')
    <div class="container">

        <h1>{{ $product->sport->name }} \ {{ $product->category->name }} \ {{ $product->name }}</h1>
            <a href="{{ route('product.index') }}">Liste des équipements</a>
        <div style="border-bottom: solid black 1px;width: 100%;margin:auto auto 20px auto"></div>
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <div class="product" id="{{$product->id}}">
            <div class="col-md-6">
                <div class="product_image">
                    <a href="{{ route('product.show', ['product' => $product])}}">
                        <img alt="{{$product->name}}" src="{{asset($product->picture)}}" class="product_visuel" height="500px" width="500px" style="display: block">
                    </a>
                </div>
                <div class="product_info">
                    <a href="#" class="product_brand product__list_left">{{$product->brand->name}}</a>
                    <div class="product_price">
                        <a href="{{ $product->url }}" alt="link_product" class="product_link">
                            <span class="a_partir_de">À partir de</span>
                            <span class="product_price_span">{{$product->price}} €</span>
                        </a>
                    </div>
                </div>


            </div>

            <div class="col-md-6">

                <div class="box-product-show">
                    <div class="detail_name">
                        <span class="detail_name_content">Description</span>
                    </div>
                    <div class="container">
                        <div class="detail_result">
                            <span class="detail_result_content">{{ $product->description }}</span>
                        </div>
                    </div>
                </div>

                <div class="box-product-show">
                    <div class="detail_name">
                        <span class="detail_name_content">Caracteristiques</span>
                    </div>
                    <div class="container">
                        @foreach($product->caracteristiques as $caracteristique)
                            <div class="row epique">
                                <div class="col-md-6">
                                    <div class="caracterestique_detail_name">
                                        <span class="caracterestique_detail_name_content">{{$caracteristique->detail->name}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="caracterestique_detail_result">
                                        <span class="caracterestique_detail_result_content">{{$caracteristique->value}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                {{--Affichage des categories liés au produit--}}


                <div class="rating" id="{{ $product->id }}">
                    <div class="detail_name">
                        <span class="detail_name_content">Avis des utilisateurs</span>
                    </div>
                    <div class="detail_result">
                        <span class="detail_result_content">{{$product->ratescount()}} utilisateurs recommandent ce produit</span>
                    </div>
                    @if($product->ratesvalue() != 0 && $user->products->where('id',$product->id)->count() != 0 && $product->rates->where('user_id',$user->id)->count() == 0)
                        Note global : <br><div class="ui star massive rating" data-rating="{{ceil($product->ratesvalue())}}" data-max-rating="5"></div>
                    @elseif($product->ratesvalue() != 0 && $user->products->where('id',$product->id)->count() != 0 && $product->rates->where('user_id',$user->id)->count() != 0)
                        Note global : <br><div class="ui star massive rating user" data-rating="{{ceil($product->ratesvalue())}}" data-max-rating="5"></div>
                    @elseif($product->ratesvalue() == 0 && $user->products->where('id',$product->id)->count() != 0)
                        <div class="ui star massive rating">
                            <i class="icon active" value="1"></i>
                            <i class="icon active" value="2"></i>
                            <i class="icon" value="3"></i>
                            <i class="icon" value="4"></i>
                            <i class="icon" value="5"></i>
                        </div>
                    @else($user->products->where('id',$product->id)->count() == 0 )
                        <div class="ui star massive rating user" data-rating="{{ceil($product->ratesvalue())}}" data-max-rating="5"></div>
                    @endif
                    <br>
                    @if(!empty($user->rates))
                        @foreach($user->rates as $rateuser)
                            @if($rateuser->product_id == $product->id)
                                Votre note :<br> <div class="ui star massive rating user" data-rating="{{ceil($rateuser->value)}}" data-max-rating="5"></div>
                            @endif
                        @endforeach
                    @else
                        Votre note : <div class="ui star massive rating">
                            <i class="icon active" value="1"></i>
                            <i class="icon active" value="2"></i>
                            <i class="icon" value="3"></i>
                            <i class="icon" value="4"></i>
                            <i class="icon" value="5"></i>
                        </div>
                    @endif
                   </div>

                <div class="box-product-show">
                    <div class="detail_name">
                        <span class="detail_name_content">Actions</span>
                    </div>
                    <div class="container">
                        <div class="detail_result">
                            @if($user->products->where('id',$product->id)->count() == 0)

                                <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('product.adduser',['$product' => $product]) }}">
                                    {{ csrf_field() }}
                                    <button type="submit">Ajouté à votre profil</button>
                                </form>

                            @else
                                <div class="detail_result">
                                    <span class="detail_result_content">Vous possedez déjà cette équipement</span>
                                </div>
                            @endif
                                <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('product.post',['$product' => $product]) }}">
                                    {{ csrf_field() }}
                                    <button type="submit">Partager l'équipement sur votre mur</button>
                                </form>


                        </div>
                    </div>
                </div>
            </div>






        </div>
</div>

@endsection

@section('js')
<script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.4/semantic.min.js">    </script>
<script>

    $('.ui.star.rating.user').rating('disable');

    $('.ui.rating')
            .rating('setting', 'onRate', function(value) {

                var product_id = $(this).parent().attr("id");

                $.ajax({
                    url: "/vote-equipement",
                    type: "GET",
                    data: {rate: value, product_id: product_id},
                    success : function(data){
                        if(data['success'] == true)
                        {

                            var product_id = data['product_id'];
                            var value = data['value'];

                            var parent = $('#'+product_id);
                            parent.find( ".ui.star.rating").rating('disable');


//                        console.log(product_id);
//                        console.log(parent);
                        }
                        else
                        {
                            console.log("failed");
                        }
                    }
                });
            });


</script>
@endsection
