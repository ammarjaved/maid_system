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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Index</a></li>
                        <li class="breadcrumb-item active">Salary</li>
                    </ol>
                </div>
                <h4 class="page-title">Salary</h4>
            </div>
        </div>
    </div>

    <div class="card p-4">
        <div>
            <h2 class="text-center px-3">{{$user_name}} salary detail</h2>
        </div>
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <th>Month</th>
                <th>Year</th>
                <th>Amount</th>
                <th>Created at</th>
                <th>Status</th>
                <th>Slip</th>
            </thead>
            <tbody>
        @foreach ($salary as $sal)
        <tr>

            <td>{{$sal->month}}</td>
            <td>{{$sal->year}}</td>
            <td>{{$sal->salary_ammount}}</td>
            <td>{{date('d-m-Y', strtotime($sal->created_at))}}</td>
            <td>{{$sal->salary_status == "Pending" ? "Pending" : "Received"}}</td>
            <td class="text-center"><a href="{{ URL::asset('asset/images/Maid/' . $sal->salary_slip) }}"
                data-lightbox="roadtrip">
                <img id="temprary"
                    src="{{ URL::asset('asset/images/Maid/' . $sal->salary_slip) }}"
                    style="height: 40px; width: 40px;">
            </a></td>
            
        </tr>
        @endforeach
    </tbody>
        </table>

    </div>
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
