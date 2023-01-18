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
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="">Boundary</h2>
                        </div>
                        @if (Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-success') }} mx-5">
                                {{ Session::get('message') }}</p>
                        @endif
                    
                          
                            </div>


                            <div class="m-3">
                                <label for="contact_number">Client</label>
                                <span class="text-danger ms-3" id="er_id"></span>
                                <select id="address" class="form-control" onchange="changeLayer(this)">
                                    <option value="" hidden>Select Client to view</option>
                                   @foreach ($client as $cli)
                                       <option value="{{$cli->user_name}}">{{$cli->user_name}}</option>
                                   @endforeach
                                </select>

                            </div>

                           


                            <div class="p-3">
                            <div id="map" class="map" style="height: 400px; marign :20px ;"></div>

                        </div>
                       
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
        

        // add draw tools
        map.addControl(drawControl);
        // $(".leaflet-draw-draw-circlemarker").hide();

var myLayer;

        function changeLayer(element) {
            // if(myLayer){
            //     map.removeLayer(myLayer);
            // }
                       let id = document.querySelector('#address').value;
            var text = element.options[element.selectedIndex].text;
           
        
            $('#layer').val('');
            $.ajax({
                type: "GET",
                url: `/get-boundary-layer/${id}`,
                success: function(data) {
                    // console.log(JSON.parse(data));
                    if(myLayer){
                        map.removeLayer(myLayer);
                    }
                     myLayer = L.geoJSON(JSON.parse(data)).addTo(map);
                    // addNonGroupLayers(myLayer, drawnItems);
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


      

        
    </script>
@endsection
