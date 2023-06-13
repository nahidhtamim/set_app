@extends('layouts.admin')
 @section('title')
 Add Vehicle Assignement- SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Vehicle Assignement</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/add-vehicle-assignment')}}" class="fw-normal">Add Assignement</a></li>
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
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material" method="POST" action="{{url('/save-vehicle-assignment')}}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Vehicle <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="vehicle_id" id="vehicle_id" required>
                                            <option>SET Vehicle</option>
                                            @forEach($vehicles as $vehicle)
                                            <option value="{{$vehicle->id}}">{{$vehicle->vehicle_number}}</option>
                                            @endforEach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Place</b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="place_id" id="place_id">
                                            <option>SET Place</option>
                                            @forEach($places as $place)
                                            <option value="{{$place->id}}">{{$place->place_name}}</option>
                                            @endforEach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Assignment Details</b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea rows="5" class="form-control p-0 border-0" name="assignment_details" id="assignment_details" required>
                                            SET Assignment Details
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-sm-12"><b>Assignment Status <span class="text-danger">*</span></b></label>

                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="assignment_status" required>
                                            <option>SET Assignment Status</option>
                                            <option value="1">Running</option>
                                            <option value="2">Complete</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
          
@endsection
        
        
 
        
