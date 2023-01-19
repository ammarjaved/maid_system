@extends('layouts.vertical', ['page_title' => 'Dashboard'])

@section('css')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <style>
        div#tooltip-container {
    height: 75%;
}
    </style>
@endsection

@section('content')
    <!-- Start Content-->
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
        <!-- end page title -->

        <div class="row">

            <div class="col-md-6 col-xl-2">
                <div class="card" id="tooltip-container">
                    <div class="card-body">
                        <a href="{{route('client.index')}}"> <i class="fa fa-info-circle text-muted float-end"
                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="" data-bs-original-title="More Info" aria-label="More Info"></i></a>
                        <h4 class="mt-0 font-16">Total Clients</h4>
                        <h2 class="text-primary my-3 text-center"><span
                                data-plugin="counterup">{{ $data['total_clients'] }}</span></h2>
                        {{-- <p class="text-muted mb-0">Client Register this week <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-2">
                <div class="card" id="tooltip-container">
                    <div class="card-body">
                        <a href="{{route('maid.index')}}"> <i class="fa fa-info-circle text-muted float-end"
                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="" data-bs-original-title="More Info" aria-label="More Info"></i></a>
                        <h4 class="mt-0 font-16">Total Maids</h4>
                        <h2 class="text-primary my-3 text-center"><span
                                data-plugin="counterup">{{ $data['total_maids'] }}</span></h2>
                        {{-- <p class="text-muted mb-0">Maids Register this week <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card" id="tooltip-container">
                    <div class="card-body">
                        <a href="#maid_visa_expiry"> <i class="fa fa-info-circle text-muted float-end"
                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="" data-bs-original-title="More Info" aria-label="More Info"></i></a>
                        <h4 class="mt-0 font-16">Maid Visa Expiry in 2 months </h4>
                        <h2 class="text-primary my-3 text-center"><span
                                data-plugin="counterup">{{ $data['visa_expiry'] }}</span></h2>
                        {{-- <p class="text-muted mb-0">Visa Expiry in 7 days <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card" id="tooltip-container">
                    <div class="card-body">
                        <a href="#maid_health_expiry"> <i class="fa fa-info-circle text-muted float-end"
                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="" data-bs-original-title="More Info" aria-label="More Info"></i></a>
                        <h4 class="mt-0 font-16">Maid Health expiry in 2 months</h4>
                        <h2 class="text-primary my-3 text-center"><span
                                data-plugin="counterup">{{ $data['health_expiry'] }}</span></h2>
                        {{-- <p class="text-muted mb-0">Health expiry in 7 days<span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-2" >
                <div class="card" id="tooltip-container">
                    <div class="card-body">
                        <a href="#offline_maids"> <i class="fa fa-info-circle text-muted float-end"
                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="" data-bs-original-title="More Info" aria-label="More Info"></i></a>
                        <h4 class="mt-0 font-16">Offline Maids</h4>
                        <h2 class="text-primary my-3 text-center"><span
                                data-plugin="counterup">{{ $data['total_offline'] }}</span></h2>
                        {{-- <p class="text-muted mb-0">Health expiry in 7 days<span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            {{-- <div class="col-xl-4 col-md-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Lifetime Sales</h4>

                    <div id="cardCollpase1" class="collapse pt-3 show">
                        <div class="text-center">
                            <div id="lifetime-sales" data-colors="#00acc1,#f1556c"></div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                    <h4><i class="fe-arrow-down text-danger me-1"></i>$7.8k</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                    <h4><i class="fe-arrow-up text-success me-1"></i>$1.4k</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                    <h4><i class="fe-arrow-down text-danger me-1"></i>$9.8k</h4>
                                </div>
                            </div> <!-- end row -->

                        </div>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col--> --}}

            {{-- <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Income Amounts</h4>

                    <div id="cardCollpase2" class="collapse pt-3 show">
                        <div class="text-center">
                            <div id="income-amounts" data-colors="#00acc1"></div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                    <h4><i class="fe-arrow-up text-success me-1"></i>641</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                    <h4><i class="fe-arrow-down text-danger me-1"></i>234</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                    <h4><i class="fe-arrow-up text-success me-1"></i>3201</h4>
                                </div>
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col--> --}}

            {{-- <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Total Users</h4>

                    <div id="cardCollpase3" class="collapse pt-3 show">
                        <div class="text-center">
                            <div id="total-users" data-colors="#00acc1,#4b88e4,#e3eaef,#fd7e14"></div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                    <h4><i class="fe-arrow-down text-danger me-1"></i>1k</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                    <h4><i class="fe-arrow-up text-success me-1"></i>3.25k</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                    <h4><i class="fe-arrow-up text-success me-1"></i>28k</h4>
                                </div>
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col--> --}}
        </div>
        <!-- end row -->

        <div class="row">
            {{-- <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Revenue By Location</h4>

                    <div id="cardCollpase4" class="collapse pt-3 show">
                        <div id="world-map-markers" style="height: 433px"></div>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col --> --}}

        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    
                    <h4 class="header-title mb-3" id="maid_health_expiry">Maid Health expiry in 2 months</h4>

                    <div class="inbox-widget" data-simplebar="init" style="max-height: 407px;">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper"
                                        style="height: auto; overflow: hidden scroll;">
                                        <div class="
                                                                                      "
                                            style="padding: 0px;">

                                            <table id="selection-datatable" class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="selection-datatable_info" style="width: 1008px;">
                                                <thead>
                                                    <tr>
                                                        <th>Username</th>
                                                        {{-- <th>Contact no</th> --}}
                                                        <th>Expiry date</th>
                                                      
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data['health'] as $health)
                                                        <tr>
                                                            {{-- <td> --}}
                                                                {{-- <div class="inbox-item">
                                                                    <div class="inbox-item-img"><img
                                                                            src="{{ URL::asset('asset/images/Maid/' . $maid->profile_image) }}"
                                                                            class="rounded-circle" alt="">
                                                                    </div>
                                                                </div> --}}
                                                            {{-- </td> --}}
                                                            <td class="text-capitalize">{{ $health->user_name }}</td>
                                                            {{-- <td>{{$health->health_certificate_status}}</td> --}}
                                                            <td>{{ $health->health_card_expiry }}</td>
                                                            
                                                            <td class="text-center"><a href="{{ route('maid.show', $health->user_name) }}"><i class="fas fa-eye"></i></a></td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div> <!-- end table responsive-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 451px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                            style="height: 367px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </div> <!-- end inbox-widget -->
            </div>
        </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        
                        <h4 class="header-title mb-3" id="maid_visa_expiry">Maid Visa expiry in 2 months</h4>

                        <div class="inbox-widget" data-simplebar="init" style="max-height: 407px;">
                            <div class="simplebar-wrapper" style="margin: 0px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper"
                                            style="height: auto; overflow: hidden scroll;">
                                            <div class="
                                                                                          "
                                                style="padding: 0px;">

                                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Username</th>
                                                            {{-- <th>Contact no</th> --}}
                                                            <th>Expiry date</th>
                                                          
                                                            <th>Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data['maids'] as $maid)
                                                            <tr>
                                                                {{-- <td> --}}
                                                                    {{-- <div class="inbox-item">
                                                                        <div class="inbox-item-img"><img
                                                                                src="{{ URL::asset('asset/images/Maid/' . $maid->profile_image) }}"
                                                                                class="rounded-circle" alt="">
                                                                        </div>
                                                                    </div> --}}
                                                                {{-- </td> --}}
                                                                <td class="text-capitalize">{{ $maid->user_name }}</td>
                                                                {{-- <td>{{$maid->contact_number}}</td> --}}
                                                                <td>{{ $maid->visa_expiry_date }}</td>
                                                                
                                                                <td class="text-center"><a href="{{ route('maid.show', $maid->user_name) }}"><i class="fas fa-eye"></i></a></td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div> <!-- end table responsive-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: 451px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                style="height: 367px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                        </div>
                    </div> <!-- end inbox-widget -->
                </div>
            </div> <!-- end card -->
        </div>
    </div>


    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                
                <h4 class="header-title mb-3" id="offline_maids">Offline Maids</h4>

                <div class="inbox-widget" data-simplebar="init" style="max-height: 407px;">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper"
                                    style="height: auto; overflow: hidden scroll;">
                                    <div class="
                                                                                  "
                                        style="padding: 0px;">

                                        <table id="selection-datatable" class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="selection-datatable_info" style="width: 1008px;">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    {{-- <th>Contact no</th> --}}
                                                    <th>Last update</th>
                                                  
                                                    <th>Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['offline'] as $health)
                                                    <tr>
                                                        {{-- <td> --}}
                                                            {{-- <div class="inbox-item">
                                                                <div class="inbox-item-img"><img
                                                                        src="{{ URL::asset('asset/images/Maid/' . $maid->profile_image) }}"
                                                                        class="rounded-circle" alt="">
                                                                </div>
                                                            </div> --}}
                                                        {{-- </td> --}}
                                                        <td class="text-capitalize">{{ $health->user_name }}</td>
                                                        {{-- <td>{{$health->health_certificate_status}}</td> --}}
                                                        <td>{{ $health->last_updated }}</td>
                                                        
                                                        <td class="text-center"><a href="{{ route('maid.show', $health->user_name) }}"><i class="fas fa-eye"></i></a></td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div> <!-- end table responsive-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 451px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                        style="height: 367px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                </div>
            </div> <!-- end inbox-widget -->
        </div>
    </div>

    </div>
    <!-- end row -->

    </div> <!-- container -->
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
