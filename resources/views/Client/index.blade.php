@extends('layouts.vertical', ['page_title' => 'Client'])

@section('css')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Client</a></li>
                        <li class="breadcrumb-item active">index</li>
                    </ol>
                </div>
                <h4 class="page-title">Clients</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="text-center">
                <div class="col-8  p-3 pb-0">
                    @if (Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}
                        </p>
                    @endif
                </div>
            </div>
                <div class="card-body">
                    <h4 class="header-title">Clients</h4>

                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>email</th>
                                <th>Contact Number</th>
                                <th>House Coords</th>
                                {{-- <th>Created By</th> --}}
                                <th>Client Address</th>
                                <th>Boundary</th>
                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($clients as $client)
                                <tr>



                                    <td>{{ $client->user_name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->contact_number }}</td>
                                    <td>{{ $client->house_coords }}</td>
                                    {{-- <td>{{ $client->created_by }}</td> --}}
                                    <td>{{ $client->client_address }}</td>

                                    <td class="text-center p-1">

                                        <a href="/show-boundary/{{ $client->user_name }}">view</a>
                                        {{-- <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ URL::asset('images/three-dots-vertical.svg') }}">
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                <li><a href="/add-boundry/{{ $client->user_name }}"
                                                        class="btn btn-sm dropdown-item">Add</a></li>
                                                <li><a href="/edit-boundry/{{ $client->user_name }}"
                                                        class="btn  btn-sm dropdown-item">Edit</a>
                                                </li>
                                                <li><a href="/show-boundary/{{ $client->user_name }}"
                                                        class="btn  btn-sm dropdown-item">Show</a>
                                                </li>


                                            </ul>
                                        </div> --}}
                                    </td>



                                    <td class="text-center p-1">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ URL::asset('images/three-dots-vertical.svg') }}">
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                <li><a href="{{ route('client.show', $client->id) }}"
                                                        class="btn  btn-sm dropdown-item">Detail</a>
                                                </li>

                                                <li><a href="{{ route('client.edit', $client->id) }}"
                                                        class="btn btn-sm dropdown-item">Edit</a></li>

                                                <li>
                                                    <form method="POST"
                                                        action="{{ route('client.destroy', $client->user_name) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn  btn-sm dropdown-item"
                                                            onclick="return confirm('Are you Sure')">Delete</button>
                                                    </form>
                                                </li>


                                            </ul>
                                        </div>
                                    </td>


                                </tr>
                            @endforeach


                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('script')
    <!-- third party js -->
    <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <!-- end demo js-->
@endsection
