@extends('layouts.vertical', ["page_title"=> "Client"])

@section('content')

    <div class="container col-7">
        <div class="card p-3 mt-4">
        <h2 class="text-center">Client Detail</h2>
       

        <div>
            <label for="agency_id">Agency id</label>
            <span class="text-danger">@error('agency_id'){{ $message }}@enderror</span>
            <input id="agency_id" type="number" name="agency_id" class="form-control" disabled value="{{old('agency_id',$client->agency_id)}}">
        </div>

        <div>
            <label for="user_name">User Name</label>
            <span class="text-danger">@error('user_name'){{ $message }}@enderror</span>
            <input id="user_name" name="user_name" class="form-control" disabled value="{{old('user_name',$client->user_name)}}">
        </div>

        <div>
            <label for="first_name">First Name</label>
            <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
            <input id="first_name" name="first_name" class="form-control" disabled value="{{old('first_name',$client->first_name)}}">
        </div>

        <div>
            <label for="last_name">Last Name</label>
            <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
            <input id="last_name" name="last_name" class="form-control" disabled value="{{old('last_name',$client->last_name)}}">
        </div>

        <div>
            <label for="full_name">Full Name</label>
            <span class="text-danger">@error('full_name'){{ $message }}@enderror</span>
            <input id="full_name" name="full_name" class="form-control" disabled value="{{old('full_name',$client->full_name)}}">
        </div>

        <div>
            <label for="email">Email</label>
            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            <input id="email" name="email" class="form-control" disabled value="{{old('email',$client->email)}}">
        </div>

        <div>
            <label for="contact_number">Contact Number</label>
            <span class="text-danger">@error('contact_number'){{ $message }}@enderror</span>
            <input id="contact_number" type="number" name="contact_number" disabled class="form-control" value="{{old('contact_number',$client->contact_number)}}">
        </div>
        <div>
            <label for="emergency_contact">Emergency Contact</label>
            <span class="text-danger">@error('emergency_contact'){{ $message }}@enderror</span>
            <input id="emergency_contact" type="number" name="emergency_contact" disabled class="form-control" value="{{old('emergency_contact',$client->emergency_contact)}}">
        </div>
        <div>
            <label for="client_address">Client address</label>
            <span class="text-danger">@error('client_address'){{ $message }}@enderror</span>
            <input id="client_address" name="client_address" class="form-control" disabled value="{{old('client_address',$client->client_address)}}">
        </div>
        <div>
            <label for="house_coords">House coords</label>
            <span class="text-danger">@error('house_coords'){{ $message }}@enderror</span>
            <input id="house_coords" name="house_coords" class="form-control" disabled value="{{old('house_coords',$client->house_coords)}}">
        </div>
        <div>
            <label for="maid_working_address">Maid working address</label>
            <span class="text-danger">@error('maid_working_address'){{ $message }}@enderror</span>
            <input id="maid_working_address" name="maid_working_address" disabled class="form-control" value="{{old('maid_working_address',$client->maid_working_address)}}">
        </div>
        
        <div >
            <label for="profile_image">Profile Image</label>
            <div class="col-12">
                <a href="{{ URL::asset('asset/images/Client/' . $client->profile_image) }}" data-lightbox="roadtrip">
                <img id="temprary"
                            src="{{ URL::asset('asset/images/Client/' . $client->profile_image) }}"
                            style="height: 100px; width: 100px;">
                </a>
            </div>
            {{-- <div class="col-6">
                
                <span class="text-danger">@error('profile_image'){{ $message }}@enderror</span>
                <input id="profile_image" type="file" name="profile_image" class="form-control" >
            </div> --}}
        </div>
       



        {{-- <div>
            <label for="created_by">created_by</label>
            <input id="created_by" name="created_by" class="form-control" value="">
        </div> --}}
       
        <div class="text-center">
            <a href="{{ route('client.edit', $client->id) }}"
                class="btn btn-primary ">Edit</a>
        </div>

    </div>
        

    </div>




@endsection