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
                <h2 data-animation="bounceInUp" class="section-heading animated titleoffriends">Groupe</h2>
            </div>
            
            <h3>Membres</h3>
            @foreach($group->users as $group_user)
            <div class="col-md-2 onefriend">
              <div class="team-member">
                 <a href="/user/{{ $group_user->id }}">
                     <figure class="member-photo">
                         <img class="imgonefriend" src="{{ $group_user->picture }}" alt="{{ $group_user->firstname }} {{ $group_user->lastname }}" width="100px" height="100px">
                     </figure>
                     <div class="team-detail">
                         <h4>{{ $group_user->firstname }} {{ $group_user->lastname }}</h4>
                     </div>
                 </a>
              </div>
                <a href="">Retirer du groupe</a>
            </div>
            @endforeach
            
            
            <h3>Actualité du groupe :</h3>
            
        </div>
    </div>
  </div>
</section>
@endsection

@section('js')
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
@endsection
