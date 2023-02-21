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
            <h1 class="text-center">Edit Client</h1>
            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ route('client.update', $client->id) }}" id="forms" method="POST"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="first">

                    <input value="{{ $client->id }}" id="client_id" type="hidden">

                    <div>
                        <label for="user_name">Username</label>
                        <span class="text-danger">
                            @error('user_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="user_name" class="form-control" value="{{ old('user_name', $client->user_name) }}"
                            style="background-color: #00000021" disabled>
                    </div>

                    <div>
                        <label for="first_name">First Name</label>
                        <span class="text-danger">
                            @error('first_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="first_name" name="first_name" class="form-control"
                            value="{{ old('first_name', $client->first_name) }}">
                    </div>

                    <div>
                        <label for="last_name">Last Name</label>
                        <span class="text-danger">
                            @error('last_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="last_name" name="last_name" class="form-control"
                            value="{{ old('last_name', $client->last_name) }}">
                    </div>

                    <div>
                        <label for="full_name">Full Name</label>
                        <span class="text-danger">
                            @error('full_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="full_name" name="full_name" class="form-control"
                            value="{{ old('full_name', $client->full_name) }}">
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="email" name="email" class="form-control"
                            value="{{ old('email', $client->email) }}">
                    </div>

                    <div>
                        <label for="contact_number">Contact Number</label>
                        <span class="text-danger">
                            @error('contact_number')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="contact_number" type="number" name="contact_number" class="form-control"
                            value="{{ old('contact_number', $client->contact_number) }}">
                    </div>
                    <div>
                        <label for="emergency_contact">Emergency Contact</label>
                        <span class="text-danger">
                            @error('emergency_contact')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="emergency_contact" type="number" name="emergency_contact" class="form-control"
                            value="{{ old('emergency_contact', $client->emergency_contact) }}">
                    </div>

                    <div>
                        <label for="client_identity">Client Identity card / Passport no</label>
                        <span class="text-danger">
                            @error('client_identity')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="client_identity" type="text" name="client_identity" class="form-control"
                            value="{{ old('client_identity', $client->client_identity) }}">
                    </div>

                    <div>
                        <label for="client_address">Client address</label>
                        <span class="text-danger">
                            @error('client_address')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="client_address" name="client_address" class="form-control"
                            value="{{ old('client_address', $client->client_address) }}">
                    </div>
                   

                    <div class="row">
                        <label for="profile_image">Profile Image</label>
                        <div class="col-6 text-center">
                            <a href="{{ URL::asset('asset/images/Client/' . $client->profile_image) }}"
                                data-lightbox="roadtrip">
                                <img id="temprary" src="{{ URL::asset('asset/images/Client/' . $client->profile_image) }}"
                                    style="height: 70px; width: 70px;">
                            </a>
                        </div>
                        <div class="col-6">

                            <span class="text-danger">
                                @error('profile_image')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input id="profile_image" type="file" name="profile_image" class="form-control" accept="image/*">
                        </div>
                    </div>


                    <div class="row">
                        
                            <label for="client_identity_img">Client Identity card / Passport Image</label>
                            
                        <div class="col-6 text-center">
                            @if (substr(strrchr( $client->client_identity_img, '.'), 1) == "pdf")
                            
                        
                               <a href="/download-file/{{$client->client_identity_img}}/{{'client'}}"> <button type="button"  class="btn btn-success mt-4">Download</button></a>
                            
                            @else
                            <a href="{{ URL::asset('asset/images/Client/' . $client->client_identity_img) }}"
                                data-lightbox="roadtrip">
                                <img id="temprary"
                                    src="{{ URL::asset('asset/images/Client/' . $client->client_identity_img) }}"
                                    style="height: 100px; width: 100px;">
                            </a>
                            @endif
                        </div>
                        <div class="col-6">
                            
                            <input id="client_identity_img" type="file" name="client_identity_img" class="form-control"
                                value="{{ old('client_identity_img') }}" accept="image/*,.pdf">
                        </div>
                    </div>

                    
                </div>
  



                <div class="text-center p-3">
                    <button type="submit" class="btn btn-success" id="submit">submit</button>
                </div>

        </div>
        </form>

        <form id="boundaryFoam" method="POST" style="display: none">
            @csrf
            <input name="layer" id="layer">
            <input name="id" value="{{$client->id}}">
        </form>
    </div>
@endsection

