@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" style="margin-bottom: 25px;">
        <div class="container">
                <h1>Associations</h1>
                <div style="position: absolute;right: 0px;top:20px">
                    <a href="{{ route('association.create') }}" class="btn btn-default btn-xs">Créer une association</a>
                </div>
            <div style="border-bottom: solid black 1px;width: 100%;margin:auto auto 20px auto"></div>
        </div>
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div id="map" style="height: 500px;"></div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div id="filters">
                    @if(count($userSports) > 0)
                        <h4>Mes Sports</h4>
                        <ul class="list-unstyled">
                            @foreach($userSports as $sport)
                                <li>
                                    <input type="checkbox" name="{{ $sport->id}}" checked="checked"> {{ $sport->name}}
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
            <div class="col-md-9 col-sm-9" id="associationsFilters">

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function init(){
            initMap();
            loadcheckbox();
        }
        var myLatLng = {lat: 48.866667, lng: 2.333333};
        var map;
        var markers = [];
        var sportsChecked = [];
        var bounds;
        var checkboxs = $("#filters input:checkbox:checked");
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 6
            });
            bounds = new google.maps.LatLngBounds();
        }
        // Adds a marker to the map and push to the array.
        function addMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                bounds.extend(markers[i].getPosition());
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

        Array.prototype.unpush = function(id)
        {
            for(var i =0;i < this.length;i++){
                if(this[i] == id){
                    delete this[i];
                }
            }
            return this;
        };

        function loadcheckbox(){
            console.log(checkboxs);
            if(checkboxs.length > 0){
                for(var i = 0;i < checkboxs.length;i++){
                   sportsChecked.push(checkboxs[i].name);
                }
                bindassociation();
            }
        }

        $('body').on('change','#filters input:checkbox', function(e){
            if (this.checked) {
                sportsChecked.push($(this).attr("name"));
            }
            else {
                sportsChecked.unpush($(this).attr("name"));
            }
            bindassociation();
        });

        function bindassociation(){
            $.ajax({
                url: "/association/search",
                type: "post",
                dataType: 'json', // selon le retour attendu
                data: {'sports': sportsChecked},
                success: function(data) {
                    var div = $('#associationsFilters');
                    if(data['success'] == true){
                        var associations = data['associations'];
                        div.empty();
                        deleteMarkers();
                        associations.forEach(function(a){
                            var location = {lat: parseFloat(a.lattitude), lng: parseFloat(a.longitude) };
                            addMarker(location);
                            if(div){
                                div.append("<div class='col-sm-12 filter-event'>" +
                                                "<div class='col-sm-3'>" +
                                                    "<img src='"+ a.picture +"' alt='"+ a.name +"' class='img-responsive img-filter-association'>"+
                                                "</div>" +
                                                "<div class='col-sm-12 col-md-8'>" +
                                                    "<h3>"+ a.name +"</h3>"+
                                                    "<div class='slimScrollDiv'>"+
                                                    "<div class='scroll'>" + a.description + "</div>"+
                                                    "<div class='slimScrollBar'></div>"+
                                                    "<div class='slimScrollRail'></div>"+
                                                    "</div>"+
                                                    "<div class='link'>"+
                                                        "<a href='/association/"+ a.id +"'>Accèder</a>"+
                                                    "</div>"+
                                                "</div>"+
                                            "</div>");
                            }
                        });
                        showMarkers();
                    }
                    else{
                        div.empty();
                        deleteMarkers();
                    }
                }
            });
        }
        // [END region_geolocation]
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWyHTNe168m9pt0cOiXjlIL9BBUaYT2SI&libraries=geometry,places&callback=init"
            async defer></script>
@endsection