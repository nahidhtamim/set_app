@extends('layouts.admin')
 @section('title')
 Edit Place Locker - SET Admin Panel
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
                                <li><a href="{{url('/edit-place-locker/'.$placeLocker->id)}}" class="fw-normal">Edit Place Locker</a></li>
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
                            <form class="form-horizontal form-material" method="POST" action="{{url('/update-place-locker/'.$placeLocker->id)}}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="col-sm-12"><b>Place <span class="text-danger">*</span></b></label>

                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="place_id" id="place_id" required>
                                            <option value="{{$placeLocker->place_id}}">{{$placeLocker->place_info->place_name}}</option>
                                            @foreach($places as $place)
                                                <option value="{{ $place->id }}">{{ $place->place_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12"><b>Service <span class="text-danger">*</span></b></label>

                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="service_id" id="service_id" required>
                                            <option value="{{$placeLocker->service_id}}" selected>{{$placeLocker->service_info->name}}</option>
                                            {{-- @foreach($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12"><b>Locker <span class="text-danger">*</span></b></label>

                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="locker_id" required>
                                            <option value="{{$placeLocker->locker_id}}">{{$placeLocker->locker_info->locker_name}}</option>
                                            @foreach($lockers as $locker)
                                                <option value="{{ $locker->id }}">{{ $locker->locker_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Name <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$placeLocker->name}}"
                                            class="form-control p-0 border-0" name="name" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Code <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$placeLocker->code}}"
                                            class="form-control p-0 border-0" name="code" required> 
                                        </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"><b>Storage Name <span class="text-danger">*</span></b></label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" value="{{$placeLocker->storage_name}}"
                                            class="form-control p-0 border-0" name="storage_name" required> 
                                        </div>
                                </div>
                                {{-- <div class="form-group mb-4">
                                    <label class="col-sm-12"><b>Status <span class="text-danger">*</span></b></label>

                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="status" required>
                                            <option value="{{$placeLocker->status}}">
                                                @if($placeLocker->status == 1)
                                                Active
                                                @elseif($placeLocker->status == 0)
                                                Deactive
                                                @endif
                                            </option>
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                </div> --}}
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
        
        
 
        
