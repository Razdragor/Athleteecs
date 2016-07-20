@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/social.admin.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/font-awesome/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/themes/admin/facebook.css') }}">
    <link href="{{ asset('asset/css/friends.css') }}" rel="stylesheet">
@endsection

@section('content')
<?php
$user = Auth::user();
?>
<section class="section-about">
  <div class="panel panel-default section">
    <div class="container">
        <div class="row">
            <div class="section-header">
                <h2 data-animation="bounceInUp" class="section-heading animated titleoffriends">Groupe</h2>
            </div>
            
            <form action="/groups/create" method="post" enctype="multipart/form-data">
                <div class="row">
                <label for="name" class="col-xs-4 col-xs-offset-1">
                   Nom du groupe : <input id="name" type="text" class="form-control" name="name"> 
                </label>
                
                <label for="picture" class="col-xs-4 col-xs-offset-2">
                   Image du groupe : <input id="picture" type="file" name="picture"> 
                </label>
                
                </div>
                
                <div class="row">
                <h3 class="text-center">Participants:</h3>
                 @forelse($user->friends as $friend)
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
                        <a href="">Ajouter au groupe</a>
                    </div>
                @empty
                <p class="onefriend">Vous n'avez pas encore ajoutés d'amis.</p>
                @endforelse
                </div>
            </form>
            
        </div>
    </div>
  </div>
</section>
@endsection

@section('js')
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
@endsection