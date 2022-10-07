@extends('layouts.vertical', ["page_title"=> "Client"])

@section('content')




<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                    <li class="breadcrumb-item"><a href="{{route('client.index')}}">Client</a></li>
                    <li class="breadcrumb-item active">create</li>
                </ol>
            </div>
            <h4 class="page-title">Create Client</h4>
        </div>
    </div>
</div>

    <div class="container col-7">
        <div class="card p-3 ">
        <h1 class="text-center">Add Client</h1>
        @if (Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}</p>
    @endif
        <form action="{{ route ('client.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

        <div>
            <label for="agency_id">Agency id</label>
            <span class="text-danger">@error('agency_id'){{ $message }}@enderror</span>
            <input id="agency_id" type="number" name="agency_id" class="form-control" value="{{old('agency_id')}}">
        </div>

        <div>
            <label for="user_name">User Name</label>
            <span class="text-danger">@error('user_name'){{ $message }}@enderror</span>
            <input id="user_name" name="user_name" class="form-control" value="{{old('user_name')}}">
        </div>

        <div>
            <label for="first_name">First Name</label>
            <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
            <input id="first_name" name="first_name" class="form-control" value="{{old('first_name')}}">
        </div>

        <div>
            <label for="last_name">Last Name</label>
            <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
            <input id="last_name" name="last_name" class="form-control" value="{{old('last_name')}}">
        </div>

        <div>
            <label for="full_name">Full Name</label>
            <span class="text-danger">@error('full_name'){{ $message }}@enderror</span>
            <input id="full_name" name="full_name" class="form-control" value="{{old('full_name')}}">
        </div>

        <div>
            <label for="email">Email</label>
            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            <input id="email" name="email" class="form-control" value="{{old('email')}}">
        </div>

        <div>
            <label for="contact_number">Contact Number</label>
            <span class="text-danger">@error('contact_number'){{ $message }}@enderror</span>
            <input id="contact_number" type="integer" name="contact_number" class="form-control" value="{{old('contact_number')}}">
        </div>
        <div>
            <label for="emergency_contact">Emergency Contact</label>
            <span class="text-danger">@error('emergency_contact'){{ $message }}@enderror</span>
            <input id="emergency_contact" type="integer" name="emergency_contact" class="form-control" value="{{old('emergency_contact')}}">
        </div>
        <div>
            <label for="client_address">Client address</label>
            <span class="text-danger">@error('client_address'){{ $message }}@enderror</span>
            <input id="client_address" name="client_address" class="form-control" value="{{old('client_address')}}">
        </div>
        <div>
            <label for="house_coords">House coords</label>
            <span class="text-danger">@error('house_coords'){{ $message }}@enderror</span>
            <input id="house_coords" name="house_coords" class="form-control" value="{{old('house_coords')}}">
        </div>
        <div>
            <label for="maid_working_address">Maid working address</label>
            <span class="text-danger">@error('maid_working_address'){{ $message }}@enderror</span>
            <input id="maid_working_address" name="maid_working_address" class="form-control" value="{{old('maid_working_address')}}">
        </div>
        
        <div>
            <label for="profile_image">Profile Image</label>
            <span class="text-danger">@error('profile_image'){{ $message }}@enderror</span>
            <input id="profile_image" type="file" name="profile_image" class="form-control" value="{{old('profile_image')}}">
        </div>
       



        {{-- <div>
            <label for="created_by">created_by</label>
            <input id="created_by" name="created_by" class="form-control" value="">
        </div> --}}
        <input id="created_by" type="hidden" name="created_by" class="form-control" value="{{Auth::user()->email}}">
        <div class="text-center">
        <button type="submit" class="btn btn-success mt-3">submit</button>
        </div>

    </div>
        </form>

    </div>




@endsection