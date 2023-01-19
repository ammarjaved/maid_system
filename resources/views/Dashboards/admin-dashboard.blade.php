@extends('layouts.vertical', ['page_title' => 'Dashboard'])

@section('css')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <style>
        div#tooltip-container {
    height: 80%;
}
    </style>
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

            <div class="col-md-6 col-xl-2" style="cursor: pointer" onclick="agency()">
                <a href="/agency">
                <div class="card" id="tooltip-container">
                    <div class="card-body p-2">
                        {{-- <a href="#"> <i class="fa fa-info-circle text-muted float-end"
                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="" data-bs-original-title="More Info" aria-label="More Info"></i></a> --}}
                        <h6 class="mt-0 font-16 text-center">Total Agencies</h6>
                        <h3 class="text-primary my-2 text-center"><span
                                data-plugin="counterup">{{ $data->total_agency }}</span></h3>
                        {{-- <p class="text-muted mb-0">Client Register this week <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-6 col-xl-2">
                <a href="/client">
                <div class="card" id="tooltip-container">
                    <div class="card-body p-2">
                        {{-- <a href="#"> <i class="fa fa-info-circle text-muted float-end"
                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="" data-bs-original-title="More Info" aria-label="More Info"></i></a> --}}
                        <h6 class="mt-0 font-16 text-center">Total Clients</h6>
                        <h3 class="text-primary my-2 text-center"><span
                                data-plugin="counterup">{{ $data->total_clients }}</span></h3>
                        {{-- <p class="text-muted mb-0">Client Register this week <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                    </div>
                </div>
            </a>
            </div>

            <div class="col-md-6 col-xl-2">
                <a href="/maid">
                <div class="card" id="tooltip-container">
                    <div class="card-body p-2">
                        {{-- <a href="#"> <i class="fa fa-info-circle text-muted float-end"
                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="" data-bs-original-title="More Info" aria-label="More Info"></i></a> --}}
                        <h6 class="mt-0 font-16 text-center">Total Maids</h6>
                        <h3 class="text-primary my-2 text-center"><span
                                data-plugin="counterup">{{ $data->total_maids }}</span></h3>
                        {{-- <p class="text-muted mb-0">Client Register this week <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                    </div>
                </div>
            </a>
            </div>

            <div class="col-md-6 col-xl-2" style="cursor: pointer" onclick="fade_fun('offline')">
                <div class="card" id="tooltip-container">
                    <div class="card-body p-2">
                        {{-- <a href="#"> <i class="fa fa-info-circle text-muted float-end"
                            data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="" data-bs-original-title="More Info" aria-label="More Info"></i></a> --}}
                        <h6 class="mt-0 font-16 text-center">Total offline Maids</h6>
                        <h3 class="text-primary my-2 text-center"><span
                                data-plugin="counterup">{{ $data->total_offline }}</span></h3>
                        {{-- <p class="text-muted mb-0">Client Register this week <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-xl-2" style="cursor: pointer" onclick="fade_fun('health')">
                <div class="card" id="tooltip-container">
                    <div class="card-body p-2">

                        <h6 class="mt-0 font-16 ">Maid health expiry in 2 month</h6>
                        <h3 class="text-primary my-2 text-center"><span
                                data-plugin="counterup">{{ $data->health_expiry }}</span></h3>
                        {{-- <p class="text-muted mb-0">Client Register this week <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-2" style="cursor: pointer; " onclick="fade_fun('visa')">
                <div class="card" id="tooltip-container">
                    <div class="card-body p-2">

                        <h6 class="mt-0 font-16 ">Maid visa expiry in 2 months</h6>
                        <h3 class="text-primary my-2 text-center"><span data-plugin="counterup">{{ $data->visa_expiry }}</span></h3>
                        {{-- <p class="text-muted mb-0">Client Register this week <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6" id="visa" style="display: none">
                <div class="card">
                    <div class="card-body">

                        <div class="card-widgets">
                            <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                            <a data-bs-toggle="collapse" href="#visaCollpase4" role="button" aria-expanded="true" aria-controls="cardCollpase4" class=""><i class="mdi mdi-minus"></i></a>
                            <a href="javascript: void(0);" onclick="fade_fun('visa')"><i class="mdi mdi-close"></i></a>
                        </div>
                        <h4 class="header-title mb-3" id="maid_health_expiry">Maid visa expiry in 2 months</h4>

                        
                        <div class="inbox-widget" data-simplebar="init" id="visaCollpase4" style="max-height: 407px;">
                            <div class="simplebar-wrapper" style="margin: 0px;">
                               
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper"
                                            style="height: auto; overflow: hidden scroll;">
                                            <div class="
                                                                                      "
                                                style="padding: 0px;">

                                                <table id="visa-expiry"
                                                    class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline visa_expiry"
                                                    role="grid" aria-describedby="selection-datatable_info"
                                                    style="width: 1008px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Username</th>
                                                            {{-- <th>Contact no</th> --}}
                                                            <th>Expiry date</th>

                                                            <th>Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($visa_expiry as $visa)
                                                        <tr>
                                                           
                                                            <td class="text-capitalize">{{ $visa->user_name }}</td>
                                                            <td>{{ $visa->visa_expiry_date }}</td>
                                                            
                                                            <td class="text-center"><a href="{{ route('maid.show', $visa->user_name) }}"><i class="fas fa-eye"></i></a></td>
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
                       
                    </div> <!-- end inbox-widget -->
                </div>
            </div>



            <div class="col-xl-6 col-lg-6" id="offline" style="display: none">
                <div class="card">
                    <div class="card-body">

                        <div class="card-widgets">
                            <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                            <a data-bs-toggle="collapse" href="#offlineCollpase4" role="button" aria-expanded="true" aria-controls="cardCollpase4" class=""><i class="mdi mdi-minus"></i></a>
                            <a href="javascript: void(0);" onclick="fade_fun('offline')"><i class="mdi mdi-close"></i></a>
                        </div>
                        <h4 class="header-title mb-3" id="maid_health_expiry">Offline Maids</h4>

                        <div class="inbox-widget" data-simplebar="init" id="offlineCollpase4" style="max-height: 407px;">
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

                                                <table
                                                 id="offline-datatable"
                                                    class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline offline"
                                                    role="grid" aria-describedby="selection-datatable_info"
                                                    style="width: 1008px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Username</th>
                                                            {{-- <th>Contact no</th> --}}
                                                            <th>Last update</th>

                                                            <th>Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($offline as $off)
                                                        <tr>
                                                           
                                                            <td class="text-capitalize">{{ $off->user_name }}</td>
                                                            <td>{{ $off->last_updated }}</td>
                                                            
                                                            <td class="text-center"><a href="{{ route('maid.show', $off->user_name) }}"><i class="fas fa-eye"></i></a></td>
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
                        
                    </div> <!-- end inbox-widget -->
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 " id="health" style="display: none">
                <div class="card">
                    <div class="card-body">
                        <div class="card-widgets">
                            <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                            <a data-bs-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="true" aria-controls="cardCollpase4" class=""><i class="mdi mdi-minus"></i></a>
                            <a href="javascript: void(0);" onclick="fade_fun('health')"><i class="mdi mdi-close"></i></a>
                        </div>
                        <h4 class="header-title mb-3" id="maid_health_expiry">Maid Health expiry in 2 months</h4>
                        
                        <div class="inbox-widget collapse pt-3 show" id="cardCollpase4" data-simplebar="init" style="max-height: 407px;">
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

                                                <table id="selection-datatable"
                                                    class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline health_expiry"
                                                    role="grid" aria-describedby="selection-datatable_info"
                                                    style="width: 1008px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Username</th>

                                                            <th>Expiry date</th>

                                                            <th>Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($health_expiry as $health)
                                                        <tr>
                                                          
                                                            <td class="text-capitalize">{{ $health->user_name }}</td>
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
                       
                    </div> <!-- end inbox-widget -->
                </div>
            </div>
        </div>


        <div class="card p-4">
            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <th>Agency name</th>
                    <th>username</th>
                    <th class="text-center">Total maids</th>
                    <th class="text-center">Total clients</th>
                    <th>Created AT</th>
                    <th>Detail</th>
                </thead>
                <tbody>
                    @foreach ($agency as $agen)
                        <tr>
                            <td>{{ $agen->agency_name }}</td>
                            <td>{{ $agen->user_name }}</td>
                            <td class="text-center">{{ $agen->total_maid }}</td>
                            <td class="text-center">{{ $agen->total_client }}</td>
                            <td>{{ date('d-m-Y', strtotime($agen->created_at)) }}</td>
                            <td class="text-center"><a href="{{ route('agency.show', $agen->id) }}"> <i
                                        class="fas fa-eye" style="color: grey"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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

    <script type="text/javascript">
        function fade_fun(klass) {
            let dis = document.getElementById(klass);


            if (dis.style.display === "none") {
                $('#' + klass).fadeIn();

            } else {
                $('#' + klass).fadeOut();
            }
        }
        $("#offline-datatable").DataTable();
        $("#visa-expiry").DataTable();

    </script>
@endsection
