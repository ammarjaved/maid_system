@extends('layouts.vertical', ['page_title' => 'Client'])



@section('content')






{{-- <script src="{{ asset('js/map.js') }}" defer></script> --}}


<div id="map" style="height: 400px; marign :20px ;margin-top:100px"></div>
<button onclick="check()" >asdhasduh</button>








@endsection

@section('script')


<script type="text/javascript" >


    map = L.map('map').setView([3.016603, 101.858382], 11);
    document.getElementById('map').style.cursor = 'pointer'



    var st=L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
    //.addTo(map);
    var st1=L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);

    var drawnItems = new L.FeatureGroup();
         map.addLayer(drawnItems);
    var drawControl = new L.Control.Draw({
draw :{
circle:true,
marker: false,
polygon:true,
polyline:false,
rectangle:true
},
edit: {
featureGroup: drawnItems
}
});
// add draw tools

map.addControl(drawControl);
$(".leaflet-draw-draw-circlemarker").hide();


map.on('draw:created', function (e) {

var type = e.layerType;

layer = e.layer;
console.log(type);
console.log(layer.toGeoJSON());


})

</script>
@endsection


