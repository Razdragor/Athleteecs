@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/plugins/jasny-bootstrap/jasny-bootstrap.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <style type="text/css">
        html, body { height: 100%; margin: 0; padding: 0; }
        #map {height: 500px; }
    </style>
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div style="width: 90%;margin:auto;">
                <div><h1>Créer votre événement </h1></div>
            </div>
            <div style="border-bottom: solid black 1px;width: 90%;margin:auto"></div>
        </div>
        <div class="row" style="margin-top: 40px;">
            <form action="{{ route('event.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal form_valid" data-toggle="validator">
                {{ csrf_field() }}
                <input id="street_number" name="street_number" disabled="disabled" type="hidden"  value="{{ old('street_number') }}">
                <input id="route" name="route" disabled="disabled" type="hidden" value="{{ old('route') }}">
                <input id="locality" name="locality" disabled="disabled" type="hidden" value="{{ old('locality') }}">
                <input id="region" name="region" disabled="disabled" type="hidden" value="{{ old('region') }}">
                <input id="postal_code" name="postal_code" disabled="disabled" type="hidden" value="{{ old('postal_code') }}">
                <input id="country" name="country" disabled="disabled" type="hidden" value="{{ old('country') }}">
                <input id="lattitude" name="lattitude" type="hidden" value="{{ old('lat') }}">
                <input id="longitude" name="longitude" type="hidden" value="{{ old('lng') }}">
                @if(isset($association_id))
                <input id="association_id" name="association_id" type="hidden" value="{{ $association_id }}">
                @endif
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
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
                                        <option value="{{ $sport->id }}">
                                            {{ $sport->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="picture" id="picture" required>
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
                                <textarea style="resize: none" rows="4" class="form-control" name="description" id="description" required>{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                                                

                        <div class="form-group">
                            <label for="datetimepicker5" class="col-sm-2 control-label">Date de début :</label>
                            <div class="col-sm-10 date" id="datetimepicker5">
                                <input type="text" data-format="yyyy-MM-dd hh:mm:ss" class="form-control" placeholder="__/__/____ __:__" name="date_start_act" required>
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
                                <input type="text" data-format="yyyy-MM-dd hh:mm:ss" class="form-control" placeholder="__/__/____ __:__" name="date_end_act" required>
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
                            <label class="col-sm-2 control-label" for="description">Adresse</label>
                            <div class="col-sm-10">
                                <input id="autocomplete" placeholder="Indiquez une adresse" onFocus="geolocate()" type="text" class="form-control" required>
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
                                    <input type="radio" class="radio-inline" name="private" value="0"  checked="checked"> Non
                                    <input type="radio" class="radio-inline" name="private" value="1"> Oui
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default" style="float:right">Créer l'événement</button>
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
        
        $('body').on('submit','.form_valid',function(e){
            var date_start = $('input[name="date_start_act"]').val();
            var date_end = $('input[name="date_end_act"]').val();
            
            var date_array = date_start.split("/");
            var year = date_array[2].split(" ");
            var final_date = year[0] + '-' + date_array[1] + '-' + date_array[0] + ' ' + year[1]+':00';
            $('input[name="date_start_act"]').val(final_date);
            
            var date_array = date_end.split("/");
            var year = date_array[2].split(" ");
            var final_date = year[0] + '-' + date_array[1] + '-' + date_array[0] + ' ' + year[1]+':00';
            $('input[name="date_end_act"]').val(final_date);
            
            
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWyHTNe168m9pt0cOiXjlIL9BBUaYT2SI&libraries=geometry,places&callback=init"
            async defer></script>
    <script src="{{ asset('asset/js/plugins/moment.js/moment-with-locales.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/bootstrap-datetimepicker/locales/bootstrap-datetimepicker.fr.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('asset/js/scroll.js') }}"></script>
@endsection