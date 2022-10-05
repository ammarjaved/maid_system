<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.shared/title-meta', ['title' => "Log In"])
    @include('layouts.shared/head-css', ["mode" => $mode ?? '', "demo" => $demo ?? ''])
    @include('layouts.shared/topbar')


</head>


<body class="loading authentication-bg authentication-bg-pattern">
    <div class="account-pages  mb-3">
        <div class="container">
            <div class="row justify-content-center pt-5">
 
    <div class="card p-4 bg-white col-8 mt-5" >
  
            <h1 class="text-center">Add Agency Details </h1>
            @if (Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}</p>
        @endif
            <form action="{{ route ('agency.store') }}" method="POST">
                @csrf
                <div class="row">
            <div class="col-6 mb-2 px-3">
                
                <label for="user_name">User Name</label>
                <span class="text-danger">@error('user_name'){{ $message }}@enderror</span>
                <input id="user_name" name="user_name" class="form-control" value="{{old('user_name')}}">
            </div>
    
            <div class="col-6 mb-2 px-3">
                <label for="agency_name">Agency Name</label>
                <span class="text-danger">@error('agency_name'){{ $message }}@enderror</span>
                <input id="agency_name" name="agency_name" class="form-control" value="{{old('agency_name')}}">
            </div>
    
            <div class="col-6 mb-2 px-3 ">
                <label for="agency_email">Agency Email</label>
                <span class="text-danger">@error('agency_email'){{ $message }}@enderror</span>
                <input id="agency_email" name="agency_email" class="form-control" value="{{old('agency_email')}}">
            </div>
    
            <div class="col-6 mb-2 px-3">
                <label for="agency_address">Agency Address</label>
                <span class="text-danger">@error('agency_address'){{ $message }}@enderror</span>
                <input id="agency_address" name="agency_address" class="form-control" value="{{old('agency_address')}}">
            </div>
    
            <div class="col-6 mb-2 px-3">
                <label for="agency_contact_number">Agency Contact No</label>
                <span class="text-danger">@error('agency_contact_number'){{ $message }}@enderror</span>
                <input id="agency_contact_number" name="agency_contact_number" class="form-control" value="{{old('agency_contact_no')}}">
            </div>
    
            <div class="col-6 mb-2 px-3">
                <label for="agency_sos">Agency SOS</label>
                <span class="text-danger">@error('agency_sos'){{ $message }}@enderror</span>
                <input id="agency_sos" name="agency_sos" class="form-control" value="{{old('agency_sos')}}">
            </div>
    
            <div class="col-6 mb-2 px-3">
                <label for="agency_ssm">Agency SSM</label>
                <span class="text-danger">@error('agency_ssm'){{ $message }}@enderror</span>
                <input id="agency_ssm" name="agency_ssm" class="form-control" value="{{old('agency_ssm')}}">
            </div>
    
            <div class="col-6 mb-2 px-3">
                <label for="agency_pic_number">Agency pic number</label>
                <span class="text-danger">@error('agency_pic_number'){{ $message }}@enderror</span>
                <input id="agency_pic_number" name="agency_pic_number" class="form-control" value="{{old('agency_pic_number')}}">
            </div>
    
            <div class="col-6 mb-2 px-3">
                <label for="agency_aps_license_number">Agency aps license number</label>
                <span class="text-danger">@error('agency_aps_license_number'){{ $message }}@enderror</span>
                <input id="agency_aps_license_number" name="agency_aps_license_number" class="form-control" value="{{old('agency_aps_license_number')}}">
            </div>
    
            <div class="col-6 mb-2 px-3">
                <label for="number_of_maids">Number of maids</label>
                <span class="text-danger">@error('number_of_maids'){{ $message }}@enderror</span>
                <input id="number_of_maids" name="number_of_maids" class="form-control" value="{{old('number_of_maids')}}">
            </div>
    
    
            {{-- <div>
                <label for="created_by">created_by</label>
                <input id="created_by" name="created_by" hidden class="form-control" value="">
            </div> --}}
             <input id="created_by" type="hidden" name="created_by" class="form-control" value="{{Auth::user()->email}}">
            <div class="text-center">
            <button type="submit" class="btn btn-success btn-sm mt-3">Submit</div>
            </div>
        </div>
            </form>
    
        </div> 
    
    
    



</div> 

    </div></body></html>
    @include('layouts.shared/footer-script')

