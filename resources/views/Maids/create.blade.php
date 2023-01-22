@extends('layouts.vertical', ["page_title"=> "Maid"])

@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                    <li class="breadcrumb-item"><a href="{{route('maid.index')}}">Maid</a></li>
                    <li class="breadcrumb-item active">create</li>
                </ol>
            </div>
            <h4 class="page-title">Create Maid</h4>
        </div>
    </div>
</div>


    <div class="container col-md-10">
        <div class="card p-3 ">
       
        <form action="{{ route ('maid.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h1 class="text-center">Add Maid</h1>
            @if (Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}</p>
        @endif
<div class="row">
        

       


        <div class="col-md-6">
            <label for="first_name">First Name</label>
            <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
            <input id="first_name" name="first_name" class="form-control" value="{{old('first_name')}}">
        </div>

        <div class="col-md-6">
            <label for="last_name">Last Name</label>
            <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
            <input id="last_name" name="last_name" class="form-control" value="{{old('last_name')}}">
        </div>

        <div class="col-md-6">
            <label for="email">Email</label>
            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            <input id="email" name="email" class="form-control" value="{{old('email')}}">
        </div>

        {{-- <div>
            <label for="full_name">Full Name</label>
            <span class="text-danger">@error('full_name'){{ $message }}@enderror</span>
            <input id="full_name" name="full_name" class="form-control" value="{{old('full_name')}}">
        </div> --}}

        <div class="col-md-6">
            <label for="gender">Gender</label>
            <span class="text-danger">@error('gender'){{ $message }}@enderror</span>
            <select name="gender" id="gender" class="form-select">
                <option value="{{ old('gender') }}" selected="" hidden>
                    {{ old('gender',"Select Gender") }}</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            
        </div>

        

        <div class="col-md-6">
            <label for="permanent_address">Agency PIC Number</label>
            <span class="text-danger">@error('permanent_address'){{ $message }}@enderror</span>
            <input id="permanent_address" name="permanent_address" class="form-control" value="{{old('permanent_address')}}">
        </div>

        <div class="col-md-6">
            <label for="date_of_birth">Date of Birth</label>
            <span class="text-danger">@error('date_of_birth'){{ $message }}@enderror</span>
            <input id="date_of_birth" type="date" name="date_of_birth" class="form-control" value="{{old('date_of_birth')}}">
        </div>

        <div class="col-md-6">
            <label for="country">Country</label>
            <span class="text-danger">@error('country'){{ $message }}@enderror</span>
            <select name="country" class="form-select">
                <option value="{{ old('country') }}" selected="" hidden>
                    {{ old('country',"Select Country") }}</option>
                @foreach ($countries as $country)
                    <option value="{{$country->name}}" class="form-control">{{$country->name}}</option>
                @endforeach
            </select>
            {{-- <input id="country" name="country" class="form-control" value="{{old('country')}}"> --}}
        </div>

        <div class="col-md-6">
            <label for="contact_number">Contact Number</label>
            <span class="text-danger">@error('contact_number'){{ $message }}@enderror</span>
            <input id="contact_number" type="number" name="contact_number" class="form-control" value="{{old('contact_number')}}">
        </div>
        <div class="col-md-6">
            <label for="emergency_contact">Emergency Contact</label>
            <span class="text-danger">@error('emergency_contact'){{ $message }}@enderror</span>
            <input id="emergency_contact" type="number" name="emergency_contact" class="form-control" value="{{old('emergency_contact')}}">
        </div>
        <div class="col-md-6">
            <label for="education">Education</label>
            <span class="text-danger">@error('education'){{ $message }}@enderror</span>
            <input id="education" name="education" class="form-control" value="{{old('education')}}">
        </div>
        <div class="col-md-6">
            <label for="occupation">Occupation</label>
            <span class="text-danger">@error('occupation'){{ $message }}@enderror</span>
            <input id="occupation" name="occupation" class="form-control" value="{{old('occupation')}}">
        </div>
        <div class="col-md-6">
            <label for="skills">Skills</label>
            <span class="text-danger">@error('skills'){{ $message }}@enderror</span>
            <input id="skills" name="skills" class="form-control" value="{{old('skills')}}">
        </div>
        <div class="col-md-6">
            <label for="religion">Religion</label>
            <span class="text-danger">@error('religion'){{ $message }}@enderror</span>
            <input id="religion" name="religion" class="form-control" value="{{old('religion')}}">
        </div>
        
        <div class="col-md-6">
            <label for="passport_number">Passport Number</label>
            <span class="text-danger">@error('passport_number'){{ $message }}@enderror</span>
            <input id="passport_number" name="passport_number" class="form-control" value="{{old('passport_number')}}">
        </div>

        <div class="col-md-6">
            <label for="health_certificate_status">Health Certificate Status</label>
            <span class="text-danger">@error('health_certificate_status'){{ $message }}@enderror</span>

            <select class="form-select" name="health_certificate_status">
                <option value="{{old('health_certificate_status', '')}}" hidden>
                {{old('health_certificate_status', 'Select Value')}}</option>
                <option value="valid">valid</option>
                <option value="expire">expire</option>
            </select>
            {{-- <input id="health_certificate_status" name="health_certificate_status" class="form-control" value="{{old('health_certificate_status')}}"> --}}
        </div>

        <div class="col-md-6">
            <label for="passport_expiry">Passport Expiry</label>
            <span class="text-danger">@error('passport_expiry'){{ $message }}@enderror</span>
            <input id="passport_expiry" type="date" name="passport_expiry" class="form-control" value="{{old('passport_expiry')}}">
        </div>
       

        <div class="col-md-6">
            <label for="visa_expiry_date">Visa Expiry Date</label>
            <span class="text-danger">@error('visa_expiry_date'){{ $message }}@enderror</span>
            <input id="visa_expiry_date" type="date" name="visa_expiry_date" class="form-control" value="{{old('visa_expiry_date')}}">
        </div>

        <div class="col-md-6">
            <label for="health_card_expiry">Health Card Expiry </label>
            <span class="text-danger">@error('health_card_expiry'){{ $message }}@enderror</span>
            <input id="health_card_expiry" type="date" name="health_card_expiry" class="form-control" value="{{old('health_card_expiry')}}">
        </div>

        <div class="col-md-6">
            <label for="profile_image">Profile Image</label>
            <span class="text-danger">@error('profile_image'){{ $message }}@enderror</span>
            <input id="profile_image" type="file" name="profile_image" class="form-control" value="{{old('profile_image')}}" accept="image/*">
        </div>

        <div class="col-md-6">
            <label for="passport_image_front">Passport Image 1</label>
            <span class="text-danger">@error('passport_image_front'){{ $message }}@enderror</span>
            <input id="passport_image_front" name="passport_image_front" type="file" class="form-control" value="{{old('passport_image_front')}}" accept="image/*,.pdf">
        </div>

        <div class="col-md-6">
            <label for="passport_image_back">Passport image 2</label>
            <span class="text-danger">@error('passport_image_front'){{ $message }}@enderror</span>
            <input id="passport_image_back" type="file" name="passport_image_back" class="form-control" value="{{old('passport_image_back')}}" accept="image/*,.pdf">
        </div>
        <div class="col-md-6">
            <label for="visa_image_front">Visa image 1</label>
            <span class="text-danger">@error('visa_image_front'){{ $message }}@enderror</span>
            <input id="visa_image_front" name="visa_image_front" type="file" class="form-control" value="{{old('visa_image_front')}}" accept="image/*,.pdf">
        </div>
        <div class="col-md-6">
            <label for="visa_image_back">Visa image 2</label>
            <span class="text-danger">@error('visa_image_back'){{ $message }}@enderror</span>
            <input id="visa_image_back" name="visa_image_back" type="file" class="form-control" value="{{old('visa_image_back')}}" accept="image/*,.pdf">
        </div>

        <div class="col-md-6">
            <label for="health_certificate">Health Certificate</label>
            <span class="text-danger">@error('health_certificate'){{ $message }}@enderror</span>
            <input id="health_certificate" name="health_certificate" type="file" class="form-control" value="{{old('health_certificate')}}" accept="image/*,.pdf">
        </div>
  
        <div class="col-md-12">
            <label for="user_name">Username</label>
            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
            <input id="user_name" name="name" class="form-control" value="{{old('name')}}" >
        </div>

        <div class="col-md-6">
            <label for="password">Password</label>
            <span class="text-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </span>
           
            <div class="input-group input-group-merge">
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                <div class="input-group-text" data-password="false">
                    <span class="password-eye"></span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <label for="password_confirmation">Confirm Password</label>
            <span class="text-danger">
                @error('password_confirmation')
                    {{ $message }}
                @enderror
            </span>
            <div class="input-group input-group-merge">
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" class="form-control" placeholder="Enter your password">
                <div class="input-group-text" data-password="false">
                    <span class="password-eye"></span>
                </div>
            </div>
          
        </div>
</div>

        <div class="text-center">
        <button type="submit" class="btn btn-success mt-3">submit</button>
        </div>

    </div>
        </form>

    </div>




@endsection