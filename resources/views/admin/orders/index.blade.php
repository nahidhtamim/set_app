@extends('layouts.admin')
 @section('title')
 Orders - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Orders</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/orders')}}" class="fw-normal">Orders</a></li>
                            </ol>
                            {{-- <a href="{{url('/add-locker')}}"
                                class="btn btn-success  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add lockers
                            </a> --}}
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
                            <h3 class="box-title">Orders Table</h3>

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
                                            <th class="border-top-0">Sport</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Payment</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$order->u_name}}</td>
                                                <td>{{$order->sport_name}}</td>
                                                <td class="text-right">{{$order->s_price}}€</td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                    <a href="{{url('order-payments/'.$order->id)}}" class="btn btn-dark btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Payments List">
                                                        <i class="fa fa-list" aria-hidden="true"></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" method="POST" action="{{url('/save-payment')}}">
                                                                    @csrf

                                                                    <input type="hidden" name="customer_id" value="{{$order->customer_id}}">
                                                                    <input type="hidden" name="order_id" value="{{$order->id}}">

                                                                    @php
                                                                        $invoice_no = date('m', strtotime($order->created_at)).'-'.$order->id;
                                                                        $create_date = date('d-m-Y', strtotime($order->created_at));
                                                                        $update_date = date('d-m-Y', strtotime($order->updated_at));
                                                                    @endphp

                                                                    <input type="hidden" name="invoice_no" value="{{$invoice_no}}">
                                                                    <input type="hidden" name="s_name" value="{{$order->s_name}}">
                                                                    <input type="hidden" name="ps_name" value="{{$order->ps_name}}">
                                                                    <input type="hidden" name="ps_code" value="{{$order->ps_code}}">
                                                                    <input type="hidden" name="l_name" value="{{$order->l_name}}">
                                                                    <input type="hidden" name="pl_name" value="{{$order->pl_name}}">
                                                                    <input type="hidden" name="pl_code" value="{{$order->pl_code}}">
                                                                    <input type="hidden" name="sport_name" value="{{$order->sport_name}}">
                                                                    <input type="hidden" name="s_price" value="{{$order->s_price}}">

                                                                    <input type="hidden" name="shipping_name" value="{{$order->shipping_name}}">
                                                                    <input type="hidden" name="shipping_email" value="{{$order->shipping_email}}">
                                                                    <input type="hidden" name="shipping_phone" value="{{$order->shipping_phone}}">
                                                                    <input type="hidden" name="shipping_address" value="{{$order->shipping_address}}">
                                                                    <input type="hidden" name="billing_name" value="{{$order->billing_name}}">
                                                                    <input type="hidden" name="billing_email" value="{{$order->billing_email}}">
                                                                    <input type="hidden" name="billing_phone" value="{{$order->billing_phone}}">
                                                                    <input type="hidden" name="billing_address" value="{{$order->billing_address}}">
                                                                    <input type="hidden" name="billing_phone" value="{{$order->billing_phone}}">
                                                                    <input type="hidden" name="message" value="{{$order->message}}">
                                                                    <input type="hidden" name="create_date" value="{{$create_date}}">
                                                                    <input type="hidden" name="update_date" value="{{$update_date}}">


                                                                    <div class="form-group mb-4">
                                                                        <label class="col-md-12 p-0"><b>Payment Month <span class="text-danger">*</span></b></label>

                                                                        <div class="col-sm-12 border-bottom">
                                                                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="month" required>
                                                                                <option>Select Payment Month</option>
                                                                                <option value="1">January</option>
                                                                                <option value="2">February</option>
                                                                                <option value="3">March</option>
                                                                                <option value="4">April</option>
                                                                                <option value="5">May</option>
                                                                                <option value="6">June</option>
                                                                                <option value="7">July</option>
                                                                                <option value="8">August</option>
                                                                                <option value="9">September</option>
                                                                                <option value="10">October</option>
                                                                                <option value="11">November</option>
                                                                                <option value="12">December</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                    
                                                                    <div class="form-group mb-4">
                                                                        <label class="col-md-12 p-0"><b>Payment Year <span class="text-danger">*</span></b></label>
                                                                        <div class="col-md-12 border-bottom p-0">
                                                                            <input type="text" placeholder="SET Payment Year"
                                                                                class="form-control p-0 border-0" name="year" required> 
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group mb-4">
                                                                        <div class="col-sm-12">
                                                                            <button class="btn btn-success">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            {{-- <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save</button>
                                                            </div> --}}
                                                        </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($order->order_status == 1)
                                                        <span class="text-success"> <b>Active</b> </span>
                                                        <div class="btn-group" role="group" aria-label="Buttons">
                                                            <a href="{{url('closing-request/'.$order->id)}}" class="btn btn-warning btn-sm onClosing" data-bs-toggle="tooltip" data-bs-placement="top" title="Stop The Order">
                                                                <i class="fa fa-stop" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="{{url('order-close/'.$order->id)}}" class="btn btn-danger btn-sm closeOrder" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel The Order">
                                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    @elseif($order->order_status == 2)
                                                        <span class="text-warning"> <b>On Closing</b> </span>
                                                        <div class="btn-group" role="group" aria-label="Buttons">
                                                            <a href="{{url('order-active/'.$order->id)}}" class="btn btn-success btn-sm activeOrder" data-bs-toggle="tooltip" data-bs-placement="top" title="Active The Order">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="{{url('order-close/'.$order->id)}}" class="btn btn-danger btn-sm closeOrder" data-bs-toggle="tooltip" data-bs-placement="top" title="Close The Order">
                                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    @elseif($order->order_status == 3)
                                                        <span class="text-danger"> <b>Closed</b> </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="#"
                                                        class="btn btn-secondary text-white" data-bs-toggle="modal" data-bs-target="#detailsModal" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details">View
                                                    </a>
                                                    <a href="{{url('/edit-order/'.$order->id)}}"
                                                        class="btn btn-info text-white">Edit
                                                    </a>
                                                    <a href="{{url('/delete-order/'.$order->id)}}"
                                                        class="btn btn-danger text-white deleteBtn">Delete
                                                    </a>
                                                    <div class="btn-group" role="group" aria-label="Buttons">
                                                        {{-- @if($order->order_status == 1)
                                                        
                                                        @else
                                                        <a href="#" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#detailsModal" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                        @endif --}}
                                                    </div>
                                                </td>
                                            </tr>

                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="detailsModalLabel">Order Details</h5>
                                                    <a href="#" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h6 class="text-center text-secondary">Service Details</h6>
                                                                <p>
                                                                    <b>Service:</b> {{$order->s_name}} <br>
                                                                    <b>Place Service:</b> {{$order->ps_name}} <br>
                                                                    <b>Service Code:</b> {{$order->ps_code}}
                                                                </p>
                                                                <br>
                                                                <h6 class="text-center text-secondary">Locker Details</h6>
                                                                <p>
                                                                    <b>Locker:</b> {{$order->l_name}} <br>
                                                                    <b>Place Locker:</b> {{$order->pl_name}} <br>
                                                                    <b>Locker Code:</b> {{$order->pl_code}}
                                                                </p>
                                                                <br>
                                                                <h6 class="text-center text-secondary">Shipping Details</h6>
                                                                <p>
                                                                    <b>Name:</b> {{$order->shipping_name}} <br>
                                                                    <b>Email:</b> {{$order->shipping_email}} <br>
                                                                    <b>Phone:</b> {{$order->shipping_phone}} <br>
                                                                    <b>Address:</b> {{$order->shipping_address}}
                                                                </p>
                                                                <br>
                                                                <h6 class="text-center text-secondary">Billing Details</h6>
                                                                <p>
                                                                    <b>Name:</b> {{$order->billing_name}} <br>
                                                                    <b>Email:</b> {{$order->billing_email}} <br>
                                                                    <b>Phone:</b> {{$order->billing_phone}} <br>
                                                                    <b>Address:</b> {{$order->billing_address}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="modal-footer">
                                                    <a href="#" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</a>
                                                    <a href="#" class="btn btn-primary btn-sm">Save changes</a>
                                                    </div> --}}
                                                </div>
                                                </div>
                                            </div>
                                            


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
        
        
 
        
