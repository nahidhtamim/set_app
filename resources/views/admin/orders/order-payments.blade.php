@extends('layouts.admin')
 @section('title')
 Order Payments - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Order Payments</h4>
                    </div>
                    {{-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/order-payments/'.)}}" class="fw-normal">Order Payments</a></li>
                            </ol>
                            <a href="{{url('/add-place')}}"class="btn btn-success  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add Place</a>
                        </div>
                    </div> --}}
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
                            <h3 class="box-title">Order Payments Table</h3>

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
                                            <th class="border-top-0">Customer Name</th>
                                            <th class="border-top-0">Order No.</th>
                                            <th class="border-top-0">Payment Month</th>
                                            <th class="border-top-0">Payment Year</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ops as $op)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$op->customer_inf->name}}</td>
                                            <td>{{$op->order_id}}</td>
                                            <td>
                                                @if ($op->month == '1' )
                                                January
                                                @elseif ($op->month == '2' )
                                                February
                                                @elseif ($op->month == '3' )
                                                March
                                                @elseif ($op->month == '4' )
                                                April
                                                @elseif ($op->month == '5' )
                                                May
                                                @elseif ($op->month == '6' )
                                                June
                                                @elseif ($op->month == '7' )
                                                July
                                                @elseif ($op->month == '8' )
                                                August
                                                @elseif ($op->month == '9' )
                                                September
                                                @elseif ($op->month == '10' )
                                                October
                                                @elseif ($op->month == '11' )
                                                November
                                                @else
                                                December
                                                @endif
                                            </td>
                                            <td>{{$op->year}}</td>
                                            <td>
                                                {{-- <a href="{{url('/edit-payment/'.$op->id)}}"
                                                class="btn btn-info text-white">Edit
                                                </a> --}}
                                                <a href="{{url('payment-details/'.$op->id)}}"
                                                    class="btn btn-info text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="View Invoice">
                                                    <i class="fa fa-file-pdf" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{url('delete-payment/'.$op->id)}}"
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
        
        
 
        
