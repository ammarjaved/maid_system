@extends('layouts.vertical', ['page_title' => 'Maid'])

@section('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        input[type=file]::file-selector-button {
            border: 0px;
            padding: .2em .4em;
            border-radius: .2em;
            transition: 1s;

        }
    </style>
@endsection



@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('maid.index') }}">Maid</a></li>
                        <li class="breadcrumb-item active">create</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Maid</h4>
            </div>
        </div>
    </div>


    <div class="container col-md-11">
        <div class="card p-3 ">

            <form action="{{ route('maid.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <h1 class="text-center">Add Maid</h1>
                @if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}</p>
                @endif
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
                                    value="{{ old('first_name') }}">
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
                                    value="{{ old('last_name') }}">
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
                                    value="{{ old('email') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="gender">Gender</label>
                                <br>
                                <span class="text-danger" id="er_gender">
                                    @error('gender')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <select name="gender" id="gender" class="form-select">
                                    <option value="{{ old('gender') }}" selected="" hidden>
                                        {{ old('gender', 'Select Gender') }}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>

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
                                    value="{{ old('date_of_birth') }}">
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
                                    value="{{ old('contact_number') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="country">Country</label>
                                <br>
                                <span class="text-danger" id="er_country">
                                    @error('country')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <select name="country" class="form-select">
                                    <option value="{{ old('country') }}" selected="" hidden>
                                        {{ old('country', 'Select Country') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->name }}" class="form-control">{{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                {{-- <input id="country" name="country" class="form-control" value="{{old('country')}}"> --}}
                            </div>

                            <div class="col-md-6">
                                <label for="education">Education</label>
                                <br>
                                <span class="text-danger" id="er_education">
                                    @error('education')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input id="education" name="education" class="form-control" value="{{ old('education') }}">
                            </div>

                            <div class="col-md-6">
                                <label for="skills">Skills</label>
                                <br>
                                <span class="text-danger" id="er_skills">
                                    @error('skills')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input id="skills" name="skills" class="form-control" value="{{ old('skills') }}">
                            </div>


                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12 text-center p-2"> <label for="profile_image">Profile Image</label></div>

                        <div class="col-md-12 text-center">
                            <img src="{{ URL::asset('assets/images/userImage.gif') }}" id="profile_image_p"
                                alt=" " height="162" width="140">
                        </div>
                        <div class="col-md-12">
                            <br>
                            <span class="text-danger" id="er_profile_image">
                                @error('profile_image')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input id="profile_image" type="file" name="profile_image" class="form-control"
                                value="{{ old('profile_image') }}" accept="image/*"
                                style="    width: 30% !important;
                            color: white;
                            border: 0px;
                            margin-left: 35%;"
                                onchange="encodeImageFileAsURL(this)">
                        </div>
                    </div>






                    {{-- <div>
            <label for="full_name">Full Name</label>
            <span class="text-danger">@error('full_name'){{ $message }}@enderror</span>
            <input id="full_name" name="full_name" class="form-control" value="{{old('full_name')}}">
        </div> --}}

















                </div>
                <ul class="nav nav-tabs border-0 mt-3" id="myTab" role="tablist" style="background: #EAEFF4">
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
                        <button class="nav-link" id="healthInfo-tab" data-bs-toggle="tab" data-bs-target="#healthInfo"
                            type="button" role="tab" aria-controls="healthInfo" aria-selected="false">Health
                            Info</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                            type="button" role="tab" aria-controls="login" aria-selected="false">Login
                            Info</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="otherInfo-tab" data-bs-toggle="tab" data-bs-target="#otherInfo"
                            type="button" role="tab" aria-controls="otherInfo" aria-selected="false">Other
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
                                value="{{ old('passport_number') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="passport_expiry">Passport Expiry</label>
                            <br>
                            <span class="text-danger" id="er_passport_expiry">
                                @error('passport_expiry')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input id="passport_expiry" type="date" name="passport_expiry" class="form-control"
                                value="{{ old('passport_expiry') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="passport_image_front">Passport Image 1</label>
                            <br>
                            <span class="text-danger" id="er_passport_image_front">
                                @error('passport_image_front')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input id="passport_image_front" name="passport_image_front" type="file"
                                class="form-control" value="{{ old('passport_image_front') }}" accept="image/*,.pdf">
                        </div>

                        <div class="col-md-6">
                            <label for="passport_image_back">Passport image 2</label>
                            <br>
                            <span class="text-danger" id="er_passport_image_back">
                                @error('passport_image_back')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input id="passport_image_back" type="file" name="passport_image_back"
                                class="form-control" value="{{ old('passport_image_back') }}" accept="image/*,.pdf">
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
                            <input id="visa_expiry_date" type="date" name="visa_expiry_date" class="form-control"
                                value="{{ old('visa_expiry_date') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="visa_image_front">Visa image 1</label>
                            <br>
                            <span class="text-danger" id="er_visa_image_front">
                                @error('visa_image_front')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input id="visa_image_front" name="visa_image_front" type="file" class="form-control"
                                value="{{ old('visa_image_front') }}" accept="image/*,.pdf">
                        </div>
                        <div class="col-md-6">
                            <label for="visa_image_back">Visa image 2</label>
                            <br> <span class="text-danger" id="er_visa_image_back">
                                @error('visa_image_back')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input id="visa_image_back" name="visa_image_back" type="file" class="form-control"
                                value="{{ old('visa_image_back') }}" accept="image/*,.pdf">
                        </div>


                    </div>

                    <div class="tab-pane fade " id="healthInfo" role="tabpanel" aria-labelledby="healthInfo-tab">
                        <div class="col-md-6">
                            <label for="health_certificate_status">Health Certificate Status</label>
                            <br><span class="text-danger" id="er_health_certificate_status">
                                @error('health_certificate_status')
                                    {{ $message }}
                                @enderror
                            </span>

                            <select class="form-select" name="health_certificate_status" id="health_certificate_status">
                                <option value="{{ old('health_certificate_status', '') }}" hidden>
                                    {{ old('health_certificate_status', 'Select Value') }}</option>
                                <option value="valid">valid</option>
                                <option value="expire">expire</option>
                            </select>
                            {{-- <input id="health_certificate_status" name="health_certificate_status" class="form-control" value="{{old('health_certificate_status')}}"> --}}
                        </div>

                        <div class="col-md-6">
                            <label for="health_certificate">Health Certificate</label>
                            <br> <span class="text-danger" id="er_health_certificate">
                                @error('health_certificate')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input id="health_certificate" name="health_certificate" type="file" class="form-control"
                                value="{{ old('health_certificate') }}" accept="image/*,.pdf">
                        </div>


                        <div class="col-md-6">
                            <label for="health_card_expiry">Health Card Expiry </label>
                            <br> <span class="text-danger" id="er_health_card_expiry">
                                @error('health_card_expiry')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input id="health_card_expiry" type="date" name="health_card_expiry" class="form-control"
                                value="{{ old('health_card_expiry') }}">
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
                            <input id="user_name" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <br><span class="text-danger" id="er_password">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="input-group input-group-merge">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter your password">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="password_confirmation">Confirm Password</label>
                            <br> <span class="text-danger" id="er_password_confirmation">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>
                            <div class="input-group input-group-merge">
                                <input type="password" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}" id="password_confirmation"
                                    class="form-control" placeholder="Enter your password">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>

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
                                value="{{ old('permanent_address') }}">
                        </div>






                        <div class="col-md-6">
                            <label for="emergency_contact">Emergency Contact</label>
                            <br><span class="text-danger" id="er_emergency_contact">
                                @error('emergency_contact')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input id="emergency_contact" type="number" name="emergency_contact" class="form-control"
                                value="{{ old('emergency_contact') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="occupation">Occupation</label>
                            <br><span class="text-danger" id="er_occupation">
                                @error('occupation')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input id="occupation" name="occupation" class="form-control"
                                value="{{ old('occupation') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="religion">Religion</label>
                            <br><span class="text-danger" id="er_religion">
                                @error('religion')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input id="religion" name="religion" class="form-control" value="{{ old('religion') }}">
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


