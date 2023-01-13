@extends('layouts.vertical', ['page_title' => 'Boundary'])

@section('css')
    <style>
        .leaflet-control-attribution a {
    display: none;
    text-decoration: none;
}
    </style>
@endsection

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
                            <h2 class="">Maid Location</h2>
                        </div>

                        <div class="m-3">
                            {{-- <label>Username</label> --}}
                            {{-- <input value="" id="username" class="form-control"
                                style="background-color: #00000008" disabled> --}}
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

        // var drawnItems = new L.FeatureGroup();
        // map.addLayer(drawnItems);

        // $(".leaflet-draw-draw-circlemarker").hide();




        $(document).ready(function() {
            getGeom();
        });

        getGeom = function() {
            // let name = document.querySelector('#username').value;
            $.ajax({
                type: 'GET',
                url: `/show-all-clients`,
                success: function(data) {
                    var ct = JSON.parse(data);
                    var cor = ct.features[0].geometry.coordinates;
                    var maker = [];
                    console.log(ct.features);
                    
                    ct.features.map((value ,i )=>{
                        cor = value.geometry.coordinates;

                         maker[i] = L.marker([cor[1], cor[0]]).addTo(map);
                        maker[i].bindPopup("<table class='table table-bordered'>"+
                            "<tr>"+
                                "<th>Username</th>"+
                                "<td>"+value.properties.user_name+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                "<th>Gender</th>"+
                                "<td>"+value.properties.gender+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                "<th>Email</th>"+
                                "<td>"+value.properties.email+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                "<th>Contact no</th>"+
                                "<td>"+value.properties.contact_number+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                "<th>Profile Image</th>"+
                                "<td><a class='example-image-link' href='"+value.properties.profile_image+"' data-lightbox='example-set' data-title='Before Pic'><img src='"+value.properties.profile_image+"' height='50'/></a></td>"+
                                "</tr>"+
                                "<tr>"+
                                "<th>Detail</th>"+
                                "<td><a href='/maid/"+value.properties.user_name+"' class='btn  btn-sm dropdown-item'>Detail</a></td>"+
                                "</tr>"+



                    
                            "</table>");
                    }
                    );
                    
                    // var marker = L.marker([cor[1], cor[0]]).addTo(map);
                    // marker.bindPopup("<b>Hello world!</b><br>I am a popup.");

                    // var myLayer = L.geoJSON(JSON.parse(data));
                    // addNonGroupLayers(myLayer, drawnItems);
                    // // drawnItems.addLayer(myLayer);
                    // map.fitBounds(myLayer.getBounds());

                }
            });

        }

        // function addNonGroupLayers(sourceLayer, targetGroup) {
        //     if (sourceLayer instanceof L.LayerGroup) {
        //         sourceLayer.eachLayer(function(layer) {
        //             addNonGroupLayers(layer, targetGroup);
        //         });
        //     } else {
        //         targetGroup.addLayer(sourceLayer);
        //     }
        // }
    </script>
@endsection
