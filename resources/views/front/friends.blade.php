@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/social.admin.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/font-awesome/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/themes/admin/facebook.css') }}">
    <link href="{{ asset('asset/css/friends.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="section-about">
  <div class="panel panel-default section">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6">
          <div class="section-header">
            <h2 data-animation="bounceInUp" class="section-heading animated titleoffriends">Mes amis</h2>
          </div>
        </div>
      </div>
      <div class="row">
        @forelse($user->friends as $friend)
        <div class="col-md-2 onefriend">
          <div class="team-member">
             <a href="{{  route('user.show', ['user' => $friend])  }}">
                 <figure class="member-photo">
                     <img class="imgonefriend" src="{{ $friend->picture }}" alt="{{ $friend->firstname }} {{ $friend->lastname }}" width="100px" height="100px">
                 </figure>
                 <div class="team-detail">
                     <h4>{{ $friend->firstname }} {{ $friend->lastname }}</h4>
                 </div>
             </a>
          </div>
            <a href="{{ route('front.friends.destroy', ['friend' => $friend]) }}">Retirer de la liste d'amis</a>
        </div>
        @empty
        <p class="onefriend">Vous n'avez pas encore ajoutés d'amis.</p>
        @endforelse
      </div>
        @if($user->demandsto)
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="section-header">
                    <h2 data-animation="bounceInUp" class="section-heading animated titleoffriends">Mes demandes reçues</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($user->demandsto as $friend)
                <div class="col-md-2 onefriend">
                    <div class="team-member">
                        <a href="/user/{{ $friend->id }}">
                            <figure class="member-photo">
                                <img class="imgonefriend" src="{{ $friend->picture }}" alt="{{ $friend->firstname }} {{ $friend->lastname }}" width="100px" height="100px">
                            </figure>
                            <div class="team-detail">
                                <h4>{{ $friend->firstname }} {{ $friend->lastname }}</h4>
                            </div>
                        </a>
                    </div>
                    <a href="{{ route('front.friends.accept', ['friend' => $friend]) }}">Accepter la demande</a>
                    <a href="{{ route('front.friends.cancel', ['friend' => $friend]) }}">Refuser la demande</a>
                </div>
            @empty
                <p class="onefriend">Vous n'avez pas de demandes reçues en attente.</p>
            @endforelse
        </div>
        @endif
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="section-header">
                    <h2 data-animation="bounceInUp" class="section-heading animated titleoffriends">Mes demandes envoyées</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($user->demandsfrom as $friend)
                <div class="col-md-2 onefriend">
                    <div class="team-member">
                        <a href="/user/{{ $friend->id }}">
                            <figure class="member-photo">
                                <img class="imgonefriend" src="{{ $friend->picture }}" alt="{{ $friend->firstname }} {{ $friend->lastname }}" width="100px" height="100px">
                            </figure>
                            <div class="team-detail">
                                <h4>{{ $friend->firstname }} {{ $friend->lastname }}</h4>
                            </div>
                        </a>
                    </div>
                    <a href="{{ route('front.friends.cancel', ['friend' => $friend]) }}">Annuler la demande</a>
                </div>
            @empty
                <p class="onefriend">Vous n'avez pas de demandes envoyées en cours.</p>
            @endforelse
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
