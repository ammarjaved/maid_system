@extends('layouts.vertical', ['page_title' => 'Client'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Client</a></li>
                        <li class="breadcrumb-item active">edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Client Detail</h4>
            </div>
        </div>
    </div>


    <div class="container col-7">
        <div class="card p-3 ">
            <h2 class="text-center">Client Detail</h2>

            <div class="first">


                <div>
                    <label for="user_name">User Name</label>
                    <span class="text-danger">
                        @error('user_name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="user_name" name="user_name" class="form-control" disabled
                        value="{{ old('user_name', $client->user_name) }}">
                </div>

                <div>
                    <label for="first_name">First Name</label>
                    <span class="text-danger">
                        @error('first_name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="first_name" name="first_name" class="form-control" disabled
                        value="{{ old('first_name', $client->first_name) }}">
                </div>

                <div>
                    <label for="last_name">Last Name</label>
                    <span class="text-danger">
                        @error('last_name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="last_name" name="last_name" class="form-control" disabled
                        value="{{ old('last_name', $client->last_name) }}">
                </div>

                <div>
                    <label for="full_name">Full Name</label>
                    <span class="text-danger">
                        @error('full_name')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="full_name" name="full_name" class="form-control" disabled
                        value="{{ old('full_name', $client->full_name) }}">
                </div>

                <div>
                    <label for="email">Email</label>
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="email" name="email" class="form-control" disabled
                        value="{{ old('email', $client->email) }}">
                </div>
                <input value="{{ $client->id }}" id="client_id" type="hidden">
                <div>
                    <label for="contact_number">Contact Number</label>
                    <span class="text-danger">
                        @error('contact_number')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="contact_number" type="number" name="contact_number" disabled class="form-control"
                        value="{{ old('contact_number', $client->contact_number) }}">
                </div>
                <div>
                    <label for="emergency_contact">Emergency Contact</label>
                    <span class="text-danger">
                        @error('emergency_contact')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="emergency_contact" type="number" name="emergency_contact" disabled class="form-control"
                        value="{{ old('emergency_contact', $client->emergency_contact) }}">
                </div>
                <div>
                    <label for="client_address">Client address</label>
                    <span class="text-danger">
                        @error('client_address')
                            {{ $message }}
                        @enderror
                    </span>
                    <input id="client_address" name="client_address" class="form-control" disabled
                        value="{{ old('client_address', $client->client_address) }}">
                </div>
                 

                <div class="row">

                    <div class="col-6 text-center">
                        <div>
                            <label for="profile_image">Profile Image</label>
                        </div>
                        
                        <a href="{{ URL::asset('asset/images/Client/' . $client->profile_image) }}"
                            data-lightbox="roadtrip">
                            <img id="temprary" src="{{ URL::asset('asset/images/Client/' . $client->profile_image) }}"
                                style="height: 100px; width: 100px;">
                        </a>
                    </div>
                    <div class="col-6 text-center">
                        <div>
                            <label for="client_identity">Client Identity card / Passport no</label>
                        </div>

                        @if (substr(strrchr( $client->client_identity_img, '.'), 1) == "pdf")
                        <a href="/download-file/{{$client->client_identity_img}}/{{'client'}}"> <button type="button"  class="btn btn-success mt-4">Download</button></a>
                        @else
                        <a href="{{ URL::asset('asset/images/Client/' . $client->client_identity_img) }}"
                            data-lightbox="roadtrip">
                            <img id="temprary"
                                src="{{ URL::asset('asset/images/Client/' . $client->client_identity_img) }}"
                                style="height: 100px; width: 100px;">
                        </a>
                        @endif
                        
                    </div>
                </div>
            </div>

            <h4 class="">Maid details</h4>
            <table class="table table-border">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone no</th>
                    <th>Detail</th>
                    <th>Remove</th>


                </thead>
                <tbody>
                    @forelse ($maids as $maid)
                        <tr>
                            <td>{{ $maid->user_name }}</td>
                            <td>{{ $maid->email }}</td>
                            <td>{{ $maid->contact_number }}</td>

                            <th><a href="{{ route('maid.show', $maid->user_name) }}">view</a></th>
                            <td>
                                <form action="{{ route('maid.unAssing') }}" method="POST">
                                    @csrf
                                    <input name="maid_id" value="{{ $maid->id }}" type="hidden">
                                    <button class="btn btn-sm dropdown-item m-0 p-0" type="submit">Un-assign</button>
                                </form>
                            </td>
                        <tr>
                        @empty
                            <td colspan="5" class="text-center">No Maid assign</td>
                    @endforelse

                </tbody>
            </table>
            {{-- <div class="text-center p-3">
                </button>
                <a href="{{ route('client.edit', $client->id) }}"><button class="btn btn-success"
                        id="submit">Edit</button></a>
            </div> --}}







        </div>
    @endsection
