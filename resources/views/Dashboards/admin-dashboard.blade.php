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
            <div class="col-md-6 col-xl-2" style="cursor: pointer" onclick="fade_fun('visa')">
                <div class="card" id="tooltip-container">
                    <div class="card-body p-2">

                        <h6 class="mt-0 font-16 ">Maid visa expiry in 2 months</h6>
                        <h3 class="text-primary my-2 "><span data-plugin="counterup">{{ $data->visa_expiry }}</span></h3>
                        {{-- <p class="text-muted mb-0">Client Register this week <span class="float-end"><i class="fa fa-caret-up text-success me-1"></i>10.25%</span></p> --}}
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6" id="visa" style="display: none">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mb-3" id="maid_health_expiry">Maid visa expiry in 2 months</h4>

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

                                                <table
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



            <div class="col-xl-6 col-lg-6" id="offline" style="display: none">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mb-3" id="maid_health_expiry">Offline Maids</h4>

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

                                                <table
                                                 {{-- id="selection-datatable" --}}
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
                                                        {{-- @foreach ($data['health'] as $health)
                                                        <tr>
                                                           
                                                            <td class="text-capitalize">{{ $health->user_name }}</td>
                                                            <td>{{ $health->health_card_expiry }}</td>
                                                            
                                                            <td class="text-center"><a href="{{ route('maid.show', $health->user_name) }}"><i class="fas fa-eye"></i></a></td>
                                                        </tr>
                                                    @endforeach --}}

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


            <div class="col-xl-6 col-lg-6 " id="health" style="display: none">
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
                                                        {{-- @foreach ($detail['health_expiry'] as $health)
                                                        <tr>
                                                          
                                                            <td class="text-capitalize">{{ $health->user_name }}</td>
                                                            <td>{{ $health->health_card_expiry }}</td>
                                                            
                                                            <td class="text-center"><a href="{{ route('maid.show', $health->user_name) }}"><i class="fas fa-eye"></i></a></td>
                                                        </tr>
                                                    @endforeach --}}

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
        $(document).ready(function() {
            health_expiry();
            visa_expiry();
            offline();
        });

        function health_expiry() {
            $.ajax({
                type: "GET",
                url: `/get-health-expiry`,
                success: function(data) {
                    console.log(data);
                    var table = document.getElementsByClassName("health_expiry")[0];
                    for (i = 0; i < data.length; i++) {

                        var newRow = table.insertRow(-1);

                        var cell1 = newRow.insertCell(0);
                        var cell2 = newRow.insertCell(1);
                        var cell3 = newRow.insertCell(2);
                        cell1.innerHTML = data[i].user_name;
                        cell2.innerHTML = data[i].health_card_expiry;
                        cell3.innerHTML = "<a href = '/maid/" + data[i].user_name +
                            "' > <i class ='fas fa-eye' > </i></a>";
                    }
                }
            });
        }

        function visa_expiry() {
            $.ajax({
                type: "GET",
                url: `/get-visa-expiry`,
                success: function(data) {
                    console.log(data);
                    var table = document.getElementsByClassName("visa_expiry")[0];
                    for (i = 0; i < data.length; i++) {

                        var newRow = table.insertRow(-1);

                        var cell1 = newRow.insertCell(0);
                        var cell2 = newRow.insertCell(1);
                        var cell3 = newRow.insertCell(2);
                        cell1.innerHTML = data[i].user_name;
                        cell2.innerHTML = data[i].visa_expiry_date;
                        cell3.innerHTML = "<a href = '/maid/" + data[i].user_name +
                            "' > <i class ='fas fa-eye' > </i></a>";
                    }
                }
            });
        }

        function offline() {
            $.ajax({
                type: "GET",
                url: `/get-offline-maids`,
                success: function(data) {
                    console.log(data);
                    var table = document.getElementsByClassName("offline")[0];
                    for (i = 0; i < data.length; i++) {

                        var newRow = table.insertRow(-1);

                        var cell1 = newRow.insertCell(0);
                        var cell2 = newRow.insertCell(1);
                        var cell3 = newRow.insertCell(2);
                        cell1.innerHTML = data[i].user_name;
                        cell2.innerHTML = data[i].last_updated;
                        cell3.innerHTML = "<a href = '/maid/" + data[i].user_name +
                            "' > <i class ='fas fa-eye' > </i></a>";
                    }
                }
            });
        }

    </script>
@endsection
