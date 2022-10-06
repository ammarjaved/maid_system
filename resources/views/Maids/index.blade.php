@extends('layouts.vertical', ['page_title' => 'Client'])

@section('css')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="header-title">Clients</h4>
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
                                <th>Gender</th>
                                <th>Education</th>
                                <th>Skills</th>
                                <th class="text-center">Action</th>

                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($maids as $maid)
                                <tr>



                                    <td>{{ $maid->user_name }}</td>
                                    <td>{{ $maid->email }}</td>
                                    <td>{{ $maid->contact_number }}</td>
                                    <td class="text-capitalize">{{ $maid->gender }}</td>
                                    <td>{{ $maid->education }}</td>
                                    <td>{{ $maid->skills }}</td>
                                    <td class="text-center p-1">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ URL::asset('images/three-dots-vertical.svg') }}">
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                <li><a href="{{route ('maid.show',$maid->id)}}" class="btn  btn-sm dropdown-item">Detail</a>
                                                </li>

                                                <li><a href="{{ route('maid.edit', $maid->id) }}"
                                                        class="btn btn-sm dropdown-item">Edit</a></li>
                                                
                                                <li>
                                                    <form method="POST" action="{{ route('maid.destroy', $maid->id) }}">
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
