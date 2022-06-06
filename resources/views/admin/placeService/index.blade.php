@extends('layouts.admin')
 @section('title')
 Place Services - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/place-services')}}" class="fw-normal">Place Services</a></li>
                            </ol>
                            <a href="{{url('/add-place-service')}}"
                                class="btn btn-success  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add Place Services
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
                            <h3 class="box-title">Place Services Table</h3>

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
                                            <th class="border-top-0">Place</th>
                                            <th class="border-top-0">Service</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Code</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($placeServices as $placeservice)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$placeservice->place_info->place_name}}</td>
                                            <td>{{$placeservice->service_info->service_name}}</td>
                                            <td>{{$placeservice->name}}</td>
                                            <td>{{$placeservice->service_info->service_price}}.00</td>
                                            <td>{{$placeservice->code}}</td>
                                            <td>
                                                @if($placeservice->status == 1)
                                                Active
                                                @elseif($placeservice->status == 0)
                                                Deactive
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('/edit-place-service/'.$placeservice->id)}}"
                                                class="btn btn-info text-white">Edit
                                                </a>
                                                <a href="{{url('/delete-place-service/'.$placeservice->id)}}"
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
@endsection
        
        
 
        
