@extends('layouts.admin')
 @section('title')
 Edit Place - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Places</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/edit-place/'.$place->id)}}" class="fw-normal">Edit Place</a></li>
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
                            <form class="form-horizontal form-material" method="POST" action="{{url('/update-place/'.$place->id)}}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Place Name <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$place->place_name}}"
                                            class="form-control p-0 border-0" name="place_name" required> 
                                        </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Place Description <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea rows="5" class="form-control p-0 border-0" name="place_description" required>
                                            {{$place->place_description}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12"><b>Place Status <span class="text-danger">*</span></b></label>

                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="place_status" required>
                                            <option value="{{$place->place_status}}">
                                                @if($place->place_status == 1)
                                                Active
                                                @elseif($place->place_status == 0)
                                                Deactive
                                                @endif
                                            </option>
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Update</button>
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
        
        
 
        
