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
                <div><h1>Modifier votre association </h1></div>
            </div>
            <div style="border-bottom: solid black 1px;width: 90%;margin:auto"></div>
        </div>
        <div class="row" style="margin-top: 40px;">
            <form action="{{ route('association.update', ['association' => $association->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal" data-toggle="validator">
                {{ csrf_field() }}
                <input id="street_number" name="street_number" type="hidden"  value="{{ old('street_number',isset($association->number_street) ? $association->number_street : null) }}">
                <input id="route" name="route" type="hidden" value="{{ old('route',isset($association->address) ? $association->address : null) }}">
                <input id="locality" name="locality" type="hidden" value="{{ old('locality',isset($association->city) ? $association->city : null)}}">
                <input id="region" name="region" type="hidden" value="{{ old('region',isset($association->region) ? $association->region : null) }}">
                <input id="postal_code" name="postal_code"  type="hidden" value="{{ old('postal_code',isset($association->city_code) ? $association->city_code : null) }}">
                <input id="country" name="country"  type="hidden" value="{{ old('country',isset($association->country) ? $association->country : null) }}">
                <input id="lattitude" name="lattitude" type="hidden" value="{{ old('lattitude',isset($association->lattitude) ? $association->lattitude : null) }}">
                <input id="longitude" name="longitude" type="hidden" value="{{ old('longitude',isset($association->longitude) ? $association->longitude : null) }}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', isset($association->name) ? $association->name : null) }}" required>
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
                                            if($sport->id == $association->sport_id){
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
                                <textarea style="resize: none" rows="4" class="form-control" name="description" id="description" required>{{ old('description', isset($association->description) ? $association->description : null) }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="address" required >Adresse</label>
                            <div class="col-sm-10">
                                <?php
                                    $address = "";
                                    isset($association->number_street) ? $address .= $association->number_street. " " : "";
                                    isset($association->address) ? $address .= $association->address. " " : "";
                                    isset($association->city) ? $address .= $association->city. " " : "";
                                    isset($association->region) ? $address .= $association->region. " " : "";
                                    isset($association->country) ? $address .= $association->country. " " : "";
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
                            <label class="col-sm-2 control-label" for="facebook">Facebook</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="facebook" id="facebook" value="{{ old('facebook') }}">
                                @if ($errors->has('facebook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="twitter">Twitter</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="twitter" id="twitter" value="{{ old('twitter') }}">
                                @if ($errors->has('twitter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="google">Google</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="google" id="google" value="{{ old('google') }}">
                                @if ($errors->has('google'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('google') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a href="{{ route('association.show', ['association' => $association->id]) }}" class="btn btn-default">Retour</a>
                                <button type="submit" class="btn btn-default">Editer l'association</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div id="map"></div>
                    </div>

            </form>
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
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWyHTNe168m9pt0cOiXjlIL9BBUaYT2SI&libraries=geometry,places&callback=init"
            async defer></script>

@endsection