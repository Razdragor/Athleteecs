@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/product.css') }}" rel="stylesheet">

@endsection

@section('content')
    <div class="container">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <div class="container">
            <h1>Liste des équipements</h1>

            <div class="text-right" style="position: absolute;right: 40px;top: 100px;">
                <a href="{{ route('product.create') }}" >Ajouter un produit</a>
            </div>
            <div style="border-bottom: solid black 1px;width: 100%;margin:auto auto 20px auto"></div>
            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('product.search') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="">Sports </label>
                    <select class="form-control input-sm" name="sport" id="sport">
                        @if($old_sport_id)
                            <option value="{{$old_sport_id}}">{{$old_sport_name}}</option>
                        @endif
                            <option value="0">Tous les sports</option>

                        @foreach($sports as $sport)
                            @if($old_sport_id != $sport->id)
                                    <option value="{{$sport->id}}">{{$sport->name}}</option>
                                @endif
                        @endforeach
                    </select>
                    <label for="">Catégorie</label>
                        <select class="form-control input-sm" name="category" id="category">
                            @if($old_category_id)
                                <option value="{{$old_category_id}}">{{$old_category_name}}</option>
                            @endif
                                <option value="0">Toutes les catégories</option>
                            @foreach($categories as $category)
                                @if($old_category_id != $category->id)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                            @endforeach
                    </select>
                </div>
                <button type="submit" class="btn">Filtrer</button>
            </form>
        </div>
        @if($old_category_id != 0)
            <div class="container">
                <div id="product_list">
                    <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('product.compare') }}">
                        {{ csrf_field() }}
                    @foreach($products as $product)
                            <div class="product product_compare col-md-2" id="{{$product->id}}">
                                <div class="product_image">
                                    <a href="{{ route('product.show', ['product' => $product]) }}">
                                        <img alt="{{$product->name}}" src="{{asset($product->picture)}}" class="product_visuel" height="180px" width="180px" style="display: block">
                                    </a>
                                </div>
                                <div class="checkbox-correct">
                                    <input type="checkbox" class="check" id="checkcompare" name="productcompare[]" value="{{$product->id}}" >
                                    <span class="indicator">COMPARER CE PRODUIT</span>
                                </div>
                                <div class="product_info">
                                    <div class="rating product__list_left" id="{{ $product->id }}">
                                        @if($product->ratesvalue() != 0 )
                                            <div class="ui star rating user" data-rating="{{ceil($product->ratesvalue())}}" data-max-rating="5"></div>
                                        @else
                                            <div class="ui star rating user" data-rating="0" data-max-rating="5"></div>
                                        @endif
                                        <div class="more_info_star">
                                    <span class="info_it">Note des utilisateurs :
                                    <span class='info_enstock'><strong>{{ceil($product->ratesvalue())}}/5</strong></span></span><br/>
                                            <span class='info_count'><strong>{{ $product->ratescount()}} avis</strong></span>
                                        </div>
                                    </div>
                                    <a href="#" class="product_brand product__list_left">{{$product->brand->name}}</a>
                                    <a href="{{ route('product.show', ['product' => $product])}}" class="product_name product__list_left">{{$product->name}}</a>
                                    <div class="product_price_compare">
                                        <span class="a_partir_de">À partir de</span>
                                        <span class="product_price_span">{{$product->price}} €</span>
                                    </div>
                                    <div class="more_info">
                                        <div class="more_info_content">
                                            <a href="{{ route('product.show', ['product' => $product])}}" class="more_info_title" title="">
                                                PLUS D’INFOS
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <button type="submit" id="compareButton" class="btn" style="float: right;background-color: #B9121B;color: white;">Comparer</button>
                    </form>
                </div>
            </div>

        @else
            <div class="container">
                <div id="product_list">
                    @foreach($products as $product)
                    <div class="product col-md-2" id="{{$product->id}}">
                        <div class="product_image">
                            <a href="{{ route('product.show', ['product' => $product]) }}">
                                <img alt="{{$product->name}}" src="{{asset($product->picture)}}" class="product_visuel" height="180px" width="180px" style="display: block">
                            </a>
                        </div>
                        <div class="product_info">
                            <div class="rating product__list_left" id="{{ $product->id }}">
                                @if($product->ratesvalue() != 0 )
                                    <div class="ui star rating user" data-rating="{{ceil($product->ratesvalue())}}" data-max-rating="5"></div>
                                @else
                                    <div class="ui star rating user" data-rating="0" data-max-rating="5"></div>
                                @endif
                                <div class="more_info_star">
                                    <span class="info_it">Note des utilisateurs :
                                    <span class='info_enstock'><strong>{{ceil($product->ratesvalue())}}/5</strong></span></span><br/>
                                    <span class='info_count'><strong>{{ $product->ratescount()}} avis</strong></span>
                                </div>
                            </div>
                            <a href="#" class="product_brand product__list_left">{{$product->brand->name}}</a>
                            <a href="{{ route('product.show', ['product' => $product])}}" class="product_name product__list_left">{{$product->name}}</a>
                            <div class="product_price">
                                <span class="a_partir_de">À partir de</span>
                                <span class="product_price_span">{{$product->price}} €</span>
                            </div>
                            <div class="more_info">
                                <div class="more_info_content">
                                    <a href="{{ route('product.show', ['product' => $product])}}" class="more_info_title" title="">
                                        PLUS D’INFOS
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif

            {!! $products->render() !!}

        </div>
    </div>
@endsection


@section('js')
    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.4/semantic.min.js">    </script>
    <script>

        $('#compareButton').hide();
        $('.more_info').hide();
        $('.more_info_star').hide();


        $('.rating.product__list_left').hover(
            function() {
                $(this).find( ".more_info_star").show();
            }, function() {
                $('.more_info_star').hide();
            }
        );


        $(".product.col-md-2").hover(
                function() {
                    $(this).find( ".more_info").show();
                }, function() {
                    $('.more_info').hide();
                }
        );


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
                                var child = parent.children();

                                child.rating('disable');
                            }
                            else
                            {
                                console.log("failed");
                            }
                        }
                    });
                });

        $("body").on('change','#sport' ,function(e){
            var sport_id = e.target.value;
            $.get('/product-ajax?sport_id='+ sport_id,function(data)
            {
                $('#category').empty();
                $('#category').append('<option value="0">Toutes les catégories</option>');

                $.each(data, function(index, categories){
                    $.each(categories, function(tab, category)
                    {
                        $('#category').append('<option value="'+category.id+'">'+category.name+'</option>');
                    })
                });
            });
        });
        $("body").on('change','#checkcompare' ,function(e)
        {
            if($('.check:checked').size() >= 2 && $('.check:checked').size() <= 5)
            {
                $('#compareButton').show();
            }
            else{
                $('#compareButton').hide();
            }
        });
        $("body").on('click','#beginCompare' ,function(e)
        {
            $('.check').toggle();
        });


    </script>

@endsection