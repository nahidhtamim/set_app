@extends('layouts.admin')
 @section('title')
 Vehicle Assignments - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Vehicle Assignments</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/vehicle-assignments')}}" class="fw-normal">Vehicle Assignments</a></li>
                            </ol>
                            <a href="{{url('/add-vehicle-assignment')}}"
                                class="btn btn-success pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add Vehicle Assignment
                                </a>
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
                            <h3 class="box-title">Vehicle Assignments Table</h3>

                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif(session('warning'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('warning') }}
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Vehicle Number</th>
                                            <th class="border-top-0">Place</th>
                                            <th class="border-top-0">Assignement Details</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($assignments as $assignment)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$assignment->vehicle_inf->vehicle_number}}</td>
                                            <td>{{$assignment->place_inf->place_name}}</td>
                                            <td>{!!$assignment->assignment_details!!}</td>
                                            <td>
                                                @if($assignment->assignment_status == 1)
                                                Running
                                                <a href="{{url('vehicle-assignement-complete/'.$assignment->id)}}" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Process Complete">
                                                    <i class="fa fa-stop" aria-hidden="true"></i>
                                                </a>
                                                @elseif($assignment->assignment_status == 2)
                                                Complete
                                                <a href="{{url('vehicle-assignement-running/'.$assignment->id)}}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Process Running">
                                                    <i class="fa fa-play" aria-hidden="true"></i>
                                                </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('/edit-vehicle-assignment/'.$assignment->id)}}"
                                                class="btn btn-info text-white">Edit
                                                </a>
                                                <a href="{{url('/delete-vehicle-assignment/'.$assignment->id)}}"
                                                class="btn btn-danger text-white" onclick="return confirm('Are you sure to delete?')">Delete
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
@endsection
        
        
 
        
