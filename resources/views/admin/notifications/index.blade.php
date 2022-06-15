@extends('layouts.admin')
 @section('title')
 Notifications - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Notifications</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/notifications')}}" class="fw-normal">Notifications</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Notifications Table</h3>

                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif(session('warning'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('warning') }}
                            </div>
                            @endif

                            <div class="table-responsive">
                                 <!-- Tab links -->
                                <div class="tab">
                                    <button class="tablinks" onclick="openCity(event, 'London')">Unread</button>
                                    <button class="tablinks" onclick="openCity(event, 'Paris')">Read</button>
                                </div>
                                
                                <!-- Tab content -->
                                <div id="London" class="tabcontent">
                                    <table class="table text-nowrap table-bordered table-striped" id="table">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Customer Name</th>
                                                <th class="border-top-0">Time</th>
                                                <th class="border-top-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($unread as $urd)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    @if($urd->online_status == '1')
                                                        <span class="text-success"> <b>Online</b> </span> 
                                                    @else
                                                        <span class="text-danger"> <b>Offline</b> </span> 
                                                    @endif
                                                </td>
                                                <td>{{$urd->customer_inf->name}}</td>
                                                <td>{{$urd->created_at}}</td>
                                                <td>
                                                    <a href="{{url('read-status/'.$urd->id)}}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as Read">
                                                        <i class="fa fa-bell-slash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div id="Paris" class="tabcontent">
                                    <table class="table text-nowrap table-bordered table-striped" id="read_table">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Customer Name</th>
                                                <th class="border-top-0">Time</th>
                                                <th class="border-top-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($read as $rd)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    @if($rd->online_status == '1')
                                                        <span class="text-success"> <b>Online</b> </span> 
                                                    @else
                                                        <span class="text-danger"> <b>Offline</b> </span> 
                                                    @endif
                                                </td>
                                                <td>{{$rd->customer_inf->name}}</td>
                                                <td>{{$urd->created_at}}</td>
                                                <td>
                                                    <a href="{{url('/delete-status/'.$rd->id)}}"
                                                    class="btn btn-danger text-white deleteBtn">Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <style>
                /* Style the tab */
           .tab {
             overflow: hidden;
             border: 1px solid #ccc;
             background-color: #f1f1f1;
           }
           
           /* Style the buttons that are used to open the tab content */
           .tab button {
             background-color: inherit;
             float: left;
             border: none;
             outline: none;
             cursor: pointer;
             padding: 14px 16px;
             transition: 0.3s;
           }
           
           /* Change background color of buttons on hover */
           .tab button:hover {
             background-color: #ddd;
           }
           
           /* Create an active/current tablink class */
           .tab button.active {
             background-color: #ccc;
           }
           
           /* Style the tab content */
           .tabcontent {
             display: none;
             padding: 6px 12px;
             border: 1px solid #ccc;
             border-top: none;
           } 
           </style>
@endsection
        
        
