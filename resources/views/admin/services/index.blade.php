@extends('layouts.admin')
 @section('title')
 Services - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Services</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/services')}}" class="fw-normal">Services</a></li>
                            </ol>
                            <a href="{{url('/add-service')}}"
                                class="btn btn-success  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add Service
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
                            <h3 class="box-title">Services Table</h3>

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
                                <table class="table text-nowrap table-bordered table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Service Name</th>
                                            <th class="border-top-0">Service Price</th>
                                            <th class="border-top-0">Service Image</th>
                                            <th class="border-top-0">Short Description</th>
                                            <th class="border-top-0">Long Description</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($services as $service)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <b>Eng:</b> {{$service->service_name}} <br>
                                                <b>Ger:</b> {{$service->service_name_ger}}
                                            </td>
                                            <td>{!!$service->service_price!!}</td>
                                            <td><img src="/uploads/services/{{$service->service_image}}" alt="" width="100px"></td>
                                            <td>
                                                <b>Eng:</b> {{$service->short_desc}} <br>
                                                <b>Ger:</b> {{$service->short_desc_ger}}
                                            </td>
                                            <td>
                                                <b>Eng:</b> {!!$service->long_desc!!} <br>
                                                <b>Ger:</b> {!!$service->long_desc_ger!!}
                                                
                                            </td>
                                            <td>
                                                @if($service->service_status == 1)
                                                Active
                                                <a href="{{url('service-deactive/'.$service->id)}}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Deactive The Service">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                                @elseif($service->service_status == 0)
                                                Deactive
                                                <a href="{{url('service-active/'.$service->id)}}" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Active The Service">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('/edit-service/'.$service->id)}}"
                                                class="btn btn-info text-white">Edit
                                                </a>
                                                <a href="{{url('/delete-service/'.$service->id)}}"
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
        
        
 
        
