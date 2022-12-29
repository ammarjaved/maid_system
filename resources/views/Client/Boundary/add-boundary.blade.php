@extends('layouts.vertical', ['page_title' => 'Client'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Client</a></li>
                        <li class="breadcrumb-item active">index</li>
                    </ol>
                </div>
                <h4 class="page-title">Clients</h4>
            </div>
        </div>
    </div>


    <div class="row ">
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <div class="card ">
                    <div class="card-body">
                       
                        <h2 class="text-center">Add Boundary</h2>
                        @if (Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-success') }} mx-5">{{ Session::get('message') }}</p>
                    @endif
                        <form action="/add-client-boundary" method="post" onsubmit="return validate()">
                            @csrf
                            <div class="m-3">
                                <label>Username</label>
                                <input name="username" class="form-control" value="{{ $username }}"
                                    style="background-color: #00000008" disabled>

                                    <input name="username" value="{{ $username }}" hidden>
                            </div>
                            
                            <div class="m-3">
                                <label for="address">Address </label>
                                <span class="text-danger ms-3" id="er_address"></span>

                                <input id="address" type="text" name="address" class="form-control">
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


        function submitFoam() {
            $.ajax({
                type: "POST",
                url: `/update-boundry`,

                dataType: 'json',
                data: $('#boundaryFoam').serialize(),
                success: function(data) {
                    alert('save sucessfuly');
                },
            });
        }

        function validate(){
            
            

            let add= $('#address').val() , ly =$('#layer').val();
            if(add === "" || ly ===""){
             add === ""?$('#er_address').html('Enter address') :$('#er_address').html('');
            ly === ""?$('#er_layer').html('Select Boundary') :$('#er_layer').html('');
            return false;
            }

                
            
        }
    </script>
@endsection
