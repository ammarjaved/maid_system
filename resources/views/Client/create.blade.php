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
            <form action="{{ route('client.store') }}" id="idForm" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="first">




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
                        <label for="client_identity">Client Identity card / Passport no</label>
                        <span class="text-danger">
                            @error('client_identity')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="client_identity" type="text" name="client_identity" class="form-control"
                            value="{{ old('client_identity') }}">
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
                        <label for="client_identity_img">Client Identity card / Passport Image</label>
                        <span class="text-danger">
                            @error('client_identity_img')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="client_identity_img" type="file" name="client_identity_img" class="form-control" accept="image/*,.pdf"
                            value="{{ old('client_identity_img') }}">
                    </div>





                    <div>
                        <label for="profile_image">Profile Image</label>
                        <span class="text-danger">
                            @error('profile_image')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="profile_image" type="file" name="profile_image" class="form-control" accept="image/*"
                            value="{{ old('profile_image') }}">
                    </div>

                    <div>
                        <label for="user_name">Username</label>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="user_name" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="">
                        <label for="password">Password</label>
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>

                        <div class="input-group input-group-merge">
                            <input type="password" name="password" value="{{ old('password') }}" id="password"
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
    {{-- <script type="application/javascript" src="https://malsup.github.io/jquery.form.js"></script> --}}

    <script type="text/javascript">
        // $("#idForm").submit(function(e) {
        //     e.preventDefault();
        //     alert('asd');
        //     var form = $(this);
        //     var actionUrl = form.attr('action');

        //     $.ajax({
        //         type: "POST",
        //         url: actionUrl,
        //         data: form.serialize(), // serializes the form's elements.
        //         success: function(data) {
        //             alert(data); // show response from the php script.
        //         },
        //         error: function(xhr) {

        //             $.each(xhr.responseJSON.errors, function(key, value) {
        //                console.log(key);
        //             });
        //         },
        //     });
        // });
    </script>
@endsection
