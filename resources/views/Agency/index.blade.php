@extends('layouts.vertical', ['page_title' => 'Agency'])

@section('css')
    <link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Agency</a></li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </div>
                <h4 class="page-title">All Agencies</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="col-8 text-center p-3">
                    @if (Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}
                        </p>
                    @endif
                </div>
                <div class="card-body">
                    <h4 class="header-title">Agency</h4>
                    {{-- <p class="text-muted font-13 mb-4">
                    DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction
                    function:
                    <code>$().DataTable();</code>.
                </p> --}}

                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>email</th>
                                <th>Contact Number</th>
                                <th>Agency SOS</th>
                                <th>Agency SSM</th>
                                <th>change password</th>
                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($agencys as $agency)
                                <tr>



                                    <td>{{ $agency->user_name }}</td>
                                    <td>{{ $agency->agency_email }}</td>
                                    <td>{{ $agency->agency_contact_number }}</td>
                                    <td>{{ $agency->agency_sos }}</td>
                                    <td>{{ $agency->agency_ssm }}</td>
                                    <td class="text-center"><a href="/send-mail-for-change-password/{{$agency->user_name}}/{{'agency'}}" class="btn btn-sm btn-success">
                                    Send mail</a></td>
                                    <td class="text-center p-1">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ URL::asset('images/three-dots-vertical.svg') }}">
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                <li><a href="{{ route('agency.show', $agency->id) }}"
                                                        class="btn  btn-sm dropdown-item">Detail</a>
                                                </li>

                                                <li><a href="{{ route('agency.edit', $agency->id) }}"
                                                        class="btn btn-sm dropdown-item">Edit</a></li>

                                                <li>
                                                    <form method="POST"
                                                        action="{{ route('agency.destroy', $agency->user_name) }}">
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
