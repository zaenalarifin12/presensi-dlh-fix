@extends('layouts.parent')

@section('css')
<style>
    #map {
        height: 500px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
        position: fixed;
    }    
</style>
@endsection

@section("content")
<div class="section">
    <div class="section-header">
        <h1>Maps</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">Marker</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h4>Marker</h4>
                </div>
                <div class="card-body">
                    <div id="map" ></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {
              lat: -6.5797938, lng: 110.6552771
            },
          zoom: 11
        });

        var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Nama Lokasi</h1>'+
      '<div id="bodyContent">'+
      `<img src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />`
      '(last visited June 22, 2009).</p>'+
      '</div>'+
      '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var marker = new google.maps.Marker({
        position: {
            lat : -6.5834685,
            lng: 110.6590514
        },
        map: map,
        title: 'Uluru (Ayers Rock)'
    });
    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });
    }
    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVMD6bjK134f-wIqrcTQ0skB7uXUj6PWQ&callback=initMap" async defer></script>
@endsection