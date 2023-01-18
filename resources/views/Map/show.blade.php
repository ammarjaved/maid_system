@extends('layouts.vertical', ['page_title' => 'Boundary'])

@section('css')
    <style>
        .leaflet-control-attribution a {
            display: none;
            text-decoration: none;
        }

        .my-icon-white {
            border-radius: 50%;
            border: 5px solid grey;

        }

        .my-icon-green {
            border-radius: 50%;
            border: 5px solid green;
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
                        <li class="breadcrumb-item active">Aero</li>
                    </ol>
                </div>
                <h4 class="page-title">Map</h4>
            </div>
        </div>
    </div>


    <div class="row ">
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <div class="card ">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="">Maid Location / Boundary</h2>
                        </div>

                        <div class="m-3">
                            <label for="contact_number">Client</label>
                            <span class="text-danger ms-3" id="er_id"></span>
                            <select id="address" class="form-control" onchange="changeLayer(this)">
                                <option value="" hidden>Select Client to view</option>
                                @foreach ($client as $cli)
                                    <option value="{{ $cli->user_name }}">{{ $cli->user_name }}</option>
                                @endforeach
                            </select>
    
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

        var fiveMinutesAgo = new Date(new Date().getTime() - 5 * 60 * 1000);
        var LeafIcon;
        var greenIcon;
        var time2;
        var maker;

        // $(document).ready(function() {
        //     getGeom();
        // });

        // getGeom = function() {

        //     $.ajax({
        //         type: 'GET',
        //         url: `/show-all-clients`,
        //         success: function(data) {
        //             var ct = JSON.parse(data);
        //             var cor = ct.features[0].geometry.coordinates;


        //             console.log(ct.features);

        //             ct.features.map((value, i) => {


        //                 cor = value.geometry.coordinates;

        //                 last_update = new Date(value.properties.last_updated)
        //                 if (fiveMinutesAgo.getTime() > last_update.getTime()) {
        //                     LeafIcon = L.Icon.extend({
        //                         options: {
        //                             iconSize: [55, 55],
        //                             className: 'my-icon-white'
        //                         }
        //                     });
        //                 } else {
        //                     LeafIcon = L.Icon.extend({
        //                         options: {
        //                             iconSize: [55, 55],
        //                             className: 'my-icon-green'
        //                         }
        //                     });
        //                 }
        //                 greenIcon = new LeafIcon({
        //                     iconUrl: '/asset/images/Maid/' + value.properties.profile_image
        //                 });
        //                 maker = L.marker([cor[1], cor[0]], {
        //                     icon: greenIcon
        //                 }).addTo(map).bindPopup("<table class='table table-bordered'>" +
        //                     "<tr>" +
        //                     "<th>Username</th>" +
        //                     "<td>" + value.properties.user_name + "</td>" +
        //                     "</tr>" +
        //                     "<tr>" +
        //                     "<th>Gender</th>" +
        //                     "<td>" + value.properties.gender + "</td>" +
        //                     "</tr>" +
        //                     "<tr>" +
        //                     "<th>Email</th>" +
        //                     "<td>" + value.properties.email + "</td>" +
        //                     "</tr>" +
        //                     "<tr>" +
        //                     "<th>Contact no</th>" +
        //                     "<td>" + value.properties.contact_number + "</td>" +
        //                     "</tr>" +
        //                     "<tr>" +
        //                     "<th>Profile Image</th>" +
        //                     "<td><a class='example-image-link' href='/asset/images/Maid/" +
        //                     value.properties.profile_image +
        //                     "' data-lightbox='example-set' data-title='Before Pic'><img src='/asset/images/Maid/" +
        //                     value.properties.profile_image + "' height='50'/></a></td>" +
        //                     "</tr>" +
        //                     "<tr>" +
        //                     "<th>Detail</th>" +
        //                     "<td><a href='/maid/" + value.properties.user_name +
        //                     "' class='btn  btn-sm dropdown-item'>Detail</a></td>" +
        //                     "</tr>" +
        //                     "</table>");

        //             });
        //         }
        //     });

        // }

var pre_layer ;


        var source = new EventSource("/ssee");
        console.log('232323');
        source.onmessage = function(event) {
            console.log('34343434');

            var data = JSON.parse(event.data);


            var ct = JSON.parse(data.geojson);
            var cor;


            console.log(ct.features);
            if(JSON.stringify(ct.features)  == JSON.stringify(pre_layer) ){
                console.log('true');
            }else{
                console.log('false');
            }

            ct.features.map((value, i) => {


                cor = value.geometry.coordinates;

                last_update = new Date(value.properties.last_updated)
                if (fiveMinutesAgo.getTime() > last_update.getTime()) {
                    LeafIcon = L.Icon.extend({
                        options: {
                            iconSize: [55, 55],
                            className: 'my-icon-white'
                        }
                    });
                } else {
                    LeafIcon = L.Icon.extend({
                        options: {
                            iconSize: [55, 55],
                            className: 'my-icon-green'
                        }
                    });
                }
                greenIcon = new LeafIcon({
                    iconUrl: '/asset/images/Maid/' + value.properties.profile_image
                });
                maker = L.marker([cor[1], cor[0]], {
                    icon: greenIcon
                }).addTo(map).bindPopup("<table class='table table-bordered'>" +
                    "<tr>" +
                    "<th>Username</th>" +
                    "<td>" + value.properties.user_name + "</td>" +
                    "</tr>" +
                    "<tr>" +
                    "<th>Gender</th>" +
                    "<td>" + value.properties.gender + "</td>" +
                    "</tr>" +
                    "<tr>" +
                    "<th>Email</th>" +
                    "<td>" + value.properties.email + "</td>" +
                    "</tr>" +
                    "<tr>" +
                    "<th>Contact no</th>" +
                    "<td>" + value.properties.contact_number + "</td>" +
                    "</tr>" +
                    "<tr>" +
                    "<th>Profile Image</th>" +
                    "<td><a class='example-image-link' href='/asset/images/Maid/" +
                    value.properties.profile_image +
                    "' data-lightbox='example-set' data-title='Before Pic'><img src='/asset/images/Maid/" +
                    value.properties.profile_image + "' height='50'/></a></td>" +
                    "</tr>" +
                    "<tr>" +
                    "<th>Detail</th>" +
                    "<td><a href='/maid/" + value.properties.user_name +
                    "' class='btn  btn-sm dropdown-item'>Detail</a></td>" +
                    "</tr>" +
                    "</table>");

            });
        };




        var myLayer;

function changeLayer(element) {

    let id = document.querySelector('#address').value;
    var text = element.options[element.selectedIndex].text;


    $('#layer').val('');
    $.ajax({
        type: "GET",
        url: `/get-boundary-layer/${id}`,
        success: function(data) {
            // console.log(JSON.parse(data));
            if (myLayer) {
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
