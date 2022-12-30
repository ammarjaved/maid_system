@extends('layouts.vertical', ['page_title' => 'Detail'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('maid.index') }}">Maids</a></li>
                        <li class="breadcrumb-item active">detail</li>
                    </ol>
                </div>
                <h4 class="page-title">Maid Details</h4>
            </div>
        </div>
    </div>


    <div class="container col-7">
        <div class="card p-3 mt-4">
            <h2 class="text-center">Maid Details</h1>



                {{-- <div>
                    <label for="agency_id">Agency id</label>
                    <span class="text-danger">
                        @error('agency_id')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="agency_id" type="number" name="agency_id" disabled class="form-control"
                        value="{{ old('agency_id', $maid->agency_id) }}">
                </div> --}}

                <div>
                    <label for="user_name">User Name</label>
                    <span class="text-danger">
                        @error('user_name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="user_name" name="user_name" class="form-control" disabled
                        value="{{ old('user_name', $maid->user_name) }}">
                </div>

                <div>
                    <label for="first_name">First Name</label>
                    <span class="text-danger">
                        @error('first_name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="first_name" name="first_name" class="form-control" disabled
                        value="{{ old('first_name', $maid->first_name) }}">
                </div>

                <div>
                    <label for="last_name">Last Name</label>
                    <span class="text-danger">
                        @error('last_name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="last_name" name="last_name" class="form-control" disabled
                        value="{{ old('last_name', $maid->last_name) }}">
                </div>

                <div>
                    <label for="full_name">Full Name</label>
                    <span class="text-danger">
                        @error('full_name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="full_name" name="full_name" class="form-control" disabled
                        value="{{ old('full_name', $maid->full_name) }}">
                </div>

                <div>
                    <label for="gender">Gender</label>
                    <span class="text-danger">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </span>
                    <select name="gender" id="gender" class="form-control" disabled>
                        <option value="{{ old('gender', $maid->gender) }}" selected="" hidden>
                            {{ old('gender', $maid->gender) }}</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                </div>

                <div>
                    <label for="email">Email</label>
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="email" name="email" class="form-control" disabled
                        value="{{ old('email', $maid->email) }}">
                </div>

                <div>
                    <label for="permanent_address">Agency pic number</label>
                    <span class="text-danger">
                        @error('permanent_address')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="permanent_address" name="permanent_address" disabled class="form-control"
                        value="{{ old('permanent_address', $maid->permanent_address) }}">
                </div>

                <div>
                    <label for="date_of_birth">Date of Birth</label>
                    <span class="text-danger">
                        @error('date_of_birth')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="date_of_birth" type="date" name="date_of_birth" disabled class="form-control"
                        value="{{ old('date_of_birth', $maid->date_of_birth) }}">
                </div>

                <div>
                    <label for="country">Country</label>
                    <span class="text-danger">
                        @error('country')
                            {{ $message }}
                        @enderror
                    </span>
                    <select name="country" class="form-control" disabled>
                        <option value="{{ old('country', $maid->country) }}" selected="" hidden>
                            {{ old('country', $maid->country) }}</option>
                        {{-- @foreach ($countries as $country)
                    <option value="{{$country->name}}" class="form-control">{{$country->name}}</option>
                @endforeach --}}
                    </select>
                    {{-- <input id="country" name="country" class="form-control" value="{{old('country')}}"> --}}
                </div>

                <div>
                    <label for="contact_number">Contact Number</label>
                    <span class="text-danger">
                        @error('contact_number')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="contact_number" disabled type="integer" name="contact_number" class="form-control"
                        value="{{ old('contact_number', $maid->contact_number) }}">
                </div>
                <div>
                    <label for="emergency_contact">Emergency Contact</label>
                    <span class="text-danger">
                        @error('emergency_contact')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="emergency_contact" type="number" disabled name="emergency_contact" class="form-control"
                        value="{{ old('emergency_contact', $maid->emergency_contact) }}">
                </div>
                <div>
                    <label for="education">Education</label>
                    <span class="text-danger">
                        @error('education')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="education" name="education" class="form-control" disabled
                        value="{{ old('education', $maid->education) }}">
                </div>
                <div>
                    <label for="occupation">Occupation</label>
                    <span class="text-danger">
                        @error('occupation')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="occupation" name="occupation" class="form-control" disabled
                        value="{{ old('occupation', $maid->occupation) }}">
                </div>
                <div>
                    <label for="skills">Skills</label>
                    <span class="text-danger">
                        @error('skills')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="skills" name="skills" class="form-control" disabled
                        value="{{ old('skills', $maid->skills) }}">
                </div>
                <div>
                    <label for="religion">Religion</label>
                    <span class="text-danger">
                        @error('religion')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="religion" name="religion" class="form-control" disabled
                        value="{{ old('religion', $maid->religion) }}">
                </div>

                <div>
                    <label for="passport_number">Passport Number</label>
                    <span class="text-danger">
                        @error('passport_number')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="passport_number" name="passport_number" disabled class="form-control"
                        value="{{ old('passport_number', $maid->passport_number) }}">
                </div>
                <div>
                    <label for="passport_expiry">Passport Expiry</label>
                    <span class="text-danger">
                        @error('passport_expiry')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="passport_expiry" type="date" name="passport_expiry" disabled class="form-control"
                        value="{{ old('passport_expiry', $maid->passport_expiry) }}">
                </div>


                <div>
                    <label for="visa_expiry_date">Visa Expiry Date</label>
                    <span class="text-danger">
                        @error('visa_expiry_date')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="visa_expiry_date" type="date" name="visa_expiry_date" disabled class="form-control"
                        value="{{ old('visa_expiry_date', $maid->visa_expiry_date) }}">
                </div>

                

                <div class="row">
                    <div class="col-6 text-center p-3">
                        <label for="profile_image" class="col-12 text-start">Profile Image</label>
                        <a href="{{ URL::asset('asset/images/Maid/' . $maid->profile_image) }}" data-lightbox="roadtrip">
                            <img id="temprary" src="{{ URL::asset('asset/images/Maid/' . $maid->profile_image) }}"
                                style="height: 70px; width: 70px;">
                        </a>
                    </div>

                    <div class="col-6 text-center p-3">
                        <label for="passport_image_front" class="col-12 text-start">Passport Image front</label>
                        <a href="{{ URL::asset('asset/images/Maid/' . $maid->passport_image_front) }}"
                            data-lightbox="roadtrip">
                            <img id="temprary"
                                src="{{ URL::asset('asset/images/Maid/' . $maid->passport_image_front) }}"
                                style="height: 70px; width: 70px;">
                        </a>
                    </div>

                    <div class="col-6 text-center ">
                        <label for="passport_image_back" class="col-12 text-start">Passport image back</label>
                        <a href="{{ URL::asset('asset/images/Maid/' . $maid->passport_image_back) }}"
                            data-lightbox="roadtrip">
                            <img id="temprary" src="{{ URL::asset('asset/images/Maid/' . $maid->passport_image_back) }}"
                                style="height: 70px; width: 70px;">
                        </a>
                    </div>

                    <div class="col-6 text-center">
                        <label for="visa_image_front" class="col-12 text-start">Visa image front</label>
                        <a href="{{ URL::asset('asset/images/Maid/' . $maid->visa_image_front) }}"
                            data-lightbox="roadtrip">
                            <img id="temprary" src="{{ URL::asset('asset/images/Maid/' . $maid->visa_image_front) }}"
                                style="height: 70px; width: 70px;">
                        </a>
                    </div>

                    <div class="col-6 text-center p-3">
                        <label for="visa_image_back" class="col-12 text-start">Visa image back</label>
                        <a href="{{ URL::asset('asset/images/Maid/' . $maid->visa_image_back) }}"
                            data-lightbox="roadtrip">
                            <img id="temprary" src="{{ URL::asset('asset/images/Maid/' . $maid->visa_image_back) }}"
                                style="height: 70px; width: 70px;">
                        </a>
                    </div>
                </div>


                @if ($maid->client_id != "")
                    
                
                <h4 class=" mt-3">Client details</h4>
            <table class="table table-border">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone no</th>
                    <th>Detail</th>
                    <th>Remove</th>
                    
                    
                </thead>
                <tbody>
                    @forelse ($client as $cli)
                    <tr>
                        <td>{{$cli->user_name}}</td>
                        <td>{{$cli->email}}</td>
                        <td>{{$cli->contact_number}}</td>
                        
                        <th><a href="{{route('client.show', $cli->id)}}">view</a></th>
                        <td> <form action="{{ route('maid.unAssing')}}" method="POST">
                            @csrf
                            <input name="maid_id" value="{{$maid->id}}" type="hidden">
                            <button class="btn btn-sm dropdown-item m-0 p-0" type="submit" >Un-assign</button>
                        </form>
                        </td>
                        <tr>
                        @empty
                        <td colspan="5" class="text-center">No Maid assign</td>
                    @endforelse      
                    
                </tbody>
            </table>

            @endif


                {{-- <div>
            <label for="created_by">created_by</label>
            <input id="created_by" name="created_by" class="form-control" value="">
        </div> --}}

                {{-- <div class="text-center">
                    <a href="{{ route('maid.edit', $maid->id) }}" class="btn mt-3 btn-primary">Edit</a>

                </div> --}}


        </div>
    @endsection
