@extends('layouts.vertical', ['page_title' => 'Maid'])

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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Maid</a></li>
                        <li class="breadcrumb-item active">index</li>
                    </ol>
                </div>
                <h4 class="page-title">Maids</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
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
                                
                                <th>Skills</th>
                                <th>Assign to</th>
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
                                    
                                    <td>{{ $maid->skills }}</td>
                                    <td class="text-capitalize">
                                        @if ($maid->client_id != "")
                                            
                                        
                                        <?php
                                        $assign_clients=\App\Models\client::where('id',$maid->client_id)->get();

                                        
                                        ?>
                                         @forelse ($assign_clients as $assign_client)
                                         {{$assign_client->user_name}}
                                         @empty
                                             None
                                         @endforelse
                                         @else

                                         no client assign
                                         @endif
                                    </td>
                                    <td class="text-center p-1">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ URL::asset('images/three-dots-vertical.svg') }}">
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                <li><a href="{{ route('maid.show', $maid->id) }}"
                                                        class="btn  btn-sm dropdown-item">Detail</a>
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
                                                <li>
                                                    @if ($maid->client_id == '')
                                                        <button class="btn btn-sm dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        onclick="maidID({{ $maid->id }})">Assign</button>
                                                    @else
                                                    <form action="{{ route('maid.unAssing')}}" method="POST">
                                                        @csrf
                                                        <input name="maid_id" value="{{$maid->id}}" type="hidden">
                                                        <button class="btn btn-sm dropdown-item" type="submit" >Un-assign</button>
                                                    </form>

                                                    @endif
                                                    
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



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign to Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            
                
                <form onsubmit="return clientId()" method="POST" action="{{ route('maid.assign') }}" >
                    @csrf
                <div class="modal-body">
                    <input type="hidden" id="maid_id" name="maid_id" class="form-control">
                    <span id="er_client_id" class="text-danger"></span>
                    <select name="client_id" class="form-control" id="client_id">
                        <option value="" hidden>Select Client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" class="form-control">{{ $client->user_name }}</option>
                        @endforeach

                    </select>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>

                </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        function maidID(id) {
            $('#maid_id').val(id);
        }
        function clientId(){
            
            
            let id = $('#client_id').val();
            if(id == ""){
                $("#er_client_id").html("Select Client First")
                return false;
            }
           
        }
    </script>
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
