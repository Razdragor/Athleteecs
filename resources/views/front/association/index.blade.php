@extends('layouts.front')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div style="width: 90%;margin:auto;position: relative">
                <div><h1>Associations <small>({{ $associations->count()}})</small></h1></div>
                <div style="position: absolute;right: 0px;top:20px">
                    <a href="{{ route('association.create') }}" class="btn btn-default btn-xs">Créer une association</a>
                </div>
            </div>
            <div style="border-bottom: solid black 1px;width: 90%;margin:auto"></div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div id="map" style="height: 500px;"></div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div id="filters">
                    @if(count($userSports) > 0)
                        <h4>Mes Sports</h4>
                        <ul class="list-unstyled">
                            @foreach($userSports as $sport)
                                <li>
                                    <input type="checkbox" name="{{ $sport->id}}"> {{ $sport->name}}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if(count($sports) > 0)
                        <h4>Autres Sports</h4>
                        <ul class="list-unstyled">
                            @foreach($sports as $sport)
                                <li>
                                    <input type="checkbox" name="{{ $sport->id}}"> {{ $sport->name}}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div id="associationsFilters">

            </div>
        </div>
            @foreach($associations as $association)
            <div class="row media" style="padding: 30px;">
                <div class="col-lg-2 col-sm-12">
                    <div class="media-left media-middle">
                        <a href="{{ route("association.show", ["association" => $association->association_id]) }}">
                            <img class="media-object" src="{{ $association->association->picture }}" alt="..." width="100%">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-12">
                    <h4 class="media-heading">{{$association->association->name}}</h4>
                    <span>{{$association->association->description}}</span>
                </div>
            </div>
            @endforeach
    </div>
@endsection

@section('js')
    <script>
        function init(){
            initMap();
        }
        var myLatLng = {lat: 48.866667, lng: 2.333333};
        var map;
        var markers = [];
        var sportsChecked = [];
        var bounds = new google.maps.LatLngBounds();
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 5
            });
        }
        // Adds a marker to the map and push to the array.
        function addMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            bounds.extend(marker.position);
            markers.push(marker);
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }

        // Shows any markers currently in the array.
        function showMarkers() {
            setMapOnAll(map);
            map.fitBounds(bounds);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }

        Array.prototype.unpush(id)
        {
            for(var i =0;i < this.length;i++){
                if(this[i] == id){
                    delete this[i];
                }
            }
            return this;
        }

        $('body').on('change','#filters input:checkbox', function(e){
            e.preventDefault();
            if(this.checked) {
                sportsChecked.push($(this).attr("name"));
            }
            else{
                sportsChecked.unpush($(this).attr("name"));
            }

            bindassociation();
        });

        function bindassociation(){
            e.preventDefault();
            $.ajax({
                url: "/association/search",
                type: "post",
                dataType: 'json', // selon le retour attendu
                data: {'sports': sportsChecked},
                success: function(data) {
                    if(data['success'] == true){
                        var associations = data['associations'];
                        var div = $('#associationsFilters');
                        associations.forEach(function(a){
                            var location = {lat: parseFloat(a.lattitude), lng: parseFloat(a.longitude) };
                            addMarker(location);
                            if(div){
                                div.append("<div class='col-md-8 col-sm-12'>" +
                                            "<img src='"+ a.picture +"' alt='"+ a.name +"'>"+
                                            "<div>" +
                                                "<h5>"+ a.name +"</h5>"+
                                                "<div>" + a.description + "</div>"+
                                                "<div>"+
                                                    "<a href='/association/"+ a.id +"'>Accèder</a>"+
                                                "</div>"+
                                            "</div>"+
                                        "</div>");
                            }
                        });
                        setMapOnAll(map);
                    }
                }
            });
        }
        // [END region_geolocation]
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWyHTNe168m9pt0cOiXjlIL9BBUaYT2SI&libraries=geometry,places&callback=init"
            async defer></script>
@endsection
