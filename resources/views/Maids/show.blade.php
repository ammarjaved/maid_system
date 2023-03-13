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


    <div class="container col-md-11">
        <div class="card p-4 mt-4">
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

                <div class="row">

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="first_name">First Name</label>
                                <br>
                                <span class="text-danger" id="er_first_name">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input id="first_name" type="text" name="first_name" class="form-control"
                                    value="{{ old('first_name', $maid->first_name) }}" disabled> 
                            </div>


                            <div class="col-md-6">
                                <label for="last_name">Last Name</label>
                                <br>
                                <span class="text-danger" id="er_last_name">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input id="last_name" type="text" name="last_name" class="form-control test"
                                    value="{{ old('last_name', $maid->last_name) }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <br>
                                <span class="text-danger" id="er_email">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input id="email" type="text" name="email" class="form-control"
                                    value="{{ old('email', $maid->email) }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="gender">Gender</label>
                                <br>
                                <span class="text-danger" id="er_gender">
                                    @error('gender')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input value="{{$maid->gender}}" class="form-control" disabled>
                              
                            </div>
                            <div class="col-md-6">
                                <label for="date_of_birth">Date of Birth</label>
                                <br>
                                <span class="text-danger" id="er_date_of_birth">
                                    @error('date_of_birth')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input id="date_of_birth" type="date" name="date_of_birth" class="form-control"
                                    value="{{ old('date_of_birth', $maid->date_of_birth) }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="contact_number">Contact Number</label>
                                <br>
                                <span class="text-danger" id="er_contact_number">
                                    @error('contact_number')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input id="contact_number" type="number" name="contact_number" class="form-control"
                                    value="{{ old('contact_number', $maid->contact_number) }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="country">Country</label>
                                <br>
                                <span class="text-danger" id="er_country">
                                    @error('country')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="text" name="" id="" value="{{$maid->country}}" disabled class="form-control" disabled>
                             
                                {{-- <input id="country" name="country" class="form-control" value="{{old('country')}}"> --}}
                            </div>

                            <div class="col-md-6">
                                <label for="education">Education</label>
                                <br>
                                <span class="text-danger" id="er_education">
                                    @error('education', $maid->education)
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input id="education" name="education" class="form-control" value="{{ old('education',$maid->education) }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label for="skills">Skills</label>
                                <br>
                                <span class="text-danger" id="er_skills">
                                    @error('skills')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input id="skills" name="skills" class="form-control"
                                    value="{{ old('skills', $maid->skills) }}" disabled>
                            </div>


                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12 text-center p-2"> <label for="profile_image">Profile Image</label></div>

                        <div class="col-md-12 text-center">
                            <a href="{{ URL::asset('asset/images/Maid/' . $maid->profile_image) }}"
                                data-lightbox="roadtrip">
                                <img src="{{ URL::asset('asset/images/Maid/' . $maid->profile_image) }}"
                                    id="profile_image_p" alt=" " height="162" width="140">
                            </a>
                        </div>
                     
                    </div>





                        <ul class="nav nav-tabs border-0 mt-3" id="myTab" role="tablist"
                            style="background: #EAEFF4">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="passport-tab" data-bs-toggle="tab"
                                    data-bs-target="#passport" type="button" role="tab" aria-controls="passport"
                                    aria-selected="true">Passport Info</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="visa-tab" data-bs-toggle="tab" data-bs-target="#visa"
                                    type="button" role="tab" aria-controls="visa" aria-selected="false">Visa
                                    Info</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="healthInfo-tab" data-bs-toggle="tab"
                                    data-bs-target="#healthInfo" type="button" role="tab"
                                    aria-controls="healthInfo" aria-selected="false">Health
                                    Info</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                                    type="button" role="tab" aria-controls="login" aria-selected="false">Login
                                    Info</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="otherInfo-tab" data-bs-toggle="tab"
                                    data-bs-target="#otherInfo" type="button" role="tab" aria-controls="otherInfo"
                                    aria-selected="false">Other
                                    Info</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="client-tab" data-bs-toggle="tab"
                                    data-bs-target="#client" type="button" role="tab" aria-controls="client"
                                    aria-selected="false">Client
                                    Info</button>
                            </li>

                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="passport" role="tabpanel"
                                aria-labelledby="passport-tab">
                                <div class="col-md-6">
                                    <label for="passport_number">Passport Number</label>
                                    <br>
                                    <span class="text-danger" id="er_passport_number">
                                        @error('passport_number')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input id="passport_number" name="passport_number" class="form-control"
                                        value="{{ old('passport_number', $maid->passport_number) }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label for="passport_expiry">Passport Expiry</label>
                                    <br>
                                    <span class="text-danger" id="er_passport_expiry">
                                        @error('passport_expiry')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input id="passport_expiry" type="date" name="passport_expiry"
                                        class="form-control" value="{{ old('passport_expiry', $maid->passport_expiry) }}" disabled>
                                </div>
                                 
                                        <label for="passport_image_front">Passport Image 1</label>
                                         

                                    <div class="col-md-6 text-center p-3">

                                        @if (substr(strrchr($maid->passport_image_front, '.'), 1) == 'pdf')
                                            <a
                                                href="/download-client-file/{{ $maid->passport_image_front }}/{{ 'maid' }}">
                                                <button type="button" class="btn btn-success mt-4">Download</button></a>
                                        @else
                                            <a href="{{ URL::asset('asset/images/Maid/' . $maid->passport_image_front) }}"
                                                data-lightbox="roadtrip">
                                                <img id="temprary"
                                                    src="{{ URL::asset('asset/images/Maid/' . $maid->passport_image_front) }}"
                                                    style="height: 70px; width: 70px;">
                                            </a>
                                        @endif
                                    </div>
                             

                              <label for="passport_image_back">Passport image 2</label>
                                    <div class="col-md-6 text-center p-3">
                                        
                        
                                      

                                        @if (substr(strrchr($maid->passport_image_back, '.'), 1) == 'pdf')
                                            <a
                                                href="/download-client-file/{{ $maid->passport_image_back }}/{{ 'maid' }}">
                                                <button type="button" class="btn btn-success mt-4">Download</button></a>
                                        @else
                                            <a href="{{ URL::asset('asset/images/Maid/' . $maid->passport_image_back) }}"
                                                data-lightbox="roadtrip">
                                                <img id="temprary"
                                                    src="{{ URL::asset('asset/images/Maid/' . $maid->passport_image_back) }}"
                                                    style="height: 70px; width: 70px;">
                                            </a>
                                        @endif
                                    </div>
                            

                            </div>

                            <div class="tab-pane fade " id="visa" role="tabpanel" aria-labelledby="visa-tab">

                                <div class="col-md-6">
                                    <label for="visa_expiry_date">Visa Expiry Date</label>
                                    <br>
                                    <span class="text-danger" id="er_visa_expiry_date">
                                        @error('visa_expiry_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input id="visa_expiry_date" type="date" name="visa_expiry_date"
                                        class="form-control" value="{{ old('visa_expiry_date') }}" disabled>
                                </div>
                                <label for="visa_image_front">Visa image 1</label>
                                    <div class="col-md-6 text-center">

                                        @if (substr(strrchr($maid->visa_image_front, '.'), 1) == 'pdf')
                                            <a
                                                href="/download-client-file/{{ $maid->visa_image_front }}/{{ 'maid' }}">
                                                <button type="button" class="btn btn-success mt-4">Download</button></a>
                                        @else
                                            <a href="{{ URL::asset('asset/images/Maid/' . $maid->visa_image_front) }}"
                                                data-lightbox="roadtrip">
                                                <img id="temprary"
                                                    src="{{ URL::asset('asset/images/Maid/' . $maid->visa_image_front) }}"
                                                    style="height: 70px; width: 70px;">
                                            </a>
                                        @endif
                                    </div>


                        
     <label for="visa_image_back">Visa image 2</label>
                                    <div class="col-6 text-center p-3">

                                        @if (substr(strrchr($maid->visa_image_back, '.'), 1) == 'pdf')
                                            <a
                                                href="/download-client-file/{{ $maid->visa_image_back }}/{{ 'maid' }}">
                                                <button type="button" class="btn btn-success mt-4">Download</button></a>
                                        @else
                                            <a href="{{ URL::asset('asset/images/Maidz/' . $maid->visa_image_back) }}"
                                                data-lightbox="roadtrip">
                                                <img id="temprary"
                                                    src="{{ URL::asset('asset/images/Maid/' . $maid->visa_image_back) }}"
                                                    style="height: 70px; width: 70px;">
                                            </a>
                                        @endif
                                    </div>

 
                            </div>

                            <div class="tab-pane fade " id="healthInfo" role="tabpanel"
                                aria-labelledby="healthInfo-tab">
                                <div class="col-md-6">
                                    <label for="health_certificate_status">Health Certificate Status</label>
                                    <br><span class="text-danger" id="er_health_certificate_status">
                                        @error('health_certificate_status')
                                            {{ $message }}
                                        @enderror
                                    </span>
 
                                 <input disabled value="{{$health->health_certificate_status}}" name="" id="" class="form-control" disabled>
                                    {{-- <input id="health_certificate_status" name="health_certificate_status" class="form-control" value="{{old('health_certificate_status')}}"> --}}
                                </div>
                                


                                <div class="col-md-6">
                                    <label for="health_card_expiry">Health Card Expiry </label>
                                    <br> <span class="text-danger" id="er_health_card_expiry">
                                        @error('health_card_expiry')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input id="health_card_expiry" type="date" name="health_card_expiry"
                                        class="form-control"
                                        value="{{ old('health_card_expiry', $health->health_card_expiry) }}" disabled>
                                </div>

                              
<label for="health_certificate">Health Certificate</label>
                                        <div class="col-md-6 text-center">
                                            @if (substr(strrchr($health->health_certificate, '.'), 1) == 'pdf')
                                                <a
                                                    href="/download-file/{{ $health->health_certificate }}/{{ 'maid' }}">
                                                    <button type="button"
                                                        class="btn btn-success mt-4">Download</button></a>
                                            @else
                                                <a href="{{ URL::asset('asset/images/Maid/' . $health->health_certificate) }}"
                                                    data-lightbox="roadtrip">
                                                    <img id="temprary"
                                                        src="{{ URL::asset('asset/images/Maid/' . $health->health_certificate) }}"
                                                        alt="no image found" style="height: 70px; width: 70px;">
                                                </a>
                                            @endif
                                        </div>
                                  

                            </div>
                            <div class="tab-pane fade  " id="login" role="tabpanel" aria-labelledby="login-tab">
                                <div class="col-md-6">
                                    <label for="user_name">Username</label>
                                    <br><span class="text-danger" id="er_user_name">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input name="name" value="{{ $maid->user_name }}" type="hidden">
                                    <input id="user_name" class="form-control" value="{{ $maid->user_name }}"
                                        style="background-color: #00000021" disabled>
                                </div>


                            </div>



                            <div class="tab-pane fade " id="otherInfo" role="tabpanel" aria-labelledby="otherInfo-tab">


                                <div class="col-md-6">
                                    <label for="permanent_address">Agency PIC Number</label>
                                    <br><span class="text-danger" id="er_permanent_address">
                                        @error('permanent_address')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input id="permanent_address" name="permanent_address" class="form-control"
                                        value="{{ old('permanent_address', $maid->permanent_address) }}" disabled>
                                </div>






                                <div class="col-md-6">
                                    <label for="emergency_contact">Emergency Contact</label>
                                    <br><span class="text-danger" id="er_emergency_contact">
                                        @error('emergency_contact')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input id="emergency_contact" type="number" name="emergency_contact"
                                        class="form-control"
                                        value="{{ old('emergency_contact', $maid->emergency_contact) }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label for="occupation">Occupation</label>
                                    <br><span class="text-danger" id="er_occupation">
                                        @error('occupation')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input id="occupation" name="occupation" class="form-control"
                                        value="{{ old('occupation', $maid->occupation) }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label for="religion">Religion</label>
                                    <br><span class="text-danger" id="er_religion">
                                        @error('religion')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input id="religion" name="religion" class="form-control"
                                        value="{{ old('religion', $maid->religion) }}" disabled>
                                </div>




                            </div>

                            <div class="tab-pane fade " id="client" role="tabpanel" aria-labelledby="client-tab">

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

                            @else
                            <h3 class="text-center">No CLlient Found</h3>
                
                            @endif
                
                            </div>



                        </div>

                
                    </div>
                </div>

                </div>
             

                {{-- <div>
            <label for="created_by">created_by</label>
            <input id="created_by" name="created_by" class="form-control" value="">
        </div> --}}

                {{-- <div class="text-center">
                    <a href="{{ route('maid.edit', $maid->id) }}" class="btn mt-3 btn-primary">Edit</a>

                </div> --}}


        </div>
    @endsection
