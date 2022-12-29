@extends('layouts.vertical', ['page_title' => 'Agency'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('agency.index') }}">Agency</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Agency</h4>
            </div>
        </div>
    </div>

    <div class="container col-9">
        <div class="card p-3 ">



            <h2 class="text-center">Add Agency </h2>
            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ route('agency.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6 mb-2 px-3">

                        <label for="user_name">User Name</label>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="user_name" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="col-6 mb-2 px-3">
                        <label for="agency_name">Agency Name</label>
                        <span class="text-danger">
                            @error('agency_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_name" name="agency_name" class="form-control" value="{{ old('agency_name') }}">
                    </div>

                    <div class="col-6 mb-2 px-3 ">
                        <label for="agency_email">Agency Email</label>
                        <span class="text-danger">
                            @error('agency_email')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_email" name="agency_email" class="form-control" value="{{ old('agency_email') }}">
                    </div>

                    <div class="col-6 mb-2 px-3">
                        <label for="agency_address">Agency Address</label>
                        <span class="text-danger">
                            @error('agency_address')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_address" name="agency_address" class="form-control"
                            value="{{ old('agency_address') }}">
                    </div>

                    <div class="col-6 mb-2 px-3">
                        <label for="agency_contact_number">Agency Contact No</label>
                        <span class="text-danger">
                            @error('agency_contact_number')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_contact_number" type="number" name="agency_contact_number" class="form-control"
                            value="{{ old('agency_contact_number') }}">
                    </div>

                    <div class="col-6 mb-2 px-3">
                        <label for="agency_sos">Agency SOS</label>
                        <span class="text-danger">
                            @error('agency_sos')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_sos" name="agency_sos" class="form-control" value="{{ old('agency_sos') }}">
                    </div>

                    <div class="col-6 mb-2 px-3">
                        <label for="agency_ssm">Agency SSM</label>
                        <span class="text-danger">
                            @error('agency_ssm')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_ssm" name="agency_ssm" class="form-control" value="{{ old('agency_ssm') }}">
                    </div>

                    <div class="col-6 mb-2 px-3">
                        <label for="agency_pic_number">Agency pic number</label>
                        <span class="text-danger">
                            @error('agency_pic_number')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_pic_number" name="agency_pic_number" class="form-control"
                            value="{{ old('agency_pic_number') }}">
                    </div>

                    <div class="col-6 mb-2 px-3">
                        <label for="agency_aps_license_number">Agency aps license number</label>
                        <span class="text-danger">
                            @error('agency_aps_license_number')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_aps_license_number" name="agency_aps_license_number" class="form-control"
                            value="{{ old('agency_aps_license_number') }}">
                    </div>

                    <div class="col-6 mb-2 px-3">
                        <label for="number_of_maids">Number of maids</label>
                        <span class="text-danger">
                            @error('number_of_maids')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="number_of_maids" name="number_of_maids" class="form-control"
                            value="{{ old('number_of_maids') }}">
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
                        {{-- <input id="password_confirmation"  name="password_confirmation" class="form-control"
                            value="{{ old('password_confirmation') }}"> --}}
                    </div>


                    {{-- <div class="col-6 mb-2 px-3">
                        <label for="password">Password</label>
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>

                    <div class="col-6 mb-2 px-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="password_confirmation" name="password_confirmation" class="form-control"
                            value="{{ old('password_confirmation') }}">
                    </div> --}}

                    <input id="created_by" type="hidden" name="created_by" class="form-control"
                        value="{{ Auth::user()->email }}">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-sm mt-3">Submit
                    </div>
                </div>
        </div>
        </form>

    </div>






    </div>

    </div>
@endsection
