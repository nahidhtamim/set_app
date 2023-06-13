
@extends('layouts.admin')
 @section('title')
 Clothes - Laundry Items - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Clothes - Laundry Items
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/clothes')}}" class="fw-normal">Clothes</a></li>
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
                            <h3 class="box-title">Laundry Items Table</h3>

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
                                            <th class="border-top-0">Customer</th>
                                            <th class="border-top-0">Clothing Set</th>
                                            <th class="border-top-0">Washing Program</th>
                                            <th class="border-top-0">Color Group</th>
                                            <th class="border-top-0">Cloth Type</th>
                                            <th class="border-top-0">Fabric</th>
                                            <th class="border-top-0">Sportswear Type</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($laundries as $laundry)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$laundry->user_inf->name}}</td>
                                                <td>{{$laundry->set_id}}</td>
                                                <td>{{$laundry->washing_program_inf->name}}</td>
                                                <td>{{$laundry->cloth_group_inf->name}}</td>
                                                <td>{{$laundry->cloth_type_inf->name}}</td>
                                                <td>{{$laundry->fabric_inf->name}}</td>
                                                <td>{{$laundry->sportswear_inf->name}}</td>
                                                <td>{!!$laundry->laundry_description!!}</td>
                                                <td>
                                                    @if($laundry->status == 1)
                                                    Active
                                                    <a href="{{url('laundry-deactive/'.$laundry->id)}}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Deactive The Laundry">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                    @elseif($laundry->status == 0)
                                                    Deactive
                                                    <a href="{{url('laundry-active/'.$laundry->id)}}" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Active The Laundry">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('/edit-laundry/'.$laundry->id)}}"
                                                    class="btn btn-info text-white">Edit
                                                    </a>
                                                    <a href="{{url('/delete-laundry/'.$laundry->id)}}"
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
        