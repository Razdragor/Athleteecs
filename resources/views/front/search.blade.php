@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/social.admin.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/font-awesome/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/themes/admin/facebook.css') }}">
    <link href="{{ asset('asset/css/friends.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="section-about">
  <div class="panel panel-default section">
    <div class="container">
        <div class="row">
            <div class="section-header">
                <h2 data-animation="bounceInUp" class="section-heading animated titleoffriends">Recherche d'amis</h2>
            </div>
            @if(!empty($results))
                @forelse($results as $friend)
                    @if($friend['id'] !== Auth::user()->id)
                        <div class="col-md-2 onefriend">
                            <div class="team-member">
                                <a href="/user/{{$friend['id']}}">
                                    <figure class="member-photo">
                                        <img class="imgonefriend" src="{{ $friend['picture'] }}" alt="{{ $friend['firstname'] }} {{ $friend['lastname'] }}" width="100px" height="100px">
                                    </figure>
                                    <div class="team-detail">
                                        <h4>{{ $friend['firstname'] }} {{ $friend['lastname'] }}</h4>
                                    </div>
                                </a>
                            </div>
                            <a href="{{ route('front.friends.add', ['friend' => $friend['id']]) }}">Ajouter un ami</a>
                        </div>
                    @endif
                @empty
                    <p class="onefriend">quelque chose</p>
                @endforelse
            @endif
        </div>
    </div>
  </div>
</section>
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
