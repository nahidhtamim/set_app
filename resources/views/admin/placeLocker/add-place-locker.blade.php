@extends('layouts.admin')
 @section('title')
 Add Place Locker - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Place Lockers</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/add-place-locker')}}" class="fw-normal">Add Place Locker</a></li>
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
                    <form class="form-horizontal form-material" method="POST" action="{{url('/save-place-locker')}}">
                        @csrf
                    <div class="card">
                        <div class="card-body">
                            <a class="text-light btn btn-success add_row pull-left" id="add_row" style="text-decoration: none;"> <i class="fa fa-plus-square"> Add Row</i> </a>
                            <a class="text-light btn btn-danger delete_row pull-right" style="text-decoration: none;"> <i class="fa fa-minus-square"></i> Delete Row</a>
                            <br>
                            <table class="table table-bordered table-striped mt-5" id="influencer_table">
                                <thead class="text-center">
                                    <tr>
                                        <th><label class=""><b>Place <span class="text-danger">*</span></b></label></th>
                                        <th><label class=""><b>Service <span class="text-danger">*</span></b></label></th>
                                        <th><label class=""><b>Locker <span class="text-danger">*</span></b></label></th>
                                        <th><label class=""><b>Name <span class="text-danger">*</span></b></label></th>
                                        <th><label class=""><b>Code <span class="text-danger">*</span></b></label></th>
                                        {{-- <th><label class=""><b>Status <span class="text-danger">*</span></b></label></th> --}}
                                    </tr>
                                </thead>
                                <tbody id="data_row">
                                    <tr id="locker_row0">
                                        <td>
                                            <select id="place_id" class="form-select shadow-none p-0 border-0 " name="place_id[]" required>
                                                <option>SET Place</option>
                                                @foreach($places as $place)
                                                    <option value="{{ $place->id }}">{{ $place->place_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select id="service_id" class="form-select shadow-none p-0 border-0 " name="service_id[]" required>
                                                <option selected>SET Service</option>
                                                {{-- @foreach($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach --}}
                                            </select>
                                        </td>
                                        <td>
                                            <select id="inputState" class="form-select shadow-none p-0 border-0 " name="locker_id[]" required>
                                                <option>SET Locker</option>
                                                @foreach($lockers as $locker)
                                                    <option value="{{ $locker->id }}">{{ $locker->locker_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="SET Name"
                                            class="form-control p-0 border-0" name="name[]" required> 
                                        </td>
                                        <td>
                                            <input type="text" placeholder="SET Code"
                                            class="form-control p-0 border-0" name="code[]" required> 
                                        </td>
                                        {{-- <td>
                                            <select id="inputState" class="form-select shadow-none p-0 border-0" name="status[]" required>
                                                <option>SET Active Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </td> --}}
                                    </tr>
                                    <tr id="locker_row1"></tr>
                                </tbody>
                            </table>

                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Save</button>
                                </div>
                            </div>                         
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
          
@endsection
        
        
 
        
