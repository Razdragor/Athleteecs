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
    <link href="{{ asset('asset/css/productcompare.css') }}" rel="stylesheet">

@endsection

@section('content')
    <div class="container">
            <h1>Comparateur de produit</h1>
            <a href="{{ route('product.index') }}">Retour</a>
            <div style="border-bottom: solid black 1px;width: 100%;margin:auto auto 20px auto"></div>

    @foreach($products as $product)
            <div class="product col-md-2" id="{{$product->id}}">
                <div class="product_image">
                    <a href="{{ route('product.show', ['product' => $product])}}">
                       <img alt="{{$product->name}}" src="{{asset($product->picture)}}" class="product_visuel" height="100px" width="100px" style="display: block">
                    </a>
                </div>
                <div class="product_info">

                    <a href="#" class="product_brand product__list_left">{{$product->brand->name}}</a>
                    <a href="{{ route('product.show', ['product' => $product])}}" class="product_name product__list_left">{{$product->name}}</a>
                    <div class="product_price">
                        <a href="{{$product->url}}" class="product_link">
                            <span class="a_partir_de">À partir de</span>
                            <span class="product_price_span">{{$product->price}} €</span>
                        </a>
                    </div>

                </div>
                <div class="rating details_box" id="{{ $product->id }}">

                    <div class="detail_name">
                        <span class="detail_name_content">Avis des utilisateurs</span>
                    </div>

                    @if($product->ratesvalue() != 0 )
                        <div class="detailstar">
                            <div class="ui huge star rating user" data-rating="{{ceil($product->ratesvalue())}}" data-max-rating="5"></div>
                        </div>
                    @else
                        <div class="detailstar">
                            <div class="ui star rating user" data-rating="0" data-max-rating="5"></div>
                        </div>
                    @endif

                    <div class="detail_result">
                        <span class="detail_result_content">{{$product->ratescount()}} utilisateurs recommandent ce produit</span>
                    </div>
                    <div class="detail_name">
                        <span class="detail_name_content">Description</span>
                    </div>

                    <div class="detail_result">
                        <span class="detail_result_content">{{ $product->description }}</span>
                    </div>

                </div>
                {{--Affichage des produits avec categories--}}
                @foreach($product->category->details as $detail)
                    <div class="details_box">
                        <div class="detail_name">
                            <span class="detail_name_content">{{$detail->name}}</span>
                        </div>
                        <div class="detail_result">
                            @if(!empty($detail->caracteres->where('product_id',$product->id)->first()))
                                <span class="detail_result_content">{{$detail->caracteres->where('product_id',$product->id)->first()->value}}</span>
                            @else
                                <span class="detail_result_content">--</span>
                            @endif
                        </div>
                    </div>

                @endforeach
            </div>
    @endforeach

    </div>

@endsection

@section('js')
    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.4/semantic.min.js">    </script>
    <script>

    $('.ui.star.rating.user').rating('disable');

    </script>

@endsection