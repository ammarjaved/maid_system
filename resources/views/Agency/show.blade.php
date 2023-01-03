@extends('layouts.vertical', ['page_title' => 'Agency'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('agency.index') }}">Agency</a></li>
                        <li class="breadcrumb-item active">detail</li>
                    </ol>
                </div>
                <h4 class="page-title">Agecny Detail</h4>
            </div>
        </div>
    </div>
    <div class="container col-9">
        <div class="card p-3 ">



            <h2 class="text-center">Agency Detail</h2>

            <div class="row">
                <div class="col-6 mb-2 px-3">

                    <label for="user_name">User Name</label>
                    <input id="user_name" disabled class="form-control" value="{{ $agency->user_name }}">
                </div>

                <div class="col-6 mb-2 px-3">
                    <label for="agency_name">Agency Name</label>
                    <input id="agency_name" disabled class="form-control"
                        value="{{$agency->agency_name}}">
                </div>

                <div class="col-6 mb-2 px-3 ">
                    <label for="agency_email">Agency Email</label>
                    <input id="agency_email" disabled class="form-control"
                        value="{{  $agency->agency_email}}">
                </div>

                <div class="col-6 mb-2 px-3">
                    <label for="agency_address">Agency Address</label>
                    <span class="text-danger">
                        @error('agency_address')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="agency_address" disabled name="agency_address" class="form-control"
                        value="{{ old('agency_address', $agency->agency_address) }}">
                </div>

                <div class="col-6 mb-2 px-3">
                    <label for="agency_contact_number">Agency Contact No</label>
                    <span class="text-danger">
                        @error('agency_contact_number')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="agency_contact_number" disabled type="number" name="agency_contact_number"
                        class="form-control" value="{{ old('agency_contact_no', $agency->agency_contact_number) }}">
                </div>

                <div class="col-6 mb-2 px-3">
                    <label for="agency_sos">Agency SOS</label>
                    <span class="text-danger">
                        @error('agency_sos')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="agency_sos" disabled name="agency_sos" class="form-control"
                        value="{{ old('agency_sos', $agency->agency_sos) }}">
                </div>

                <div class="col-6 mb-2 px-3">
                    <label for="agency_ssm">Agency SSM</label>
                    <span class="text-danger">
                        @error('agency_ssm')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="agency_ssm" disabled name="agency_ssm" class="form-control"
                        value="{{ old('agency_ssm', $agency->agency_ssm) }}">
                </div>

                <div class="col-6 mb-2 px-3">
                    <label for="agency_pic_number">Agency pic number</label>
                    <span class="text-danger">
                        @error('agency_pic_number')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="agency_pic_number" disabled name="agency_pic_number" class="form-control"
                        value="{{ old('agency_pic_number', $agency->agency_pic_number) }}">
                </div>

                <div class="col-6 mb-2 px-3">
                    <label for="agency_aps_license_number">Agency aps license number</label>
                    <span class="text-danger">
                        @error('agency_aps_license_number')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="agency_aps_license_number" disabled name="agency_aps_license_number" class="form-control"
                        value="{{ old('agency_aps_license_number', $agency->agency_aps_license_number) }}">
                </div>

                <div class="col-6 mb-2 px-3">
                    <label for="number_of_maids">Number of maids</label>
                    <span class="text-danger">
                        @error('number_of_maids')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="number_of_maids" disabled name="number_of_maids" class="form-control"
                        value="{{ old('number_of_maids', $agency->number_of_maids) }}">
                </div>


                {{-- <div>
                <label for="created_by">created_by</label>
                <input id="created_by" name="created_by" hidden class="form-control" value="">
            </div> --}}
                {{-- <input id="created_by" type="hidden" name="created_by" class="form-control" value="{{Auth::user()->email}}"> --}}
                <div class="text-center">
                    @if (Auth::user()->type == 'superAdmin')
                    <a href="{{ route('agency.edit', $agency->id) }}"><button type="submit" class="btn btn-success btn-sm mt-3">Update Information</button>
                    @endif

                </div>
            </div>
            </form>

        </div>






    </div>

    </div>
@endsection
