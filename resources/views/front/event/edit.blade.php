@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/plugins/jasny-bootstrap/jasny-bootstrap.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <style type="text/css">
        html, body { height: 100%; margin: 0; padding: 0; }
        #map {height: 500px; }
    </style>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div style="width: 90%;margin:auto;">
                <div><h1>Modifier votre événement </h1></div>
            </div>
            <div style="border-bottom: solid black 1px;width: 90%;margin:auto"></div>
        </div>
        <div class="row" style="margin-top: 40px;">
            <form action="{{ route('event.update', ['event' => $event->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal form_valid" data-toggle="validator">
                <div class="col-md-12">
                {{ csrf_field() }}
                <input id="street_number" name="street_number" type="hidden"  value="{{ old('street_number',isset($event->number_street) ? $event->number_street : null) }}">
                <input id="route" name="route" type="hidden" value="{{ old('route',isset($event->address) ? $event->address : null) }}">
                <input id="locality" name="locality" type="hidden" value="{{ old('locality',isset($event->city) ? $event->city : null)}}">
                <input id="region" name="region" type="hidden" value="{{ old('region',isset($event->region) ? $event->region : null) }}">
                <input id="postal_code" name="postal_code"  type="hidden" value="{{ old('postal_code',isset($event->city_code) ? $event->city_code : null) }}">
                <input id="country" name="country"  type="hidden" value="{{ old('country',isset($event->country) ? $event->country : null) }}">
                <input id="lattitude" name="lattitude" type="hidden" value="{{ old('lattitude',isset($event->lattitude) ? $event->lattitude : null) }}">
                <input id="longitude" name="longitude" type="hidden" value="{{ old('longitude',isset($event->longitude) ? $event->longitude : null) }}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', isset($event->name) ? $event->name : null) }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sport" class="col-sm-2 control-label">Sport :</label>
                            <div class="col-sm-10">
                                <select id="select-beast" class="form-control" name="sport" required>
                                    @foreach($sports as $sport)
                                        <?php
                                            $select = "";
                                            if($sport->id == $event->sport_id){
                                                $select = "selected";
                                            }
                                        ?>
                                        <option value="{{ $sport->id }}" {{ $select }}>
                                            {{ $sport->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="picture" id="picture">
                                <span id="helpBlock" class="help-block">A remplir seulement si vous voulez modifier l'image</span>
                                @if ($errors->has('picture'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('picture') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="description">Description</label>
                            <div class="col-sm-10">
                                <textarea style="resize: none" rows="4" class="form-control" name="description" id="description" required>{{ old('description', isset($event->description) ? $event->description : null) }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        <div class="form-group">
                            <label for="datetimepicker5" class="col-sm-2 control-label">Date de début :</label>
                            <div class="col-sm-10 date" id="datetimepicker5">
                                <input type="text" class="form-control" placeholder="__/__/____ __:__" name="date_start_act" value="{{ $event->started_at }}">
                                <span class="input-group-addon">
                                    <i class="fa-calendar fa"></i>
                                </span>
                                @if ($errors->has('date_start_act'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_start_act') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="datetimepicker6" class="col-sm-2 control-label">Date de fin :</label>
                            <div class="col-sm-10 date" id="datetimepicker6">
                                <input type="text" class="form-control" placeholder="__/__/____ __:__" name="date_end_act" value="{{ $event->end_at }}">
                                <span class="input-group-addon">
                                <i class="fa-calendar fa"></i>
                                </span>
                                @if ($errors->has('date_end_act'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_end_act') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="address" required >Adresse</label>
                            <div class="col-sm-10">
                                <?php
                                    $address = "";
                                    isset($event->number_street) ? $address .= $event->number_street. " " : "";
                                    isset($event->address) ? $address .= $event->address. " " : "";
                                    isset($event->city) ? $address .= $event->city. " " : "";
                                    isset($event->region) ? $address .= $event->region. " " : "";
                                    isset($event->country) ? $address .= $event->country. " " : "";
                                ?>
                                <input id="autocomplete" placeholder="Indiquez une adresse" onFocus="geolocate()" type="text" class="form-control" value="{{ $address }}">
                                @if ($errors->has('lattitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lattitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="private">Privé</label>
                            <div class="col-sm-10">
                                <div id="private">
                                    @if($event->private)
                                    <input type="radio" class="radio-inline" name="private" value="0"> Non
                                    @else
                                    <input type="radio" class="radio-inline" name="private" value="0" checked="checked"> Non
                                    @endif
                                    @if($event->private)
                                    <input type="radio" class="radio-inline" name="private" value="1" checked="checked"> Oui
                                    @else
                                    <input type="radio" class="radio-inline" name="private" value="1"> Oui
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a href="{{ route('event.show', ['event' => $event->id]) }}" class="btn btn-default">Retour</a>
                                <button type="submit" class="btn btn-default">Editer l'event</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div id="map"></div>
                    </div>
                </div>
            </form>
            
            <div class="col-md-12">
                <div class="col-md-6">
                    <form action="{{ route('event.showuser') }}" method="post" enctype="multipart/form-data" class="form-horizontal" data-toggle="validator">
                        @if($event->private)
                        <div id="authorised_friends" class="form-group">
                        @else
                        <div id="authorised_friends" class="form-group hidden">
                        @endif
                            <label class="col-sm-2 control-label" for="authorised">Autoriser un utilisateur :</label>
                            <div class="col-sm-10">
                                <input type="text" id="authorised" name="is_authorised" placeholder="Entrez le nom d'un ami..." class="form-control" autocomplete="off">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <div class="autocomplete_json"></div>
                            </div>
                        </div>
                    </form>
                    <div id="authorised_members" class="form-group">
                        
                        @if($event->private)
                        Utilisateurs autorisés :
                        @endif
                        @foreach($event->authorisedMembers as $authorisedMember)
                            @if($authorisedMember->is_authorised)
                                <form action="{{ route('event.deleteuser') }}" method="post" enctype="multipart/form-data" class="form-horizontal form_event_delete_user" data-toggle="validator">
                                    <span class="event_delete_user">{{ $authorisedMember->user->firstname }} {{ $authorisedMember->user->lastname }} <i class="fa fa-close"></i></span>
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <input type="hidden" name="friend_id" value="{{ $authorisedMember->user->id }}">
                                </form>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
                <div class='return'></div>
                    
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/plugins/jasny-bootstrap/jasny-bootstrap.min.js') }}"></script>
    <script>
        function init(){
            initMap();
            initAutocomplete();
        }
        var myLatLng = {lat: 48.866667, lng: 2.333333};
        var map;
        var marker;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 5
            });

            marker = new google.maps.Marker({
                position: myLatLng,
                map: map
            });

        }
        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            region: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                    {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        // [START region_fillform]
        function fillInAddress() {
            marker.setVisible(false);
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(5);
            }

            document.getElementById("longitude").value = place.geometry.location.lng();
            document.getElementById("lattitude").value = place.geometry.location.lat();
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
        }
        // [END region_fillform]

        // [START region_geolocation]
        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }
        // [END region_geolocation]
        
        $('body').on('submit','.form_valid',function(e){
            var date_start = $('input[name="date_start_act"]');
            var date_end = $('input[name="date_end_act"]');
            
            var date_array = date_start.split("/");
        });
        
        $('body').on('click','.event_delete_user',function(e){
            e.preventDefault();
            $(this).parent().submit();
        });
        
        
        $('body').on('submit','.form_event_delete_user',function(e){
            e.preventDefault();
            var form = $(this);
            var fdata = $(this).serialize();
            
            $.ajax({
                type:'POST',
                url:$(this).attr("action"),
                data:fdata,
                processData: false,
                success:function(data) {
                    console.log('Success !');
                    $(form).remove();
                },
                error:function(jqXHR)
                {
                    $('.return').html(jqXHR.responseText);

                }
            }); 
        });
        
        
        $('body').on('click','input[type="radio"]',function(e){
            if($(this).val() == 1)
            {
                $('#authorised_friends').show();
            }
            else
            {
                $('#authorised_friends').hide();
            }
        });
        
        $('body').on('keyup','#authorised',function(e){
            e.preventDefault();
                var form = $(this).parent().parent().parent();
                var fdata = $(form).serialize();
                console.log($(form));
                console.log($(form).attr("action"));
                $.ajax({
                type:'POST',
                url:$(form).attr("action"),
                data:fdata,
                processData: false,
                success:function(data) {
                    console.log('Success !');
                    console.log(data);
                    var to_append='';
                    $.each(data.friends,function(i,friend){
                        to_append = to_append+'<span value="'+friend.id+'" class="event_show_user_span">'+friend.firstname+' '+friend.lastname+'</span>';
                    });
                    $('.autocomplete_json').html(to_append);
                },
                error:function(jqXHR)
                {
                    $('.return').html(jqXHR.responseText);

                }
            }); 
        });
        
        $('body').on('click','.event_show_user_span', function(e){
            var event_friend_id = $(this).attr('value');
            $(this).parent().parent().append('<input type="hidden" name="friend_id" value="'+event_friend_id+'">'); //ajout de l'input

            var fdata = $(this).parent().parent().parent().parent().serialize();
            console.log(fdata);
            var route = "{{ route('event.deleteuser') }}";
            $.ajax({
                type:'POST',
                url:"{{ route('event.authorise') }}",
                data:fdata,
                processData: false,
                success:function(data) {
                    console.log('Success !');
                    console.log(data);
                    var to_append = '<form action="'+route+'" method="post" enctype="multipart/form-data" class="form-horizontal form_event_delete_user" data-toggle="validator"><span class="event_delete_user">'+data.friend.firstname+' '+data.friend.lastname+'<i class="fa fa-close"></i></span><input type="hidden" name="event_id" value="'+data.event_id+'"><input type="hidden" name="friend_id" value="'+data.friend.id+'"></form>';
                    $('#authorised_members').append(to_append);
                },
                error:function(jqXHR)
                {
                    $('.return').html(jqXHR.responseText);
                }
            });
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWyHTNe168m9pt0cOiXjlIL9BBUaYT2SI&libraries=geometry,places&callback=init"
            async defer></script>
    <script src="{{ asset('asset/js/plugins/moment.js/moment-with-locales.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/bootstrap-datetimepicker/locales/bootstrap-datetimepicker.fr.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('asset/js/scroll.js') }}"></script>

@endsection