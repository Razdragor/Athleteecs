@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/social.admin.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/font-awesome/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/themes/admin/facebook.css') }}">
    <link href="{{ asset('asset/css/friends.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container" style="margin-bottom:50px;">
    @if(!empty($results))
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
            <div class="page-header" style="border-bottom-color: #31353E">
                <h2>Personnes</h2>
            </div>
                @foreach($results as $friend)
                    @if($friend['id'] !== Auth::user()->id)
                        <div class="col-sm-4 col-md-2">
                            <div class="team-member">
                                <a href="{{ route('user.show', ['user' => $friend['id']]) }}">
                                    <figure class="member-photo">
                                        <img class="imgonefriend" src="{{ $friend['picture'] }}" alt="{{ $friend['firstname'] }} {{ $friend['lastname'] }}" width="100px" height="100px">
                                    </figure>
                                    <div class="team-detail">
                                        <h4>{{ $friend['firstname'] }} {{ $friend['lastname'] }}</h4>
                                    </div>
                                </a>
                            </div>
                            @if(Auth::user()->isfriend(Auth::user()->id,$friend['id'])==='demandsfrom')
                                <a href="{{ route('front.friends.cancel', ['friend' => $friend['id']]) }}">Annuler la demande</a>

                            @elseif(Auth::user()->isfriend(Auth::user()->id,$friend['id'])==='demandsto')
                                <a href="{{ route('front.friends.accept', ['friend' => $friend['id']]) }}">Accepter la demande</a>
                                <a href="{{ route('front.friends.cancel', ['friend' => $friend['id']]) }}">Refuser la demande</a>

                            @elseif(Auth::user()->isfriend(Auth::user()->id,$friend['id'])==='estami')
                                <a href="{{ route('front.friends.destroy', ['friend' => $friend['id']]) }}">Retirer de la liste d'amis</a>

                            @else
                                <a href="{{ route('front.friends.add', ['friend' => $friend['id']]) }}">Ajouter un ami</a>
                            @endif
                        </div>
                    @endif
                @endforeach
        </div>
    </div>
    @endif
    @if(!empty($resultsAssociation))
        <div class="row">
            <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
                <div class="page-header" style="border-bottom-color: #31353E">
                    <h2>Associations</h2>
                </div>
                @foreach($resultsAssociation as $assos)
                    <div class="col-sm-4 col-md-2">
                        <div class="team-member">
                            <a href="{{ route('association.show', ['association' => $assos['id']]) }}">
                                <figure class="member-photo">
                                    <img class="imgonefriend" src="{{ $assos['picture'] }}" alt="{{ $assos['name'] }}" width="100px" height="100px">
                                </figure>
                                <div class="team-detail">
                                    <h4>{{ $assos['name'] }}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if(!empty($resultsEvent))
        <div class="row">
            <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
                <div class="page-header" style="border-bottom-color: #31353E">
                    <h2>Evènements</h2>
                </div>
                @foreach($resultsEvent as $assos)
                    <div class="col-sm-4 col-md-2">
                        <div class="team-member">
                            <a href="{{ route('association.show', ['association' => $assos['id']]) }}">
                                <figure class="member-photo">
                                    <img class="imgonefriend" src="{{ $assos['picture'] }}" alt="{{ $assos['name'] }}" width="100px" height="100px">
                                </figure>
                                <div class="team-detail">
                                    <h4>{{ $assos['name'] }}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection

@section('js')
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>
        $(function(){
             $( "#terme" ).autocomplete({
                  source: "{{ url('friends/search') }}",
                  minLength: 3,
                  select: function(event, ui) {
                    $('#terme').val(ui.item.value);
              }
            });
        });
    </script>
@endsection
