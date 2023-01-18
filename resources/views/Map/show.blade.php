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

        var fiveMinutesAgo = new Date(new Date().getTime() - 5 * 60 * 1000);
        var LeafIcon;
        var greenIcon;
        var time2;

        $(document).ready(function() {
            getGeom();
        });

        getGeom = function() {

            $.ajax({
                type: 'GET',
                url: `/show-all-clients`,
                success: function(data) {
                    var ct = JSON.parse(data);
                    var cor = ct.features[0].geometry.coordinates;
                    var maker = [];

                    console.log(ct.features);

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
                        maker[i] = L.marker([cor[1], cor[0]], {
                            icon: greenIcon
                        }).addTo(map)
                        maker[i].bindPopup("<table class='table table-bordered'>" +
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


                }
            });

        }
    </script>
@endsection
