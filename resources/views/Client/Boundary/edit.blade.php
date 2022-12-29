@extends('layouts.vertical', ['page_title' => 'Client'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Client</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Boundary</a></li>
                        <li class="breadcrumb-item active">edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Boundary</h4>
            </div>
        </div>
    </div>


    <div class="row ">
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <div class="card ">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="">Edit Boundary</h2>
                        </div>
                        @if (Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-success') }} mx-5">
                                {{ Session::get('message') }}</p>
                        @endif
                        <form action="/edit-client-boundary" onsubmit="return validate()" method="post">
                            @csrf
                            <div class="m-3">
                                <label>User name</label>
                                <input value="{{ $client }}" class="form-control" style="background-color: #00000008"
                                    disabled>
                            </div>


                            <div class="m-3">
                                <label for="contact_number">Address</label>
                                <span class="text-danger ms-3" id="er_id"></span>
                                <select id="address" class="form-control" onchange="changeLayer(this)">
                                    <option value="" hidden>Select address to view</option>
                                    @foreach ($address as $addres)
                                        <option value="{{ $addres->id }}">{{ $addres->address }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <input name="id" type="hidden" id="id">
                            <div class="m-3">
                                <label for="address">New Address </label>
                                <span class="text-danger ms-3" id="er_address"></span>

                                <input id="address_new" type="text" name="address" class="form-control">
                            </div>


                            <input name="layer" type="hidden" id="layer">
                            <span class="text-danger ms-3" id="er_layer"></span>

                            <div id="map" class="map" style="height: 400px; marign :20px ;"></div>

                            <div class="text-center m-3">
                                <button type="submit" class="btn btn-success">Submit </button>
                            </div>

                        </form>
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
        var drawControl = new L.Control.Draw({
            draw: {
                circle: true,
                marker: false,
                polygon: true,
                polyline: false,
                rectangle: true
            },
            edit: {
                featureGroup: drawnItems
            }
        });

        // add draw tools
        map.addControl(drawControl);
        $(".leaflet-draw-draw-circlemarker").hide();

        map.on('draw:created', function(e) {
            var type = e.layerType;
            layer = e.layer;
            drawnItems.addLayer(layer);
            // console.log(type);
            var data = layer.toGeoJSON();
            // console.log(JSON.stringify(data));
            // $('#geo').val(JSON.stringify(data.geometry));
            $('#layer').val(JSON.stringify(data.geometry));

        })


        map.on('draw:edited', function(e) {
            var layers = e.layers;
            layers.eachLayer(function(data) {
                let layer_d = data.toGeoJSON();
                let layer = JSON.stringify(layer_d.geometry);
                // console.log(layer);

                $('#layer').val(layer);

            });
        });


        map.on('draw:deleted', function(e) {
            var layers = e.layers;
            layers.eachLayer(function(layer) {
                $('#layer').val('');
            });
        });

        function changeLayer(element) {

            let id = document.querySelector('#address').value;
            var text = element.options[element.selectedIndex].text;
            $('#er_id').html('');
            $('#address_new').val(text);
            $('#id').val(id);
            $('#layer').val('');
            $.ajax({
                type: "GET",
                url: `/get-boundary-layer/${id}`,
                success: function(data) {
                    // console.log(JSON.parse(data));
                    var myLayer = L.geoJSON(JSON.parse(data));
                    addNonGroupLayers(myLayer, drawnItems);
                    map.fitBounds(myLayer.getBounds());
                },
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


        function validate() {

            if($('#id').val() === ""){
                $('#er_id').html('Select layer first');
                return false;
            }


            let add = $('#address').val(),
                ly = $('#layer').val();
            if (add === "" || ly === "") {
                add === "" ? $('#er_address').html('Enter address') : $('#er_address').html('');
                ly === "" ? $('#er_layer').html('Select Boundary') : $('#er_layer').html('');
                return false;
            }



        }
    </script>
@endsection
