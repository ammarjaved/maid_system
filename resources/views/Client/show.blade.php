@extends('layouts.vertical', ['page_title' => 'Client'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Client</a></li>
                        <li class="breadcrumb-item active">edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Client</h4>
            </div>
        </div>
    </div>


    <div class="container col-7">
        <div class="card p-3 ">
            <h2 class="text-center">Client Detail</h2>

            <div class="first">
                

                <div>
                    <label for="user_name">User Name</label>
                    <span class="text-danger">
                        @error('user_name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="user_name" name="user_name" class="form-control" disabled
                        value="{{ old('user_name', $client->user_name) }}">
                </div>

                <div>
                    <label for="first_name">First Name</label>
                    <span class="text-danger">
                        @error('first_name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="first_name" name="first_name" class="form-control" disabled
                        value="{{ old('first_name', $client->first_name) }}">
                </div>

                <div>
                    <label for="last_name">Last Name</label>
                    <span class="text-danger">
                        @error('last_name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="last_name" name="last_name" class="form-control" disabled
                        value="{{ old('last_name', $client->last_name) }}">
                </div>

                <div>
                    <label for="full_name">Full Name</label>
                    <span class="text-danger">
                        @error('full_name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="full_name" name="full_name" class="form-control" disabled
                        value="{{ old('full_name', $client->full_name) }}">
                </div>

                <div>
                    <label for="email">Email</label>
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="email" name="email" class="form-control" disabled
                        value="{{ old('email', $client->email) }}">
                </div>

                <div>
                    <label for="contact_number">Contact Number</label>
                    <span class="text-danger">
                        @error('contact_number')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="contact_number" type="number" name="contact_number" disabled class="form-control"
                        value="{{ old('contact_number', $client->contact_number) }}">
                </div>
                <div>
                    <label for="emergency_contact">Emergency Contact</label>
                    <span class="text-danger">
                        @error('emergency_contact')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="emergency_contact" type="number" name="emergency_contact" disabled class="form-control"
                        value="{{ old('emergency_contact', $client->emergency_contact) }}">
                </div>
                <div>
                    <label for="client_address">Client address</label>
                    <span class="text-danger">
                        @error('client_address')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="client_address" name="client_address" class="form-control" disabled
                        value="{{ old('client_address', $client->client_address) }}">
                </div>
                <div>
                    <label for="house_coords">House coords</label>
                    <span class="text-danger">
                        @error('house_coords')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="house_coords" name="house_coords" class="form-control" disabled
                        value="{{ old('house_coords', $client->house_coords) }}">
                </div>
                <div>
                    <label for="maid_working_address">Maid working address</label>
                    <span class="text-danger">
                        @error('maid_working_address')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="maid_working_address" name="maid_working_address" disabled class="form-control"
                        value="{{ old('maid_working_address', $client->maid_working_address) }}">
                </div>

                <div >
                    <label for="profile_image">Profile Image</label>
                    <div class="col-12 text-center">
                        <a href="{{ URL::asset('asset/images/Client/' . $client->profile_image) }}"
                            data-lightbox="roadtrip">
                            <img id="temprary" src="{{ URL::asset('asset/images/Client/' . $client->profile_image) }}"
                                style="height: 100px; width: 100px;">
                        </a>
                    </div>
                </div>
            </div>
                <div class="next">

                    <input name="geo" id="geo" type="hidden">
                    <div id="map" class="map" style="height: 400px; marign :20px ;"></div>
                </div>
                <div class="d-flex justify-content-between p-3">
                    <button class="btn btn-secondary" id="pre" type="button" onclick="nextPage(1)"> Pervious
                    </button>
                    <a href="{{ route('client.edit', $client->id) }}" ><button
                            class="btn btn-success" id="submit">Edit</button></a>
                    <button class=" btn btn-primary" id="next" type="button" onclick="nextPage(0)">Next</button>
                </div>




            


        </div>
    @endsection



    @section('script')
        <script>
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
                console.log(type);
                var data = layer.toGeoJSON();
                console.log(JSON.stringify(data));

                $('#geo').val(JSON.stringify(data.geometry));
                // submitDetailsForm(data)

            })



            $('.next').hide();
            $("#pre").attr("disabled", true);
            // $("#submit").attr("disabled",true);

            function nextPage(condition) {
                if (condition === 0) {
                    $('.first').hide();
                    $('.next').show();
                    $("#next").attr("disabled", true);
                    $("#pre").attr("disabled", false);
                } else {
                    $('.first').show();
                    $('.next').hide();
                    $("#next").attr("disabled", false);
                    $("#pre").attr("disabled", true);
                }



            }
        </script>
    @endsection
