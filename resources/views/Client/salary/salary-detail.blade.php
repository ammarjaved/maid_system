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
