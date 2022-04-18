@extends('layouts.admin')
 @section('title')
 Sports - SET Admin Panel
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
                                <li><a href="{{url('/sports')}}" class="fw-normal">Sports</a></li>
                            </ol>
                            <a href="{{url('/add-sport')}}" target="_blank"
                                class="btn btn-success  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add Sports
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
                            <h3 class="box-title">Sports Table</h3>

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
                                <table class="table text-nowrap table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Sport Name</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sports as $sport)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$sport->sport_name}}</td>
                                            <td>{!!$sport->sport_description!!}</td>
                                            <td>
                                                @if($sport->sport_status == 1)
                                                Active
                                                @elseif($sport->sport_status == 0)
                                                Deactive
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('/edit-sport/'.$sport->id)}}" target="_blank"
                                                class="btn btn-info text-white">Edit
                                                </a>
                                                <a href="{{url('/delete-sport/'.$sport->id)}}"
                                                class="btn btn-danger text-white">Delete
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
        
        
 
        
