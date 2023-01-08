@extends('layouts.vertical', ['page_title' => 'Dashboard'])

@section('css')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endsection

@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6 col-xl-3">
            <div class="card" id="tooltip-container">
                <div class="card-body">
                    <a href="#"> <i class="fa fa-info-circle text-muted float-end"
                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="" data-bs-original-title="More Info" aria-label="More Info"></i></a>
                    <h4 class="mt-0 font-16">Total Agencies</h4>
                    <h2 class="text-primary my-3 text-center"><span
                            data-plugin="counterup">{{ $data['total_agency'] }}</span></h2>
                    {{-- <p class="text-muted mb-0">Client Register this week <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card" id="tooltip-container">
                <div class="card-body">
                    <a href="#"> <i class="fa fa-info-circle text-muted float-end"
                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="" data-bs-original-title="More Info" aria-label="More Info"></i></a>
                    <h4 class="mt-0 font-16">Total Clients</h4>
                    <h2 class="text-primary my-3 text-center"><span
                            data-plugin="counterup">{{ $data['total_clients'] }}</span></h2>
                    {{-- <p class="text-muted mb-0">Client Register this week <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card" id="tooltip-container">
                <div class="card-body">
                    <a href="#"> <i class="fa fa-info-circle text-muted float-end"
                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="" data-bs-original-title="More Info" aria-label="More Info"></i></a>
                    <h4 class="mt-0 font-16">Total Maids</h4>
                    <h2 class="text-primary my-3 text-center"><span
                            data-plugin="counterup">{{ $data['total_maids'] }}</span></h2>
                    {{-- <p class="text-muted mb-0">Client Register this week <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                </div>
            </div>
        </div>
    </div>
</div>










@endsection

@section('script')
    <!-- third party js -->
    <script src="{{ asset('assets/libs/jquery-sparkline/jquery-sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/libs/admin-resources/admin-resources.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-2.init.js') }}"></script>
    <!-- end demo js-->
@endsection
