@extends('layouts.vertical', ['page_title' => 'Boundary'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">CLient</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Boundary</a></li>
                        <li class="breadcrumb-item active">index</li>
                    </ol>
                </div>
                <h4 class="page-title">Boundary</h4>
            </div>
        </div>
    </div>


    <div class="row ">
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <div class="card ">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="">Boundary</h2>
                        </div>

                        <div class="m-3">
                            <label>Username</label>
                            <input value="{{ $username }}" id="username" class="form-control"
                                style="background-color: #00000008" disabled>
                        </div>

                        <div id="map" class="map" style="height: 400px; marign :20px ;"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('script')
    <script type="text/javascript">
        map = L.map('map').setView([3.016603, 101.858382], 11);
        document.getElementById('map').style.cursor = 'pointer'

        var st = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
        //.addTo(map);
        var st1 = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        $(".leaflet-draw-draw-circlemarker").hide();




        $(document).ready(function() {
            getGeom();
        });

        getGeom = function() {
            let name = document.querySelector('#username').value;
            $.ajax({
                type: 'GET',
                url: `/show-all-boundry/${name}`,
                success: function(data) {
                    // console.log(JSON.parse(data))

                    var myLayer = L.geoJSON(JSON.parse(data));
                    addNonGroupLayers(myLayer, drawnItems);
                    // drawnItems.addLayer(myLayer);
                    map.fitBounds(myLayer.getBounds());

                }
                
            });

        }

        function addNonGroupLayers(sourceLayer, targetGroup) {
            if (sourceLayer instanceof L.LayerGroup) {
                sourceLayer.eachLayer(function(layer) {
                    addNonGroupLayers(layer, targetGroup);
                });
            } else {
                targetGroup.addLayer(sourceLayer);
            }
        }
    </script>
@endsection
