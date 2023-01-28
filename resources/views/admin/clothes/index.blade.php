@extends('layouts.admin')
 @section('title')
 Clothes - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Clothes</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/clothes')}}" class="fw-normal">Clothes</a></li>
                            </ol>
                            <a href="{{url('/add-cloth')}}"
                                class="btn btn-success  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add Cloth
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
                            <h3 class="box-title">Clothes Table</h3>

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
                                            <th class="border-top-0">Hexa Code</th>
                                            <th class="border-top-0">Customer</th>
                                            <th class="border-top-0">Order No</th>
                                            <th class="border-top-0">Details</th>
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">Wash Status</th>
                                            <th class="border-top-0">Dryer Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clothes as $cloth)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                {{$cloth->hexa_code}}
                                            </td>
                                            <td>{{$cloth->customer_inf->name}}</td>
                                            <td>{{$cloth->order_id}}</td>
                                            <td>
                                                <b>Size:</b> {{$cloth->size}} <br>
                                                <b>Color:</b> {{$cloth->color}} <br>
                                                <b>Fabric:</b> {{$cloth->fabric}} <br>
                                                <b>Weight:</b> {{$cloth->weight}} <br>
                                                <b>Brand:</b> {{$cloth->brand}} <br>
                                            </td>
                                            <td>{{$cloth->customer_inf->name}}</td>
                                            <td><img src="/uploads/clothes/{{$cloth->image}}" alt="" width="100px"></td>
                                            <td>
                                                {{$cloth->wash_program_number}}
                                            </td>
                                            <td>
                                                {{$cloth->dryer_program_number}}
                                            </td>
                                            <td>
                                                <a href="{{url('/edit-cloth/'.$cloth->id)}}"
                                                class="btn btn-info text-white">Edit
                                                </a>
                                                <a href="{{url('/delete-cloth/'.$cloth->id)}}"
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
        
        
 
        
