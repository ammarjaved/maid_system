@extends('layouts.vertical', ['page_title' => 'Client'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Client</a></li>
                        <li class="breadcrumb-item active">create</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Client</h4>
            </div>
        </div>
    </div>

    <div class="container col-7">

        <div class="card p-3 ">

            <span id="validation-errors"></span>
            <h1 class="text-center">Add Client</h1>
            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ route('client.store') }}" id="myForm" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="first">


                    <div>
                        <label for="user_name">User Name</label>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="user_name" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div>
                        <label for="first_name">First Name</label>
                        <span class="text-danger">
                            @error('first_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}">
                    </div>

                    <div>
                        <label for="last_name">Last Name</label>
                        <span class="text-danger">
                            @error('last_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}">
                    </div>

                    <div>
                        <label for="full_name">Full Name</label>
                        <span class="text-danger">
                            @error('full_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="full_name" name="full_name" class="form-control" value="{{ old('full_name') }}">
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div>
                        <label for="contact_number">Contact Number</label>
                        <span class="text-danger">
                            @error('contact_number')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="contact_number" type="number" name="contact_number" class="form-control"
                            value="{{ old('contact_number') }}">
                    </div>
                    <div>
                        <label for="emergency_contact">Emergency Contact</label>
                        <span class="text-danger">
                            @error('emergency_contact')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="emergency_contact" type="number" name="emergency_contact" class="form-control"
                            value="{{ old('emergency_contact') }}">
                    </div>
                    <div>
                        <label for="client_address">Client address</label>
                        <span class="text-danger">
                            @error('client_address')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="client_address" name="client_address" class="form-control"
                            value="{{ old('client_address') }}">
                    </div>
                    <div>
                        <label for="house_coords">House coords</label>
                        <span class="text-danger">
                            @error('house_coords')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="house_coords" name="house_coords" class="form-control"
                            value="{{ old('house_coords') }}">
                    </div>
                    <div>
                        <label for="maid_working_address">Maid working address</label>
                        <span class="text-danger">
                            @error('maid_working_address')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="maid_working_address" name="maid_working_address" class="form-control"
                            value="{{ old('maid_working_address') }}">
                    </div>

                    <div>
                        <label for="profile_image">Profile Image</label>
                        <span class="text-danger">
                            @error('profile_image')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="profile_image" type="file" name="profile_image" class="form-control"
                            value="{{ old('profile_image') }}">
                    </div>

                    <div class="">
                        <label for="password">Password</label>
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>

                        <div class="input-group input-group-merge">
                            <input type="password" name="password" value="{{ old('password') }}" id="password_confirmation"
                                class="form-control" placeholder="Enter your password">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <label for="password_confirmation">Confirm Password</label>
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="input-group input-group-merge">
                            <input type="password" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" id="password_confirmation"
                                class="form-control" placeholder="Enter your password">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>

                    </div>



                </div>




                <div class="text-center p-3 ">

                    <button type="submit" class="btn btn-success" id="submit">submit</button>
                </div>
        </div>
        </form>

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
            console.log(type);
            var data = layer.toGeoJSON();
            console.log(JSON.stringify(data));

            $('#geo').val(JSON.stringify(data.geometry));
            // submitDetailsForm(data)

        });
    </script>
@endsection