@section('script')
    <script>
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                // console.log('RESULT', reader.result)
                $("#profile_image_p").attr("src", reader.result);
                $("#profile_image_p").attr('height', '162');
                $("#profile_image_p").attr('width', '140');
            }
            reader.readAsDataURL(file);
        }


        function submitFoam() {
            let ret = true

            const inputElements = document.querySelectorAll('input.form-control');
            inputElements.forEach(inputElement => {
                if ($(`#${inputElement.id}`).val() == "") {
                    $(`#er_${inputElement.id}`).html("This feild is required");
                    ret = false
                }

            });
            if ($('#contact_number').val().length < 9 || $('#contact_number').val().length > 11) {
                $('#er_contact_number').html("Number must be between 9 - 11")
                ret = false
            }
            if ($('#emergency_contact').val().length < 9 || $('#emergency_contact').val().length > 11) {
                $('#er_emergency_contact').html("Number must be between 9 - 11")
                ret = false
            }
            if($('#password').val.length < 8){
                $('er_password').html("Password must be atleast 8 character")
                ret =  false
            }
            if($('#password').val != $('#password_confirmation').val()){
                $('#er_password_confirmation').html("Password dosn't match")
                ret = false
            }

            return ret
        }


        $("input").change(function() {

            if ($(`#${this.id}`).val() !== '') {
                $(`#er_${this.id}`).html("")
            } else {

            }

        })


        //         $('input[type="file"]').change(function(){
        //             console.log(this.id);
        //             var fileInput = document.getElementById(this.id);
        //             console.log(fileInput);
        // if (fileInput.files && fileInput.files.length > 0) {
        //     console.log("No files selected.");
        // }
        //         })
    </script>
@endsection
