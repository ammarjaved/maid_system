@extends('layouts.vertical', ['page_title' => 'Edit'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('maid.index') }}">Maids</a></li>
                        <li class="breadcrumb-item active">edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Maid</h4>
            </div>
        </div>
    </div>



    <div class="container col-md-10">
        <div class="card  p-3">
            <h1 class="text-center">Edit Details</h1>
            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ route('maid.update', $maid->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                {{-- <div>
                    <label for="agency_id">Agency id</label>
                    <span class="text-danger">
                        @error('agency_id')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="agency_id" type="number" name="agency_id" class="form-control"
                        value="{{ old('agency_id', $maid->agency_id) }}">
                </div> --}}
                <div class="row">
                    <div class="col-md-6">
                        <label for="user_name">User Name</label>
                        <span class="text-danger">
                            @error('user_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input name="name" value="{{ $maid->user_name }}" type="hidden">
                        <input id="user_name" class="form-control" value="{{ $maid->user_name }}"
                            style="background-color: #00000021" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="first_name">First Name</label>
                        <span class="text-danger">
                            @error('first_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="first_name" name="first_name" class="form-control"
                            value="{{ old('first_name', $maid->first_name) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="last_name">Last Name</label>
                        <span class="text-danger">
                            @error('last_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="last_name" name="last_name" class="form-control"
                            value="{{ old('last_name', $maid->last_name) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="full_name">Full Name</label>
                        <span class="text-danger">
                            @error('full_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="full_name" name="full_name" class="form-control"
                            value="{{ old('full_name', $maid->full_name) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="gender">Gender</label>
                        <span class="text-danger">
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </span>
                        <select name="gender" id="gender" class="form-control">
                            <option value="{{ old('gender', $maid->gender) }}" selected="" hidden>
                                {{ old('gender', $maid->gender) }}</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>

                    </div>

                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="email" name="email" class="form-control" value="{{ old('email', $maid->email) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="permanent_address">Agency pic number</label>
                        <span class="text-danger">
                            @error('permanent_address')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="permanent_address" name="permanent_address" class="form-control"
                            value="{{ old('permanent_address', $maid->permanent_address) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="date_of_birth">Date of Birth</label>
                        <span class="text-danger">
                            @error('date_of_birth')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="date_of_birth" type="date" name="date_of_birth" class="form-control"
                            value="{{ old('date_of_birth', $maid->date_of_birth) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="country">Country</label>
                        <span class="text-danger">
                            @error('country')
                                {{ $message }}
                            @enderror
                        </span>
                        <select name="country" class="form-control">
                            <option value="{{ old('country', $maid->country) }}" selected="" hidden>
                                {{ old('country', $maid->country) }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->name }}" class="form-control">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        {{-- <input id="country" name="country" class="form-control" value="{{old('country')}}"> --}}
                    </div>

                    <div class="col-md-6">
                        <label for="contact_number">Contact Number</label>
                        <span class="text-danger">
                            @error('contact_number')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="contact_number" type="integer" name="contact_number" class="form-control"
                            value="{{ old('contact_number', $maid->contact_number) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="emergency_contact">Emergency Contact</label>
                        <span class="text-danger">
                            @error('emergency_contact')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="emergency_contact" type="number" name="emergency_contact" class="form-control"
                            value="{{ old('emergency_contact', $maid->emergency_contact) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="education">Education</label>
                        <span class="text-danger">
                            @error('education')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="education" name="education" class="form-control"
                            value="{{ old('education', $maid->education) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="occupation">Occupation</label>
                        <span class="text-danger">
                            @error('occupation')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="occupation" name="occupation" class="form-control"
                            value="{{ old('occupation', $maid->occupation) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="skills">Skills</label>
                        <span class="text-danger">
                            @error('skills')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="skills" name="skills" class="form-control"
                            value="{{ old('skills', $maid->skills) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="religion">Religion</label>
                        <span class="text-danger">
                            @error('religion')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="religion" name="religion" class="form-control"
                            value="{{ old('religion', $maid->religion) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="passport_number">Passport Number</label>
                        <span class="text-danger">
                            @error('passport_number')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="passport_number" name="passport_number" class="form-control"
                            value="{{ old('passport_number', $maid->passport_number) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="health_certificate_status">Health Certificate Status</label>
                        <span class="text-danger">
                            @error('health_certificate_status')
                                {{ $message }}
                            @enderror
                        </span>
                        <select class="form-control" name="health_certificate_status">
                            <option value="{{old('health_certificate_status', $health->health_certificate_status)}}" hidden>
                            {{old('health_certificate_status', $health->health_certificate_status)}}</option>
                            <option value="valid">valid</option>
                            <option value="expire">expire</option>
                        </select>
                         {{-- <input id="health_certificate_status" type="text" name="health_certificate_status"
                            class="form-control"
                            value="{{ old('health_certificate_status', $health->health_certificate_status) }}"> --}}
                    </div>


                    <div class="col-md-6">
                        <label for="passport_expiry">Passport Expiry</label>
                        <span class="text-danger">
                            @error('passport_expiry')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="passport_expiry" type="date" name="passport_expiry" class="form-control"
                            value="{{ old('passport_expiry', $maid->passport_expiry) }}">
                    </div>


                    <div class="col-md-6">
                        <label for="visa_expiry_date">Visa Expiry Date</label>
                        <span class="text-danger">
                            @error('visa_expiry_date')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="visa_expiry_date" type="date" name="visa_expiry_date" class="form-control"
                            value="{{ old('visa_expiry_date', $maid->visa_expiry_date) }}">
                    </div>


                    <div class="col-md-6">
                        <label for="health_card_expiry">Health Card Expiry </label>
                        <span class="text-danger">
                            @error('health_card_expiry')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="health_card_expiry" type="date" name="health_card_expiry" 
                            class="form-control" value="{{ old('health_card_expiry', $health->health_card_expiry) }}">
                    </div>

                    <div class="col-md-6 mt-2">
                        <label for="profile_image">Profile Image</label>
                        <div class="col-6 text-center">
                            <a href="{{ URL::asset('asset/images/Maid/' . $maid->profile_image) }}"
                                data-lightbox="roadtrip">
                                <img id="temprary" src="{{ URL::asset('asset/images/Maid/' . $maid->profile_image) }}"
                                    alt="no image found" style="height: 70px; width: 70px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <span class="text-danger">
                            @error('profile_image')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="profile_image" type="file" name="profile_image" class="form-control">
                    </div>


                    <div class="col-md-6">
                        <label for="passport_image_front">Passport Image front</label>
                        <div class="col-6 text-center">
                            <a href="{{ URL::asset('asset/images/Maid/' . $maid->passport_image_front) }}"
                                data-lightbox="roadtrip">
                                <img id="temprary" alt="no image found"
                                    src="{{ URL::asset('asset/images/Maid/' . $maid->passport_image_front) }}"
                                    style="height: 70px; width: 70px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="text-danger">
                            @error('passport_image_front')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="passport_image_front" name="passport_image_front" type="file"
                            class="form-control">
                    </div>


                    <div class="col-md-6">
                        <label for="passport_image_back">Passport image back</label>
                        <div class="col-6 text-center">
                            <a href="{{ URL::asset('asset/images/Maid/' . $maid->passport_image_back) }}"
                                data-lightbox="roadtrip">
                                <img id="temprary"
                                    src="{{ URL::asset('asset/images/Maid/' . $maid->passport_image_back) }}"
                                    alt="no image found" style="height: 70px; width: 70px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <span class="text-danger">
                            @error('passport_image_front')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="passport_image_back" type="file" name="passport_image_back" class="form-control">
                    </div>


                    <div class="col-md-6">
                        <label for="visa_image_front">Visa image front</label>
                        <div class="col-6 text-center">
                            <a href="{{ URL::asset('asset/images/Maid/' . $maid->visa_image_front) }}"
                                data-lightbox="roadtrip">
                                <img id="temprary"
                                    src="{{ URL::asset('asset/images/Maid/' . $maid->visa_image_front) }}"
                                    alt="no image found" style="height: 70px; width: 70px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <span class="text-danger">
                            @error('visa_image_front')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="visa_image_front" name="visa_image_front" type="file" class="form-control">
                    </div>



                    <div class="col-md-6">
                        <label for="visa_image_back">Visa image back</label>
                        <div class="col-6 text-center">
                            <a href="{{ URL::asset('asset/images/Maid/' . $maid->visa_image_back) }}"
                                data-lightbox="roadtrip">
                                <img id="temprary" src="{{ URL::asset('asset/images/Maid/' . $maid->visa_image_back) }}"
                                    alt="no image found" style="height: 70px; width: 70px;">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <span class="text-danger">
                            @error('visa_image_back')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="visa_image_back" name="visa_image_back" type="file" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="health_certificate">Visa image back</label>
                        <div class="col-6 text-center">
                            <a href="{{ URL::asset('asset/images/Maid/' . $health->health_certificate) }}"
                                data-lightbox="roadtrip">
                                <img id="temprary"
                                    src="{{ URL::asset('asset/images/Maid/' . $health->health_certificate) }}"
                                    alt="no image found" style="height: 70px; width: 70px;">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <span class="text-danger">
                            @error('health_certificate')
                                {{ $message }}
                            @enderror
                        </span>
                        <input id="health_certificate" name="health_certificate" type="file" class="form-control">
                    </div>




                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                    </div>
                </div>
        </div>
        </form>

    </div>
@endsection
