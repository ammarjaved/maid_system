@extends('layouts.vertical', ['page_title' => 'Agency'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('agency.index') }}">Agency</a></li>
                        <li class="breadcrumb-item active">edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Agency</h4>
            </div>
        </div>
    </div>

    <div class="container col-9">
        <div class="card p-3 ">



            <h2 class="text-center">Edit Agency</h2>
            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ route('agency.update', $agency->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-2 px-3">

                        <label for="user_name">Username</label>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="user_name" name="user_name" class="form-control"
                            value="{{ $agency->user_name }}" disabled style="background-color: #00000021">
                    </div>

                    <div class="col-md-6 mb-2 px-3">
                        <label for="agency_name">Agency Name</label>
                        <span class="text-danger">
                            @error('agency_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_name" name="agency_name" class="form-control"
                            value="{{ old('agency_name', $agency->agency_name) }}">
                    </div>

                    <div class="col-md-6 mb-2 px-3 ">
                        <label for="email">Agency Email</label>
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="email" name="email" class="form-control"
                            value="{{ old('email', $agency->agency_email) }}">
                    </div>

                    <div class="col-md-6 mb-2 px-3">
                        <label for="agency_address">Agency Address</label>
                        <span class="text-danger">
                            @error('agency_address')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_address" name="agency_address" class="form-control"
                            value="{{ old('agency_address', $agency->agency_address) }}">
                    </div>

                    <div class="col-md-6 mb-2 px-3">
                        <label for="agency_contact_number">Agency Contact No</label>
                        <span class="text-danger">
                            @error('agency_contact_number')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_contact_number" type="number" name="agency_contact_number" class="form-control"
                            value="{{ old('agency_contact_number', $agency->agency_contact_number) }}">
                    </div>

                    <div class="col-md-6 mb-2 px-3">
                        <label for="agency_sos">Agency SOS</label>
                        <span class="text-danger">
                            @error('agency_sos')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_sos" name="agency_sos" class="form-control"
                            value="{{ old('agency_sos', $agency->agency_sos) }}">
                    </div>

                    <div class="col-md-6 mb-2 px-3">
                        <label for="agency_ssm">Agency SSM</label>
                        <span class="text-danger">
                            @error('agency_ssm')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_ssm" name="agency_ssm" class="form-control"
                            value="{{ old('agency_ssm', $agency->agency_ssm) }}">
                    </div>

                    <div class="col-md-6 mb-2 px-3">
                        <label for="agency_pic_number">Agency PIC number</label>
                        <span class="text-danger">
                            @error('agency_pic_number')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_pic_number" name="agency_pic_number" class="form-control"
                            value="{{ old('agency_pic_number', $agency->agency_pic_number) }}">
                    </div>

                    <div class="col-md-6 mb-2 px-3">
                        <label for="agency_aps_license_number">Agency aps license number</label>
                        <span class="text-danger">
                            @error('agency_aps_license_number')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="agency_aps_license_number" name="agency_aps_license_number" class="form-control"
                            value="{{ old('agency_aps_license_number', $agency->agency_aps_license_number) }}">
                    </div>

                    <div class="col-md-6 mb-2 px-3">
                        <label for="number_of_maids">Number of maids</label>
                        <span class="text-danger">
                            @error('number_of_maids')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="number_of_maids" name="number_of_maids" class="form-control"
                            value="{{ old('number_of_maids', $agency->number_of_maids) }}">
                    </div>


                    {{-- <div>
                <label for="created_by">created_by</label>
                <input id="created_by" name="created_by" hidden class="form-control" value="">
            </div> --}}
                    {{-- <input id="created_by" type="hidden" name="created_by" class="form-control" value="{{Auth::user()->email}}"> --}}
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-sm mt-3">Update
                    </div>
                </div>
        </div>
        </form>

    </div>






    </div>

    </div>
@endsection
